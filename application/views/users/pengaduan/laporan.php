

<?php $this->load->view('users/pengaduan/modal_konfirm'); ?>


<?php
$link1 = strtolower($this->uri->segment(1));
$link2 = strtolower($this->uri->segment(2));
$link3 = strtolower($this->uri->segment(3));
$link4 = strtolower($this->uri->segment(4));
?>

<!-- begin #content -->

    <!-- end #content -->

<div class="main-content">
<section class="section">
<div class="section-header">
        <h1><?php echo $judul_web ?></h1>
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
                <div class="table-responsive">
                  <table class="table table-sm">
                    
                    <tbody>
                   
                <tr>
                  <th valign="top">Kategori Pelapor</th>
                  <th valign="top">:</th>
                  <td><?php echo $this->Mcrud->d_pelapor($query->id_kategori,'kategori'); ?></td>
                </tr>
                <tr>
                  <th valign="top">Sub Kategori Pelapor</th>
                  <th valign="top">:</th>
                  <td><?php echo $this->Mcrud->d_pelapor($query->id_sub_kategori,'sub_kategori'); ?></td>
                </tr>
                <tr>
                  <th valign="top" width="160">Hasil Laporan Petugas</th>
                  <th valign="top">:</th>
                  <td><?php echo $query->pesan_petugas; ?></td>
                </tr>
                <tr>
                  <th valign="top">Berkas Pendukung</th>
                  <th valign="top">:</th>
                  <td>
                    <a href="<?php echo $query->file_petugas; ?>" target="_blank"><?php echo $query->file_petugas; ?></a>
                  </td>
                </tr>
                <tr>
                  <th valign="top">Status</th>
                  <th valign="top">:</th>
                  <td><?php if($query->status == 'proses') {?>
                        <span class="badge badge-light"><?php echo $this->Mcrud->cek_status($query->status); ?></span>
                      <?php } elseif ($query->status == 'konfirmasi'){ ?>
                        <span class="badge badge-info"><?php echo $this->Mcrud->cek_status($query->status); ?></span>
                      <?php } elseif ($query->status == 'selesai'){ ?>
                        <span class="badge badge-success"><?php echo $this->Mcrud->cek_status($query->status); ?></span>
                      <?php } elseif ($query->status == 'konfirmasi'){ ?>
                        <span class="badge badge-success"><?php echo $this->Mcrud->cek_status($query->status); ?></span>
                      <?php } elseif ($query->status == 'ditolak'){ ?>
                        <span class="badge badge-danger"><?php echo $this->Mcrud->cek_status($query->status); ?></span>
                        <?php } ?></td>
                </tr>
                            </tbody>
                  </table>
                </div>
                </div>
                <div class="card-footer text-right">
                    <a href="pengaduan/v.html" class="btn btn-primary"><i><</i> Kembali</a>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</section>
</div>