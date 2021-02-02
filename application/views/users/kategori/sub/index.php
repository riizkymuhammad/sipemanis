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
                      <h4>Kategori</h4>
                    <div class="card-header-action">
                    <a href="<?php echo $link1; ?>/<?php echo $link2; ?>/t.html" class="btn btn-primary">Tambah <?php echo $judul_web; ?> </a>
                    </div>
                    </div>
                    <div class="card-body">   
                      <table class="table table-sm">
                        <thead>
                          <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Sub Kategori</th>
                            <th scope="col">Opsi</th>
                          </tr>
                        </thead>
                        <tbody>
                                  <?php
                                  $no=1;
                                   foreach ($query->result() as $baris):
																		 	?>
                                    <tr>
                                        <td><b><?php echo $no++; ?>.</b></td>
                                        <td><?php echo $baris->nama_kategori; ?></td>
                                        <td><?php echo $baris->nama_sub_kategori; ?></td>
																				<td style="align:center">
                                        <a href="<?php echo $link1; ?>/<?php echo $link2; ?>/e/<?php echo hashids_encrypt($baris->id_sub_kategori); ?>" class="btn btn-success btn-xs" title="Edit"><i class="fa fa-edit"></i>Edit</a>
                                          <a href="<?php echo $link1; ?>/<?php echo $link2; ?>/h/<?php echo hashids_encrypt($baris->id_sub_kategori); ?>" class="btn btn-danger btn-xs" title="Hapus" onclick="return confirm('Anda yakin?');"><i class="fa fa-trash"></i>Hapus</a>
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
