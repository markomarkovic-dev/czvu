<?php 
    include('./config.php'); 
    $checkMetaImg = isset($featureMediaImage) ? $featureMediaImage : "$siteUrl/assets/images/cvu-metaimg.png";
    $pageTitle = isset($postTitle) ? $postTitle : $lang[$pagename]['title'];
    $pageDescription = isset($postDescription) ? $postDescription : $lang[$pagename]['description'];
?>
<!DOCTYPE html>
<html lang="<?php echo $language;?>">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle . " | " . $siteName?></title>
    <meta name="title" content="<?= $pageTitle ?> | <?= $siteName ?>">
    <meta name="description" content="<?= $pageDescription ?>">
    <meta name="keywords" content="">
    <meta name="robots" content="index, follow">
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?= $siteUrl?>">
    <meta property="og:title" content="<?= $pageTitle ?> | <?= $siteName ?>">
    <meta property="og:description" content="<?= $pageDescription ?> ">
    <meta property="og:image" content="<?= $checkMetaImg?>">
    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="<?= $siteUrl?>">
    <meta property="twitter:title" content="<?= $pageTitle ?> | <?= $siteName ?>">
    <meta property="twitter:description" content="<?= $pageDescription?>">
    <meta property="twitter:image" content="<?= $checkMetaImg?>">    
    <link rel="apple-touch-icon" sizes="180x180" href="assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="assets/favicon/site.webmanifest">
    <link rel="mask-icon" href="assets/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/remix-icons/remixicon.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/scss/main.css">

	<?php 
		//generisanje alternate linkova za multijezicke sajtove
		foreach ($langlinks as $link) {
			$langurl = str_replace($language, $link, $url);
			echo '<link rel="alternate" hreflang="'.$link.'" href="'.$langurl.'" />';
		}
	?>

	<script src="assets/js/jquery-3.7.0.min.js"></script>
	<!-- <script src="https://www.google.com/recaptcha/api.js?render=6LdKF0YjAAAAAPh5asW9ZV3IZMxTOnxs6QdXXvhJ"></script> -->
	
</head>
<body class="<?= $pagename;?>-page">