    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data
        <small>Kependudukan</small>
      </h1>
      <ol class="breadcrumb">
        <li class="active">Data Kependudukan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <!-- Tombol untuk tambah data -->
          <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">Tambah Data</button>

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Kependudukan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- tabel tampil data penduduk -->
              <table id="example1" class="table table-bordered table-striped">

                <thead>
                <tr>
                  <th>No KK</th>
                  <th>NIK</th>
                  <th>Nama</th>
                  <th>Jenis Kelamin</th>
                  <th>Tanggal Lahir</th>
                  <th>Umur</th>
                  <th>Hubungan Keluarga</th>
                  <th>No RT</th>
                  <th>Aksi</th>
                </tr>
                </thead>

                <tbody>
                <?php 
                include './konfig/koneksi.php';
                $query=$conn->query("SELECT * FROM data_penduduk JOIN hubungan_keluarga ON data_penduduk.id_stat_hbkel = hubungan_keluarga.id_stat_hbkel");
                while ($data = $query->fetch_object()){

                  echo '<tr>';
                  echo '<td>'.$data->no_kk.'</td>';
                  echo '<td>'.$data->nik.'</td>';

                  // jika status hubungan keluarga bukan kepala keluarga maka tidak ada perubahan warna pada nama
                  if ($data->id_stat_hbkel != 1) {
                    echo '<td>'.$data->nama_lengkap.'</td>';
                  }else{
                    echo '<td style="color: red;">'.$data->nama_lengkap.'</td>';
                  }

                  // menentukan jenis kelamin dengan angka jika angka 3 kebawah adalah Laki - laki dan angka 4 keatas adalah Perempuan
                  $ambil_jenis_kelamin = substr($data->nik, 6,1);
                  if ($ambil_jenis_kelamin <= 3) {
                    echo '<td>'."Laki - Laki".'</td>';
                  }elseif ($ambil_jenis_kelamin >= 4) {
                    echo '<td>'."Perempuan".'</td>';
                  }

                  // mencari tanggal lahir 
                  $ambil_tanggal_lahir = substr($data->nik, 6,6);
                  if ($ambil_jenis_kelamin <= 3) {
                    // $todate = date('d-m-Y',$ambil_tanggal_lahir);
                    echo '<td>'.$ambil_tanggal_lahir.'</td>'; 
                  }elseif ($ambil_jenis_kelamin >= 4) {
                    $jadi = $ambil_tanggal_lahir - 400000;
                    echo '<td>'.$jadi.'</td>'; 
                  }

                  // menghitung umur pada saat ini
                  $ambil_tanggal = date('Y');
                  $ambil_tahun = substr($ambil_tanggal, 2,2);
                  $ambil_tahun_lahir = substr($data->nik, 10,2);
                  $hitung = abs($ambil_tahun - $ambil_tahun_lahir);

                  echo '<td>'.$hitung.'</td>';
                  echo '<td>'.$data->stat_hbkel.'</td>';
                  echo '<td>'.$data->no_rt.'</td>';
                  echo '<td>
                    <a href="?menu=data_kependudukan_edit_halaman&id='.$data->nik.'"><div class="btn btn-primary"><i class="fa fa-edit"></i></div></a>
                          <a href="?menu=data_kependudukan_hapus&id='.$data->nik.'"><div class="btn btn-danger"><i class="fa fa-trash"></i></div></a>
                    </td>';
                  echo '</tr>';
                }
                 ?>
                </tbody>

                <tfoot>
                <tr>
                  <th>No KK</th>
                  <th>NIK</th>
                  <th>Nama</th>
                  <th>Jenis Kelamin</th>
                  <th>Tanggal Lahir</th>
                  <th>Umur</th>
                  <th>Hubungan Keluarga</th>
                  <th>No RT</th>
                  <th>Aksi</th>
                </tr>
                </tfoot>

              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

    <!-- Modal -->
    <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Form Tambah Data Kependudukan</h4>
              </div>
              <div class="modal-body">
                <!-- form tambah data penduduk -->
            <form method="POST" class="form-horizontal"  action="./proses/data_kependudukan_tambah.php" enctype="multipart/form-data">
              <div class="box-body">

                <div class="form-group">
                  <label class="col-sm-2 control-label">No KK</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" maxlength="16" name="nokk" required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">NIK</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" maxlength="16" name="nik" required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Nama Lengkap</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama" required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Hubungan Keluarga</label>
                  <div class="col-sm-10">
                    <!-- tampilkan data tabel dari hubungan keluarga -->
                  <select class="form-control" name="hubkel" required>
                    <?php $query = $conn->query("SELECT * FROM hubungan_keluarga");
                    $k=1;
                    foreach ($query as $a) {
                      echo "
                      <option value=".$a['id_stat_hbkel'].">".$a['stat_hbkel']."</option>
                      ";
                    }
                    ?> 
                  </select>
                </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">No RT</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="nort" required>
                  </div>
                </div>

              </div>
              <!-- /.box-body -->
            
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
              </div>
              </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->