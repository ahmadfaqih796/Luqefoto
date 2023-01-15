<?php
include "koneksi.php";

class video extends database
{
	function __construct()
	{
		$this->getConnection();
	}

	function tampil_data()
	{
		$sql = "SELECT * from tbl_video";
		$result = mysqli_query($this->getConnection(), $sql);
		while ($row = mysqli_fetch_array($result)) {
			$hasil[] = $row;
		}
		return $hasil;
	}

	function add($judul, $deskripsi, $url)
	{
		$sql = "insert into tbl_video ( `judul`, `deskripsi`, `url`) values('$judul','$deskripsi','$url')";
		$result = mysqli_query($this->getConnection(), $sql);
	}

	function delete($id)
	{
		$sql = "DELETE from tbl_video where id='$id'";
		$result = mysqli_query($this->getConnection(), $sql);
	}

	function detail($id)
	{
		$sql = "SELECT * from tbl_video where id='$id'";
		$result = mysqli_query($this->getConnection(), $sql);
		while ($row = mysqli_fetch_array($result)) {
			$hasil[] = $row;
		}
		return $hasil;
	}

	function update($id, $judul, $deskripsi, $url)
	{
		$sql = "UPDATE tbl_video SET judul='$judul', deskripsi='$deskripsi', url='$url' WHERE id='$id'";
		$result = mysqli_query($this->getConnection(), $sql);
	}
}
