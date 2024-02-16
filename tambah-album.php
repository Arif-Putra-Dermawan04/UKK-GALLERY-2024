<?php
include"koneksi.php";
session_start();

$NamaAlbum = $_POST["NamaAlbum"];
$Deskripsi = $_POST["Deskripsi"];
$TanggalDibuat = date("y-m-d");
$UserID = $_SESSION["UserID"];

$sql = mysqli_query($conn,"INSERT INTO album VALUES('','$NamaAlbum','$Deskripsi','$TanggalDibuat','$UserID')");

header("location:album.php");
?>