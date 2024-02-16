<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HALAMAN UTAMA</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    session_start();
    if(!isset($_SESSION["UserID"])){
    ?>
        <h1>GALERRY FOTO</h1>
        <p>Selamat Datang di <b>WEBSITE GALERI FOTO</b></p>
        <ul>
            <li><a href="login.php">LOGIN</a></li>
            <li><a href="register.php">REGISTER</a></li>
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
                    echo mysqli_num_rows($sql2);
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
    <?php 
    } else {
        header("location:home.php");
    }
    ?>
</body>
</html>