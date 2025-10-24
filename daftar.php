<html>
<head>
    <title>Data Registrasi User</title>
    <style>
        body {
            font-family: Arial;
            background: url("https://i.pinimg.com/736x/e5/cf/2f/e5cf2faa5abb6eda8fd5cdda15f6714c.jpg");
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .box {
            background: #fff;
            padding: 25px;
            border-radius: 10px;
            border: 2px solid grey;
            width: 600px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        th { background: #eee; }
        .success { color: green; text-align: center; font-weight: bold; }
        .error { color: red; text-align: center; font-weight: bold; }
        .btn {
            display: inline-block;
            margin-top: 15px;
            padding: 8px 16px;
            background: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn:hover { background: #0056b3; }
    </style>
</head>
<body>
    <div class="box">
    <h2 style="text-align:center;">Data Registrasi User</h2>
    <?php
        if(isset($_POST['submit'])){
            $namaDepan = $_POST['nama_depan'];
            $namaBelakang = $_POST['nama_belakang'];
            $umur = $_POST['umur'];
            $kota = $_POST['asal_kota'];

            if($umur < 10){
                echo "<p class='error'>Umur minimal 10 tahun!</p>";
                echo "<div style='text-align:center;'><a href='index.html' class='btn'>Kembali</a></div>";
            } else {
                echo "<p class='success'>Registrasi Berhasil!</p>";
                echo "<table>
                        <tr><th>No</th><th>Nama Lengkap</th><th>Umur</th><th>Asal Kota</th></tr>";
                for($i=1; $i<=$umur; $i++){
                    if($i % 2 == 0 && $i != 4 && $i != 8){
                        echo "<tr>
                                <td>$i</td>
                                <td>".strtoupper($namaDepan.' '.$namaBelakang)."</td>
                                <td>$umur tahun</td>
                                <td>".strtoupper($kota)."</td>
                              </tr>";
                    }
                }
                echo "</table>";
                echo "<div style='text-align:center;'><a href='index.html' class='btn'>Kembali</a></div>";
            }
        } else {
            echo "<p class='error'>Data tidak ditemukan!</p>";
            echo "<div style='text-align:center;'><a href='index.html' class='btn'>Kembali</a></div>";
        }
    ?>
    </div>
</body>
</html>
