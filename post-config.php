<?php

	$siteUrl = "https://cvupage.hardcode.solution";
	$backendUrl = "https://cvu.hardcode.solutions";

	//posjeceni url
	$post_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "http" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	$postUrl = strtok($post_link, '?');
	$postLanguage = basename(dirname($postUrl));

?>
