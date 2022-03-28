<?php
require 'koneksi.php';

if(isset($_POST['namaBarang']) && isset($_POST['hargaBeli']) && isset($_POST['hargaJual']) && isset($_POST['stockBarang'])){

    $idBarang = $_POST["idBarang"];
    $namaBarang = $_POST["namaBarang"];
    $hargaBeli = $_POST["hargaBeli"];
    $hargaJual = $_POST["hargaBeli"];
    $stock = $_POST["stockBarang"];
    
  if($_FILES['fotoBarang']['error'] != 4){
   $filename = $_FILES['fotoBarang']['name'];

   /* Location */
   $location = "images/".$filename;
   $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
   $imageFileType = strtolower($imageFileType);

   /* Valid extensions */
   $valid_extensions = array("jpg","png");

   $response = 0;
   /* Check file extension */
   if(in_array(strtolower($imageFileType), $valid_extensions)) {
      /* Upload file */
      if(move_uploaded_file($_FILES['fotoBarang']['tmp_name'],$location)){
         $response = $location;
      }
   }
   $query = "UPDATE barang SET NamaBarang ='$namaBarang', HargaBeli ='$hargaBeli', HargaJual ='$hargaJual', Stock ='$stock', FotoBarang ='$location' WHERE id='$idBarang'";
    }else{
    $query = "UPDATE barang SET NamaBarang ='$namaBarang', HargaBeli ='$hargaBeli', HargaJual ='$hargaJual', Stock ='$stock' WHERE id='$idBarang'";
    }
   
   mysqli_query($con, $query);
}
?>

<script>
redir();
function redir()
{
window.location.assign('https://testing-websitecnf.000webhostapp.com/index.php');
}
</script> 
