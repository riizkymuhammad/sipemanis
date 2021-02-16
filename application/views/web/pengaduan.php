<link href="assets/page/DataTables/datatables.min2.css" rel="stylesheet">
<script src="assets/page/DataTables/datatables.min.js"> </script>




<style>
th{ color: #2863a6;}


.dataTables_wrapper .dataTables_paginate .paginate_button:hover {
      background: #007bff;
      color: white; /*change the hover text color*/
      border-color: #007bff;
    }


 </style>
<main id="main">

    <!-- ======= App Features Section ======= -->
    <section id="features" class="features">
      <div class="container">

        <div class="section-title">
          <h2>Daftar Pengaduan</h2>
        </div>

        <div class="row no-gutters">
        <div class="table-responsive">
        <table id="myTable" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th id="bg-white" >No.</th>
                                            <th id="bg-white">NIP/NIK/NID/NIM</th>
											<th id="bg-white">Kategori</th>
                                            <th id="bg-white">Sub Kategori</th>
											<th id="bg-white" >Tanggal Laporan</th>
											<th id="bg-white" >Status</th>
										</tr>
									</thead>
									<tbody>
										<?php 
                    $no=1;
                    foreach ($query->result() as $key => $value): ?>
                      <tr>
                        <td><b><?php echo $no++; ?>.</b></td>
                        <td><?php echo $this->Mcrud->d_pelapor($value->user,'user_login'); ?></td>
                        <td><?php echo $this->Mcrud->d_pelapor($value->id_kategori,'kategori'); ?></td>
                        <td><?php echo $this->Mcrud->d_pelapor($value->id_sub_kategori,'sub_kategori'); ?></td>
                        <td><?php echo $this->Mcrud->waktu($value->tgl_pengaduan,'full'); ?></td>
                        <td align="center"><?php if($value->status == 'proses') {?>
                        <span class="badge badge-warning"><?php echo $this->Mcrud->cek_status($value->status); ?></span>
                      <?php } elseif ($value->status == 'konfirmasi'){ ?>
                        <span class="badge badge-info"><?php echo $this->Mcrud->cek_status($value->status); ?></span>
                      <?php } elseif ($value->status == 'selesai'){ ?>
                        <span class="badge badge-success"><?php echo $this->Mcrud->cek_status($value->status); ?></span>
                      <?php } elseif ($value->status == 'konfirmasi'){ ?>
                        <span class="badge badge-success"><?php echo $this->Mcrud->cek_status($value->status); ?></span>
                      <?php } elseif ($value->status == 'ditolak'){ ?>
                        <span class="badge badge-danger"><?php echo $this->Mcrud->cek_status($value->status); ?></span>
                        <?php } ?></td>
                      </tr>
                    <?php endforeach; ?>
									</tbody>
								</table>
</div>
        </div>

      </div>
    </section><!-- End App Features Section -->

    <!-- ======= Details Section ======= -->
  
    <!-- ======= Gallery Section ======= -->
   

    <!-- ======= Testimonials Section ======= -->
   

    <!-- ======= Pricing Section ======= -->
    
   

  </main>



  <script>


$(document).ready(function() {
    var table = $('#myTable').DataTable( {
        responsive: true
        
    } );
 
    new $.fn.dataTable.FixedHeader( table );
    
} );
  </script>
