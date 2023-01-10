<?php
include "koneksi.php";

class galeri extends database
{
	function __construct()
	{
		$this->getConnection();
	}

	function tampil_data()
	{
		$sql = "SELECT * from tbl_galery, tbl_konten WHERE tbl_galery.id_konten=tbl_konten.id";
		$result = mysqli_query($this->getConnection(), $sql);
		while ($row = mysqli_fetch_array($result)) {
			$hasil[] = $row;
		}
		return $hasil;
	}

	function input($id_konten, $gambar)
	{
		$countfiles = count($_FILES['gambar']['name']);
		$files_arr = array();
		$upload_location = "../images/galeri/";
		for ($index = 0; $index < $countfiles; $index++) {
			if (isset($_FILES['gambar']['name'][$index]) && $_FILES['gambar']['name'][$index] != '') {
				// File name
				$filename = $_FILES['gambar']['name'][$index];
				// Get extension
				$ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
				// Valid image extension
				$valid_ext = array("png", "jpeg", "jpg");
				$id = 1;
				$sql = "insert into tbl_galery (`id_konten`, `image`) values('$id_konten','$filename')";
				$result = mysqli_query($this->getConnection(), $sql);
				// Check extension
				if (in_array($ext, $valid_ext)) {
					// Upload file
					$path = $upload_location . $filename;
					if (
						(move_uploaded_file($_FILES['gambar']['tmp_name'][$index], $path))
					) {
						$files_arr[] = $path;
					}
				}
			}
		}
		echo json_encode($files_arr);
		echo "<script>alert('Gambar Berhasil diupload !');history.go(-1);</script>";
	}

	function tampil_data_galeri($id)
	{
		$sql = 'SELECT * FROM tbl_galery where id_konten =' . $id;
		$result = mysqli_query($this->getConnection(), $sql);
		while ($row = mysqli_fetch_array($result)) {
			$hasil[] = $row;
		}
		return $hasil;
	}

	function hapus($id)
	{
		$sql = "DELETE from tbl_konten where id='$id'";
		$result = mysqli_query($this->getConnection(), $sql);
	}

	function edit($id)
	{
		$sql = "SELECT * from tbl_konten where id='$id'";
		$result = mysqli_query($this->getConnection(), $sql);
		while ($row = mysqli_fetch_array($result)) {
			$hasil[] = $row;
		}
		return $hasil;
	}

	function update($id, $nama, $konten, $gambar)
	{
		if (empty($gambar)) {
			$sql = "UPDATE tbl_konten SET nama='$nama', konten='$konten' WHERE id='$id'";
			$result = mysqli_query($this->getConnection(), $sql);
		}
		if (!empty($gambar)) {
			$sql = "UPDATE tbl_konten SET nama='$nama', konten='$konten',gambar='$gambar' WHERE id='$id'";
			$result = mysqli_query($this->getConnection(), $sql);
			move_uploaded_file($_FILES['gambar']['tmp_name'], "../images/" . $_FILES['gambar']['name']);
			echo "<script>alert('Gambar Berhasil diupload !');history.go(-1);</script>";
		}
	}
}
