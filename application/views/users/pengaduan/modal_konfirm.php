

<?php
$level 	= $this->session->userdata('status');
$link3  = strtolower($this->uri->segment(3));
?>
<?php if ($level!='user'): ?>
<script type="text/javascript">
	function modal_show(id)
	{
		$('#id_pengaduan').val(id);
		<?php if($level=='petugas'){ ?>
			tampilkan_data(id);
		<?php } ?>
		$('#modal-konfirm').modal('show');
	}

<?php if($level=='petugas'){ ?>
	function tampilkan_data(id){
		$('[name="pesan_petugas"]').val('');
		$('[name="file"]').val('');
		$('[name="status"]').val('');
		pesan   = $('.pesan_ajax');
		f_ajax1 = $('#f_ajax1'); f_ajax2 = $('#f_ajax2'); f_ajax3 = $('#f_ajax3');
			$.ajax({
			 type: "POST",
			 data: "id="+id+"&btnkirim=kirim",
			 url: "pengaduan/ajax",
			 cache: false,
			 dataType: "JSON",
			 beforeSend:function()
			 {
				 f_ajax1.hide(); f_ajax2.hide(); f_ajax3.hide();
				 pesan.html('Menampilkan. . .');
			 },
			 success: function(data){
				 f_ajax1.show(); f_ajax2.show(); f_ajax3.show();
				 pesan.html('');
				 $('[name="pesan_petugas"]').val(data.pesan_petugas);
				 $('[name="status"]').val(data.status);
				 $('[name="status"]').trigger('change');
			 },
			 error: function (jqXHR, textStatus, errorThrown)
			 {
				 f_ajax1.hide(); f_ajax2.hide(); f_ajax3.hide();
				 pesan.html('Ada kesalahan saat mengambil data, Silahkan <b style="color:red;cursor:pointer" onclick="window.location.reload()">REFRESH</b> halaman!');
			 }
			});
		return false;
		}
<?php } ?>
</script>

		<div class="modal" id="modal-konfirm">
			<div class="modal-dialog <?php if($level=='superadmin'){echo " modal-sm-6";} ?>">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">
							<?php if($level=='superadmin'){echo "Disposisikan ke Petugas";}else{echo "Update Data Pengaduan";} ?>
						</h4>
					</div>
					<form class="form-horizontal" action="" data-parsley-validate="true" method="post" enctype="multipart/form-data">
					<div class="modal-body">
						<input type="hidden" name="id_pengaduan" id="id_pengaduan" value="">
						<?php if ($level=='superadmin'){ ?>
							<div class="form-group">
							<b>Konfirmasi Laporan</b> <br>
							<select class="form-control default-select2" name="status" id="status_konfirm" required style="width:100%">
								<option value="">- Pilih -</option>
									<option value="konfirmasi">Konfirmasi</option>
									<option value="ditolak">Di Tolak</option>
							</select>
							</div>
							<div class="form-group">
							<b>Pilih Petugas</b> <br>
							<select class="form-control default-select2" name="id_petugas" required style="width:100%">
								<option value="">- Pilih -</option>
								<?php
														 $this->db->order_by('nama','ASC');
								$v_petugas = $this->db->get('tbl_petugas');
								foreach ($v_petugas->result() as $key => $value): ?>
									<option value="<?php echo $value->id_user; ?>"><?php echo ucwords($value->nama); ?></option>
								<?php endforeach; ?>
							</select>
							</div>

							<div class="form-group">
                      			<b>Laporan Petugas</b>
								  <textarea class="form-control" name="pesan_petugas"></textarea>
							</div>
								  <div class="form-group">
								  <input type="file" name="file" class="form-control">
                    		</div>
							
							
						<?php }else{ ?>
							<div class="pesan_ajax"></div>
							<div class="form-group sm-6" id="f_ajax1">
								<label class="col-lg-6">Hasil Laporan</label>
								<div class="col-lg-12">
									<textarea name="pesan_petugas" class="form-control" placeholder="Pesan" rows="10" required></textarea>
									<input type="file" name="file" class="form-control">
								</div>
							</div>
							<div class="form-group" id="f_ajax2">
								<div class="col-md-6"><b>STATUS PENGADUAN</b></div>
								<div class="col-md-12">
									<select class="form-control default-select2" name="status" required>
										<option value="">- Semua -</option>
										<option value="proses">Belum Terkonfirmasi</option>
										<option value="konfirmasi">Sedang Ditangani</option>
										<option value="selesai">Selesai</option>
									</select>
								</div>
							</div>
							
						<?php } ?>
					</div>
					<div class="modal-footer">
						<a href="javascript:;" class="btn btn-danger" data-dismiss="modal">Tutup</a>
						<button type="submit" name="btnkirim" id="f_ajax3" class="btn btn-primary"><i class="fa fa-send"></i> <?php if($level=='superadmin'){echo "Kirim";}else{echo "Simpan";}?></button>
					</div>
					</form>
				</div>
			</div>
		</div>
<?php endif; ?>

