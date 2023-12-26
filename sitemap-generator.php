<?php
require_once 'config.php';

// Define the API endpoints URLs and their corresponding URL patterns
$api_url_patterns = array(
    "$backendUrl/wp-json/wp/v2/posts" => "post?id=",
    "$backendUrl/wp-json/wp/v2/osnivaci" => "osnivac?id=",
    "$backendUrl/wp-json/wp/v2/clanovi" => "clan?id=",
    "$backendUrl/wp-json/wp/v2/umjetnici" => "umjetnik?id="
);

function updateSitemapFromAPIs($apiUrlPatterns) {
    global $siteUrl;

    // Load the existing sitemap.xml file if it exists
    if (file_exists('sitemap.xml')) {
        $xml = simplexml_load_file('sitemap.xml');
    } else {
        // If the sitemap.xml doesn't exist, create a new one
        $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?>
            <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"></urlset>');
    }

    foreach ($apiUrlPatterns as $apiUrl => $urlPattern) {
        // Initialize cURL session
        $ch = curl_init();

        // Set cURL options
        curl_setopt($ch, CURLOPT_URL, $apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Execute the cURL request and get the response
        $response = curl_exec($ch);

        // Check for cURL errors
        if (curl_errno($ch)) {
            echo 'Curl error: ' . curl_error($ch);
            exit;
        }

        // Close cURL session
        curl_close($ch);

        // Parse the JSON response
        $posts = json_decode($response);

        // Loop through the posts and add new URL elements to the sitemap
        foreach ($posts as $post) {
            $encodedPart = urldecode($post->slug); // Assuming the Cyrillic characters are in the slu
            $newUrl = "https://czvu.net/sr/" . $urlPattern . $encodedPart;

            // Check if the URL already exists in the sitemap
            $existingUrls = $xml->xpath('//url/loc');
            $urlExists = false;
            foreach ($existingUrls as $existingUrl) {
                if ((string)$existingUrl == $newUrl) {
                    $urlExists = true;
                    break;
                }
            }

            if (!$urlExists) {
                // Add the new URL to the sitemap
                $urlElement = $xml->addChild('url');
                $urlElement->addChild('loc', $newUrl);
            }
        }
    }

    // Save the updated sitemap.xml file
    $xml->asXML('sitemap.xml');

    // Output a success message
    echo 'Sitemap.xml updated successfully with new links.';
}

updateSitemapFromAPIs($api_url_patterns);
?>
