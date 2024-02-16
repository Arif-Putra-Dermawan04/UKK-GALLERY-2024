<?php
include"koneksi.php";
session_start();

$Username = $_POST["Username"];
$Password = $_POST["Password"];

$sql=mysqli_query($conn,"SELECT * FROM user WHERE Username='$Username' and Password='$Password'");

$cek=mysqli_num_rows($sql);

if($cek==1){
    while($data=mysqli_fetch_array($sql)){
        $_SESSION["UserID"] = $data["UserID"];
        $_SESSION["NamaLengkap"] = $data["NamaLengkap"];
    }
    header("location:home.php");
} else {
    header("location:login.php");
}
?>