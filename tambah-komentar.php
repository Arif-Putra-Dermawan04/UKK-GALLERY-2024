<?php
include"koneksi.php";
session_start();

$FotoID = $_POST["FotoID"];
$IsiKomentar = $_POST["IsiKomentar"];
$TanggalKomentar = date("y-m-d");
$UserID = $_SESSION["UserID"];

$sql = mysqli_query($conn,"INSERT INTO komentarfoto VALUES('','$FotoID','$UserID','$IsiKomentar','$TanggalKomentar')");

header("location:home.php");
?>