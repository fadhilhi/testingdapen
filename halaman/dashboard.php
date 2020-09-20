<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li class="active">Dashboard</li>
      </ol>
    </section>
 <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        
        <!-- Hitung Jumlah Penduduk -->
          <?php 
          include './konfig/koneksi.php';
          $query=$conn->query("SELECT Count(*) As jumlah FROM data_penduduk");
          $data = $query->fetch_assoc();
          $penduduk = $data['jumlah'];
          ?>

        <!-- Tampilkan Jumlah Penduduk -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo "$penduduk"; ?></h3>

              <p>Data Penduduk</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href=?menu=data_kependudukan class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->