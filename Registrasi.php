<?php
include 'Config.php';

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $alamat = $_POST['alamat'];
    $nomor_telepon = $_POST['nomor_telepon'];
    $nik = $_POST['nik'];
    $email = $_POST['email'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $rt_rw = $_POST['rt_rw'];
    $kelurahan_desa = $_POST['kelurahan_desa'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $agama = $_POST['agama'];
    $status_perkawinan = $_POST['status_perkawinan'];
    $kewarganegaraan = $_POST['kewarganegaraan'];

    $sqlStatement = "INSERT INTO pengguna 
        (username, password, alamat, nomor_telepon, nik, email, jenis_kelamin, rt_rw, kelurahan_desa, tempat_lahir, tanggal_lahir, agama, status_perkawinan, kewarganegaraan) 
        VALUES 
        ('$username', '$password', '$alamat', '$nomor_telepon', '$nik', '$email', '$jenis_kelamin', '$rt_rw', '$kelurahan_desa', '$tempat_lahir', '$tanggal_lahir', '$agama', '$status_perkawinan', '$kewarganegaraan')";

    $data = mysqli_query($conn, $sqlStatement);

    if (mysqli_affected_rows($conn) > 0) {
        header("Location:Loginn.php");
        exit;
    } else {
        echo "Gagal menambah data";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Registrasi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #1a2b60; /* Warna latar biru */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .form-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            width: 600px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #1a2b60;
        }
        form {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px; /* Jarak antar kolom */
        }
        .form-group {
            display: flex;
            flex-direction: column;
        }
        .form-group label {
            font-weight: bold;
            margin-bottom: 5px;
            color: #333;
        }
        .form-group input,
        .form-group select {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-footer {
            grid-column: span 2;
            text-align: center;
            margin-top: 10px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
        .form-footer p {
            margin-top: 10px;
        }
        .form-footer a {
            color: #007bff;
            text-decoration: none;
        }
        .form-footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Registrasi</h2>
        <form method="POST">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password">
            </div>
            <div class="form-group">
                <label for="nik">NIK:</label>
                <input type="text" id="nik" name="nik">
            </div>
            <div class="form-group">
                <label for="nomor_telepon">Nomor Telepon:</label>
                <input type="text" id="nomor_telepon" name="nomor_telepon">
            </div>
            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <input type="text" id="alamat" name="alamat">
            </div>
            <div class="form-group">
                <label for="rt_rw">RT/RW:</label>
                <input type="text" id="rt_rw" name="rt_rw">
            </div>
            <div class="form-group">
                <label for="kelurahan_desa">Kelurahan:</label>
                <input type="text" id="kelurahan_desa" name="kelurahan_desa">
            </div>
            <div class="form-group">
                <label for="tempat_lahir">Tempat Lahir:</label>
                <input type="text" id="tempat_lahir" name="tempat_lahir">
            </div>
            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir:</label>
                <input type="date" id="tanggal_lahir" name="tanggal_lahir">
            </div>
            <div class="form-group">
                <label for="agama">Agama:</label>
                <select id="agama" name="agama">
                    <option value="islam">Islam</option>
                    <option value="kristen">Kristen</option>
                    <option value="hindu">Hindu</option>
                    <option value="budha">Budha</option>
                    <option value="lainnya">Lainnya</option>
                </select>
            </div>
            <div class="form-group">
                <label for="status_perkawinan">Status Perkawinan:</label>
                <select id="status_perkawinan" name="status_perkawinan">
                    <option value="menikah">Menikah</option>
                    <option value="belum-menikah">Belum Menikah</option>
                </select>
            </div>
            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin:</label>
                <select id="jenis_kelamin" name="jenis_kelamin">
                    <option value="laki-laki">Laki-laki</option>
                    <option value="perempuan">Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="kewarganegaraan">Kewarganegaraan:</label>
                <input type="text" id="kewarganegaraan" name="kewarganegaraan">
            </div>
            <div class="form-footer">
                <button type="submit" name="submit">Register</button>
                <p>Sudah punya akun? <a href="Loginn.php">Login di sini</a></p>
            </div>
        </form>
    </div>
</body>
</html>
