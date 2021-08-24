<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){

	if(isset($_FILES['upload_file']['name'])){
		$filename = $_FILES['upload_file']['name'];
		$source = $_FILES['upload_file']['tmp_name'];
		$dir = 'temp';
		$target = $dir . '/' . $filename;

		if(move_uploaded_file($source, $target)){
			echo json_encode(['ok' => 1, 'temp_path' => $target]);
		}
		else{
			echo json_encode(['ok' => 0]);
		}
	}
}


?>
