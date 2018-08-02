<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	

	public function __construct(){
		parent::__construct();
		$this->load->model('m_home');
	}

	public function index()
	{
		$data['data_kos_terbaru'] = $this->m_home->get_all_data('data_properti');
		$data['data_foto'] = $this->m_home->data_foto();
		$this->load->view('templates/header.php');
		$this->load->view('home.php',$data);
		$this->load->view('templates/footer.php');
		// print_r($data['data_foto']);
		// $this->load->view('home2.php');
	}

	public function tambah_properti()
	{	
		$data['properti'] = $this->m_home->get_all_data('fasilitas_properti');
		$this->load->view('templates/header.php');
		$this->load->view('tambah_properti.php',$data);
		$this->load->view('templates/footer.php');
	}

	public function faq()
	{
		$this->load->view('templates/header.php');
		$this->load->view('faq.php');
		$this->load->view('templates/footer.php');
	}

	public function detail_properti($id_properti)
	{
		$this->load->view('templates/scnd_template/header.php');
		$this->load->view('detail_properti.php');
		$this->load->view('templates/scnd_template/footer.php');
	}

	public function all_properti(){
		$this->load->view('templates/scnd_template/header.php');
		$this->load->view('all_properti.php');
		$this->load->view('templates/scnd_template/footer.php');
	}

	//Untuk proses upload foto
	function proses_upload(){

        $config['upload_path']   = FCPATH.'/upload/';
        $config['allowed_types'] = 'gif|jpg|png|ico';
        $this->load->library('upload',$config);
		$t=time();
        if($this->upload->do_upload('userfile')){
        	$token=$this->input->post('token_foto');
        	$new_name = time().$_FILES["userfiles"]['name'];
			$config['file_name'] = $new_name;
			$nama=$this->upload->data('file_name');
        	$this->db->insert('gambar_properti',array('gambar'=>$nama,'token'=>$token, 'tanggal_upload'=>$t));
        	$newdata = array(
				'checker'  => $t
			);
			$this->session->set_userdata($newdata);	
        }
	}

	//Untuk menghapus foto
	function remove_foto(){
		//Ambil token foto
		$token=$this->input->post('token');
		$foto=$this->db->get_where('gambar_properti	',array('token'=>$token));
		if($foto->num_rows()>0){
			$hasil=$foto->row();
			$nama_foto=$hasil->gambar;
			if(file_exists($file=FCPATH.'/upload/'.$nama_foto)){
				unlink($file);
			}

			$this->db->delete('gambar_properti',array('token'=>$token));

		}

		echo "{}";
	}

	public function tambah_data(){

		$data_properti = array(
			'nama_properti' => $this->input->post('nama_properti'),
			'status_properti' => $this->input->post('status_properti'),
			'alamat_properti' => $this->input->post('alamat_properti'),
			'harga_properti' => $this->input->post('harga_properti'),
			'tipe_properti' => $this->input->post('tipe_properti'),
			'deskripsi_properti' => $this->input->post('deskripsi_properti'),
			'jumlah_kamar' => $this->input->post('jumlah_kamar'),
			'kampus' => $this->input->post('kampus'),
			'daerah_kampus' => $this->input->post('daerah_kampus')
		);

		$data_pemilik = array(
			'nama_pemilik' => $this->input->post('nama_pemilik'),
			'alamat_pemilik	' => $this->input->post('alamat_pemilik'),
			'noHp_pemilik' => $this->input->post('noHp_pemilik')
		);

		// masukan data
		$this->m_home->add_data('data_properti', $data_properti);

		$this->m_home->add_data('pemilik_properti', $data_pemilik);

		$id = $this->m_home->get_data_by_id(
			'data_properti', 
			'nama_properti',
			'alamat_properti', 
			$this->input->post('alamat_properti'),
			$this->input->post('nama_properti'));
		// ambil id
		foreach ($id as $i) {}
		$data_fasilitas	= $this->input->post('feature');
		foreach ($data_fasilitas as $df) {
			$df = array(
				'id_data_properti' => $i->id_properti, 
				'id_fasilitas_properti' => $df
			);
			$this->m_home->add_data('data_fasilitas_properti', $df);
		}
		// update datanya
			$tgl = $this->session->userdata('checker');
			$idg = $this->m_home->get_data_gambar(
			'gambar_properti', 
			'tanggal_upload',
			$tgl);

			foreach ($idg as $ig) {
				$data_baru = $arrayName = array(
					'id_properti' => $i->id_properti
				);
				$this->m_home->update_data('tanggal_upload',$tgl,'gambar_properti',$data_baru);
			}

		// hapus sessionnya
		$this->session->sess_destroy();
		redirect('/kesinibang');
	}
}