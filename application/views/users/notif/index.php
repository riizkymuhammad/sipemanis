


		<?php
$link1 = strtolower($this->uri->segment(1));
$link2 = strtolower($this->uri->segment(2));
$link3 = strtolower($this->uri->segment(3));
$link4 = strtolower($this->uri->segment(4));
?>
<!-- begin #content -->



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
                      <div class="card-header-action">
                    <a href="web/notif/h_all" class="btn btn-danger">Hapus Semua Notifikasi </a>
                    </div>
                    </div>
                    <div class="card-body">   
                      <table class="table table-sm">
                        <thead>
                          <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Pengirim</th>
							<th scope="col">Pesan</th>
							<th scope="col">Waktu</th>
                            <th scope="col">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
						<?php
                                  $db ="akademik_new_1.users";
                                  $no=1;
									$id_user = $this->session->userdata('data_id'); // data_id
                                  foreach ($query->result() as $value):
									
									$cek_penerima = $this->db->get_where($db, array('id'=>$value->penerima));
									
									  if ($cek_penerima->num_rows()!=0) {
									      $cek_pengirim = $this->db->get_where($db, array('id'=>$value->pengirim));
										     if ($cek_pengirim->num_rows()==0) {
												       $nama  = ""; $pesan = ""; $waktu = "";
										     }else {
											       $baris = $cek_pengirim->row();
											       $nama  = $baris->display_name;
											       $pesan = $value->pesan;
											       $waktu = $this->Mcrud->waktu($value->tgl_notif,'full');
											 	   $level = $baris->level;

																	     }

																			 $link = "javascript:;";
																       if ($value->link!='') {
																         $link = $value->link;
																       }

																			 if(!preg_match("/$id_user/i", $value->hapus_notif)) {
																			?>
                                    <tr>
                                        <td><b><?php echo $no++; ?>.</b></td>
																				
																				<td><?php echo $nama; ?></td>
																				<td><?php echo $pesan; ?></td>
																				<td><?php echo $waktu; ?></td>
																				<td align="center">
																					<a href="<?php echo $link; ?>" class="btn btn-info btn-xs" title="Detail"><i class="fa fa-search"></i>Detail</a>
                                          <a href="web/notif/h/<?php echo hashids_encrypt($value->id_notif); ?>" class="btn btn-danger btn-xs" title="Hapus" onclick="return confirm('Anda yakin?');"><i class="fa fa-trash"></i>Hapus</a>
                                        </td>
                                    </tr>
                                  <?php
																			}
																		}
																	endforeach; ?>
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
