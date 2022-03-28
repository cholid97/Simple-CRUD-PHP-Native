<?php 
require 'koneksi.php';
$arr = array();
$arr[2] ="";
if(isset($_POST["keyword"]) && $_POST['statEdit'] == "EDIT"){
    
    $arr[1] = "Edit";
    $keyword =$_POST["keyword"];
    $query = "SELECT * FROM barang WHERE id = '$keyword'";
    $row = mysqli_query($con,$query);
    $arr[0] = "";
    while($return = mysqli_fetch_array($row)){
        $arr[2] .= 
            ' <div class="col-md-12">
                <input type="hidden" name="idBarang" value="'.$return["id"].'"
                <label for="validationCustom02" class="form-label"
                  >Harga Beli</label
                >
                <input
                  type="number"
                  name="hargaBeli"
                  class="form-control"
                  id="validationCustom02"
                  required value="'.$return["HargaBeli"].'"
                />
                <div class="invalid-feedback">
                  Tolong Masukan Harga Beli Barang
                </div>
              </div>
              <div class="col-md-12">
                <label for="validationCustom02" class="form-label"
                  >Harga Jual</label
                >
                <input
                  type="number"
                  name="hargaJual"
                  class="form-control"
                  id="validationCustom02"
                  required value="'.$return["HargaJual"].'"
                />
                <div class="invalid-feedback">
                  Tolong Masukan Harga Jual Barang
                </div>
              </div>
              <div class="col-md-12">
                <label for="validationCustom02" class="form-label">Stock</label>
                <input
                  type="number"
                  name="stockBarang"
                  class="form-control"
                  id="validationCustom02"
                  required value="'.$return["Stock"].'"
                />
                <div class="invalid-feedback">Tolong Masukan Stock Barang</div>
              </div>
              <div class="col-md-12">
                <label for="validationCustom02" class="form-label"
                  >Foto Barang</label
                >
                <input
                  type="file"
                  name="fotoBarang"
                  class="form-control"
                  id="validationCustom3"
                />
                <div
                  class="invalid-feedback validation-file"
                  style="display: contents"
                ></div>
              </div>
              <div class="col-12 text-end mt-2">
                <button class="btn btn-primary Kirim" type="submit">
                  Kirim
                </button>
              </div>';
              $arr[3] = $return['NamaBarang'];
    }

}else if(isset($_POST["keyword"]) && $_POST['statEdit'] =="SE"){
    $keyword =$_POST["keyword"];
    $query = "SELECT * FROM barang WHERE NamaBarang = '$keyword'";
    $row = mysqli_query($con,$query);
    $arr[1] = $_POST['statEdit'];
    if(mysqli_num_rows($row) !=0){
    while($return = mysqli_fetch_array($row)){
        $arr[0] = $return["NamaBarang"];
    }
    }else{
        $arr[0] ="";
    }
}else{
    $keyword =$_POST["keyword"];
    $query = "SELECT * FROM barang WHERE NamaBarang = '$keyword'";
    $row = mysqli_query($con,$query);
    if(mysqli_num_rows($row) !=0){
    while($return = mysqli_fetch_array($row)){
        $arr[0] = $return["NamaBarang"];
    }
    }else{
        $arr[0] ="";
    }
    $arr[1]="";
    
}
echo json_encode($arr);
?>