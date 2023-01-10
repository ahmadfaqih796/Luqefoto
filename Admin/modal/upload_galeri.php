<?php

$koneksi = mysqli_connect("localhost", "root", "", "galeri_multi");
// Count total files
$countfiles = count($_FILES['files']['name']);
// Upload directory
$upload_location = "img/";
// To store uploaded files path
$files_arr = array();
// Loop all files
for ($index = 0; $index < $countfiles; $index++) {
	if (isset($_FILES['files']['name'][$index]) && $_FILES['files']['name'][$index] != '') {
		// File name
		$filename = $_FILES['files']['name'][$index];
		// Get extension
		$ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
		// Valid image extension
		$valid_ext = array("png", "jpeg", "jpg");
		$kategori = $_POST['konten'];
		$id = 1;
		mysqli_query($koneksi, "INSERT INTO tbl_galery VALUES(NULL,'$kategori, '$filename')");
		// Check extension
		if (in_array($ext, $valid_ext)) {
			// File path
			$path = $upload_location . $filename;
			// Upload file
			if (move_uploaded_file($_FILES['files']['tmp_name'][$index], $path)) {
				$files_arr[] = $path;
			}
		}
	}
}
echo json_encode($files_arr);
die;
