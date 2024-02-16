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
    <title>HOME</title>
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
    <br>

    <table width="100%" border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>JUDUL FOTO</th>
            <th>DESKRIPSI</th>
            <th>TANGGAL UNGGAH</th>
            <th>FOTO</th>
            <th>UPLOADER</th>
            <th>JUMLAH LIKE</th>
            <th>AKSI</th>
        </tr>
        <?php
           include"koneksi.php";
           $sql=mysqli_query($conn,"SELECT * FROM foto,user WHERE foto.UserID=user.UserID");
           while($data=mysqli_fetch_array($sql)){
        ?>
        <tr>
            <td><?=$data['FotoID']?></td>
            <td><?=$data['JudulFoto']?></td>
            <td><?=$data['DeskripsiFoto']?></td>
            <td><?=$data['TanggalUnggah']?></td>
            <td><img src="gambar/<?=$data['LokasiFile']?>" width="200px"></td>
            <td><?=$data['NamaLengkap']?></td>
            <td>
            <?php
                    $FotoID=$data['FotoID'];
                    $sql2=mysqli_query($conn,"SELECT * FROM likefoto WHERE FotoID='$FotoID'");
                    echo (mysqli_num_rows($sql2));
                ?>
            </td>
            <td>
                <a href="like.php?FotoID=<?=$data['FotoID']?>">- LIKE</a>
                <br>
                <a href="komentar.php?FotoID=<?=$data['FotoID']?>">- KOMENTAR</a>
            </td>
        </tr>
        <?php
           }
        ?>
    </table>
</body>
</html>