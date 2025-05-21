<?php
session_start();
include 'db.php';

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM registrations WHERE id=$id");
    header("Location: daftar.php");
    exit();
}

// Ambil data dari tabel registrations
$result = $conn->query("SELECT * FROM registrations");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pendaftar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100">
    <?php include 'navbar.php'; ?>

    <div class="container flex-grow-1 py-4">
        <h2 class="text-center mb-4">Daftar Pendaftar Kursus</h2>

        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Kursus yang Dipilih</th>
                    <th>Tanggal Pendaftaran</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>{$no}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['courses']}</td>
                        <td>{$row['created_at']}</td>
                      </tr>";
                    $no++;
                }
                ?>
            </tbody>
        </table>

        <a href="index.php" class="btn btn-primary bg-gradient">Kembali ke Beranda</a>
    </div>
    <?php include 'footer.php'; ?>
</body>

</html>
