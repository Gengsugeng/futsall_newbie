<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan extends CI_Controller {

	public $API="";
	public $data = array(
						'title' => 'Pemesanan',
						'content' => 'pemesanan/pemesanan_view',
					);
	public function __construct()
	{
		parent::__construct();
		$this->API="http://localhost/futsal_api";
		$this->load->library('curl');
	}

	public function index()
	{
		$this->data['record'] = json_decode($this->curl->simple_get($this->API.'/pemesanan'));
		$this->load->view('layout/main', $this->data);
	}

	public function create()
	{
		if (isset($_POST['submit'])) {

			$data = array(
				'id_pemesanan'	=> '',
				'id_penyewa'	=> $this->input->post('idText'),
				'id_lapangan'	=> $this->input->post('lapanganText'),
				'lama'			=> $this->input->post('lamaText'),
				'jam'			=> $this->input->post('jamText'),
				'tgl_main'		=> $this->input->post('tanggalText')
			);
			$insert = $this->curl->simple_post($this->API.'/pemesanan',$data,array(CURLOPT_BUFFERSIZE => 10));

			if ($insert) {
//				$this->session->set_flashdata('id_pemesanan', $data['id_pemesanan']);
				$this->session->set_flashdata('id_penyewa', $data['id_penyewa']);
				$id = array('id_lapangan' => $data['id_lapangan']);
				$this->session->set_flashdata('id_lapangan', $id);

				$this->session->set_flashdata('feedback_true','Pemesanan Lapangan Berhasil');
				redirect('pemesanan');
			} else {
				$this->session->set_flashdata('feedback_false','Pemesanan Lapangan Gagal');
				redirect('pemesanan/create');
			}
		} else {
			// $id = array('id_penyewa' => 3);
			$this->data['penyewa'] = json_decode($this->curl->simple_get($this->API.'/penyewa'));
			$this->data['lapangan'] = json_decode($this->curl->simple_get($this->API.'/lapangan'));
			$this->data['content'] = 'pemesanan/pemesanan_create';
			$this->load->view('layout/main', $this->data);
		}
	}

	public function edit()
	{

	}

	public function delete($id)
	{

	}

	public function pemesanan_soap()
	{
		
	}

}

/* End of file Pemesanan.php */
/* Location: ./application/controllers/Pemesanan.php */