<?php
include"koneksi.php";
session_start();

$AlbumID = $_POST["AlbumID"];
$NamaAlbum = $_POST["NamaAlbum"];
$Deskripsi = $_POST["Deskripsi"];

$sql = mysqli_query($conn,"UPDATE album SET NamaAlbum='$NamaAlbum', Deskripsi='$Deskripsi' WHERE AlbumID='$AlbumID'");

header("location:album.php");
?>