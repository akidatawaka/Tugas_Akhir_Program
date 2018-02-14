<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "pt_mi";

//mengisi nama host,username sql, dan password
$koneksi = mysqli_connect($host,$user,$password,$db);
if(mysqli_connect_errno())
{
  echo "Gagal Terhubung".mysqli_connect_error();
}
 ?>
