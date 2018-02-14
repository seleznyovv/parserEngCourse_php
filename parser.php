<?php
	header('content-type: text/html; charset=utf-8');
	require 'lib/phpQuery.php';

	$url = 'https://enguide.ua/kharkov/courses';
	$file = file_get_contents($url);

	$doc = phpQuery::newDocument($file);
	$nameH = $doc->find('#seoBlockHeader');
	echo "<h1>$nameH </h1><br><br>";

	foreach ($doc->find('.school-catalog-content .courses-school-item') as $course) { 
		$course = pq($course);
		$name = $course->find('.school-preview-data-link');
		$star = $course->find('.school-preview-data-rating ');
		$price = $course->find('.school-preview-data-price');
		$bonus = $course->find('.school-preview-badge');

		echo "<h3>$name курс $star звёзд . Стоимость : $price . Бонус: $bonus</h3><br><br>";
	}
