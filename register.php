<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTER</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <br>
    <br>
    <br>
    <center>
    <div class="top2">
        <h1>HALAMAN REGISTRASI</h1>
    <hr>
    <form action="proses-register.php" method="post">
        <table>
        <h4>Silahkan Isi Data Diri Anda Dibawah Ini</h4>
            <tr>
                <td>Username</td>
                <td>:</td>
                <td><input type="text" name="Username" id="Username" required></td>
            </tr>
            <tr>
                <td>Password</td>
                <td>:</td>
                <td><input type="password" name="Password" id="Password" required></td>
            </tr>
            <tr>
                <td>Email</td>
                <td>:</td>
                <td><input type="email" name="Email" id="Email" required></td>
            </tr>
            <tr>
                <td>Nama Lengkap</td>
                <td>:</td>
                <td><input type="text" name="NamaLengkap" id="NamaLengkap" required></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><textarea name="Alamat" id="Alamat" cols="22" rows="5" required></textarea></td>
            </tr>
            <tr>
                <td><input type="submit" value="REGISTER"></td>
            </tr>
        </table>
        <br>
        <hr>
        <p>Sudah Memiliki Akun? <a href="login.php">LOGIN SEKARANG</a></p>
        <a href="index.php"><-- Kembali Ke Halaman Utama</a>
    </form>
</div>
    </center>
</body>
</html>