<?php 

	$userID = intval($_GET['id']);

	if($userID == 0)
		die("Enter correct user id");

	if(!file_exists(ROOT_PATH.'/assets/users/'.$userID.'.json'))
		die("User with provided id does not exist's");

	$fileContent = file_get_contents(ROOT_PATH.'/assets/users/'.$userID.'.json');
	$fileDataAsArray = json_decode($fileContent, true);

?>


<div id="edit" class="form-group">
	<form action="/index.php" method="GET">
		<input type="hidden" name="action" value="save">
		<input type="hidden" class="form-control" type="text" name="id" value="<?php echo $userID; ?>">
		<input type="hidden" class="form-control" type="text" name="lat" id="lat" placeholder="Lat" value="<?php echo $fileDataAsArray['lat']; ?>">
		<input type="hidden" class="form-control" type="text" name="lng" id="lng" placeholder="Lng" value="<?php echo $fileDataAsArray['lng']; ?>">
		<input class="form-control" type="text" name="name" placeholder="Назва" value="<?php echo $fileDataAsArray['name']; ?>">
		<input class="form-control" type="email" name="email" placeholder="Email" value="<?php echo $fileDataAsArray['email']; ?>">
		<input class="form-control" type="text" name="phone" placeholder="Телефон" value="<?php echo $fileDataAsArray['phone']; ?>">
		<input class="form-control" type="text" name="address" id="address" placeholder="Адреса" value="<?php echo $fileDataAsArray['address']; ?>">
		<textarea rows="6" class="form-control" type="text" name="description" placeholder="Опис"><?php echo $fileDataAsArray['description']; ?></textarea>
		<button class="btn btn-primary btn-block" type="submit">Оновити</button>
	</form>
</div>