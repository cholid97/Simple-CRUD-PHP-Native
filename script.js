$(document).ready(function () {
  load_data(1);
  function load_data(page, keyword) {
    $.ajax({
      url: "load_data.php",
      type: "POST",
      data: { page: page, keyword: keyword },
      success: function (data) {
        $("#tempel").html(data);
      },
    });
  }

  $(document).on("click", ".pagination_link", function () {
    var page = $(this).attr("id");
    load_data(page, $("#search").val());
  });

  $("#search").keyup(function () {
    $.ajax({
      url: "load_data.php",
      type: "POST",
      data: { keyword: $(this).val(), status: $(this).attr("id") },
      success: function (data) {
        $("#tempel").html(data);
      },
    });
  });

  $("#validationCustom3").change(function () {
    $(".validation-file").text(" ");
    var file = $("#validationCustom3").val();
    var size = this.files[0].size / 1024;
    var ext = file.split(".").pop();
    if (ext != "JPG" && ext != "PNG" && ext != "jpg" && ext != "png") {
      $(".validation-file").text("Ekstensi file harus jpg/png");
    } else if (Math.ceil(size) > 100) {
      $(".validation-file").text("File tidak boleh lebih dari 100 kb");
    }
  });
});

function look_data(keyword, statEdit) {
  $.ajax({
    url: "look_data.php",
    type: "POST",
    data: { keyword: keyword, statEdit: statEdit },
    dataType: "json",
    success: function (data) {
      if (data[1] == "Edit") {
        $("#editBarang").html(data[2]);
        $("#namaBarangE").val(data[3]);
      }
      if (data["0"] != "" && data[1] != "SE") {
        $("#labelBarang").show();
      } else {
        $("#labelBarang").hide();
      }
      if (data[1] == "SE" && data[0] != "") {
        $("#labelBarangEdit").show();
      } else {
        $("#labelBarangEdit").hide();
      }
    },
  });
}

$("#namaBarangE").change(function () {
  look_data($("#namaBarangE").val(), "SE");
});
$("#namaBarangT").change(function () {
  look_data($("#namaBarangT").val(), "");
});
function Edit(keyword) {
  look_data(keyword, "EDIT");
}

function Delete(id) {
  var text = "Apakah Anda yakin untuk menghapus ?";
  console.log(id);
  if (confirm(text) == true) {
    $.ajax({
      url: "delete_data.php",
      data: { id: id },
      type: "POST",
      success: function (data) {
        alert("Data Berhasil Dihapus");
        var page = "1";
        var keyword = "";
        $.ajax({
          url: "load_data.php",
          type: "POST",
          data: { page: page, keyword: keyword },
          success: function (data) {
            $("#tempel").html(data);
          },
        });
      },
    });
  } else {
  }
}

(function () {
  "use strict";

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll(".needs-validation");
  // Loop over them and prevent submission
  Array.prototype.slice.call(forms).forEach(function (form) {
    form.addEventListener(
      "submit",
      function (event) {
        if (!form.checkValidity()) {
          event.preventDefault();
          event.stopPropagation();
        }

        form.classList.add("was-validated");
      },
      false
    );
  });
})();
