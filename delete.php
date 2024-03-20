<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $conn = new mysqli("localhost", "root", "", "tokodb");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $id = $conn->real_escape_string($_GET['id']);

    $sql = "DELETE FROM toko WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
        header("refresh:0.5; url=index.php");
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
}

