<?php
require 'koneksi.php';
 
 $record_per_page = 2;
 $page = "";
 $output="";

 $output .='<table cellpadding="10" cellspacing="1">
 <thead>
   <tr>
     <th><strong>Foto Barang</strong></th>
     <th><strong>Name</strong></th>
     <th><strong>Harga Beli</strong></th>
     <th><strong>Harga Jual</strong></th>
     <th><strong>Stok</strong></th>
     <th><strong>Action</strong></th>
   </tr>
 </thead>
 <tbody>';

 if(isset($_POST["page"]) && !isset($_POST['keyword'])){
     $page = $_POST["page"];
     $start_from = ($page - 1) * $record_per_page;
     $query = "SELECT * FROM barang LIMIT $start_from,$record_per_page"; 
     $page_query = "SELECT * FROM barang";      
 }else if(isset($_POST['keyword'])){
    if (isset($_POST['page'])) {
      $page = $_POST['page'];
    }else{
      $page = 1;
    }
    $keyword = $_POST['keyword'];
    if($keyword != ""){
    $start_from = ($page - 1) * $record_per_page;
    $query = "SELECT * FROM barang WHERE NamaBarang LIKE '%$keyword%' LIMIT $start_from,$record_per_page";
    $page_query = "SELECT * FROM barang WHERE NamaBarang LIKE '%$keyword%'";  
  }else{
    $start_from = ($page - 1) * $record_per_page;
  $query = "SELECT * FROM barang LIMIT $start_from,$record_per_page";
  $page_query = "SELECT * FROM barang";  
  }
  }else{
  $page = 1;
  $start_from = ($page - 1) * $record_per_page;
  $query = "SELECT * FROM barang LIMIT $start_from,$record_per_page";
  $page_query = "SELECT * FROM barang";  
 }



 $result =mysqli_query($con, $query);
while($row = mysqli_fetch_array($result)){
 $output .= '
              <td><img src="'.$row["FotoBarang"].'" class="img-thumbnail" style="width:25%" alt="Rusak"></td>
              <td>'.$row["NamaBarang"].'</td>
              <td>'.$row["HargaBeli"].'</td>
              <td>'.$row["HargaJual"].'</td>
              <td>'.$row["Stock"].'</td>
              <td>
                <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalsEdit" onclick="Edit('.$row["id"].')" role="button">Edit</a>
                <a class="btn btn-danger" onclick="Delete('.$row["id"].')" role="button">Delete</a>
              </td></tr>';
            }
$output .= '</tbody> </table> <br/> <div align="center">';
 $page_result = mysqli_query($con, $page_query);  
 $total_records = mysqli_num_rows($page_result);  
 $total_pages = ceil($total_records/$record_per_page);
 for($i=1; $i<=$total_pages; $i++)  
 {  
      $output .= "<span class='pagination_link' style='cursor:pointer; padding:6px; border:1px solid #ccc;' id='".$i."'>".$i."</span>";  
 }  
 $output .= '</div><br /><br />';

echo $output;
?>
