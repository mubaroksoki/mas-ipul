<?php 

$server = "localhost";
$user = "root";
$pw = "";
$db = "kelontong";
$port = 2021;

$con = mysqli_connect($server,$user,$pw,$db,$port);

if($con) {
    echo "<script>
        windows.alert(Koneksi Berhasil);
    </script>";
} else {
    
    die("Koneksi gagal: " . mysqli_connect_error());
}


?>