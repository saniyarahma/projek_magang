<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
    {
        // Call the Model constructor
        parent::__construct();

        $this->load->model('Home_model');
		$this->load->model('Maps_model');
		$this->load->library('form_validation');
    }

	public function index()
	{
		$data = [
			'all' => $this->Home_model->countAllEvents(),
			'telkom' => $this->Home_model->countTelkomEvents(),
			'nexa' => $this->Home_model->countNexaEvents(),
			'la' => $this->Home_model->countLAEvents(),
			'jol' => $this->Home_model->countJolEvents(),
			'metro' => $this->Home_model->countMetroEvents(),
			'events' => $this->Home_model->getAllDetailedEvents(),
		];
		
		$this->load->view('home', $data);
		// $this->load->view('home');
	}

	public function calendar_view()
	{
		$this->load->view('calendar');
	}

	public function dashboard()
	{
		$this->load->view('dashboard');
	}


	public function maps()
	{
		$data = array(
			'judul' => 'Input Lokasi',
			'page' => 'maps',
		);
		
		$this->load->view('maps', $data);
	}

	public function input_lokasi()
	{
		
		$this->Maps_model->input_lokasi();
		redirect('Home/maps');
	}

	//pemetaan coordinat
	public function pemetaan_maps()
	{
		
		$data = array(
			'judul' => 'Pemetaan lokasi',
			'page' => 'pemetaan_maps',
			'lokasi' => $this->Maps_model->allData()
		);
		
		// // Tambahkan ini untuk debugging
		// var_dump($data['lokasi']);
		// exit();
	

		$this->load->view('pemetaan_maps', $data);
	}

	//edit maps
	public function edit_maps($id_lokasi)
	{
		$this->load->library('session');
		$this->form_validation->set_rules('nama_lokasi', 'Nama Lokasi', 'required', array(
			'required' => 'Wajib Diisi !'

		));

		$this->form_validation->set_rules('latitude', 'Latitude', 'required', array(
			'required' => 'Wajib Diisi !'

		));

		$this->form_validation->set_rules('longitude', 'Longitude', 'required', array(
			'required' => 'Wajib Diisi !'

		));
		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'judul' => 'Edit lokasi',
				'page' => 'Home/edit_maps',
				'lokasi' => $this->Maps_model->detail($id_lokasi)
			);
	
			$this->load->view('edit_maps', $data);

		} else {

			$data = array (
				'id_lokasi' => $id_lokasi,
				'nama_lokasi' => $this->input->post('nama_lokasi'),
				'latitude' => $this->input->post('latitude'),
				'longitude' => $this->input->post('longitude'),
			);
	
			$this->Maps_model->edit_maps($data);
			$this->session->set_flashdata('pesan', 'Data Lokasi Berhasil di Edit!!');
			redirect('Home/pemetaan_maps');
		}	
	}
	
	public function detail_maps($id_lokasi)
	{
		$data = array(
			'judul' => 'Detail lokasi',
			'page' => 'detail_maps',
			'lokasi' => $this->Maps_model->detail($id_lokasi)
		);

		$this->load->view('detail_maps', $data);
	}

	// public function delete_mas($id_lokasi)
	// {
	// 	$this->Maps_model->delete_maps($id_lokasi);
	// 	redirect('Home/pemetaan_maps');
	// }
	// 	$this->Maps_model->delete_maps($id_lokasi);
	// 	$this->session->set_flashdata('pesan', 'Data Lokasi Berhasil di hapus!!');
	// 	redirect('Home/pemetaan_maps');
	// }
	public function delete_maps($id_lokasi)
	{
		$this->Maps_model->delete_maps($id_lokasi);
		$this->session->set_flashdata('pesan', 'Data Lokasi Berhasil dihapus!!');
		redirect('Home/pemetaan_maps');
	}

	
}
