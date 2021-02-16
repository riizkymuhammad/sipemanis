

  <link rel="stylesheet" href="assets/assets/node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/assets/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
<!-- begin #content -->
	
		<!-- end #content -->

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
            <h1><?php echo $judul_web; ?></h1>
          </div>
          <?php
                echo $this->session->flashdata('msg');
								$level 	= $this->session->userdata('status');
                $link3  = strtolower($this->uri->segment(3));
              ?>
    <div class="section-body">
    <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4><?php echo $judul_web; ?></h4>
                    <?php if($level=='user'){ ?>
                    <div class="card-header-action">
                    <a href="<?php echo $link1; ?>/<?php echo $link2; ?>/t.html" class="btn btn-primary">Tambah <?php echo $judul_web; ?> </a>
                    </div>
                    <?php } ?>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr>
                            <th class="text-center">
                              No.
                            </th>
                            <th>Waktu</th>
                            <th>Pelapor</th>
                            <th>NIM / NIK</th>
                            <th>Kategori</th>
                            <th>Pengaduan</th>
                            <?php if ($level!='superadmin'){ ?>
                            <th style="display: none;">Petugas</th>
                            <?php }else{ ?>
                            <th>Petugas</th>
                            <?php } ?>
                            <th>Status</th>
                            <th>Aksi</th>
                          
                          </tr>
                        </thead>
                        <tbody>
                        <?php

                                  $no = $this->uri->segment('3') + 1;
                                  foreach ($query->result() as $baris):?>
                                    <tr>        	
                                        <td><b><?php echo $no++; ?>.</b> </td>
										  <td><?php echo $this->Mcrud->tgl_id(date('d-m-Y H:i:s', strtotime($baris->tgl_pengaduan)),'full'); ?></td>
                    <td><?php echo $this->Mcrud->d_pelapor($baris->user,'nama_pelapor'); ?></td>
                    <td><?php echo $this->Mcrud->d_pelapor($baris->user,'user_login'); ?></td>
                    <td><?php echo $this->Mcrud->d_pelapor($baris->id_kategori,'kategori'); ?></td>
                    <td><?php echo $this->Mcrud->d_pelapor($baris->id_sub_kategori,'sub_kategori'); ?></td>	
                    <?php if ($level!='superadmin'){ ?>
                    <td style="display: none;"><?php echo $this->Mcrud->d_pelapor($baris->petugas,'petugas'); ?></td>
                    <?php }else{ ?>
                      <td><?php echo $this->Mcrud->d_pelapor($baris->petugas,'petugas'); ?></td>
                      <?php } ?>
                                        <td><?php if($baris->status == 'proses') {?>
                        <span class="badge badge-warning"><?php echo $this->Mcrud->cek_status($baris->status); ?></span>
                      <?php } elseif ($baris->status == 'konfirmasi'){ ?>
                        <span class="badge badge-info"><?php echo $this->Mcrud->cek_status($baris->status); ?></span>
                      <?php } elseif ($baris->status == 'selesai'){ ?>
                        <span class="badge badge-success"><?php echo $this->Mcrud->cek_status($baris->status); ?></span>
                      <?php } elseif ($baris->status == 'ditolak'){ ?>
                        <span class="badge badge-danger"><?php echo $this->Mcrud->cek_status($baris->status); ?></span>
                        <?php } ?></td>
                                        <td style="align:center">
                                        <?php if ($baris->status=='selesai' || $baris->status=='ditolak'){ ?>
                                          <a href="<?php echo strtolower($this->uri->segment(1)); ?>/<?php echo strtolower($this->uri->segment(2)); ?>/l/<?php echo hashids_encrypt($baris->id_pengaduan); ?>" class="btn btn-warning btn-xs" title="Detail"><i class="fa fa-search"></i> Hasil</a>
                                        <?php } ?>     
																					<a href="<?php echo strtolower($this->uri->segment(1)); ?>/<?php echo strtolower($this->uri->segment(2)); ?>/d/<?php echo hashids_encrypt($baris->id_pengaduan); ?>" class="btn btn-info btn-xs" title="Detail"><i class="fa fa-search"></i> Detail</a>
																				<?php if ($level=='user'){ ?>
																						<?php if ($baris->status=='proses'){ ?>
																							<a href="<?php echo strtolower($this->uri->segment(1)); ?>/<?php echo strtolower($this->uri->segment(2)); ?>/h/<?php echo hashids_encrypt($baris->id_pengaduan); ?>" class="btn btn-danger btn-xs" title="Hapus" onclick="return confirm('Anda yakin?');"><i class="fa fa-trash"></i> Hapus</a>
																						<?php } ?>
																				<?php } ?>
																				</td>
                                    </tr>
                                  <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </section>
    </div>


    <?php $this->load->view('users/pengaduan/modal_konfirm'); ?>
 



 

