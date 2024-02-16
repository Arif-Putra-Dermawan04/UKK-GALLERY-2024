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
    <title>FOTO</title>
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

    <form action="tambah-foto.php" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Judul Foto</td>
                <td>:</td>
                <td><input type="text" name="JudulFoto" id="JudulFoto" required></td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td>:</td>
                <td><input type="text" name="DeskripsiFoto" id="DeskripsiFoto" required></td>
            </tr>
            <tr>
                <td>Album</td>
                <td>:</td>
                <td>
                    <select name="AlbumID" id="AlbumID">
                    <?php
                        $UserID=$_SESSION['UserID'];
                        $sql=mysqli_query($conn,"SELECT * FROM album WHERE UserID='$UserID' ");
                        while($data=mysqli_fetch_array($sql)){
                    ?>
                        <option value="<?=$data['AlbumID']?>"><?=$data['NamaAlbum']?></option>
                    <?php
                        }
                    ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Upload Foto</td>
                <td>:</td>
                <td><input type="file" accept=".jpg, .jpeg, .png, .gif" name="LokasiFile" id="LokasiFile" required></td>
            </tr>
            <tr>
                <td><input type="submit" value="TAMBAH FOTO"></td>
            </tr>
        </table>
    </form>
    <br>

    <table width="80%" border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>JUDUL FOTO</th>
            <th>DESKRIPSI</th>
            <th>TANGGAL UNGGAH</th>
            <th>ALBUM</th>
            <th>FOTO</th>
            <th>JUMLAH LIKE</th>
            <th>AKSI</th>
        </tr>
        <?php
           $UserID=$_SESSION['UserID'];
           $sql=mysqli_query($conn,"SELECT * FROM foto,album WHERE foto.UserID='$UserID' and foto.AlbumID=album.AlbumID");
           while($data=mysqli_fetch_array($sql)){
        ?>
        <tr>
            <td><?=$data['FotoID']?></td>
            <td><?=$data['JudulFoto']?></td>
            <td><?=$data['DeskripsiFoto']?></td>
            <td><?=$data['TanggalUnggah']?></td>
            <td><?=$data['NamaAlbum']?></td>
            <td><img src="gambar/<?=$data['LokasiFile']?>" width="200px"></td>
            <td>
                <?php
                    $FotoID=$data['FotoID'];
                    $sql2=mysqli_query($conn,"SELECT * FROM likefoto WHERE FotoID='$FotoID'");
                    echo mysqli_num_rows($sql2);
                ?>
            </td>
            <td>
                <a href="hapus-foto.php?FotoID=<?=$data['FotoID']?>">- HAPUS</a>
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