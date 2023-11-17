<?php 
include "connect.php";


if(isset($_POST['submit'])){
    $nama_barang = $_POST['nama_barang'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    $sql = "INSERT INTO databarang (id_barang, nama_barang, harga, stok) VALUES (NULL, '$nama_barang', '$harga', '$stok')";
    $hasil = mysqli_query($con,$sql);

    if($hasil){
        header("Location: index.php?msg=New Record Created Successfully");
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
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    

    <title>Kelontong Pak Ipul</title>
</head>

<body class="bg-gray-100 p-6">

    <!-- Tombol untuk membuka pop-up -->
    <button id="openModal"
        class="bg-blue-500 text-white p-2 rounded hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
        Tambah Data
    </button>

    <!-- Pop-up Formulir -->
    <!-- Tambah Data Formulir-->
    <div id="modal"
        class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white p-8 rounded shadow-md w-full sm:w-96">
            <h2 class="text-2xl font-semibold mb-6">Formulir Tambah Data</h2>

            <form action="" method="post">

       
                <div class="mb-4">
                    <label for="nama_barang" class="block text-gray-700 text-sm font-bold mb-2">Nama Barang</label>
                    <input type="text" id="nama_barang" name="nama_barang" class="w-full p-2 border border-gray-300 rounded">
                </div>

          
                <div class="mb-4">
                    <label for="harga" class="block text-gray-700 text-sm font-bold mb-2">Harga</label>
                    <input type="text" id="harga" name="harga" class="w-full p-2 border border-gray-300 rounded">
                </div>

                <div class="mb-4">
                    <label for="stok" class="block text-gray-700 text-sm font-bold mb-2">Stok</label>
                    <input type="text" id="stok" name="stok" class="w-full p-2 border border-gray-300 rounded">
                </div>

           
              
                <button type="submit" name="submit" 
                    class="bg-blue-500 text-white p-2 rounded hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
                    Tambah
                </button>

            </form>

            <!-- Tombol untuk menutup pop-up -->
            <button id="closeModal"
                class="mt-4 bg-gray-500 text-white p-2 rounded hover:bg-gray-600 focus:outline-none focus:shadow-outline-gray active:bg-gray-800 ml-auto">
                 Cancel
            </button>

        </div>
    </div>

    <script>
        // Script untuk mengontrol tampilan pop-up
        const openModalButton = document.getElementById('openModal');
        const modal = document.getElementById('modal');
        const closeModalButton = document.getElementById('closeModal');

        openModalButton.addEventListener('click', () => {
            modal.classList.remove('hidden');
        });

        closeModalButton.addEventListener('click', () => {
            modal.classList.add('hidden');
        });
    </script>


<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Daftar Barang Pak Ipul</h1>

    <table class="min-w-full bg-white">
      <thead class="bg-gray-800 text-white">
        <tr>
          <th class="py-2 px-4">ID Barang</th>
          <th class="py-2 px-4">Nama Barang</th>
          <th class="py-2 px-4">Harga</th>
          <th class="py-2 px-4">Stok</th>
          <th class="py-2 px-4">Opsi</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        $p = 1; 
        $sql = "SELECT * from databarang";
        $hasil = mysqli_query($con,$sql);
        while($row = mysqli_fetch_assoc($hasil)){
        ?>
        <tr>
          <td class="border py-2 px-4"><?php echo $p++;?></td>
          <td class="border py-2 px-4"><?php echo $row["nama_barang"]?></td>
          <td class="border py-2 px-4"><?php echo $row["harga"]?></td>
          <td class="border py-2 px-4"><?php echo $row["stok"]?></td>
          <td class="border py-2 px-4">
            <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded" href="edit.php?id_barang=<?php echo $row["id_barang"]?>">Edit</a>
            <a class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded" href="delete.php?id_barang=<?php echo $row["id_barang"]?>">Hapus</a>
          </td>
        </tr>
        <?php }?>
        
      </tbody>
    </table>
  </div>

</body>

</html>
