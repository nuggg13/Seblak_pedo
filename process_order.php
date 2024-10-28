<?php
// Database connection
$host = 'localhost'; // Ganti dengan host MySQL Anda
$db = 'seblak_order'; // Nama database
$user = 'root'; // Ganti dengan username MySQL Anda
$pass = ''; // Ganti dengan password MySQL Anda

// Buat koneksi
$conn = new mysqli($host, $user, $pass, $db);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dari form
$name = $_POST['name'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$type = $_POST['type'];
$quantity = $_POST['quantity'];
$notes = $_POST['notes'];

// Masukkan data ke database
$sql = "INSERT INTO orders (name, address, phone, type, quantity, notes)
        VALUES ('$name', '$address', '$phone', '$type', $quantity, '$notes')";

if ($conn->query($sql) === TRUE) {
    echo "Pesanan berhasil disimpan!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Tutup koneksi
$conn->close();
?>
