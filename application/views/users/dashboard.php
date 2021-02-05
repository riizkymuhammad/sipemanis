<?php
$cek    = $user->row();
//$level  = $cek->level;
$level = $this->session->userdata('status');
$data_id = $this->session->userdata('data_id');

?>

<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Dashboard</h1>
          </div>
          <div class="row">

          <?php if ($level=='user'): ?>
              <div class="col-12 mb-3">
                <div class="hero bg-template text-white">
                  <div class="hero-inner">
                    <h2>Selamat Datang di SIPEMANIS</h2>
                    <p class="lead">Silahkan masukkan laporan dengan klik tombol dibawah ini</p>
                    <div class="mt-4">
                      <a href="pengaduan/v.html" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="fa fa-list-alt"></i> Lapor Pengaduan</a>
                    </div>
                  </div>
                </div>
              </div>
            <?php endif; ?>

            <a href="pengaduan/v.html" class="col-lg-<?php if($level=='superadmin'){echo "3";}else{echo "4";}?> col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Pengaduan Belum Terkonfirmasi</h4>
                  </div>
                  <div class="card-body">
                  <?php
              if($level=='user'){
                $this->db->where('user',$data_id);
              }
              echo number_format($this->db->get_where('tbl_pengaduan', array('status'=>'proses'))->num_rows(),0,",","."); ?>
                  </div>
                </div>
              </div>
            </a>
            <a href="pengaduan/v.html" class="col-lg-<?php if($level=='superadmin'){echo "3";}else{echo "4";}?> col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="far fa-file"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Pengaduan Terkonfirmasi</h4>
                  </div>
                  <div class="card-body">
                  <?php

if($level=='user'){
  $this->db->where('user',$data_id);
}
echo number_format($this->db->get_where('tbl_pengaduan', array('status'=>'konfirmasi'))->num_rows(),0,",","."); ?>
                  </div>
                </div>
              </div>
              </a>
            <a href="pengaduan/v.html" class="col-lg-<?php if($level=='superadmin'){echo "3";}else{echo "4";}?> col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="fas fa-circle"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Pengaduan Terselesaikan</h4>
                  </div>
                  <div class="card-body">
                  <?php
              if($level=='user'){
                $this->db->where('user',$data_id);
              }
              echo number_format($this->db->get_where('tbl_pengaduan', array('status'=>'selesai'))->num_rows(),0,",","."); ?>
                  </div>
                </div>
              </div>
            </a>

            <?php if ($level==='superadmin'): ?>
              <div class="col-lg-<?php if($level=='superadmin'){echo "3";}else{echo "4";}?> col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="fas fa-circle"></i>
                </div>
                
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Pengaduan di Tolak</h4>
                  </div>
                  <div class="card-body">
                  <?php
              echo number_format($this->db->get_where('tbl_pengaduan', array('status'=>'ditolak'))->num_rows(),0,",","."); ?>
                  </div>
                </div>
              </div>
            </div>
            <?php endif; ?>


          </div>
        </section>
</div>