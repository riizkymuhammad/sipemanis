
<?php
$userdata = $this->session->userdata('username');
$userid = $this->session->userdata('data_id');
//$this->load->model('mcrud');
$level = $this->session->userdata('status');
$foto = "img/user/user-default.jpg";
//$get_data = $this->mcrud->cek_data($userdata)->result_array();
/*
$cek    = $get_data->row();
$nama   = $cek->nama_lengkap;
$username   = $cek->username;

$level  = $cek->level;
$foto = "img/user/user-default.jpg";
if ($level=='user') {
	$d_k = $this->db->get_where('tbl_data_user', array('id_user'=>$cek->id_user))->row();
	$foto_k = $d_k->foto;
	if ($foto_k!='') {
		if(file_exists("$foto_k")){
			$foto = $foto_k;
		}
	}
}
*/
$menu 		= strtolower($this->uri->segment(1));
$sub_menu = strtolower($this->uri->segment(2));
$sub_menu3 = strtolower($this->uri->segment(3));
$nama = $this->session->userdata('name'); 
$this->db->order_by('id_notif','DESC');
$this->db->where('hapus_notif',null);

$notif = $this->db->get_where('tbl_notif', array('penerima'=>$userid));

?>




		<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title><?= $judul_web; ?></title>
  <link rel="shortcut icon" href="assets/favicon.png" type="image/x-icon" />
  <base href="<?php echo base_url();?>"/>


  <!-- General CSS Files -->

  <link rel="stylesheet" href="assets/assets/css/datatables.min.css">
  <link rel="stylesheet" href="assets/assets/css/bootstrap.min2.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/assets/css/style.css">
  <link rel="stylesheet" href="assets/assets/css/components2.css">
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
       
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i><span class="badge badge-notif" id="jml_notif_bell">0</span> </a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
              <div class="dropdown-header">Notifikasi
                <div class="float-right">
                  <a href="web/notif/h_all">Tandai Telah dibaca</a>
                </div>
              </div>
              <div class="dropdown-list-content dropdown-list-icons">
              <?php
                foreach ($notif->result() as $notif):
							?>
                <a href="pengaduan/v.html" class="dropdown-item">
                <figure class="avatar mr-2 avatar-sm bg-success text-white" data-initial="<?php echo $this->Mcrud->d_pelapor($notif->pengirim,'nama_pelapor')[0] ?>"></figure>
                  <div class="dropdown-item-desc">
                  
                  <?php echo $this->Mcrud->d_pelapor($notif->pengirim,'nama_pelapor'); ?>
                    <div class="time"><?php echo $notif->pesan ?></div>
                  </div>
                </a>
                <?php endforeach; ?>
              </div>
              
              <div class="dropdown-footer text-center">
                <a href="web/notif.html">Lihat Semua <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li>
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
          <figure class="avatar mr-2 avatar-sm bg-primary text-white" data-initial="<?php echo $nama[0] ?>"></figure>
            <div class="d-sm-none d-lg-inline-block"><?php echo ucwords($nama); ?></div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-title"><?php echo strtolower($userdata); ?></div>
              <div class="dropdown-divider"></div>
              <a href="web/logout.html" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html"><img src="https://sipa2016.umrah.ac.id/assets/logo.png" width="30"> Sipemanis</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html"><img src="https://sipa2016.umrah.ac.id/assets/logo.png" width="30"></a>
          </div>
          <ul class="sidebar-menu">
              
              <li class="menu-header">Starter</li>
              <li><a class="<?php if($menu=='users' AND $sub_menu=='' or $menu=='dashboard'){echo " active";}else{echo "nav-link";} ?>" href="dashboard.html"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>
              <?php if ($level=='superadmin'): ?>
              <li><a class="<?php if($menu=='petugas'){echo "active";}else{echo "nav-link";} ?>" href="petugas/v.html"><i class="fas fa-users"></i> <span>Petugas</span></a></li>
              <?php endif; ?>
              <li><a class="<?php if($menu=='pengaduan' AND $sub_menu=='v'){echo "active";} else{echo "nav-link";} ?>" href="pengaduan/v.html"><i class="fas fa-list-alt"></i> <span>Pengaduan</span></a></li>
              <?php if ($level=='superadmin'): ?>
              <li class="nav-item dropdown">
                <a href="#" class="<?php if($menu=='kategori'){echo "nav-item dropdown active";}else{echo "nav-item dropdown";} ?> has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Kategori</span></a>
                <ul class="dropdown-menu">
                  <li><a class="<?php if($menu=='kategori' AND $sub_menu=='v'){echo "active";}else{echo "nav-link";} ?>" href="kategori/v.html">Kategori</a></li>
                  <li><a class="<?php if($menu=='kategori' AND $sub_menu=='sub'){echo "active";}else{echo "nav-link";} ?>" href="kategori/sub.html">Sub Kategori</a></li>
                </ul> 
              </li>
              <?php endif; ?>
              <?php if ($level=='superadmin'): ?>
              <li><a class="<?php if($menu=='cetak'){echo "active";} ?>" href="cetak/"><i class="fas fa-pencil-ruler"></i> <span>Cetak</span></a></li>
              <?php endif; ?>
            </ul>

            <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
              <a href="assets/Buku_Panduan_Penggunaan_bagi_USER_Aplikasi_SIPEMANIS.pdf" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-book"></i> Panduan Laporan
              </a>
            </div>
        </aside>
      </div>

      <!-- Main Content -->