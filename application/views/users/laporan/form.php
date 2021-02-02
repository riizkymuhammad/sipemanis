
			<?php
$link1 = strtolower($this->uri->segment(1));
$link2 = strtolower($this->uri->segment(2));
$link3 = strtolower($this->uri->segment(3));
$link4 = strtolower($this->uri->segment(4));
?>

    <div class="main-content">
    <section class="section">
    <div class="section-header">
            <h1>Kategori</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="dashboard.html">Dashboard</a></div>
              <div class="breadcrumb-item"><?php echo $judul_web; ?></div>
            </div>
          </div>
    <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-6 col-lg-12">  
              <?php
                echo $this->session->flashdata('msg');
              ?>       
                <div class="card">
                  <div class="card-header">
                    <h4><?php echo $judul_web; ?></h4>
                  </div>
                  <div class="card-body">
                  <form method="post" action=<?php echo site_url('cetak/xls');?> >
				  <div class="row">
                  <div class="form-group col-sm-6">
                  <label>Dari Tanggal</label>
                  <input type="text" name="from" class="form-control" value="<?php echo date('Y-m-d'); ?>">
                    </div> 

					<div class="form-group col-sm-6">
                  <label>Sampai Tanggal</label>
                  <input type="text" name="to" class="form-control" value="<?php echo date('Y-m-d'); ?>">
                    </div> 
                  </div>
                  <div class="card-footer text-right">
				  <button type="submit" class="btn btn-primary" style='margin-left: 0px;'>Unduh</button>
                  </div>
                  </form>
                </div>                             
              </div>
            </div>
          </div>
    </section>
    </div>


