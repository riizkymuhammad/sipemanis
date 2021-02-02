
    <?php
$link1 = strtolower($this->uri->segment(1));
$link2 = strtolower($this->uri->segment(2));
$link3 = strtolower($this->uri->segment(3));
$link4 = strtolower($this->uri->segment(4));
?>

    <div class="main-content">
    <section class="section">
    <div class="section-header">
            <h1><?php echo $judul_web; ?></h1>
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
                    <label class="control-label col-lg-12">Pilih Kategori Pelaporan</label>
                    <div class="col-lg-12">
                      <select class="form-control default-select2" name="id_kategori" required onchange="window.location.href='pengaduan/v/t/'+this.value;">
                        <option value="">- Pilih -</option>
                        <?php
                                      $this->db->order_by('nama_kategori','ASC');
                        $v_kategori = $this->db->get('tbl_kategori');
                        foreach ($v_kategori->result() as $key => $value): ?>
                          <option value="<?php echo $value->id_kategori; ?>" <?php if($value->id_kategori==$link4){echo "selected";} ?>><?php echo ucwords($value->nama_kategori); ?></option>
                        <?php
                        endforeach; ?>
                      </select>
                    </div>
                  </div>

                  <?php if ($link4!=''): ?>
                    <style>
                      #wajib_isi{color:red;}
                    </style>
                    <div class="alert alert-success">
											<strong>Note :</strong> Silahkan isi laporan pengaduan dengan singkat dan jelas
										</div>
                    <br>
                  <div class="form-group">
                    <label class="col-lg-12">Pilih Sub Kategori yang ingin dilapor<b id='wajib_isi'>*</b></label>
                    <div class="col-lg-12">
                      <select class="form-control default-select2" name="id_sub_kategori" required>
                        <option value="">- Pilih -</option>
                        <?php
                                      $this->db->order_by('nama_sub_kategori','ASC');
                        $v_sub_kategori = $this->db->get_where('tbl_sub_kategori', array('id_kategori'=>$link4));
                        foreach ($v_sub_kategori->result() as $key => $value): ?>
                          <option value="<?php echo $value->id_sub_kategori; ?>"><?php echo ucwords($value->nama_sub_kategori); ?></option>
                        <?php
                        endforeach; ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-12">Detail Masalah ?<b id='wajib_isi'>*</b></label>
                    <div class="col-lg-12">
                      <textarea name="ket_pengaduan" class="form-control" placeholder="Detail Masalah" required></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-12">Bukti<b id='wajib_isi'>*</b></label>
                    <div class="col-lg-12">
                      <input type="file" name="bukti" class="form-control" required>
                    </div>
                  </div>
                  <?php endif; ?>


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
