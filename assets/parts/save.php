<?php 
	
	if($_GET['lat'] == '' || $_GET['lng'] == '' || $_GET['name'] == '' || $_GET['address'] == '')
	{
		echo "Bad parameters";
		die();
	}

	$inputArray = [
		'lat' => $_GET['lat'],
		'lng' => $_GET['lng'],
		'name' => $_GET['name'],
		'email' => $_GET['email'],
		'phone' => $_GET['phone'],
		'address' => $_GET['address'],
		'description' => $_GET['description'],
	];
	$inputArrayAsJSON = json_encode($inputArray);


	if(intval($_GET['id']) > 0)
	{
		// Means that we update
		$userID = intval($_GET['id']);
		
		if(!file_exists(ROOT_PATH.'/assets/users/'.$userID.'.json'))
			die("User with provided id does not exist's");

		file_put_contents(ROOT_PATH.'/assets/users/'.$userID.'.json', $inputArrayAsJSON);
		echo '<script>location.replace("/");</script>';
		die();
	}

	$i = 1;
	while(file_exists(ROOT_PATH.'/assets/users/'.$i.'.json'))
	{
		$i++;
	}
	file_put_contents(ROOT_PATH.'/assets/users/'.$i.'.json', $inputArrayAsJSON);
	echo '<script>location.replace("/add.php");</script>';

