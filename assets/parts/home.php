<div id="home">
<?php 	

	require('assets/parts/helpers.php');

	$action = isset($_GET['action'])?$_GET['action']:'list';

	if(file_exists('assets/parts/' . $action . '.php'))
	{
		require('assets/parts/' . $action . '.php');
	}

?>
</div>