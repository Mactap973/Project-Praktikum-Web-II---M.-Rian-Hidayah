<?php
    include 'navbar.php';
?>

<!-- Bootstrap CSS & Custom CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="style.css" rel="stylesheet">

<!-- Hero Section with Gradient Background -->
<section class="bg-gradient-primary text-dark py-5 text-center">
    <div class="container">
        <h1 class="display-4 fw-bold">Tentang Kami</h1>
        <p class="lead mt-3">Meningkatkan keterampilan IT Anda melalui kursus online yang mudah diakses, fleksibel, dan terpercaya.</p>
    </div>
</section>

<!-- Content Card Section -->
<section class="container my-5">
    <div class="card shadow-lg border-0 rounded-4 p-5">
        <h2 class="text-primary fw-bold mb-3">Apa itu ITCraft?</h2>
        <p>
            ITCraft adalah platform kursus online yang berfokus pada pengembangan keterampilan di bidang Teknologi Informasi (TI). Kami menyediakan pembelajaran daring berkualitas tinggi dengan materi yang relevan, mulai dari pemrograman dasar hingga topik lanjutan seperti cloud computing dan kecerdasan buatan.
        </p>

        <h4 class="text-dark fw-bold mt-4">Mengapa Memilih Kami?</h4>
        <ul class="list-unstyled mb-4">
            <li><strong>✅ Instruktur dari Industri:</strong> Mentor profesional dengan pengalaman nyata.</li>
            <li><strong>✅ Belajar Fleksibel:</strong> Akses materi kapan saja dan di mana saja.</li>
            <li><strong>✅ Materi Terus Diperbarui:</strong> Konten yang disesuaikan dengan perkembangan teknologi terbaru.</li>
        </ul>

        <div class="d-flex flex-wrap gap-3">
            <a href="courses.php" class="btn btn-primary px-4">Daftar Kursus</a>
        </div>
    </div>
</section>

<?php
    include 'footer.php';
?>
