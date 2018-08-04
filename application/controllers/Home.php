<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	

	public function __construct(){
		parent::__construct();
		$this->load->model('m_home');
		$this->load->library('csvimport'); //meload library csvimport.php
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

	function importcsv() {
        // $data['data_kos'] = $this->csv_model->get_addressbook();
        $data['error'] = '';    //initialize image upload error array to empty

        //convigure upload 
        $config['upload_path'] = './upload/';
        $config['allowed_types'] = '*';
        $config['max_size'] = '1000';

        $this->load->library('upload', $config);


        // jika upload gagal, muncul error
        if (!$this->upload->do_upload()) {
            $data['error'] = $this->upload->display_errors();

            // $this->load->view('csvindex', $data);
        } else {

            //prosses upload csv berhasil serta memproses insert data ke database
            $file_data = $this->upload->data();
            $file_path =  './upload/'.$file_data['file_name'];
            $tok 	   = rand();
            $tu 	   = time();
            if ($this->csvimport->get_array($file_path)) {
                $csv_array = $this->csvimport->get_array($file_path);
                foreach ($csv_array as $row) {
                    $insert_data = array(
                        'gambar'=>$row['gambar'],
                        'token'=>$tok,
                        'tanggal_upload'=>$tu,
                    );

                    $this->m_home->add_data('gambar_properti', $insert_data);
                }
                //echo "<pre>"; print_r($insert_data);
            } else 
                $data['error'] = "Error occured";
                $this->load->view('csvindex', $data);
            }  
        }

	public function faq()
	{
		$this->load->view('templates/header.php');
		$this->load->view('faq.php');
		$this->load->view('templates/footer.php');
	}

	public function detail_properti($id_properti)
	{
		$data['detail_properti'] = $this->m_home->get_data_by_id2('data_properti','id_properti',$id_properti);
		$data['data_foto'] = $this->m_home->data_detail_foto($id_properti);
		$data['all_fasilitas'] = $this->m_home->data_fasilitas($id_properti);
		$this->load->view('templates/scnd_template/header.php');
		$this->load->view('detail_properti.php',$data);
		$this->load->view('templates/scnd_template/footer.php');
		// print_r($data['all_fasilitas']);
	}

	public function all_properti(){
		$this->load->view('templates/scnd_template/header.php');
		$this->load->view('all_properti.php');
		$this->load->view('templates/scnd_template/footer.php');
	}

	public function data_survey(){
		$data = array(
			'nama' => $this->input->post('nama_user'),
			'no_hp' => $this->input->post('noTelp_user'),
			'tanggal' => $this->input->post('tanggal_survey'),
			'jam' => $this->input->post('jam_survey'),
			'nama_kos' => $this->input->post('nama_kost_survey')
		);
		$this->m_home->add_data('data_penjadwalan', $data);
		redirect('/terimakasih');
		// print_r($data);
	}

	public function terimakasih(){
		$this->load->view('templates/scnd_template/header');
		$this->load->view('terimakasih');
		$this->load->view('templates/footer');
	}

	//Untuk proses upload foto
	function proses_upload(){

        $config['upload_path']   = FCPATH.'/upload/';
        $config['allowed_types'] = 'gif|jpg|png|ico';
        $this->load->library('upload',$config);
		// $new_name = time().$_FILES["userfiles"]['name'];
		// $config['file_name'] = $new_name;
		$tm ='';
		// $t=time();
        if($this->upload->do_upload('userfile')){
        	$nama=$this->upload->data('file_name');
			$token=$this->input->post('token_foto');
        	if($this->session->userdata('checker')){
			     // do something when exist
        		$tm = $this->session->userdata('checker');
			}else{
				 // do something when doesn't exist
				$tm = time();
				$newdata = array(
					'checker'  => $tm
				);
				$this->session->set_userdata($newdata);
			}
			$this->db->insert('gambar_properti',array('gambar'=>$nama,'token'=>$token, 'tanggal_upload'=>$tm));
        }else{
        	echo "error occured";
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

		// csv
		$config['upload_path'] = './uploads/';
        $config['allowed_types'] = '*';
        $config['max_size'] = '1000';

        $this->load->library('upload', $config);

		if (!$this->upload->do_upload()) {
            $data['error'] = $this->upload->display_errors();
            print_r($data['error']);
            // $this->load->view('csvindex', $data);
        } else {

            //prosses upload csv berhasil serta memproses insert data ke database
            $file_data = $this->upload->data();
            $file_path =  './uploads/'.$file_data['file_name'];
            $tok 	   = rand();
            $tu 	   = time();
            if ($this->csvimport->get_array($file_path)) {
                $csv_array = $this->csvimport->get_array($file_path);
                foreach ($csv_array as $row) {
                    $insert_data = array(
                        'gambar'=>$row['gambar'],
                        'token' => $tok,
                        'tanggal_upload' => $tu,
                    );

                    $this->m_home->add_data('gambar_properti', $insert_data);
                    ;
                    // print_r($insert_data);
                }
                $newdata = array(
					'checker'  => $tu
					);
					$this->session->set_userdata($newdata);
					// echo $this->session->userdata('checker');
                // $this->session->set_flashdata('success', 'Csv Data Imported Succesfully');
                // redirect(base_url().'csv');
                //echo "<pre>"; print_r($insert_data);
            } else {
                // $data['error'] = "Error occured";
                // $this->load->view('csvindex', $data);
            echo "error yang ini";
            }
        }
		// csv

		$data_properti = array(
			'nama_properti' => $this->input->post('nama_properti'),
			'status_properti' => $this->input->post('status_properti'),
			'alamat_properti' => $this->input->post('alamat_properti'),
			'harga_properti' => $this->input->post('harga_properti'),
			'tipe_properti' => $this->input->post('tipe_properti'),
			'deskripsi_properti' => $this->input->post('deskripsi_properti'),
			'jumlah_kamar' => $this->input->post('jumlah_kamar'),
			'kampus' => $this->input->post('kampus'),
			'daerah_kampus' => $this->input->post('daerah_kampus'),
			'kategori_properti' => $this->input->post('kategori_properti'),
			'jenis_properti' => $this->input->post('jenis_properti'),
			'video_properti' => $this->input->post('video_properti'),
			'thumbnail' => $this->input->post('thumbnail')
		);

		// $data_pemilik = array(
		// 	'nama_pemilik' => $this->input->post('nama_pemilik'),
		// 	'alamat_pemilik	' => $this->input->post('alamat_pemilik'),
		// 	'noHp_pemilik' => $this->input->post('noHp_pemilik')
		// );

		// masukan data
		$this->m_home->add_data('data_properti', $data_properti);

		// $this->m_home->add_data('pemilik_properti', $data_pemilik);

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
			$tkn = $this->session->userdata('checker');
			$idg = $this->m_home->get_data_gambar(
			'gambar_properti', 
			'tanggal_upload',
			$tkn);

			foreach ($idg as $ig) {
				$data_baru = $arrayName = array(
					'id_properti' => $i->id_properti
				);
				$this->m_home->update_data('tanggal_upload',$tkn,'gambar_properti',$data_baru);
			}
		// hapus sessionnya
		// $this->session->sess_destroy();
		$this->session->unset_userdata('checker');
		redirect('/kesinibang');
	}


	public function request_survey(){
		$this->load->view('templates/scnd_template/header');
		$this->load->view('survey');
		$this->load->view('templates/footer');
	}

	public function selesai_survey($id){
		$data = array(
			'status' => 1
		);
		$id_data = 'id_penjadwalan';
		$table = 'data_penjadwalan';
		$this->m_home->update_data($id_data, $id, $table, $data);
		redirect('info_survey');
	}

	// admin page
	public function admin(){
		if ($this->session->userdata('kode')) {
			redirect('home_admin');
		}else{
			$this->load->view('admin_password');
		}	
	}

	public function cek_admin(){
		$kode = $this->input->post('kode_rahasia');
		if ($kode == "kucingpemalas") {
			$data = array(
				'kode' => $kode 
			);
			$this->session->set_userdata($data);
			// print_r($data);
			redirect('home_admin');
		}else if ($kode != "kucingpemalas") {
			# code...
			$this->load->view('wtf');
		}

		// $this->load->view('admin_password');
	}

	public function destroy_any_session(){
		$this->session->sess_destroy();
		redirect();
	}

	public function page_admin(){
		if ($this->session->userdata('kode')) {
			$data['list_properti'] = $this->m_home->get_all_data('data_properti');
			$data['list_survey'] = $this->m_home->get_all_data('data_penjadwalan');
			$data['properti'] = count($data['list_properti']);
			$data['survey'] = count($data['list_survey']);
			$this->load->view('templates/admin_template/header');
			$this->load->view('page_admin', $data);
		}else{
			$this->load->view('wtf');
		}
	}

	public function tambah_properti()
	{	
		if ($this->session->userdata('kode')) {
			# code...
			$data['properti'] = $this->m_home->get_all_data('fasilitas_properti');
			$this->load->view('templates/admin_template/header.php');
			$this->load->view('tambah_properti.php',$data);
			$this->load->view('templates/footer.php');
		}else{
			$this->load->view('wtf');
		}
	}

	public function info_survey(){
		if ($this->session->userdata('kode')) {
			# code...
			$data['all_data_survey'] = $this->m_home->get_all_data('data_penjadwalan');
			$this->load->view('templates/admin_template/header');
			$this->load->view('info_survey',$data);
			$this->load->view('templates/footer');
		}else{
			$this->load->view('wtf');
		}
	}

	public function cek_sess(){
		echo $this->session->userdata('kode');
	}

	public function percobaan(){
		$this->load->view('percobaan');
	}

}