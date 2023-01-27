<?php

include "koneksi.php";

class acara extends database
{
   function __construct()
   {
      $this->getConnection();
   }

   function tampil_acara()
   {
      $sql = "select*from tbl_pesan,tbl_user, tbl_paket where tbl_pesan.id_user=tbl_user.id_user and tbl_paket.id_paket = tbl_pesan.id_paket and status='S2' order by tgl_tour";
      $result = mysqli_query($this->getConnection(), $sql);
      while ($row = mysqli_fetch_array($result)) {
         $hasil[] = $row;
      }
      return $hasil;
   }
}
