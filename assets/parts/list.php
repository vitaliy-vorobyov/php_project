<?php 

	$allFiles = scandir('assets/users');

	$jsonFiles = array_diff($allFiles, ['..', '.']);

	echo '<div class="json-blocks">';

	foreach($jsonFiles as $file)
	{
		$fileID = str_replace('.json', '', $file);
		$fileContent = file_get_contents('assets/users/' . $file);
		$fileContentAsJSON = json_decode($fileContent, true);

		echo "<div class='json-block'>";
		echo "<strong> Назва: </strong>" . $fileContentAsJSON['name'] . "<br>";
		echo "<strong> Email: </strong>" . $fileContentAsJSON['email'] . "<br>";
		echo "<strong> Телефон: </strong>" . $fileContentAsJSON['phone'] . "<br>";
		echo "<strong> Опис: </strong>" . $fileContentAsJSON['description'] . "<br>";

		echo '<div class="right">';
		echo '<a class="btn btn-primary" href="/?action=delete&id='.$fileID.'">Видалити</a>';
		echo "&nbsp;&nbsp;&nbsp;";
		echo '<a class="btn btn-primary" href="/edit.php?action=edit_inner&id='.$fileID.'" target="_blank">Редагувати</a>';
		echo "&nbsp;&nbsp;&nbsp;";
		echo '<a class="btn btn-primary" href="/view.php?action=view_inner&id='.$fileID.'" target="_blank">Деталі</a>';
		echo "</div>";

		echo "</div>";
	}
	echo '<div class="clearfix"></div>';
	echo '</div>';
	



