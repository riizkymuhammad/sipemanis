

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
                      <th valign="top" width="160">Nama Pelapor</th>
                      <th valign="top" width="1">:</th>
                      <td><?php echo $this->Mcrud->d_pelapor($query->user,'nama_pelapor'); ?></td>
                    </tr>
                     <tr>
                      <th valign="top" width="160">NIP/NIK/NID/NIM</th>
                      <th valign="top" width="1">:</th>
                      <td><?php echo $this->Mcrud->d_pelapor($query->user,'user_login'); ?></td>
                    </tr>
                    <tr>
                      <th valign="top" width="160">Level</th>
                      <th valign="top" width="1">:</th>
                      <td><?php echo $this->Mcrud->d_pelapor($query->user,'level_name'); ?></td>
                    </tr>
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
                      <th valign="top">Pengaduan Waktu</th>
                      <th valign="top">:</th>
                      <td><?php echo $this->Mcrud->tgl_id(date('d-m-Y H:i:s', strtotime($query->tgl_pengaduan)),'full'); ?></td>
                    </tr>
                    <tr>
                      <th valign="top">Waktu Konfirmasi</th>
                      <th valign="top">:</th>
                      <td><?php  $cek = $this->Mcrud->tgl_id(date('d-m-Y H:i:s', strtotime($query->tgl_konfirmasi)),'full');
                      
                      if($cek == null ){
                        echo $cek;
                      }
                        else{
                          echo "Belum di Konfirmasi";
                        }
                      
                       ?></td>
                    </tr>
                     <tr>
                      <th valign="top">Waktu Penyelesaian</th>
                      <th valign="top">:</th>
                      <td><?php $cek= $this->Mcrud->tgl_id(date('d-m-Y H:i:s', strtotime($query->tgl_selesai)),'full');
                      if($cek == null ){
                        echo $cek;
                      }
                        else{
                          echo "Belum di Selesaikan";
                        }
                       ?></td>
                      
                    </tr>

                    <tr>
                      <th valign="top">Permasalahan</th>
                      <th valign="top">:</th>
                      <td><?php echo $query->isi_pengaduan; ?></td>
                    </tr>
                    <tr>
                      <th valign="top">Keterangan</th>
                      <th valign="top">:</th>
                      <td><?php echo $query->ket_pengaduan; ?></td>
                    </tr>
                    <tr>
                      <th valign="top" width="160">Attachment</th>
                      <th valign="top">:</th>
                      <td><?php echo $query->pesan_petugas; ?></td>
                    </tr>
                    <tr>
                      <th valign="top">File Attachment</th>
                      <th valign="top">:</th>
                      <td>
                        <a href="<?php echo $query->file_petugas; ?>" target="_blank"><?php echo $query->file_petugas; ?></a>
                      </td>
                    </tr>
                    <tr>
                      <th valign="top">File Pendukung</th>
                      <th valign="top">:</th>
                      <td>
                        <a href="<?php echo $query->bukti; ?>" target="_blank"><?php echo $query->bukti; ?></a>
                      </td>
                    </tr>
                    <tr>
                      <th valign="top">Status</th>
                      <th valign="top">:</th>
                      <td><?php echo $this->Mcrud->cek_status($query->status); ?></td>
                    </tr>
                                </tbody>
                      </table>
                    </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </section>
    </div>