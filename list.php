<?php
// Database connection
$host = 'localhost'; // Ganti dengan host MySQL Anda
$db = 'seblak_order'; // Nama database
$user = 'root'; // Ganti dengan username MySQL Anda
$pass = ''; // Ganti dengan password MySQL Anda

// Buat koneksi
$conn = new mysqli($host, $user, $pass, $db);

// Periksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ambil data dari tabel 'orders'
$sql = "SELECT id, name, address, phone, type, quantity, notes FROM orders";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Pesanan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <!--HEADER-->
    <header class='shadow-md font-sans tracking-wide relative z-50'>
        <section class='py-2 bg-[#EE3535] text-white text-right px-10'>
            <p class='text-sm'><strong class="mx-3">Alamat:</strong>Jl. Anya No. 5 RT 0 RW 5, Kelurahan Shiro, Kecamatan
                Killua, Kota Kotaro, Provinsi Kana
                <strong class="mx-3">Contact No:</strong>08101010101010
            </p>
        </section>

        <div class='flex flex-wrap items-center justify-between gap-4 px-10 py-4 bg-white min-h-[70px]'>
            <a href="index.html">
                <img src="asset/SEBLAK PEDO.png" alt="logo" class='w-36' />
            </a>
        </div>
    </header>
    <!--HEADER-->

    <!-- List Pesanan -->
    <section class="py-10 px-10 bg-gray-100">
        <div class="max-w-5xl mx-auto bg-white p-8 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold mb-6 text-center">Daftar Pesanan Seblak</h2>

            <table class="min-w-full bg-white">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm">ID</th>
                        <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm">Nama</th>
                        <th class="w-1/3 py-3 px-4 uppercase font-semibold text-sm">Alamat</th>
                        <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm">Telepon</th>
                        <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm">Jenis Seblak</th>
                        <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm">Jumlah</th>
                        <th class="w-1/3 py-3 px-4 uppercase font-semibold text-sm">Catatan</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    <?php
                    if ($result->num_rows > 0) {
                        // Output data per row
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td class='w-1/6 py-3 px-4'>" . $row["id"] . "</td>";
                            echo "<td class='w-1/6 py-3 px-4'>" . $row["name"] . "</td>";
                            echo "<td class='w-1/3 py-3 px-4'>" . $row["address"] . "</td>";
                            echo "<td class='w-1/6 py-3 px-4'>" . $row["phone"] . "</td>";
                            echo "<td class='w-1/6 py-3 px-4'>" . $row["type"] . "</td>";
                            echo "<td class='w-1/6 py-3 px-4'>" . $row["quantity"] . "</td>";
                            echo "<td class='w-1/3 py-3 px-4'>" . $row["notes"] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7' class='text-center py-4'>Belum ada pesanan</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>

    <?php $conn->close(); ?>
</body>

</html>
