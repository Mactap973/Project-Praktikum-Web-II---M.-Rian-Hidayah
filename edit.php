<?php
include 'db.php';

// Ambil data berdasarkan ID
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM registrations WHERE id=$id");
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $courses = implode(", ", $_POST['courses']);

    // Update data ke database
    $sql = "UPDATE registrations SET name='$name', email='$email', courses='$courses' WHERE id=$id";
    
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Data berhasil diupdate!'); window.location.href='daftar.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pendaftaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4 mb-5">
    <h2 class="text-center">Edit Pendaftaran</h2>

    <form action="" method="post">
        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" class="form-control" name="name" value="<?= $row['name'] ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" name="email" value="<?= $row['email'] ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Pilih Kursus</label>
            <select class="form-select" name="courses[]" multiple required>
                <?php
                $selected_courses = explode(", ", $row['courses']);
                $all_courses = ["Web Development", "Data Science", "Cyber Security",];
                
                foreach ($all_courses as $course) {
                    $selected = in_array($course, $selected_courses) ? "selected" : "";
                    echo "<option value='$course' $selected>$course</option>";
                }
                ?>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        <a href="daftar.php" class="btn btn-secondary">Batal</a>
    </form>
</div>
<?php include 'footer.php'; ?>
</body>
</html>
