<?php



// Include database connection or any necessary files<?php
// Include database connection or any necessary files

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_create'])) {

    $conn = new mysqli("localhost", "root", "", "tokodb");

 
    $gambar = $_POST['gambar']; 
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $tersedia = $_POST['tersedia'];
    $beli = $_POST['beli'];

   
    $gambar = $conn->real_escape_string($_POST['gambar']);
    $nama = $conn->real_escape_string($_POST['nama']);
    $harga = $conn->real_escape_string($_POST['harga']);
    $tersedia = $conn->real_escape_string($_POST['tersedia']);
    $beli = $conn->real_escape_string($_POST['beli']);

    $query_params = http_build_query([
        'gambar' => $gambar,
        'nama' => $nama,
        'harga' => $harga,
        'tersedia' => $tersedia,
        'beli' => $beli
    ]);
    header("Location: create.php?" . $query_params); // Pass sanitized data via URL
    exit;

}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_form'])) {

    $conn = new mysqli("localhost", "root", "", "tokodb");

    $id = $_POST['id'];
    $gambar = $_POST['gambar']; 
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $tersedia = $_POST['tersedia'];
    $beli = $_POST['beli'];


    $id = $conn->real_escape_string($_POST['id']);
    $gambar = $conn->real_escape_string($_POST['gambar']);
    $nama = $conn->real_escape_string($_POST['nama']);
    $harga = $conn->real_escape_string($_POST['harga']);
    $tersedia = $conn->real_escape_string($_POST['tersedia']);
    $beli = $conn->real_escape_string($_POST['beli']);

    $query_params = http_build_query([
        'id' => $id,
        'gambar' => $gambar,
        'nama' => $nama,
        'harga' => $harga,
        'tersedia' => $tersedia,
        'beli' => $beli
    ]);
    header("Location: update.php?" . $query_params); // Pass sanitized data via URL
    exit;
}








