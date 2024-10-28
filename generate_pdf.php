<?php
require 'vendor/autoload.php'; // Pastikan path ke autoload benar
use Dompdf\Dompdf;

// Ambil ID pesanan dari URL
if (isset($_GET['id'])) {
    $orderId = $_GET['id'];

    // Koneksi ke database
    $conn = new mysqli("localhost", "root", "", "seblak_order"); // Ganti dengan kredensial database kamu

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query untuk mengambil data pesanan berdasarkan ID
    $sql = "SELECT * FROM orders WHERE id = $orderId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Generate konten HTML untuk PDF
        $html = "
            <h1>Detail Pesanan</h1>
            <p><strong>ID:</strong> " . $row['id'] . "</p>
            <p><strong>Nama:</strong> " . $row['name'] . "</p>
            <p><strong>Alamat:</strong> " . $row['address'] . "</p>
            <p><strong>Telepon:</strong> " . $row['phone'] . "</p>
            <p><strong>Jenis Seblak:</strong> " . $row['type'] . "</p>
            <p><strong>Jumlah:</strong> " . $row['quantity'] . "</p>
            <p><strong>Catatan:</strong> " . $row['notes'] . "</p>
        ";

        // Inisialisasi Dompdf
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);

        // Set ukuran kertas dan orientasi
        $dompdf->setPaper('A4', 'portrait');

        // Render PDF
        $dompdf->render();

        // Output file PDF ke browser
        $dompdf->stream("pesanan_" . $row['id'] . ".pdf", array("Attachment" => 0));
    } else {
        echo "Pesanan tidak ditemukan.";
    }

    $conn->close();
} else {
    echo "ID pesanan tidak valid.";
}
?>
