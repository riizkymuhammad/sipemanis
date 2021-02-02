

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
                   $level 	= $this->session->userdata('status');
                    ?>
                <div class="card">        
                                  
                  <div class="card-header">
                  <h4><?php echo $judul_web; ?></h4>
                    <div class="card-header-action">
                    <?php if ($level=='user'): ?>

                    <a href="<?php echo $link1; ?>/<?php echo $link2; ?>/t.html" class="btn btn-primary">Tambah <?php echo $judul_web; ?> </a>
                    <?php endif ?>
                    </div>
                  </div>
                  <div class="card-body">   
                    <div class="table-responsive">
                      <table class="table table-sm">
                        <thead>
                          <tr>
                          <th scope="col">No.</th>
                            <th scope="col">Waktu</th>
                            <th scope="col">Pelapor</th>
                            <th scope="col">NIK / NIM</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Sub Kategori</th>
                            <th scope="col">Status</th>
							              <th scope="col">Aksi</th>
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
																				<td><?php echo $this->Mcrud->cek_status($baris->status); ?></td>
																				<td style="align:center">
																					<a href="<?php echo strtolower($this->uri->segment(1)); ?>/<?php echo strtolower($this->uri->segment(2)); ?>/d/<?php echo hashids_encrypt($baris->id_pengaduan); ?>" class="btn btn-info btn-xs" title="Detail"><i class="fa fa-search"></i> Detail</a>
																				<?php if ($level=='superadmin'){ ?>
																					<?php if ($baris->status=='proses'){ ?>
																						 <a href="javascript:;" class="btn btn-success btn-xs" title="Konfirmasi" data-toggle="modal" onclick="modal_show(<?php echo $baris->id_pengaduan; ?>);"><i class="fa fa-file"></i> Konfirmasi</a>
																					<?php }else{ ?>
																						<a href="javascript:;" class="btn disabled btn-success btn-xs" title="Terkonfirmasi"><i class="fa fa-check"></i> konfirmasi</a>
																					<?php } ?>
																				<?php }elseif ($level=='petugas'){ ?>
																					<?php //if ($baris->status=='konfirmasi'){ ?>
																						 <a class="btn btn-success btn-xs" title="Edit" data-toggle="modal" onclick="modal_show(<?php echo $baris->id_pengaduan; ?>);"><i class="fa fa-pencil"></i> Edit</a>
																					<?php //}else{ ?>
																						<!-- <a href="javascript:;" class="btn btn-success btn-xs" title="Edit" disabled><i class="fa fa-check"></i> Edit</a> -->
																					<?php //} ?>
																				<?php }else{ ?>
																						<?php if ($baris->status=='proses'){ ?>
																							<a href="<?php echo strtolower($this->uri->segment(1)); ?>/<?php echo strtolower($this->uri->segment(2)); ?>/h/<?php echo hashids_encrypt($baris->id_pengaduan); ?>" class="btn btn-danger btn-xs" title="Hapus" onclick="return confirm('Anda yakin?');"><i class="fa fa-trash"></i></a>
																						<?php } ?>
																				<?php } ?>
																				</td>
                                    </tr>
                                  <?php endforeach; ?>
                                </tbody>
                      </table>
                    </div>




                    





                      <div class="card-footer text-right">
                    <nav class="d-inline-block">
                    <?php 
	echo $this->pagination->create_links();
	?>
                    </nav>
                  </div>

                   
                    
                  </div>
                </div>
              </div>

             
                          
                          
                          



            </div>
          </div>
    </section>
    </div>



    <?php $this->load->view('users/pengaduan/modal_konfirm'); ?>
