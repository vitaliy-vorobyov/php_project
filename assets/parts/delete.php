<?php 

	$userID = intval($_GET['id']);

	if($userID == 0)
		die("Enter correct user id");

	if(!file_exists(ROOT_PATH.'/assets/users/'.$userID.'.json'))
		die("User with provided id does not exist's");

	unlink(ROOT_PATH.'/assets/users/'.$userID.'.json');
	echo '<script>location.replace("/");</script>';