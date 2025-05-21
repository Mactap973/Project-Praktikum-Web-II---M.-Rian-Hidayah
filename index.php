<?php 
session_start();
include 'db.php'; ?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Website Kursus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">

    <style>
        .carousel-container {
            width: 40%;
        }

        .carousel-item img {
            width: 100%;
            height: 360px;
            object-fit: cover;
        }

        .card-img-top {
            height: 250px;
            object-fit: cover;
        }
    </style>

</head>

<body>
    <?php include 'navbar.php'; ?>
    <!-- Carousel -->
    <div class="container d-flex justify-content-center mt-4 mb-5">
        <div id="carouselExample" class="carousel slide carousel-container" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php
                $result = $conn->query("SELECT * FROM courses LIMIT 3");
                $active = "active";
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='carousel-item $active text-center'>
                        <img src='" . $row['image_url'] . "' class='d-block w-100 rounded' alt='" . $row['name'] . "'>
                       <div class='carousel-caption d-none d-md-block bg-dark bg-opacity-50 p-3 rounded'>
                            <h5 class='mb-2'>" . $row['name'] . "</h5>
                            <p class='mb-0'>" . $row['description'] . "</p>
                        </div>
                      </div>";
                    $active = "";
                }
                ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    </div>

    <!-- Cards -->
    <div class="container my-5 mb-5">
        <h3 class="text-center mb-4">Daftar Kursus</h3>
        <div class="row row-cols-1 row-cols-md-3 g-2">
            <?php
            $result = $conn->query("SELECT * FROM courses");
            while ($row = $result->fetch_assoc()) {
                echo "
                <div class='col'>
                    <div class='card h-100'>
                    <a href='courses_detail.php?id={$row['id']}' class='text-decoration-none text-dark'>
                        <img src='{$row['image_url']}' class='card-img-top' alt='{$row['name']}'>
                        <div class='card-body'>
                            <h5 class='card-title'>{$row['name']}</h5>
                            <p class='card-text'>{$row['description']}</p>
                        </div>
                    </div>
                </div>";
            }
            ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>

        document.addEventListener('DOMContentLoaded', function () {
            var myCarousel = new bootstrap.Carousel(document.getElementById('carouselExample'), {
                interval: 3000, // Ganti slide setiap 3 detik
                ride: 'carousel'
            });
        });
    </script>
    <?php include 'footer.php'; ?>
</body>

</html>
