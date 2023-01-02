<?php
include "koneksi.php";

class wisata extends database
{
	function __construct()
	{
		$this->getConnection();
	}

	function tampil_data()
	{
		$sql = "SELECT * FROM tbl_konten";
		$result = mysqli_query($this->getConnection(), $sql);
		while ($row = mysqli_fetch_array($result)) {
			$hasil[] = $row;
		}
		return $hasil;
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

	function tampil_header()
	{
		$sql = "SELECT * from tbl_header";
		$result = mysqli_query($this->getConnection(), $sql);
		while ($row = mysqli_fetch_array($result)) {
			$hasil[] = $row;
		}
		return $hasil;
	}

	function input($nama, $konten, $gambar)
	{
		$sql = "insert into tbl_konten ( `nama`, `konten`, `gambar`) values('$nama','$konten','$gambar')";
		$result = mysqli_query($this->getConnection(), $sql);
		move_uploaded_file($_FILES['gambar']['tmp_name'], "../images/" . $_FILES['gambar']['name']);
		echo "<script>alert('Gambar Berhasil diupload !');history.go(-1);</script>";
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
