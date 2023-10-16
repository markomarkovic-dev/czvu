<?php

	$siteUrl = "https://cvupage.hardcode.solution";
	$backendUrl = "https://cvu.hardcode.solutions";

	//formatiranje wp datuma u dd.mm.yyyy.
	function formatDate($thisDate) {
		$date = new DateTime($thisDate);
		$day = $date->format('d');
		$month = $date->format('m');
		$year = $date->format('Y');
		$formattedDate = $day . '.' . $month . '.' . $year . '.';
		return $formattedDate;
	}

	//posjeceni url
	$post_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "http" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	$postUrl = strtok($post_link, '?');
	$postLanguage = basename(dirname($postUrl));

?>
