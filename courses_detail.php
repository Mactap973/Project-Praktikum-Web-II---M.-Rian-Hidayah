<?php
include 'db.php';

if (!isset($_GET['id'])) {
    echo "<h3 class='text-center mt-5'>Kursus tidak ditemukan.</h3>";
    exit;
}

$id = $_GET['id'];

$stmt = $conn->prepare("
    SELECT c.*, i.name AS instructor_name, i.bio AS instructor_bio 
    FROM courses c
    LEFT JOIN instructors i ON c.instructor_id = i.id
    WHERE c.id = ?
");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    echo "<h3 class='text-center mt-5'>Kursus tidak ditemukan.</h3>";
    exit;
}

$course = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($course['name']) ?> - Detail Kursus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        html, body {
            height: 100%;
        }
        body {
            display: flex;
            flex-direction: column;
        }
        main {
            flex: 1;
        }
    </style>
</head>
<body>
    <?php include 'navbar.php'; ?>

    <main class="container py-5 mb-5">
        <div class="row g-4">
            <div class="col-md-6">
                <img src="<?= htmlspecialchars($course['image_url']) ?>" alt="<?= htmlspecialchars($course['name']) ?>" class="img-fluid rounded shadow">
            </div>
            <div class="col-md-6">
                <h2 class="fw-bold"><?= htmlspecialchars($course['name']) ?></h2>
                <p class="text-muted"><?= htmlspecialchars($course['description']) ?></p>

                <ul class="list-group list-group-flush mb-3">
                    <li class="list-group-item"><strong>Periode:</strong> Per Semester</li>
                    <li class="list-group-item"><strong>Durasi:</strong> <?= htmlspecialchars($course['duration']) ?></li>
                    <li class="list-group-item"><strong>Harga:</strong> Rp<?= number_format($course['price'], 0, ',', '.') ?></li>
                    <li class="list-group-item"><strong>Pengajar:</strong> <?= htmlspecialchars($course['instructor_name'] ?? 'Belum ditentukan') ?></li>
                    <?php if (!empty($course['instructor_bio'])): ?>
                        <li class="list-group-item"><strong>Tentang Pengajar:</strong> <?= htmlspecialchars($course['instructor_bio']) ?></li>
                    <?php endif; ?>
                </ul>

                <a href="daftar_kursus.php?id=<?= $course['id'] ?>" class="btn btn-primary">Daftar Sekarang</a>
                <a href="index.php" class="btn btn-outline-secondary ms-2">Kembali</a>
            </div>
        </div>
    </main>

    <?php include 'footer.php'; ?>
</body>
</html>
