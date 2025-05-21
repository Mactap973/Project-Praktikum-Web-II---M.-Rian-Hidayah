<?php 
session_start();
if (!isset($_SESSION['username'])) {
    $current_page = $_SERVER['REQUEST_URI'];
    header("Location: login.php?redirect=" . urlencode($current_page));
    exit;
}

include 'db.php'; ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Kursus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <link href="style.css" rel="stylesheet">
</head>

<body>
    <?php include 'navbar.php'; ?>

    <div class="container mt-4 mb-5">
        <h2>Daftar Kursus <small class="text-muted fs-6">(Harga per semester)</small></h2>
        <ul class="list-group">
            <?php
            $result = $conn->query("SELECT * FROM courses");
            while ($row = $result->fetch_assoc()) {
                echo "<li class='list-group-item'><b>" . $row['name'] . "</b>: " . $row['description'] .
                     "<br><span class='text-success'>Rp " . number_format($row['price'], 0, ',', '.') . " / semester</span></li>";
            }
            ?>
        </ul>

        <h2 class="mt-4">Formulir Pendaftaran</h2>
        <form action="register.php" method="post">
            <div class="mb-3">
                <label>Nama:</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Email:</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Pilih Kursus <span class="text-muted">(Harga per semester)</span>:</label>
                <select name="courses[]" id="courseSelect" class="form-select" multiple required>
                    <?php
                    $result = $conn->query("SELECT * FROM courses");
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['name'] . "'>" . $row['name'] . " - Rp " . number_format($row['price'], 0, ',', '.') . " / semester</option>";
                    }
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Daftar</button>
        </form>
    </div>

    <?php include 'footer.php'; ?>

    <!-- Tambahkan jQuery dan Select2 -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#courseSelect').select2({
                placeholder: "Pilih kursus",
                allowClear: true
            });
        });
    </script>
</body>
</html>
