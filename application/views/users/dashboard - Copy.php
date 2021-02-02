<?php
$cek    = $user1->row();
$level  = $cek->level_name;?>
<!-- begin #content -->
<div id="content" class="content">
  <!-- begin breadcrumb -->
  <ol class="breadcrumb pull-right">
    <li class="active">Dashboard</li>
  </ol>
  <!-- end breadcrumb -->
  <!-- begin page-header -->
  <h1 class="page-header">Dashboard <small> <?php echo ucwords($cek->level_name);?></small></h1>
  <!-- end page-header -->
  <!-- begin row -->
  <!-- <div class="row">
    <div class="col-md-12">
        <div class="widget widget-stats bg-white text-inverse">
            <div class="stats-icon stats-icon-lg stats-icon-square bg-gradient-black"><i class="fa fa-file"></i></div>
            <div class="stats-title"><?php echo $this->Mcrud->judul_web(); ?></div>
            <div class="stats-number">Selamat Datang <?php echo ucwords($cek->nama_lengkap); ?></div>
            <div class="stats-progress progress">
                      <div class="progress-bar" style="width: 70.1%;"></div>
            </div>
                  <div class="stats-desc">Better than last week (70.1%)</div>
        </div>
    </div>
  </div> -->
  <!-- end row -->

  <div class="row">
    <!-- begin col-12 -->
    <?php if ($level!='user'): ?>
    <div class="col-md-3">
        <div class="widget widget-stats bg-info text-inverse">
            <div class="stats-icon stats-icon-lg stats-icon-square bg-gradient-black">
              <i class="fa fa-user"></i>
            </div>
            <div class="stats-title">Jumlah User</div>
            <div class="stats-number">
              <?php echo number_format($this->db->get_where('tbl_user', array('level'=>'user'))->num_rows(),0,",","."); ?>
            </div>
            <div class="stats-progress progress">
                <div class="progress-bar" style="width: 70.1%;"></div>
            </div>
                  <!-- <div class="stats-desc">Better than last week (70.1%)</div> -->
        </div>
    </div>
    <?php endif; ?>
    <div class="col-md-<?php if($level=='user'){echo "4";}else{echo "3";}?>">
        <div class="widget widget-stats bg-orange text-inverse">
            <div class="stats-icon stats-icon-lg stats-icon-square bg-gradient-black">
              <i class="fa fa-clipboard"></i>
            </div>
            <div class="stats-title">Pengaduan Belum Terkonfirmasi</div>
            <div class="stats-number">
              <?php
              if($level=='user'){
                $this->db->where('user',$cek->id_user);
              }
              echo number_format($this->db->get_where('tbl_pengaduan', array('status'=>'proses'))->num_rows(),0,",","."); ?>
            </div>
            <div class="stats-progress progress">
                <div class="progress-bar" style="width: 70.1%;"></div>
            </div>
                  <!-- <div class="stats-desc">Better than last week (70.1%)</div> -->
        </div>
    </div>
    <div class="col-md-<?php if($level=='user'){echo "4";}else{echo "3";}?>">
        <div class="widget widget-stats bg-blue text-inverse">
            <div class="stats-icon stats-icon-lg stats-icon-square bg-gradient-black">
              <i class="fa fa-check"></i>
            </div>
            <div class="stats-title">Pengaduan Terkonfirmasi</div>
            <div class="stats-number">
              <?php
              if($level=='user'){
                $this->db->where('user',$cek->id_user);
              }
              echo number_format($this->db->get_where('tbl_pengaduan', array('status'=>'konfirmasi'))->num_rows(),0,",","."); ?>
            </div>
            <div class="stats-progress progress">
                <div class="progress-bar" style="width: 70.1%;"></div>
            </div>
                  <!-- <div class="stats-desc">Better than last week (70.1%)</div> -->
        </div>
    </div>
    <div class="col-md-<?php if($level=='user'){echo "4";}else{echo "3";}?>">
        <div class="widget widget-stats bg-green text-inverse">
            <div class="stats-icon stats-icon-lg stats-icon-square bg-gradient-black">
              <i class="fa fa-check-square-o"></i>
            </div>
            <div class="stats-title">Pengaduan Terselesaikan</div>
            <div class="stats-number">
              <?php
              if($level=='user'){
                $this->db->where('user',$cek->id_user);
              }
              echo number_format($this->db->get_where('tbl_pengaduan', array('status'=>'selesai'))->num_rows(),0,",","."); ?>
            </div>
            <div class="stats-progress progress">
                <div class="progress-bar" style="width: 70.1%;"></div>
            </div>
                  <!-- <div class="stats-desc">Better than last week (70.1%)</div> -->
        </div>
    </div>
  </div>

</div>
<!-- end #content -->
