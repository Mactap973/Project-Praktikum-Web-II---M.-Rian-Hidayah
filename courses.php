<?php include 'db.php'; ?>

<!doctype html>
<html lang="en">

<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Kursus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include 'navbar.php'; ?>

    <div class="container mt-4 mb-5">
        <h2>Daftar Kursus</h2>
        <ul class="list-group">
            <?php
            $result = $conn->query("SELECT * FROM courses");
            while ($row = $result->fetch_assoc()) {
                echo "<li class='list-group-item'><b>" . $row['name'] . "</b>: " . $row['description'] . "</li>";
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
                <label>Pilih Kursus:</label>
                <select name="courses[]" id="courseSelect" class="form-select" multiple>
                    <?php
                    $result = $conn->query("SELECT * FROM courses");
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Daftar</button>
        </form>

        <!-- Tambahkan Select2 -->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
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

    </div>
    <?php include 'footer.php'; ?>
</body>

</html>