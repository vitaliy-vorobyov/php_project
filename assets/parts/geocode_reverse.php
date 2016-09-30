<?php
	header('Content-Type: application/json');

	require('helpers.php');

	$response = json_decode(file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?latlng=' . $_GET['latlng']), true);

	if($response['results'][0])
	{
		$output = [
			'lat' => getElementByKey('geometry.location.lat', $response['results'][0]),
			'lng' => getElementByKey('geometry.location.lng', $response['results'][0]),
			'address' => getElementByKey('formatted_address', $response['results'][0])
		];
	}

	echo json_encode($output);