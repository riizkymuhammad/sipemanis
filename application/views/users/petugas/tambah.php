    
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
                <div class="card">
                  <div class="card-header">
                    <h4><?php echo $judul_web; ?></h4>
                  </div>
                  <div class="card-body">
                  <form class="form-horizontal" action="" data-parsley-validate="true" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                  <label>Nama</label>
                  <input type="text" name="nama" class="form-control" value="" placeholder="Nama" required autofocus onfocus="this.value = this.value;">
                    </div> 
                    <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <div class="radio radio-css radio-inline radio-primary">
                        <input type="radio" name="jk" id="jk_1" value="Laki-Laki" required>
                        <label for="jk_1">
                          Laki-Laki
                        </label>
                      </div>
                      <div class="radio radio-css radio-inline radio-primary">
                        <input type="radio" name="jk" id="jk_2" value="Perempuan" required>
                        <label for="jk_2">
                          Perempuan
                        </label>
                      </div>
                    </div> 
                    <div class="form-group">
                    <label>Alamat</label>
                  <input type="text" name="alamat" class="form-control" value="" placeholder="Masukkan Alamat" required autofocus onfocus="this.value = this.value;">
                    </div>
                    <div class="form-group">
                    <label>No. Telp</label>
                  <input type="text" name="no_telp" class="form-control" value="" placeholder="Masukkan No. Telp" required autofocus onfocus="this.value = this.value;">
                    </div> 
                    <div class="form-group">
                    <label>Email</label>
                  <input type="text" name="email" class="form-control" value="" placeholder="Masukkan Email" required autofocus onfocus="this.value = this.value;">
                    </div> 
                    <div class="form-group">
                    <label>Username</label>
                  <input type="text" name="username" class="form-control" value="" placeholder="Masukkan Username" required autofocus onfocus="this.value = this.value;">
                    </div> 
                    <div class="form-group">
                    <label>Password</label>
                  <input type="text" name="password" class="form-control" value="" placeholder="Masukkan Password" required autofocus onfocus="this.value = this.value;">
                    </div> 
                    <div class="form-group">
                    <label>Konfirmasi Password</label>
                  <input type="text" name="password2" class="form-control" value="" placeholder="Masukkan Konfirmasi Password" required autofocus onfocus="this.value = this.value;">
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
          </div>
    </section>
    </div>


    