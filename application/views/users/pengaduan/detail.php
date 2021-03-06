

    <?php $this->load->view('users/pengaduan/modal_konfirm'); ?>


    <?php
$link1 = strtolower($this->uri->segment(1));
$link2 = strtolower($this->uri->segment(2));
$link3 = strtolower($this->uri->segment(3));
$link4 = strtolower($this->uri->segment(4));
$level 	= $this->session->userdata('status');
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
              <div class="col-12 col-md-6 col-lg-12 d-none d-lg-block">  
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
                      <th valign="top">Waktu Pengaduan</th>
                      <th valign="top">:</th>
                      <td><?php echo $this->Mcrud->tgl_id(date('d-m-Y H:i:s', strtotime($query->tgl_pengaduan)),'full'); ?></td>
                    </tr>
                    <tr>
                      <th valign="top">Waktu Konfirmasi</th>
                      <th valign="top">:</th>
                      <td><?php  $cek = $this->Mcrud->tgl_id(date('d-m-Y H:i:s', strtotime($query->tgl_konfirmasi)),'full');
                      
                      if($cek = $query->tgl_konfirmasi ){
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
                      <td><?php $selesai= $this->Mcrud->tgl_id(date('d-m-Y H:i:s', strtotime($query->tgl_selesai)),'full');
                     if($selesai = $query->tgl_selesai ){
                      echo $cek;
                      
                    }
                      else{
                        echo "Belum di Konfirmasi";
                        
                      }
                       ?></td>
                      
                    </tr>
                    <tr>
                      <th valign="top">Detail Permasalahan</th>
                      <th valign="top">:</th>
                      <td><?php echo $query->ket_pengaduan; ?></td>
                    </tr>
                    <?php if ($query->id_sub_kategori == '3' ){ ?>
                    <tr>
                      <th valign="top">Password Baru</th>
                      <th valign="top">:</th>
                      <td><?php echo $query->isi_pengaduan; ?></td>
                    </tr>
                    <?php }elseif ($query->id_sub_kategori == '8' ){ ?>
                    <tr>
                      <th valign="top">URL Website Error</th>
                      <th valign="top">:</th>
                      <td><?php echo $query->isi_pengaduan; ?></td>
                    </tr>
                    <?php } ?>
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
                      <td>
                      <?php if($query->status == 'proses') {?>
                        <span class="badge badge-warning"><?php echo $this->Mcrud->cek_status($query->status); ?></span>
                      <?php } elseif ($query->status == 'konfirmasi'){ ?>
                        <span class="badge badge-info"><?php echo $this->Mcrud->cek_status($query->status); ?></span>
                      <?php } elseif ($query->status == 'selesai'){ ?>
                        <span class="badge badge-success"><?php echo $this->Mcrud->cek_status($query->status); ?></span>
                      <?php } elseif ($query->status == 'konfirmasi'){ ?>
                        <span class="badge badge-success"><?php echo $this->Mcrud->cek_status($query->status); ?></span>
                      <?php } elseif ($query->status == 'ditolak'){ ?>
                        <span class="badge badge-danger"><?php echo $this->Mcrud->cek_status($query->status); ?></span>
                        <?php } ?>
                        </td>
                    </tr>
                                </tbody>
                      </table>
                    </div>
                    </div>
                  <div class="card-footer text-right">
                  <a href="pengaduan/v.html" class="btn btn-primary"><i><</i> Kembali</a>
                  <?php if ($level=='superadmin'){ ?>
                                          <?php if ($query->status=='proses'){ ?>
																						 <a href="javascript:;" class="btn btn-success" title="Konfirmasi" data-toggle="modal" onclick="modal_show(<?php echo $query->id_pengaduan; ?>);"><i class="fa fa-file"></i> Konfirmasi</a>
                                          <?php } ?>
                                          <?php }elseif ($level=='petugas'){ ?>
																					<?php //if ($baris->status=='konfirmasi'){ ?>
																						 <a class="btn btn-icon icon-left btn-success" title="Edit" data-toggle="modal" onclick="modal_show(<?php echo $query->id_pengaduan; ?>);"><i class="far fa-edit"></i> Konfirmasi Lapooran</a>
																					<?php } ?>

                  </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-12 col-md-6 col-lg-12 d-lg-none">  
              <?php
                echo $this->session->flashdata('msg');
              ?>
                <div class="card">        
                                  
                    <div class="card-header">
                      <h4><?php echo $judul_web; ?></h4>
                    </div> 
                    <div class="card-body">
                    <b>Nama Pelapor</b>
                    <p><?php echo $this->Mcrud->d_pelapor($query->user,'nama_pelapor'); ?> </p>

                    <b>NIP/NIK/NID/NIM</b>
                    <p><?php echo $this->Mcrud->d_pelapor($query->user,'user_login'); ?></p>

                    <b>Level</b>
                    <p><?php echo $this->Mcrud->d_pelapor($query->user,'level_name'); ?></p>

                    <b>Kategori Pelapor</b>
                    <p><?php echo $this->Mcrud->d_pelapor($query->id_kategori,'kategori'); ?></p>

                    <b>Sub Kategori Pelapor</b>
                    <p><?php echo $this->Mcrud->d_pelapor($query->id_sub_kategori,'sub_kategori'); ?></p>

                    <b>Waktu Pengaduan</b>
                    <p><?php echo $this->Mcrud->tgl_id(date('d-m-Y H:i:s', strtotime($query->tgl_pengaduan)),'full'); ?></p>

                    <b>Waktu Konfirmasi</b>
                    <p><?php $cek= $this->Mcrud->tgl_id(date('d-m-Y H:i:s', strtotime($query->tgl_pengaduan)),'full');
                      if($cek = $query->tgl_konfirmasi ){
                        echo $cek;
                      
                        
                      }
                        else{
                          echo "Belum di Konfirmasi";
                        }
                    
                    ?></p>

                    <b>Waktu Penyelesaian</b>
                    <p><?php $selesai= $this->Mcrud->tgl_id(date('d-m-Y H:i:s', strtotime($query->tgl_selesai)),'full');
                      if($selesai = $query->tgl_selesai ){
                        echo $$selesai;
                      }
                        else{
                          echo "Belum di Selesaikan";
                        }
                       ?></p>

                    <b>Detail Permasalahan</b>
                    <p><?php echo $query->ket_pengaduan; ?></p>

                    <?php if ($query->id_sub_kategori == '3' ){ ?>
                    <b>Password Baru</b>
                    <p><?php echo $query->isi_pengaduan; ?></p>
                    <?php }elseif ($query->id_sub_kategori == '8' ){ ?>
                      <b>URL Website Error</b>
                    <p><?php echo $query->isi_pengaduan; ?></p>
                    <?php } ?>

                    <b>File Pendukung</b>
                    <p><a href="<?php echo $query->bukti; ?>" target="_blank"><?php echo $query->bukti; ?></a></p>

                    <b>Status</b>
                    <p><?php if($query->status == 'proses') {?>
                        <span class="badge badge-warning"><?php echo $this->Mcrud->cek_status($query->status); ?></span>
                      <?php } elseif ($query->status == 'konfirmasi'){ ?>
                        <span class="badge badge-info"><?php echo $this->Mcrud->cek_status($query->status); ?></span>
                      <?php } elseif ($query->status == 'selesai'){ ?>
                        <span class="badge badge-success"><?php echo $this->Mcrud->cek_status($query->status); ?></span>
                      <?php } elseif ($query->status == 'konfirmasi'){ ?>
                        <span class="badge badge-success"><?php echo $this->Mcrud->cek_status($query->status); ?></span>
                      <?php } elseif ($query->status == 'ditolak'){ ?>
                        <span class="badge badge-danger"><?php echo $this->Mcrud->cek_status($query->status); ?></span>
                        <?php } ?></p>


                       
                    
                    </div>
                  <div class="card-footer text-right">
                  <a href="pengaduan/v.html" class="btn btn-primary"><i><</i> Kembali</a>
                  <?php if ($level=='superadmin'){ ?>
                                          <?php if ($query->status=='proses'){ ?>
																						 <a href="javascript:;" class="btn btn-success" title="Konfirmasi" data-toggle="modal" onclick="modal_show(<?php echo $query->id_pengaduan; ?>);"><i class="fa fa-file"></i> Konfirmasi</a>
                                          <?php } ?>
                                          <?php }elseif ($level=='petugas'){ ?>
																					<?php //if ($baris->status=='konfirmasi'){ ?>
																						 <a class="btn btn-icon icon-left btn-success" title="Edit" data-toggle="modal" onclick="modal_show(<?php echo $query->id_pengaduan; ?>);"><i class="far fa-edit"></i> Konfirmasi Lapooran</a>
																					<?php } ?>

                  </div>
                </div>
              </div>
            </div>

          </div>
    </section>
    </div>