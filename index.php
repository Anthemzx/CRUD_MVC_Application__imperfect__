<?php require "functions.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    
    <script>
        function clearForm() {
            document.getElementById("createForm").reset();
        }
    </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CRUD Operations</title>
</head>
<body>

<h2>Produk Toko CRUD</h2>
    </br>

<!-- Buttons -->
<button onclick="showCreateForm()">Create</button>
<button onclick="showReadForm()">Search</button>
<button onclick="showUpdateForm()">Update</button>


<!-- CRUD Forms -->
<div id="createForm" style="display: none;">
    <h3>Create Product</h3>
    <form action="functions.php" method="post">
        <label for="gambar">Gambar:</label>
        <input type="file" name="gambar" id="gambar">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama"><br>
        <label for="harga">Harga:</label>
        <input type="text" id="harga" name="harga"><br>
        <label for="tersedia">Tersedia:</label>
        <input type="text" id="tersedia" name="tersedia"><br>
        <label for="beli">Beli:</label>
        <input type="text" id="beli" name="beli"><br>
        <input type="submit" name="submit_create" value="Submit">
    </form>
</div>

<div id="readForm" style="display: none;">
    <h3>Read Product</h3>
    <form action="read.php" method="get">
        <label for="searchId">Enter Product ID:</label>
        <input type="text" id="searchId" name="id">
        <input type="submit" value="Search">
    </form>
</div>

<div id="updateForm" style="display: none;">
    <h3>Update Product</h3>
    <form action="functions.php" method="post">
        <label for="updateId">ID:</label>
        <input type="text" id="updateId" name="id"><br>
        <label for="updateGambar">Gambar:</label>
        <input type="file" name="gambar" id="gambar">
        <label for="updateNama">Nama:</label>
        <input type="text" id="updateNama" name="nama"><br>
        <label for="updateHarga">Harga:</label>
        <input type="text" id="updateHarga" name="harga"><br>
        <label for="updateTersedia">Tersedia:</label>
        <input type="text" id="updateTersedia" name="tersedia"><br>
        <label for="updateBeli">Beli:</label>
        <input type="text" id="updateBeli" name="beli"><br>
        <input type="submit" name="update_form" value="Update">
    </form>
</div>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk Toko</title>
</head>
<body>

<h2>Produk Toko</h2>
</br>

<table>
    <tr>
        <th>ID</th>
        <th>Aksi</th>
        <th>Gambar</th>
        <th>Nama</th>
        <th>Harga</th>
        <th>Tersedia</th>
        <th>Beli</th>
    </tr>

    <?php
    $conn = new mysqli("localhost", "root", "", "tokodb");


    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT id, gambar, nama, harga, tersedia, beli FROM toko";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            
            echo "<td>";
            echo "<a href='delete.php?id=" . $row["id"] . "'>Delete</a>";
            echo "</td>";
            if ($row["gambar"]) {
                $imageData = base64_encode($row["gambar"]);
                $imageType = 'png'; // Doesnt work
                echo "<td><img src='data:image/$imageType;base64,$imageData' alt='Image'></td>";
            } else {
                echo "<td>No image</td>";
            }
            echo "<td>" . $row["nama"] . "</td>";
            echo "<td>" . $row["harga"] . "</td>";
            echo "<td>" . $row["tersedia"] . "</td>";
            echo "<td>" . $row["beli"] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='6'>0 results</td></tr>";
    }
    $conn->close();
    ?>

</table>

</body>
</html>





</table>

<script>
    function showCreateForm() {
        document.getElementById('createForm').style.display = 'block';
        document.getElementById('readForm').style.display = 'none';
        document.getElementById('updateForm').style.display = 'none';
        document.getElementById('deleteForm').style.display = 'none';
    }

    function showReadForm() {
        document.getElementById('createForm').style.display = 'none';
        document.getElementById('readForm').style.display = 'block';
        document.getElementById('updateForm').style.display = 'none';
        document.getElementById('deleteForm').style.display = 'none';
    }

    function showUpdateForm() {
        document.getElementById('createForm').style.display = 'none';
        document.getElementById('readForm').style.display = 'none';
        document.getElementById('updateForm').style.display = 'block';
        document.getElementById('deleteForm').style.display = 'none';
    }

</script>

</body>
</html>
