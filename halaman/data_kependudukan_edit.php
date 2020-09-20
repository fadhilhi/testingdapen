<?php
        include 'konfig/koneksi.php';
        // ambil data dari id yang dipilih dan cocokan, jika ada maka tampilkan
        if (isset($_GET['id'])) 
        {
            $id = $_GET['id'];
            $query = $conn->query("SELECT * FROM data_penduduk JOIN hubungan_keluarga ON data_penduduk.id_stat_hbkel = hubungan_keluarga.id_stat_hbkel WHERE nik = '".$id."'");
            $row = $query->fetch_assoc();
        }else {
          // jika tidak ada atau belum memilih data maka munculkan notifikasi dan alihkan ke halaman sebelumnya
                echo "<script>
                        alert(' Anda Belum Memilih Data !');
                        history.go(-1);</script>";              
            }
?>
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

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Kependudukan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             <!-- form edit referensi -->
              <form class="form-horizontal" method="POST" action="?menu=data_kependudukan_edit&id=<?php echo $id ?>" enctype="multipart/form-data">
                <div class="card-body">

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nomor KK</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nokk" value="<?php echo $row["no_kk"] ?>" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">NIK</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nik" value="<?php echo $row["nik"] ?>" required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nama" value="<?php echo $row["nama_lengkap"] ?>" required>
                    </div>
                  </div>

                  <div class="form-group">
                  <label class="col-sm-2 col-control-label">Hubungan Keluarga</label>
                  <div class="col-sm-10">
                  <select class="form-control" name="hubkel" required>
                    <option value="<?php echo $row["id_stat_hbkel"] ?>"><?php echo $row["stat_hbkel"] ?></option>
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

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nomor RT</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nort" value="<?php echo $row["no_rt"] ?>" required>
                    </div>
                  </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info" name="rubah">Save</button>
                  <a href=?menu=data_kependudukan class="btn btn-default float-right">Cancel</a>
                </div>
                <!-- /.card-footer -->
              </form>

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