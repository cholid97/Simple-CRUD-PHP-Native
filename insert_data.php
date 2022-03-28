<?php
require 'koneksi.php';

if(isset($_FILES['fotoBarang']['name']) && isset($_POST['namaBarang']) && isset($_POST['hargaBeli']) && isset($_POST['hargaJual']) && isset($_POST['stockBarang'])){

    $namaBarang = $_POST["namaBarang"];
    $hargaBeli = $_POST["hargaBeli"];
    $hargaJual = $_POST["hargaBeli"];
    $stock = $_POST["stockBarang"];
   /* Getting file name */
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

   $query = "INSERT INTO barang VALUES('','$location','$namaBarang',$hargaBeli,$hargaJual,$stock)";
   mysqli_query($con, $query);
   header("Location","localhost:8080/index.php");
}
?>
<script>
redir();
function redir()
{
window.location.assign('https://testing-websitecnf.000webhostapp.com/index.php');
}
</script>