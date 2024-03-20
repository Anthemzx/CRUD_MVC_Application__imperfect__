<?php


if(isset($_GET['gambar']) && isset($_GET['nama']) && isset($_GET['harga']) && isset($_GET['tersedia']) && isset($_GET['beli'])) {

    $id = $_GET['id'];
    $gambar = $_GET['gambar']; 
    $nama = $_GET['nama'];
    $harga = $_GET['harga'];
    $tersedia = $_GET['tersedia'];
    $beli = $_GET['beli'];

    $conn = new mysqli("localhost", "root", "", "tokodb");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $sql = "UPDATE toko SET gambar='$gambar', nama='$nama', harga='$harga', tersedia='$tersedia', beli='$beli' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Data updated!";
        header("refresh:1; url=index.php");

    } else {
        echo "Error updating record: " . $conn->error;
      
    }

    $conn->close();
}

