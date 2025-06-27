<?php 
include "controllers/PesanController.php"; 
$pesan = new PesanController; 

?>

<div class="container mt-5">
    <h2 class="mb-4">Daftar Pesanan</h2>

    <div class="table-responsive">
      <table class="table table-striped table-bordered" id="editable">
        <thead>
        <tr>
          <th>Nama</th>
          <th>Phone</th>
          <th>Jumlah Peserta</th>
          <th>Jumlah Hari</th>
          <th>Akomodasi</th>
          <th>Transportasi</th>
          <th>Service/Makanan</th>
          <th>Harga Paket</th>
          <th>Total Tagihan</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          $result=$pesan->View();
          $no=1;
          while($row = $result->fetch_assoc()){

            $arrPelayanan = explode('|', $row['pelayanan']);

            if(in_array('penginapan', $arrPelayanan)){
              $isPenginapan = 'Y';
            }else{
              $isPenginapan = 'N';
            }

            if(in_array('transportasi', $arrPelayanan)){
              $isTransportasi = 'Y';
            }else{
              $isTransportasi = 'N';
            }

            if(in_array('makan', $arrPelayanan)){
              $isMakan = 'Y';
            }else{
              $isMakan = 'N';
            }

        ?>
        <tr>
          <td><?php echo $row['nama_pemesanan'];?></td>
          <td><?php echo $row['no_hp'];?></td>
          <td><?php echo $row['jumlah']?></td>
          <td><?php echo $row['waktu_pelaksanaan'];?></td>
          <td><?php echo $isPenginapan; ?></td>
          <td><?php echo $isTransportasi; ?></td>
          <td><?php echo $isMakan; ?></td>
          <td><?php echo $row['harga_paket'];?></td>
          <td><?php echo $row['jumlah_tagihan'];?></td>
          <td>
            <a href="#modaledit" data-bs-toggle="modal" data-bs-target="#modaledit" class="btn btn-primary btn-sm" onclick="
                document.getElementById('id').value = '<?php echo $row['id']; ?>';
                document.getElementById('nama').value = '<?php echo $row['nama_pemesanan']; ?>';
                document.getElementById('no_hp').value = '<?php echo $row['no_hp']; ?>';
                document.getElementById('tanggal_pesan').value = '<?php echo $row['tanggal']; ?>';
                document.getElementById('jumlahPeserta').value = '<?php echo $row['jumlah']; ?>';
                document.getElementById('waktu_pelaksanaan').value = '<?php echo $row['waktu_pelaksanaan']; ?>';
                document.getElementById('harga_paket').value = '<?php echo $row['harga_paket']; ?>';
                document.getElementById('jumlah_tagihan').value = '<?php echo $row['jumlah_tagihan']; ?>';
                document.getElementById('penginapan').checked = '<?php echo $isPenginapan == 'Y' ? true: false; ?>';
                document.getElementById('transportasi').checked = '<?php echo $isTransportasi == 'Y' ? true:false; ?>';
                document.getElementById('makan').checked = '<?php echo $isMakan == 'Y' ? true : false; ?>';
            " >Edit</a>
            <a href="controllers/PesanController.php?id=<?php echo $row['id'];?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?');" class="btn btn-danger btn-sm">Hapus</a>
          </td>
        </tr>
        <?php $no++ ;} ?> 
        <tbody>
      </table>
    </div>

  </div>


  <!--=================================================modal edit=====================================-->

  <!-- Modal -->
  <div class="modal fade" id="modaledit" tabindex="-1" aria-labelledby="contohModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <!-- Header -->
        <div class="modal-header">
          <h5 class="modal-title" id="contohModalLabel">Edit Pesanan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
        </div>

        <!-- Body -->
        <div class="modal-body">
          <div class="container">
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
                <label for="waktu_pelaksanaan" class="form-label">Waktu Pelaksanaan Perjalanan</label>
                <input type="text" id="waktu_pelaksanaan" class="form-control" name="waktu_pelaksanaan" required>
              </div>
              <div class="mb-4">
                <label class="form-label">Pelayanan Paket Perjalanan:</label>

                <div class="form-check d-flex justify-content-between">
                  <label class="form-check-label" for="penginapan">Penginapan (Rp 1.000.000)</label>
                  <input class="form-check-input layanan" type="checkbox" value="1000000" id="penginapan" name="layanan[penginapan]">
                </div>

                <div class="form-check d-flex justify-content-between">
                  <label class="form-check-label" for="transportasi">Transportasi (Rp 1.200.000)</label>
                  <input class="form-check-input layanan" type="checkbox" value="1200000" id="transportasi" name="layanan[transportasi]">
                </div>

                <div class="form-check d-flex justify-content-between">
                  <label class="form-check-label" for="makan">Servis/Makan (Rp 500.000)</label>
                  <input class="form-check-input layanan" type="checkbox" value="500000" id="makan" name="layanan[makan]">
                </div>
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
              <input type="hidden" id='id' name="id">
              <button type="button" id="hitungBtn" class="btn btn-primary">Hitung</button>
              <button type="reset" class="btn btn-danger">Reset</button>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </form>
          </div>
        </div>

      </div>
    </div>
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

  <?php
  if(isset($_POST['simpan'])) {
    $nama             = $_POST['nama'];
    $no_hp            = $_POST['no_hp'];
    $tanggal_pesan    = $_POST['tanggal_pesan'];
    $waktu_pelaksanaan = $_POST['waktu_pelaksanaan'];
    $layanan          = $_POST['layanan'];
    $jumlah_peserta   = $_POST['jumlah_peserta'];
    $harga_paket      = str_replace('.', '', $_POST['harga_paket']);
    $jumlah_tagihan   = str_replace('.', '',$_POST['jumlah_tagihan']);
    $id               = $_POST['id'];
    $arrParams = array($nama, $no_hp, $tanggal_pesan, $waktu_pelaksanaan, $layanan, $jumlah_peserta, $harga_paket, $jumlah_tagihan, $id);
    $result = $pesan -> Update($arrParams);

    if($result){
      echo"<script>
      alert('Data Berhasil Disimpan');
      document.location= '?hal=daftar_pesanan';
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
<!--===========================================================================================================-->


 