<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_db extends CI_Model {

	public function __construct()
	 {
	    parent::__construct();
		$this->db1 = $this->load->database('default', TRUE);
		$this->tbl_bm = $this->load->database('bm', TRUE);
	 }

	 public function cek($username){

	 	//$this->db->select('*');
		//$this->db->from('akademik_new_1.users');
		return $this->tbl_bm->get_where('users',array('user_login'=>$username));
		//return $this->db->get();
	 }

	 public function cetak($awal,$akhir){
	 /*	$this->db->select('
	 		c.nama_kategori,
	 		b.nama_sub_kategori,
	 		a.isi_pengaduan,
	 		a.ket_pengaduan,
	 		a.bukti,
	 		e.display_name as user,
	 		d.display_name as petugas,
	 		a.pesan_petugas,
	 		a.file_petugas,
	 		a.tgl_pengaduan,
	 		a.tgl_konfirmasi,
	 		a.tgl_selesai
	 		');
	 	$this->db->from('tbl_pengaduan as a');
	 	$this->db->join('tbl_sub_kategori as b','a.id_sub_kategori = b.id_sub_kategori');
	 	$this->db->join('tbl_kategori as c','a.id_kategori = c.id_kategori');
	 	$this->db->join('akademik_new_1.users as d',' d.id = a.petugas','left');
	 	$this->db->join('akademik_new_1.users as e',' e.id = a.user','left');
	 	$this->db->where('date(a.tgl_pengaduan)','2020-10-06 ');
		$this->db->where('date(a.tgl_pengaduan)','2020-10-08');
	// 	date(tgl_pengaduan)="2020-10-07"
	 	return $this->db->get();
*/

	 	$a = "select 
	 		c.nama_kategori,
	 		b.nama_sub_kategori,
	 		a.isi_pengaduan,
	 		a.ket_pengaduan,
	 		a.bukti,
	 		e.display_name as user,
	 		d.display_name as tik,
	 		a.pesan_petugas,
	 		a.file_petugas,
	 		a.tgl_pengaduan,
	 		a.tgl_konfirmasi,
	 		a.tgl_selesai from tbl_pengaduan as a
join tbl_sub_kategori as b on a.id_sub_kategori = b.id_sub_kategori
join tbl_kategori as c on a.id_kategori = c.id_kategori 
left join akademik_new_1.users as d on d.id = a.petugas 
left join akademik_new_1.users as e on e.id = a.user 
where date(a.tgl_pengaduan) between '".$awal."'  and '".$akhir."'";
	 return $this->db->query($a);
	 }

	


}
