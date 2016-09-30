<?php 

	$userID = intval($_GET['id']);

	if($userID == 0)
		die("Enter correct user id");

	if(!file_exists(ROOT_PATH.'/assets/users/'.$userID.'.json'))
		die("User with provided id does not exist's");

	$fileContent = file_get_contents(ROOT_PATH.'/assets/users/'.$userID.'.json');
	$fileDataAsArray = json_decode($fileContent, true);
    echo "<div class='array-block'>";
    dd($fileDataAsArray);
    echo "</div>";