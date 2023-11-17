<?php 
include "connect.php";
$id = $_GET["id_barang"];


if(isset($_POST['submit'])){
    $nama_barang = $_POST['nama_barang'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    $sql = "UPDATE databarang SET nama_barang = '$nama_barang', harga = $harga, stok = '$stok' WHERE id_barang = $id";

    $hasil = mysqli_query($con,$sql);

    if($hasil){
        header("Location:index.php?msg=Data Updated Successfully");
    }else{
        echo "Failed Added" , mysqli_error($con);
    }
}



?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 h-screen flex items-center justify-center">

    <div class="bg-white p-8 rounded shadow-md w-96">
        <h2 class="text-2xl font-semibold mb-4">Edit Data</h2>

        <?php
        $sql = "SELECT * FROM databarang WHERE id_barang = $id LIMIT 1";
        $hasil = mysqli_query($con,$sql);
        $row = mysqli_fetch_assoc($hasil);
        
        ?>

        <!-- Form -->
        <form action="" method="post">
            <!-- Nama -->
            <div class="mb-4">
                <label for="nama_barang" class="block text-sm font-medium text-gray-600">Nama Barang</label>
                <input type="text" id="nama_barang" name="nama_barang" class="mt-1 p-2 w-full border rounded-md" value="<?php echo $row['nama_barang']?>">
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label for="harga" class="block text-sm font-medium text-gray-600">Harga</label>
                <input type="text" id="harga" name="harga" class="mt-1 p-2 w-full border rounded-md" value="<?php echo $row['harga']?>">
            </div>

            <!-- Nomor Telepon -->
            <div class="mb-4">
                <label for="stok" class="block text-sm font-medium text-gray-600">Stok</label>
                <input type="text" id="stok" name="stok" class="mt-1 p-2 w-full border rounded-md" value="<?php echo $row['stok']?>">
            </div>

            <!-- Tombol Simpan dan Cancel -->
            <div class="flex items-center justify-between mt-6">
                <button type="submit" name="submit" class="bg-blue-500 text-white p-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-300">Simpan</button>
                <a href="index.php" class="text-gray-500 hover:underline">Cancel</a>
            </div>
        </form>
    </div>

</body>
</html>
