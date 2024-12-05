<?php
include 'Config.php';

// Cek apakah ID pengguna ada dalam URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Ambil data pengguna berdasarkan ID
    $query = "SELECT * FROM pengguna WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    // Jika data ditemukan, masukkan ke dalam variabel
    if ($row = mysqli_fetch_assoc($result)) {
        $username = $row['username'];
        $email = $row['email'];
        $alamat = $row['alamat'];
        $nomor_telepon = $row['nomor_telepon'];
    } else {
        echo "Data pengguna tidak ditemukan!";
        exit;
    }
} else {
    echo "ID tidak tersedia!";
    exit;
}

// Proses update data
if (isset($_POST['update'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $nomor_telepon = $_POST['nomor_telepon'];

    // Update data pengguna berdasarkan ID
    $query = "UPDATE pengguna SET username = ?, email = ?, alamat = ?, nomor_telepon = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ssssi", $username, $email, $alamat, $nomor_telepon, $id);

    if (mysqli_stmt_execute($stmt)) {
        echo "Data berhasil diperbarui!";
        header("Location: LandingPage.php"); // Redirect ke halaman daftar data
        exit;
    } else {
        echo "Gagal memperbarui data: " . mysqli_error($conn);
    }
    mysqli_stmt_close($stmt);
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Pengguna</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="#">Manajemen Data</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<main class="container mt-5">
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Edit Data Pengguna</h4>
        </div>
        <div class="card-body">
            <form action="" method="post">
                <div class="row mb-3">
                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="username" id="username" value="<?= htmlspecialchars($username) ?>" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" name="email" id="email" value="<?= htmlspecialchars($email) ?>" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="alamat" id="alamat" rows="3" required><?= htmlspecialchars($alamat) ?></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="nomor_telepon" class="col-sm-2 col-form-label">Nomor Telepon</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nomor_telepon" id="nomor_telepon" value="<?= htmlspecialchars($nomor_telepon) ?>" required>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary" name="update">Update data </button>
                </div>
            </form>
        </div>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
