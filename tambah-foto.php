<?php
include"koneksi.php";
session_start();

$JudulFoto = $_POST["JudulFoto"];
$DeskripsiFoto = $_POST["DeskripsiFoto"];
$TanggalUnggah = date("y-m-d");
$UserID = $_SESSION["UserID"];
$AlbumID = $_POST["AlbumID"];

$AsalFoto = $_FILES["LokasiFile"]["tmp_name"];
$NamaFoto = $_FILES["LokasiFile"]["name"];
$Folder = "gambar";

if (move_uploaded_file($AsalFoto, $Folder .'/'. $NamaFoto)) {
    $sql = mysqli_query($conn,"INSERT INTO foto VALUES('','$JudulFoto','$DeskripsiFoto','$TanggalUnggah','$NamaFoto','$AlbumID','$UserID')");
    header("location:foto.php");
} else {
    header("location:foto.php");
}
?>