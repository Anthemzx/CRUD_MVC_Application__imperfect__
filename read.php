<!DOCTYPE html>
<html>
<head>
<style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
    </style>
    <title>Search</title>
</head>
<body>

<h2>Search Product</h2>

<form action="read.php" method="get">
    Enter ID to search: <input type="text" name="id">
    <input type="submit" value="Search">
</form>

<a href="index.php">Back</a>

<?php
// Establish database connection
$conn = new mysqli("localhost", "root", "", "tokodb");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    // Fetch query
    $sql = "SELECT * FROM toko WHERE id = $id";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h3>Showing data for ID: $id</h3>";
        // Table required to show results
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Image</th><th>Name</th><th>Price</th><th>Available</th><th>Buy</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["gambar"] . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["price"] . "</td>";
            echo "<td>" . $row["available"] . "</td>";
            echo "<td>" . $row["buy"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No results found for ID: $id";
    }
}

$conn->close();
?>

</body>
</html>
