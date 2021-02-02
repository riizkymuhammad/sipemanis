<!DOCTYPE html>
<html>
<head>
	<title>Data Laporan</title>
  <base href="<?php echo base_url();?>"/>
	<link rel="shortcut icon" href="assets/favicon.png" type="image/x-icon" />
</head>
<body onload="window.print();">
	<style type="text/css">
	table {
		border-collapse: collapse;
		width: 100%;
	}

	table, th, td {
		border: 1px solid black;
		font-size: 11pt;
		text-align: center;
	}
</style>
<center>
	<h3>DATA LAPORAN</h3>
</center>
  <table>
  	<thead>
  		<tr>
  			<th width="1%">No</th>
  			<th width="15%">NAMA</th>
  			<th>ALAMAT</th>
  			<th>TANGGAL LAHIR</th>
  			<th>JENIS KELAMIN</th>
  			<th>NO TELP</th>
  			<th>FOTO</th>
  		</tr>
  	</thead>
  	<tbody>
  		<?php
      $no=1;
      foreach ($query->result() as $key => $value): ?>
        <tr>
  				<td valign="top"><b><?php echo $no++; ?>.</b></td>
  				<td valign="top"><?php echo $value->nama; ?></td>
  				<td valign="top"><?php echo $value->alamat; ?></td>
  				<td valign="top"><?php echo date('d-m-Y',strtotime($value->tgl_lahir)); ?></td>
  				<td valign="top"><?php echo $value->jk; ?></td>
  				<td valign="top"><?php echo $value->kontak; ?></td>
          <td>
            <img src="<?php echo $value->foto; ?>" alt="" width="30">
          </td>
        </tr>
      <?php endforeach; ?>
  	</tbody>
  </table>
</body>
</html>


<?php
$link1 = strtolower($this->uri->segment(1));
$link2 = strtolower($this->uri->segment(2));
$link3 = strtolower($this->uri->segment(3));
$link4 = strtolower($this->uri->segment(4));
?>

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
                <div class="card">
                  <div class="card-header">
                    <h4>Sub Kategori</h4>
                  </div>
                  <div class="card-body">
                  <form class="form-horizontal" action="" data-parsley-validate="true" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                  <label>Kategori</label>
                    <select class="form-control" name="id_kategori" required>
                        <option value="">- Pilih Kategori -</option>
                        <?php foreach ($v_kat->result() as $key => $value): ?>
                          <option value="<?php echo $value->id_kategori; ?>"><?php echo $value->nama_kategori; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div> 
                    <div class="form-group">
                      <label>Sub Kategori</label>
                      <input type="text" name="nama_sub_kategori" class="form-control" placeholder="Masukkan Sub Kategori" required>
                    </div>      
                    
    
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
          </div>
    </section>
    </div>
