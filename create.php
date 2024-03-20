<?php

if(isset($_GET['gambar']) && isset($_GET['nama']) && isset($_GET['harga']) && isset($_GET['tersedia']) && isset($_GET['beli'])) {
   
    $gambar = $_GET['gambar'];
    $nama = $_GET['nama'];
    $harga = $_GET['harga'];
    $tersedia = $_GET['tersedia'];
    $beli = $_GET['beli'];

    $conn = new mysqli("localhost", "root", "", "tokodb");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    
    $sql = "INSERT INTO toko (gambar, nama, harga, tersedia, beli) VALUES ('$gambar', '$nama', '$harga', '$tersedia', '$beli')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully. Redirecting...";
        header("refresh:1; url=index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    echo "Error: Data not received from functions.php.";
}


