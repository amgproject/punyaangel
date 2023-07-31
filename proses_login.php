<?php
// Koneksi ke database MySQL
$host = "nama_host_database";
$username = "username_database";
$password = "password_database";
$database = "nama_database";

$koneksi = mysqli_connect($host, $username, $password, $database);

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Tangkap data dari form login
$username = $_POST['username'];
$password = $_POST['password'];

// Lakukan query ke database untuk mencocokkan data login
$query = "SELECT * FROM tabel_pengguna WHERE username='$username' AND password='$password'";
$result = mysqli_query($koneksi, $query);

// Cek apakah data pengguna ditemukan atau tidak
if (mysqli_num_rows($result) > 0) {
    // Data ditemukan, login berhasil
    echo "Selamat datang, " . $username . "!";
} else {
    // Data tidak ditemukan, login gagal
    echo "Login gagal. Periksa kembali username dan password Anda.";
}

// Tutup koneksi database
mysqli_close($koneksi);
?>
