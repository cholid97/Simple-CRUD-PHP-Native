<!DOCTYPE html>
<html lang="en">
  <head>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
      integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
      integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
      crossorigin="anonymous"
    ></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.min.js"></script>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TEST</title>
  </head>
  <body>
    <div class="container-fluid mt-4">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-md-4">Sample Data</div>
            <div class="col-md-3 text-right">
              <a
                class="btn btn-primary"
                data-bs-toggle="modal"
                data-bs-target="#modalTambahBarang"
                role="button"
                >Tambah Data</a
              >
            </div>
            <div class="col-md-3">
              <input
                type="text"
                name="search"
                class="form-control"
                id="search"
                placeholder="Search Here"
              />
            </div>
          </div>
        </div>
        <div class="row" id="tempel"></div>
      </div>
    </div>

    <div class="modal" id="modalTambahBarang" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Tambah Barang</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <form
              class="row g-3 needs-validation tambahBarang"
              method="post"
              action="insert_data.php"
              enctype="multipart/form-data"
              novalidate
            >
              <div class="col-md-12">
                <label for="validationCustom01" class="form-label"
                  >Nama Barang</label
                >
                <input
                  type="text"
                  name="namaBarang"
                  class="form-control"
                  required
                  id="namaBarangT"
                />
                <div class="invalid-feedback" id="labelBarang">
                  Nama Sudah Terdaftar
                </div>
              </div>
              <div class="col-md-12">
                <label for="validationCustom02" class="form-label"
                  >Harga Beli</label
                >
                <input
                  type="number"
                  name="hargaBeli"
                  class="form-control"
                  id="validationCustom02"
                  required
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
                  required
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
                  required
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
                  required
                />
                <div
                  class="invalid-feedback validation-file"
                  style="display: contents"
                ></div>
              </div>
              <div class="col-12 text-end">
                <button class="btn btn-primary Kirim" type="submit">
                  Kirim
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="modal" id="modalsEdit" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit Barang</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <form
              class="row g-3 needs-validation tambahBarang"
              method="post"
              action="update_data.php"
              enctype="multipart/form-data"
              novalidate
            >
              <div class="col-md-12">
                <label for="validationCustom01" class="form-label"
                  >Nama Barang</label
                >
                <input
                  type="text"
                  name="namaBarang"
                  class="form-control"
                  id="namaBarangE"
                  value=""
                />
                <div class="invalid-feedback" id="labelBarangEdit">
                  Nama Sudah Terdaftar
                </div>
              </div>
              <div id="editBarang"></div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
<script src="script.js"></script>
