<?php
include"koneksi.php";
session_start();
if(!isset($_SESSION["UserID"])){
    header("location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HALAMAN KOMENTAR</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>GALLERY FOTO</h1>
    <p>Selamat Datang <b><?=$_SESSION['NamaLengkap']?></b></p>

    <ul>
        <li><a href="home.php">HOME</a></li>
        <li><a href="album.php">ALBUM</a></li>
        <li><a href="foto.php">FOTO</a></li>
        <li><a href="logout.php">LOGOUT</a></li>
    </ul>

    <form action="tambah-komentar.php" method="post">
        <?php
           $FotoID = $_GET['FotoID'];
           $sql=mysqli_query($conn,"SELECT * FROM foto, user WHERE foto.FotoID='$FotoID' and foto.UserID=user.UserID ");
           while($data=mysqli_fetch_array($sql)){
        ?>
        <table>
        <input type="text" value="<?=$data['FotoID']?>" name="FotoID" id="FotoID" hidden>
            <tr>
                <td>Judul Foto</td>
                <td>:</td>
                <td><input type="text" value="<?=$data['JudulFoto']?>" name="JudulFoto" id="JudulFoto" readonly></td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td>:</td>
                <td><input type="text" value="<?=$data['DeskripsiFoto']?>" name="DeskripsiFoto" id="DeskripsiFoto" readonly></td>
            </tr>
            <tr>
                <td>Foto</td>
                <td>:</td>
                <td><img src="gambar/<?=$data['LokasiFile']?>" width="200px"></td>
            </tr>
            <tr>
                <td>Isi Komentar</td>
                <td>:</td>
                <td><textarea name="IsiKomentar" id="IsiKomentar" cols="22" rows="5" required></textarea></td>
            </tr>
            <tr>
                <td><input type="submit" value="TAMBAH KOMENTAR"></td>
            </tr>
        </table>
        <?php
           }
        ?>
    </form>
    <br>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>ISI KOMENTAR</th>
            <th>TANGGAL KOMENTAR</th>
            <th>NAMA PENGGUNA</th>
        </tr>
        <?php
           $FotoID = $_GET['FotoID'];
           $sql=mysqli_query($conn,"SELECT * FROM komentarfoto,user WHERE komentarfoto.UserID=user.UserID and komentarfoto.FotoID='$FotoID' ");
           while($data=mysqli_fetch_array($sql)){
        ?>
        <tr>
            <td><?=$data['KomentarID']?></td>
            <td><?=$data['IsiKomentar']?></td>
            <td><?=$data['TanggalKomentar']?></td>
            <td><?=$data['NamaLengkap']?></td>
        </tr>
        <?php
           }
        ?>
    </table>
</body>
</html>