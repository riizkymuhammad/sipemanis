<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cetak extends CI_Controller {

	public function index()
	{
		$id = hashids_decrypt($id);
		$ceks 	 = $this->session->userdata('username');
		$id_user = $this->session->userdata('id_user');
		$level 	 = $this->session->userdata('status');
		$data['judul_web'] 	  = "Cetak Laporan";
		if(!isset($ceks)) {
			redirect('web/login');
		}else{
			

			$this->load->view('users/header', $data);
			$this->load->view('users/laporan/form');
			$this->load->view('users/footer');
			

		}
	}

	public function xls()
	{
		$awal =$this->input->post('from');
		$akhir =$this->input->post('to');
		
		$this->load->model('m_db');
		$data = $this->m_db->cetak($awal,$akhir);
		if($data->num_rows() > 0)
		{
			////echo "ada";
			//$filename = 'Laporan_Pengaduan_'.$from.'_'.$to.'.xls';
			$filename = 'Laporan_sipemanis_tanggal_download:_'.date('Y-m-d');
			echo $filename;
		header("Content-type: application/x-msdownload");
		header("Content-Disposition: attachment; filename=".$filename.".xls");

			echo "
				<h4>Laporan Pengaduan Tanggal ".date('d/m/Y', strtotime($awal))." - ".date('d/m/Y', strtotime($akhir))."</h4>
				<table border='1' width='100%'>

					<thead>
						<tr>
						<th>No</th>
						<th>Kategori</th>
						<th>Sub Kategori</th>
						<th>Bukti</th>
						<th>user</th>
						<th>petugas</th>
						<th>pesan petugas</th>
						<th>file petugas</th>
						<th>tanggal aduan</th>
						<th>tanggal konfirmasi</th>
						<th>tanggal selesai</th>
						</tr>
					</thead>
					<tbody>
			";

			$no = 1;
			
			foreach($data->result_array() as $p)
			{
				echo "
					<tr>
						<td>".$no."</td>
						<td>".$p['nama_kategori']."</td>
						<td>".$p['nama_sub_kategori']."</td>
						<td>".$p['bukti']."</td>
						<td>".$p['user']."</td>
						<td>".$p['tik']."</td>

						<td>".$p['pesan_petugas']."</td>
						<td>".$p['file_petugas']."</td>
						<td>".$p['tgl_pengaduan']."</td>
						<td>".$p['tgl_konfirmasi']."</td>
						<td>".$p['tgl_selesai']."</td>
						
						
					</tr>

				";
				$no++;
				}
				echo "
			</tbody>
			</table>
			";
	

	
	}
}






	
	
}
