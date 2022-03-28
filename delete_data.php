<?php
require 'koneksi.php';
$id = $_POST['id'];
$query ="DELETE FROM barang WHERE id='$id'";
mysqli_query($con, $query);
