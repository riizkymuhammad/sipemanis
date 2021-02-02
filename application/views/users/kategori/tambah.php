
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
                  <form class="form-horizontal" action="" data-parsley-validate="true" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                  <label>Kategori</label>
                  <input type="text" name="nama_kategori" class="form-control" value="" placeholder="Nama Kategori" required autofocus onfocus="this.value = this.value;">
                    </div> 
                  </div>
                  <div class="card-footer text-right">
                    <a href="<?php echo $link1; ?>/<?php echo $link2; ?>.html" class="btn btn-danger mr-1" type="reset">Kembali</a>
                    <button type="submit" name="btnsimpan" class="btn btn-primary" style="float:right;">Simpan</button>
                  </div>
                  </form>
                </div>                             
              </div>
            </div>
          </div>
    </section>
    </div>
