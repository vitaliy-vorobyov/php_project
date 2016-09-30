<?php
	header('Content-Type: application/json');
	define('ROOT_PATH', dirname(dirname(__FILE__)));
	require('helpers.php');
	
	$output = [];
	
	$i = 1;
	while(file_exists(ROOT_PATH.'/users/'.$i.'.json'))
	{
		$fileData = json_decode(file_get_contents(ROOT_PATH.'/users/'.$i.'.json'), true);

		$output[] = [
			'lat' => getElementByKey('lat', $fileData),
			'lng' => getElementByKey('lng', $fileData),
			'address' => getElementByKey('address', $fileData)
		];

		$i++;
	}

	echo json_encode($output);