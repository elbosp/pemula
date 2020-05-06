/*
  Author: Andri Wahyu
  Code: Mengambil data dari API
  Catatan: Kode ini masih kurang efektif hendaknya jika ada yang mampu memaksimalkan code ini akan sangat baik.


*/
//Connecing to API Link in Interner
var request = new XMLHttpRequest();
request.open('GET', 'https://raw.githubusercontent.com/yusufsyaifudin/wilayah-indonesia/master/data/list_of_area/indonesia-region.min.json', true);
var data;
var dataString;
var provinsiSekarang; //Menyimpan data provinsi yang dipilih dari selected Provinsi
var kabupatenSekarang; //Menyimpan data kabupaten yang dipilih dari selected Kabupaten
var kecamatanSekarang; //Menyimpan data kecamatan yang dipilih dari selected Kecamatan
request.onload = function () {
  // Begin accessing JSON data here
  if (request.status >= 200 && request.status < 400) {
      data = JSON.parse(this.response);
      var syntaxOption = "<option value='' disabled >Pilih Provinsi</option>"
      document.getElementById('provinsi').innerHTML += syntaxOption;
      for (i in data) {
        // Fill Provinsi option
        var syntaxOption = "<option value='"+data[i].name+"'>"+data[i].name+"</option>"
        document.getElementById('provinsi').innerHTML += syntaxOption;
      }
  } else {
    console.log(data[0]);
    console.log('error');
  }
}
request.send();

//Fill Selected for Kabupaten
function kabupatenFunct() {
  var provinsiValue = document.getElementById('provinsi').value;
  for (i in data) {
    if(provinsiValue==data[i].name) {
      idProvinsi = data[i].id;
      provinsiSekarang = data[i];
      //Initialize
      document.getElementById('kabupaten').innerHTML ="<option value='' disabled selected>Pilih Kabupaten</option>";
      document.getElementById('kecamatan').innerHTML ="<option value='' disabled selected>Pilih Kecamatan</option>";
      document.getElementById('kelurahan').innerHTML ="<option value='' disabled selected>Pilih Kelurahan</option>";
      for (j in data[i].regencies) {
        // Fill Kabupaten option
        var syntaxOption = "<option value='"+data[i].regencies[j].name+"'>"+data[i].regencies[j].name+"</option>"
        document.getElementById('kabupaten').innerHTML += syntaxOption;
      }

      break;
    }
  }
}

//Fill Selected for Kecamatan
function kecamatanFunct() {
  var kabupatenValue = document.getElementById('kabupaten').value;
  var idKabupaten="";
  for (i in provinsiSekarang.regencies) {
    if(kabupatenValue==provinsiSekarang.regencies[i].name) {
      kabupatenSekarang = provinsiSekarang.regencies[i];
      //Initialize
      document.getElementById('kecamatan').innerHTML ="<option value='' disabled selected>Pilih Kecamatan</option>";
      document.getElementById('kelurahan').innerHTML ="<option value='' disabled selected>Pilih Kelurahan</option>";
      for (j in kabupatenSekarang.districts) {
        // Fill Kecamatan option
        var syntaxOption = "<option value='"+kabupatenSekarang.districts[j].name+"'>"+kabupatenSekarang.districts[j].name+"</option>"
        document.getElementById('kecamatan').innerHTML += syntaxOption;
      }

      break;
    }
  }
}

//Fill Selected for Kelurahan
function kelurahanFunct() {
  var kecamatanValue = document.getElementById('kecamatan').value;
  for (i in kabupatenSekarang.districts) {
    if(kecamatanValue==kabupatenSekarang.districts[i].name) {
      kecamatanSekarang = kabupatenSekarang.districts[i];
      //Initialize
      document.getElementById('kelurahan').innerHTML ="<option value='' disabled selected>Pilih Kelurahan</option>";
      for (j in kecamatanSekarang.villages) {
        // Fill Kelurahan option
        var syntaxOption = "<option value='"+kecamatanSekarang.villages[j].name+"'>"+kecamatanSekarang.villages[j].name+"</option>"
        document.getElementById('kelurahan').innerHTML += syntaxOption;
      }

      break;
    }
  }
}
