<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $courses = implode(", ", $_POST['courses']);

    $stmt = $conn->prepare("INSERT INTO registrations (name, email, courses) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $courses);

    if ($stmt->execute()) {
        echo "<script>alert('Pendaftaran berhasil!'); window.location='daftar.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
