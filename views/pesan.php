<?php 
include "controllers/PesanController.php"; 
$pesan = new PesanController; 

?>

<div class="container mt-5">
    <h2 class="mb-4">Form Pemesanan Paket Wisata</h2>
    <form action="" method="post">
      <div class="mb-3">
        <label for="nama" class="form-label">Nama Pemesanan</label>
        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama lengkap" required>
      </div>
      
      <div class="mb-3">
        <label for="no_hp" class="form-label">Nomor Hp/Telp</label>
        <input type="no_hp" class="form-control" id="no_hp" name="no_hp" placeholder="Masukkan Nomor HP aktif" required>
      </div>
      
      <div class="mb-3">
        <label for="tanggal_pesan" class="form-label">Tanggal Pesan</label>
        <input type="date" class="form-control" id="tanggal_pesan" name="tanggal_pesan" required>
      </div>

      <div class="mb-3">
        <label for="waktu_perjalanan" class="form-label">Waktu Pelaksanaan Perjalanan</label>
        <input type="text" id="lama" class="form-control" name="waktu_perjalanan" required>
      </div>
      <div class="mb-4">
        <label class="form-label">Pelayanan Paket Perjalanan:</label>

        <?php 
        $arrPelayanan = [
          array(
            'label' => 'Penginapan (Rp 1.000.000)'
            , 'value' => '1000000'
            , 'id' => 'penginapan'
          ), 
          array(
            'label' => 'Transportasi (Rp 1.200.000)'
            , 'value' => '1200000'
            , 'id' => 'transportasi'
          ), 
          array(
            'label' => 'Servis/Makan (Rp 500.000)'
            , 'value' => '500000'
            , 'id' => 'makan'
          ), 

        ];

        foreach ($arrPelayanan as $pelayanan) {

          $id = $pelayanan["id"]; 
          $value = $pelayanan["value"]; 
          $label = $pelayanan["label"]; 

          echo '
          <div class="mb-0 me-2">
          <label class="form-check-label" for="penginapan">'.$label.'</label>
          <input class="form-check-input layanan" type="checkbox" value="'.$value.'" id="'.$id.'" name="layanan['.$id.']">
          </div>
          ';
        }

        ?>

      </div>

      <div class="mb-3">
        <label for="jumlah" class="form-label">Jumlah Peserta</label>
        <input type="number" id="jumlahPeserta" class="form-control" name="jumlah_peserta" min="1" placeholder="Masukkan jumlah peserta" required>
      </div>

      <div class="mb-3">
        <label for="hargaPaket" class="form-label">Harga Paket Perjalanan</label>
        <input type="text" readonly id="harga_paket" name="harga_paket" class="form-control" min="1" required>
      </div>

      <div class="mb-3">
        <label for="jumlah" class="form-label">Jumlah Tagihan</label>
        <input type="text" readonly class="form-control" id="jumlah_tagihan" name="jumlah_tagihan" min="1" required>
      </div>


      <button type="submit" name="simpan" value="simpan" id="btnSimpan" class="btn btn-primary" disabled>Simpan</button>
      <button type="button" id="hitungBtn" class="btn btn-primary">Hitung</button>
      <button type="reset" class="btn btn-danger">Reset</button>
    </form>
  </div>

  <script>

    function cekIsiField() {
      const hargaPaket = $('#harga_paket').val();
      const jumlahTagihan = $('#jumlah_tagihan').val();

      if (hargaPaket.trim() !== '' && jumlahTagihan.trim() !== '') {
        $('#btnSimpan').prop('disabled', false);
      } else {
        $('#btnSimpan').prop('disabled', true);
      }
    }

    $(document).ready(function () {
      cekIsiField();
    });

    $('#hitungBtn').click(function () {
      let totalLayanan = 0;
      $('.layanan:checked').each(function () {
        totalLayanan += parseInt($(this).val());
      });

      $('#harga_paket').val(totalLayanan.toLocaleString('id-ID'));

      let peserta = parseInt($('#jumlahPeserta').val()) || 1;
      let lama = parseInt($('#lama').val()) || 1;
      let totalTagihan = totalLayanan * peserta * lama;
      $('#jumlah_tagihan').val(totalTagihan.toLocaleString('id-ID'));
      cekIsiField();
    });
  </script>
  <br />

  <?php
  if(isset($_POST['simpan'])) {
    $nama             = $_POST['nama'];
    $no_hp            = $_POST['no_hp'];
    $tanggal_pesan    = $_POST['tanggal_pesan'];
    $waktu_perjalanan = $_POST['waktu_perjalanan'];
    $layanan          = $_POST['layanan'];
    $jumlah_peserta   = $_POST['jumlah_peserta'];
    $harga_paket      = str_replace('.', '', $_POST['harga_paket']);
    $jumlah_tagihan   = str_replace('.', '',$_POST['jumlah_tagihan']);
    $arrParams = array($nama, $no_hp, $tanggal_pesan, $waktu_perjalanan, $layanan, $jumlah_peserta, $harga_paket, $jumlah_tagihan);
    $result = $pesan -> Add($arrParams);

    if($result){
      echo"<script>
        alert('Data Berhasil Disimpan');
        document.location= './';
      </script>
    ";
    }else{
      echo"<script>
        alert('Data Gagal Disimpan');
        window.history.back();
      </script>
      ";
    }
  }
?>


 