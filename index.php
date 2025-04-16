<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Rute Penerbangan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-yellow">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="Logo.jpg" alt="Logo" height="100" class="d-inline-block align-top">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">Home</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container shadow-box">
        <h1 class="text-center my-4">Pendaftaran Rute Penerbangan</h1>
        
        <form action="process.php" method="POST" class="flight-form">
            <div class="form-group">
                <label for="airlineName" class="form-label">Nama Maskapai</label>
                <input type="text" class="form-control" id="airlineName" name="airlineName" required>
            </div>
            
            <div class="form-group">
                <label for="originAirport" class="form-label">Bandara Asal</label>
                <select class="form-select" id="originAirport" name="originAirport" required>
                    <option value="" selected disabled>Pilih Bandara Asal</option>
                    <?php
                    $originAirports = [
                        "Soekarno Hatta" => 65000,
                        "Husein Sastranegara" => 50000,
                        "Abdul Rachman Saleh" => 40000,
                        "Juanda" => 30000
                    ];
                    ksort($originAirports);
                    foreach ($originAirports as $name => $tax) {
                        echo "<option value='$name'>$name</option>";
                    }
                    ?>
                </select>
            </div>
            
            <div class="form-group">
                <label for="destinationAirport" class="form-label">Bandara Tujuan</label>
                <select class="form-select" id="destinationAirport" name="destinationAirport" required>
                    <option value="" selected disabled>Pilih Bandara Tujuan</option>
                    <?php
                    $destinationAirports = [
                        "Ngurah Rai" => 85000,
                        "Hasanuddin" => 70000,
                        "Inanwatan" => 90000,
                        "Sultan Iskandar Muda" => 60000
                    ];
                    ksort($destinationAirports);
                    foreach ($destinationAirports as $name => $tax) {
                        echo "<option value='$name'>$name</option>";
                    }
                    ?>
                </select>
            </div>
            
            <div class="form-group">
                <label for="ticketPrice" class="form-label">Harga Tiket (Rp)</label>
                <input type="number" class="form-control" id="ticketPrice" name="ticketPrice" min="0" required>
            </div>
            
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-yellow">Daftarkan Penerbangan</button>
            </div>
        </form>
        
        <?php if (isset($_GET['result']) && $_GET['result'] === 'success'): ?>
        <div class="result-container shadow-box mt-5">
            <h4 class="text-center mb-4">Detail Penerbangan</h4>
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th scope="row">Nomor</th>
                        <td><?= rand(1000, 9999) ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Tanggal</th>
                        <td><?= date('l, d F Y') ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Nama Maskapai</th>
                        <td><?= htmlspecialchars($_GET['airline']) ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Asal Penerbangan</th>
                        <td><?= htmlspecialchars($_GET['origin']) ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Tujuan Penerbangan</th>
                        <td><?= htmlspecialchars($_GET['destination']) ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Harga Tiket</th>
                        <td><?= 'Rp ' . number_format($_GET['price'], 0, ',', '.') ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Pajak</th>
                        <td><?= 'Rp ' . number_format($_GET['tax'], 0, ',', '.') ?></td>
                    </tr>
                    <tr class="table-warning">
                        <th scope="row">Total Harga Tiket</th>
                        <td><?= 'Rp ' . number_format($_GET['total'], 0, ',', '.') ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
</body>
</html>