<?php
include"koneksi.php";
session_start();

if(!isset($_SESSION["UserID"])){
    header("location:login.php");
} else {
    $FotoID=$_GET["FotoID"];
    $UserID=$_SESSION["UserID"];

    $sql=mysqli_query($conn,"SELECT * FROM likefoto WHERE FotoID='$FotoID' and UserID='$UserID'");

} if (mysqli_num_rows($sql)==1) {
        header("location:home.php");
    } else {
        $TanggalLike = date("y-m-d");

        mysqli_query($conn,"INSERT INTO likefoto VALUES ('','$FotoID','$UserID','$TanggalLike')");
        header("location:home.php");
    }