<?php
session_start();

if (!isset($_SESSION['username'])) {
    echo "<h2 style='text-align:center; margin-top:50px;'>Anda belum login. <a href='login.php'>Login di sini</a></h2>";
    exit;
}

include 'db.php';
$username = $_SESSION['username'];

// Update data jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $alamat = $_POST['alamat'];
    $pendidikan = $_POST['pendidikan'];

    $stmt = $conn->prepare("UPDATE users SET tanggal_lahir=?, alamat=?, pendidikan=? WHERE username=?");
    $stmt->bind_param("ssss", $tanggal_lahir, $alamat, $pendidikan, $username);
    $stmt->execute();

    echo "<script>alert('Profil berhasil diperbarui!'); window.location='profil.php';</script>";
    exit;
}

// Ambil data pengguna
$stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Profil Pengguna</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="styleuser.css" rel="stylesheet" />
</head>
<body>
    <?php include 'navbar.php'; ?>
    <div class="container mt-5 mb-3">
        <h2>Profil Pengguna</h2>
        <form method="POST" class="profile-form">
            <div class="mb-3">
                <label>Nama</label>
                <input type="text" class="form-control" value="<?php echo htmlspecialchars($user['username']); ?>" disabled />
            </div>

            <div class="mb-3">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" 
                    value="<?php echo htmlspecialchars($user['tanggal_lahir'] ?? ''); ?>" required />
            </div>

            <div class="mb-3">
                <label for="usia_display">Usia</label>
                <input type="text" id="usia_display" class="form-control" readonly />
            </div>

            <div class="mb-3">
                <label>Alamat</label>
                <textarea name="alamat" class="form-control" rows="3"><?php echo htmlspecialchars($user['alamat'] ?? ''); ?></textarea>
            </div>

            <div class="mb-3">
                <label>Jenjang Pendidikan</label>
                <select name="pendidikan" class="form-control">
                    <?php
                    $pendidikan_options = ["SD", "SMP", "SMA", "D3", "S1", "S2", "S3"];
                    foreach ($pendidikan_options as $opt) {
                        $selected = ($user['pendidikan'] == $opt) ? 'selected' : '';
                        echo "<option value='$opt' $selected>$opt</option>";
                    }
                    ?>
                </select>
            </div>

            <button type="submit" class="btn btn-primary mb-3">Simpan Perubahan</button>
            <a href="index.php" class="btn btn-secondary mb-1">Kembali ke Beranda</a>
        </form>
    </div>

    <script>
        function hitungUsia(tanggalLahir) {
            const dob = new Date(tanggalLahir);
            if (isNaN(dob)) return '';

            const today = new Date();
            let usia = today.getFullYear() - dob.getFullYear();
            const m = today.getMonth() - dob.getMonth();

            if (m < 0 || (m === 0 && today.getDate() < dob.getDate())) {
                usia--;
            }

            return usia >= 0 ? usia + ' tahun' : '';
        }

        const inputTanggalLahir = document.getElementById('tanggal_lahir');
        const usiaDisplay = document.getElementById('usia_display');

        inputTanggalLahir.addEventListener('change', function() {
            usiaDisplay.value = hitungUsia(this.value);
        });

        window.addEventListener('DOMContentLoaded', () => {
            if (inputTanggalLahir.value) {
                usiaDisplay.value = hitungUsia(inputTanggalLahir.value);
            }
        });
    </script>
    <?php include 'footer.php'; ?>
</body>
</html>
