<?php include 'navbar.php'; ?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Profil Pengembang | ITCraft</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="styleprofil.css" rel="stylesheet">
</head>

<body>
    <div class="container my-5">
        <div class="card profile-card mx-auto">
            <div class="profile-header">
                <h3><i class="fas fa-user-tie me-2"></i>Profil Pengembang</h3>
            </div>
            <div class="card-body text-center profile-body">
                <img src="images/2025-03-10.jpeg" class="profile-img" alt="Foto Pengembang">
                
                <h2 class="profile-title">M. Rian Hidayah</h2>
                
                <div class="profile-detail">
                    <i class="fas fa-graduation-cap"></i>
                    <span>Mahasiswa Sistem Informasi</span>
                </div>
                
                <div class="profile-detail">
                    <i class="fas fa-university"></i>
                    <span>Universitas Sriwijaya</span>
                </div>
                
                <div class="profile-detail">
                    <i class="fas fa-book"></i>
                    <span>Praktikum Pemrograman Web II</span>
                </div>
                
                <div class="profile-detail">
                    <i class="fas fa-code"></i>
                    <span>HTML, CSS, PHP, MySQL, Bootstrap</span>
                </div>
                
                <p class="card-text mt-4 px-4 text-center">Mahasiswa Sistem Informasi yang sedang belajar membuat website dinamis
                    menggunakan HTML, PHP, MySQL, Bootstrap, dll.
                </p>
                
                <div class="profile-detail">
                    <i class="fas fa-envelope"></i>
                    <span>ryanhidayah369@gmail.com</span>
                </div>
                
                <div class="social-links mt-4">
                    <a href="https://github.com/Mactap973/Project-Praktikum-Web-II---M.-Rian-Hidayah"><i class="fab fa-github"></i></a>
                </div>
            </div>
        </div>
    </div>
    
    <?php include 'footer.php'; ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Animasi saat halaman dimuat
        document.addEventListener('DOMContentLoaded', function() {
            const card = document.querySelector('.profile-card');
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            
            setTimeout(() => {
                card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                card.style.opacity = '1';
                card.style.transform = 'translateY(0)';
            }, 100);
        });
    </script>
</body>

</html>
