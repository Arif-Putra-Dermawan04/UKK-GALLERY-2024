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
    <title>ALBUM</title>
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

    <form action="tambah-album.php" method="post">
        <table>
            <tr>
                <td>Nama Album</td>
                <td>:</td>
                <td><input type="text" name="NamaAlbum" id="NamaAlbum" required></td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td>:</td>
                <td><input type="text" name="Deskripsi" id="Deskripsi" required></td>
            </tr>
            <tr>
                <td><input type="submit" value="TAMBAH ALBUM"></td>
            </tr>
        </table>
    </form>
<br>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>NAMA ALBUM</th>
            <th>DESKRIPSI</th>
            <th>TANGGAL DIBUAT</th>
            <th>AKSI</th>
        </tr>
        <?php
           $UserID=$_SESSION['UserID'];
           $sql=mysqli_query($conn,"SELECT * FROM album WHERE UserID='$UserID' ");
           while($data=mysqli_fetch_array($sql)){
        ?>
        <tr>
            <td><?=$data['AlbumID']?></td>
            <td><?=$data['NamaAlbum']?></td>
            <td><?=$data['Deskripsi']?></td>
            <td><?=$data['TanggalDibuat']?></td>
            <td>
                <a href="edit-album.php?AlbumID=<?=$data['AlbumID']?>">- EDIT</a>
                <br>
                <a href="hapus-album.php?AlbumID=<?=$data['AlbumID']?>">- HAPUS</a>
            </td>
        </tr>
        <?php
           }
        ?>
    </table>
</body>
</html>