<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mcrud extends CI_Model {


	public function __construct()
	 {
	    parent::__construct();
		$this->db1 = $this->load->database('default', TRUE);
		$user1 = $this->tbl_bm = $this->load->database('bm', TRUE);
	 }


	var $tbl_users				 = 'tbl_user';

	//Sent mail
		public function sent_mail($nama, $email, $aksi)
		{
			$email_saya = "admin@ordodev.com";
			$pass_saya  = "1202145";

			//konfigurasi email
			$config = array();
			$config['charset'] = 'utf-8';
			$config['useragent'] = 'Ordodev.com';
			$config['protocol']= "smtp";
			$config['mailtype']= "html";
			$config['smtp_host']= "ssl://srv40.niagahoster.com";
			$config['smtp_port']= "465";
			$config['smtp_timeout']= "465";
			$config['smtp_user']= "$email_saya";
			$config['smtp_pass']= "$pass_saya";
			$config['crlf']="\r\n";
			$config['newline']="\r\n";

			$config['wordwrap'] = TRUE;
			//memanggil library email dan set konfigurasi untuk pengiriman email

			$this->email->initialize($config);
			//$ipaddress = get_real_ip(); //untuk mendeteksi alamat IP

			date_default_timezone_set('Asia/Jakarta');
			$waktu 	  = date('Y-m-d H:i:s');
			$tgl 			= date('Y-m-d');

			$id = md5("$email * $tgl");

					$link			= base_url().'web/verify';
					$pesan    = "Hello $nama,
												<br /><br />
												Selamat datang di Aplikasi Pengaduan!<br/>
												Untuk melengkapi registrasi Anda, silahkan klik link berikut<br/>
												<br /><br />
												<b><a href='$link/$id/$email'>Klik Aktivasi disini :)</a></b>
												<br /><br />
												Terimakasih ^_^,
												";
					$subject = "Aktivasi Akun $nama";

			$this->email->from("$email_saya");
			$this->email->to("$email");
			$this->email->subject($subject);
			$this->email->message($pesan);
		}
	//End Sent mail

 public static function tgl_id($date, $bln='')
 {
	 date_default_timezone_set('Asia/Jakarta');
		 $str = explode('-', $date);
		 $bulan = array(
			 '01' => 'Januari',
			 '02' => 'Februari',
			 '03' => 'Maret',
			 '04' => 'April',
			 '05' => 'Mei',
			 '06' => 'Juni',
			 '07' => 'Juli',
			 '08' => 'Agustus',
			 '09' => 'September',
			 '10' => 'Oktober',
			 '11' => 'November',
			 '12' => 'Desember',
		 );
		 if ($bln == '') {
			 $hasil = $str['0'] . "-" . substr($bulan[$str[1]],0,3) . "-" .$str[2];
		 }elseif ($bln == 'full') {
			 $hasil = $str['0'] . " " . $bulan[$str[1]] . " " .$str[2];
		 }else {
			 $hasil = $bulan[$str[1]];
		 }
		 return $hasil;
 }

	public function hari_id($tanggal)
	{
		$day = date('D', strtotime($tanggal));
		$dayList = array(
			'Sun' => 'Minggu',
			'Mon' => 'Senin',
			'Tue' => 'Selasa',
			'Wed' => 'Rabu',
			'Thu' => 'Kamis',
			'Fri' => "Jum'at",
			'Sat' => 'Sabtu'
		);
		return $dayList[$day];
	}

	public function get_users()
	{
			return $this->tbl_bm->get_where('users', "enabled='yes'");
	}

	public function get_id_user($id)
	{
			return $this->db->get_where($this->tbl_users, array('id_user'=>$id,'dihapus'=>'tidak'));
	}

	public function get_level_users()
	{
			// $this->db->where('tbl_user.level', 'user');
			return $this->db->get_where($this->tbl_users, "dihapus='tidak'");
	}

	public function get_users_by_un($id)
	{ 			
		$this->tbl_bm->select('*');
		$this->tbl_bm->from('users as a');
		$this->tbl_bm->join('userlevel as b', 'a.user_status = b.level_number');
//		$this->tbl_bm->join('mhs as c', 'a.user_login = c.nim');
		$this->tbl_bm->where('a.user_login',$id);
		$this->tbl_bm->where('a.enabled','yes');
//		$this->tbl_bm->where('c.status','1');
		return $this->tbl_bm->get();		
				//return $this->db->get_where($this->tbl_bm, array('user_login'=>"$id"));
	}

	public function cek_data($userdata){
		echo "coba".$userdata;
		$this->tbl_bm->select('*');
		$this->tbl_bm->from('users as a');
		$this->tbl_bm->where('a.user_login',$userdata);
		return $this->tbl_bm->get();	
	}

	public function get_level_users_by_id($id)
	{
			$this->db->from($this->tbl_users);
			$this->db->where('tbl_user.dihapus', 'tidak');
			$this->db->where('tbl_user.level', 'user');
			$this->db->where('tbl_user.id_user', $id);
			$query = $this->db->get();
			return $query->row();
	}

	public function save_user($data)
	{
		$this->db->insert($this->tbl_users, $data);
		return $this->db->insert_id();
	}

	public function update_user($where, $data)
	{
		$this->db->update($this->tbl_users, $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_user_by_id($id)
	{
		$this->db->where('id_user', $id);
		$this->db->delete($this->tbl_users);
	}

	public function waktu($data, $aksi='')
	{
		if ($aksi=='full') {
			$tgl_n = date('d-m-Y H:i:s',strtotime($data));
		}else {
			$tgl_n = date('d-m-Y',strtotime($data));
		}
		$hari = $this->Mcrud->hari_id($tgl_n);
		$tgl  = $this->Mcrud->tgl_id($tgl_n,$aksi);
		return $hari.", ".$tgl;
	}

	function judul_web($id='')
	{
		$nama_web = $this->db->get_where('tbl_web',"id_web='1'")->row()->nama_web;
		$ket_web  = $this->db->get_where('tbl_web',"id_web='1'")->row()->ket_web;
		if ($id==1) {
			$data = "$nama_web";
		}elseif ($id==2) {
			$data = "$ket_web";
		}else {
			$data = "$nama_web $ket_web";
		}
		return $data;
	}

	function footer()
	{
			return "Copyright &copy; 2019 | Developer by <a href='http://esotechno.com/' target='_blank'>CV. ESOTECHNO</a>";
	}

	public function cek_filename($file='')
	{
		$data = "assets/favicon.png";
		if ($file != '') {
			if(file_exists("$file")){
				$data = $file;
			}
		}
		return $data;
	}

	public function sosmed($aksi='')
	{
		$data = "javascript:;";
		if ($aksi=='fb') {
			$data = "https://facebook.com/";
		}elseif ($aksi=='twit') {
			$data = "https://twitter.com/";
		}elseif ($aksi=='gplus') {
			$data = "https://plus.google.com/";
		}elseif ($aksi=='ig') {
			$data = "https://instagram.com/";
		}elseif ($aksi=='rss') {
			$data = "https://rss.com/";
		}
		return $data;
	}

	public function kontak($aksi='')
	{
		$data = "";
		if ($aksi=='nama') {
			$data = "CV. ESOTECHNO";
		}elseif ($aksi=='alamat') {
			$data = "Jl. Kol Abunjani, Selamat, Telanaipura, Kota Jambi, Jambi 36124";
		}elseif ($aksi=='email') {
			$data = "admin@email.com";
		}elseif ($aksi=='no_hp') {
			$data = "08xxx";
		}elseif ($aksi=='peta') {
			$data = "https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15952.8923855608!2d103.5837615!3d-1.6202662!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xa71d455f8d7f4973!2sPerusahaan+Software!5e0!3m2!1sen!2sid!4v1547180209439";
		}
		return $data;
	}

	function d_pelapor($id='',$aksi='')
	{
		if ($aksi=='nama_pelapor') {
		//	$data = $this->db->get_where('tbl_data_user', array('id_user'=>$id))->row()->nama;
			$data = $this->tbl_bm->get_where('users', array('id'=>$id))->row()->display_name;
			

		}elseif ($aksi=='kategori') {
			$data = $this->db->get_where('tbl_kategori', array('id_kategori'=>$id))->row()->nama_kategori;
		}elseif ($aksi=='sub_kategori') {
			$data = $this->db->get_where('tbl_sub_kategori', array('id_sub_kategori'=>$id))->row()->nama_sub_kategori;
		}elseif ($aksi=='user_login') {
			$data = $this->tbl_bm->get_where('users', array('id'=>$id))->row()->user_login;
		}elseif ($aksi=='level_name') {
			$this->tbl_bm->select('*');
			$this->tbl_bm->from('users as a');
			$this->tbl_bm->join('userlevel as b ', ' a.user_status = b.level_number' );
			$this->tbl_bm->where('a.id',$id);
			$data = $this->tbl_bm->get()->row()->level_name;
			
		}else {
			$data = '-';
		}
		return $data;
	}

	function cek_status($data)
	{
		if ($data=='proses') {
			$v_data = '<label class="label label-danger">BELUM DI KONFIRMASI</label>';
		}elseif ($data=='konfirmasi') {
			$v_data = '<label class="label label-primary">SEDANG DITANGANI</label>';
		}elseif ($data=='selesai') {
			$v_data = '<label class="label label-success">SELESAI</label>';
		}else {
			$v_data = '';
		}
		return $v_data;
	}

	function kirim_notif($pengirim,$penerima,$id_pengaduan='',$pesan)
	{
		date_default_timezone_set('Asia/Jakarta');
		$tgl = date('Y-m-d H:i:s');
		if ($pengirim=='superadmin') { $pengirim = '1'; }
		if ($penerima=='superadmin') { $penerima = '1'; }

		if ($pesan=='user_kirim_pengaduan') {
			$pesan = "Mengirim Pengaduan baru";
		}elseif ($pesan=='superadmin_ke_petugas') {
			$pesan = "Mengirim Pengaduan baru";
		}elseif ($pesan=='superadmin_ke_user') {
			$pesan = "Pengaduan dikonfirmasi";
		}elseif ($pesan=='petugas_ke_user') {
			$pesan = "Pengaduan Selesai";
		}

		if ($id_pengaduan=='') {
			$link = '';
		}else{
			$link = "pengaduan/v/d/".hashids_encrypt($id_pengaduan);
		}

		$data2 = array(
			'pengirim'  => $pengirim,
			'penerima'  => $penerima,
			'pesan'  		=> $pesan,
			'link'			=> $link,
			'id_pengaduan' => $id_pengaduan,
			'tgl_notif' => $tgl
		);
		$this->db->insert('tbl_notif',$data2);
	}

	public function hitung(){
		
		$this->tbl_bm->select('*');
		//$this->tbl_bm->from('users as a');
		$this->tbl_bm->from(' mhs as b');
		$this->tbl_bm->where( 'b.status ','1');
		//$this->tbl_bm->where('a.enabled ','yes');
		return $this->tbl_bm->get();
		
	//	$sql = "SELECT * FROM mhs WHERE status = ?";
//$this->db->query($sql, array('1'));
	}

	public function ambil_users()
	{ 			
			$this->tbl_bm->select(' b.nim, b.nama as nama , c.nama as prodi, d.nama  as fakultas');
		$this->tbl_bm->from('users as a');
		$this->tbl_bm->join('mhs as b', 'a.user_login = b.nim');
		$this->tbl_bm->join('master_prodi as c','b.id_prodi = c.id' );
		$this->tbl_bm->join('master_fakultas as d','c.id_fak = d.id');
		$this->tbl_bm->join('mhs_identitas as e' , 'b.nim = e.nim ');
		$this->tbl_bm->where('b.status ','1');
		return $this->tbl_bm->get();		

	}

	public function tambah_user_petugas($data)
	{ 
		$this->tbl_bm->insert('users',$data);

	}
	public function ambil_data_user_petugas()
	{ 
		$this->db->select('*');
		//$this->db->from('db_pengaduan.tbl_petugas');
		$this->db->from('akademik_new_1.users');
		$this->db->join('db_pengaduan.tbl_petugas','db_pengaduan.tbl_petugas.id_user = akademik_new_1.users.id');
		
		return $this->db->get();		
		//$sql = "select * from akademik_new_1.users as a join db_pengaduan.tbl_petugas as b on a.id = b.id_user";
		//$this->db->query($sql);

	}
	public function get_data_user_petugas($id)
	{ 
		$this->db->select('*');
		//$this->db->from('db_pengaduan.tbl_petugas');
		$this->db->from('akademik_new_1.users');
		$this->db->join('db_pengaduan.tbl_petugas','db_pengaduan.tbl_petugas.id_user = akademik_new_1.users.id');
		$this->db->where(' akademik_new_1.users.id',$id);
		return $this->db->get();		
		//$sql = "select * from akademik_new_1.users as a join db_pengaduan.tbl_petugas as b on a.id = b.id_user";
		//$this->db->query($sql);

	}


public function get_data_pengaduan($id)
	{ 
		$this->db->select('*');
		//$this->db->from('db_pengaduan.tbl_petugas');
		$this->db->from('akademik_new_1.users');
		$this->db->join('db_pengaduan.tbl_pengaduan','db_pengaduan.tbl_pengaduan.user = akademik_new_1.users.id');
		$this->db->where(' akademik_new_1.users.id',$id);
		$this->db->order_by('id_pengaduan', 'DESC');
		return $this->db->get();		
		//$sql = "select * from akademik_new_1.users as a join db_pengaduan.tbl_petugas as b on a.id = b.id_user";
		//$this->db->query($sql);

	}
	public function cek_id($username){
		$this->tbl_bm->select('*');
		$this->tbl_bm->from('users');
		$this->tbl_bm->where('user_login ',$username);
		return $this->tbl_bm->get();
	}

	public function update_petugas($data,$where){
		    $this->tbl_bm->where('id',$where);
			$this->tbl_bm->update('users',$data);

	}
	public function hapus_petugas($id){
		   
			$this->tbl_bm->delete('users', array('id' => $id));

	}

	public function cek_notif($username){
		$this->tbl_bm->select('*');
		$this->tbl_bm->from('users as a');
		$this->tbl_bm->where('user_login ',$username);
		return $this->tbl_bm->get();
	}
}
