<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <br>
    <br>
    <br>
    <center>
    <div class="top1">
        <h1>HALAMAN LOGIN</h1>
    <hr>
    <form action="proses-login.php" method="post">
        <table>
            <h4>Masukkan Username dan Password Anda!</h4>
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
                <td><input type="submit" value="LOGIN"></td>
            </tr>
        </table>
        <br>
        <hr>
        <p>Belum Memiliki Akun? <a href="register.php">DAFTAR SEKARANG</a></p>
        <a href="index.php"><-- Kembali Ke Halaman Utama</a>
    </form>
    
    </div>
    </center>
</body>
</html>