<?php
$isSubmitted = isset($_POST['submit']);
$username    = trim($_POST['username'] ?? '');
$password    = $_POST['password'] ?? '';
$umur        = isset($_POST['umur']) ? (int)$_POST['umur'] : null;
$kota        = trim($_POST['kota'] ?? '');

$hasAllFields = $isSubmitted && $username !== '' && $password !== '' && $kota !== '' && $umur !== null;

$USERNAME_VALID = "MOCHAMAD IDRIS";
$PASSWORD_VALID = "070605";
$authOk = (strtoupper($username) === strtoupper($USERNAME_VALID)) && ($password === $PASSWORD_VALID);

$umurValid = $hasAllFields ? ($umur >= 10) : false;

$namaTampil = strtoupper($username);
$kotaTampil = strtoupper($kota);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>::Data Registrasi::</title>
        <style type="text/css">
            body{
                display: flex;
                justify-content: center;
                align-items: center;
                min-height: 100vh;
                background-size: cover;
                background-image: url("https://cdn.arstechnica.net/wp-content/uploads/2023/06/bliss-update-1440x960.jpg");
                font-family: Arial, Helvetica, sans-serif;
                margin: 0;
                padding: 20px;
            }
            .container{
                background-color: white;
                border: 3px solid grey;
                padding: 30px;
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(0,0,0,0.1);
                max-width: 600px;
                width: 100%;
            }
            h1{
                text-align: center;
                color: #333;
                margin-bottom: 20px;
                font-size: 28px;
            }
            .success-message{
                background-color: #d4edda;
                color: #155724;
                padding: 12px 14px;
                margin-bottom: 18px;
                border: 1px solid #c3e6cb;
                border-radius: 5px;
                text-align: center;
                font-weight: bold;
            }
            .error-message{
                background-color: #f8d7da;
                color: #721c24;
                padding: 12px 14px;
                margin-bottom: 18px;
                border: 1px solid #f5c6cb;
                border-radius: 5px;
                text-align: center;
                font-weight: bold;
            }
            table{
                width: 100%;
                border-collapse: collapse;
                margin-bottom: 20px;
            }
            th, td{
                padding: 12px;
                text-align: left;
                border-bottom: 1px solid #ddd;
                color: #333;
            }
            th{
                background-color: #f8f9fa;
                font-weight: bold;
            }
            th:nth-child(1), td:nth-child(1){ width:70px; text-align:center; }
            td:nth-child(3){ width:120px; }
            td:nth-child(4){ width:160px; }
            .back-button{
                text-align: center;
                margin-top: 10px;
            }
            .back-button a{
                background-color: #007bff;
                color: white;
                padding: 12px 24px;
                text-decoration: none;
                border-radius: 5px;
                display: inline-block;
                transition: background-color 0.3s;
            }
            .back-button a:hover{
                background-color: #0056b3;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1>Data Registrasi User</h1>

            <?php if (!$hasAllFields): ?>
                <div class="error-message">
                    Error: Data tidak ditemukan. Silakan isi form registrasi terlebih dahulu.
                </div>
                <div class="back-button"><a href="index.html">Kembali ke Form Registrasi</a></div>

            <?php elseif (!$authOk): ?>
                <div class="error-message">
                    Username atau password salah.
                </div>
                <div class="back-button"><a href="index.html">Kembali ke Form Registrasi</a></div>

            <?php elseif (!$umurValid): ?>
                <div class="error-message">
                    Error: Umur minimal adalah <strong>10</strong> tahun.
                </div>
                <div class="back-button"><a href="index.html">Kembali ke Form Registrasi</a></div>

            <?php else: ?>
                <div class="success-message">Registrasi Berhasil!</div>

                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>Umur</th>
                            <th>Asal Kota</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        for ($i=1; $i <= $umur; $i++) {
                            if ($i % 2 !== 0) continue;   // hanya genap
                            if ($i == 4 || $i == 8) continue; // skip 4 & 8
                            echo "<tr>";
                            echo "<td>{$i}</td>";
                            echo "<td>{$namaTampil}</td>";
                            echo "<td>{$umur} tahun</td>";
                            echo "<td>{$kotaTampil}</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>

                <div class="back-button">
                    <a href="index.html">Kembali ke Form Registrasi</a>
                </div>
            <?php endif; ?>
        </div>
    </body>
</html>
