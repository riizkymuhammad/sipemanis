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
            <h1>Petugas</h1>
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
              ?>
                <div class="card">        
                                  
                    <div class="card-header">
                      <h4><?php echo $judul_web; ?></h4>
                    <div class="card-header-action">
                    <a href="<?php echo $link1; ?>/<?php echo $link2; ?>/t.html" class="btn btn-primary">Tambah <?php echo $judul_web; ?></a>
                    </div>
                    </div>
                    <div class="card-body">   
                    <div class="table-responsive">
                      <table class="table table-sm">
                        <thead>
                          <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">No. Telp</th>
                            <th scope="col">Email</th>
                            <th scope="col">Username</th>
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
																				<td><?php echo $baris->nama; ?></td>
																				<td><?php echo $baris->jk; ?></td>
																				<td><?php echo $baris->alamat; ?></td>
																				<td><?php echo $baris->no_telp; ?></td>
																				<td><?php echo $baris->email; ?></td>
																				<td><?php echo $baris->user_login; ?></td>
                                        
																				<td style="align:center">
																				  <a href="<?php echo $link1; ?>/<?php echo $link2; ?>/e/<?php echo hashids_encrypt($baris->id_user); ?>" class="btn btn-success btn-xs" title="Edit"><i class="fa fa-edit"></i>Edit</a>
                                          <a href="<?php echo $link1; ?>/<?php echo $link2; ?>/h/<?php echo hashids_encrypt($baris->id_user); ?>" class="btn btn-danger btn-xs" title="Hapus" onclick="return confirm('Anda yakin?');"><i class="fa fa-trash"></i>Hapus</a>
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
          </div>
    </section>
    </div>





