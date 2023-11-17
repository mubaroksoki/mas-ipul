<?php

include "connect.php";

$id = $_GET['id_barang'];
$sql = "DELETE FROM databarang WHERE id_barang = $id";
$hasil = mysqli_query($con,$sql);

if($hasil)
{
    header("Location:index.php?msg=Record deleted Successfully");
}else{
    echo "Failed : " . mysqli_error($con);
}

?>