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
}
