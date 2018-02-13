<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lapangan extends CI_Controller {

	public $API="";
	public $data = array(
						'title' => 'Lapangan',
						'content' => 'lapangan/lapangan_view'
					);
	
	public function __construct()
	{
		parent::__construct();
		$this->API="http://localhost/futsal_api";
		$this->load->library('curl');
		
	}

	public function index()
	{
		$this->load->helper('file');
		$this->data['record'] = json_decode($this->curl->simple_get($this->API.'/lapangan'));
		$this->data['foto'] = $this->API.'/upload/lapangan/';
		$this->load->view('layout/main', $this->data);
	}

	public function create()
	{
		if (isset($_POST['submit'])) {
			$url = 'C:/xampp/htdocs/futsal_api/upload/lapangan/';
			$foto = $_FILES['foto']['name'];
			$path = $url.$foto;

			$nomor = $this->input->post('nomorText');
			$data = array(
				'nama'		=> 'Lapangan '.$nomor,
				'ukuran'	=> $this->input->post('ukuranText'),
				'texture'	=> $this->input->post('textureText'),
				'harga'		=> $this->input->post('hargaText'),
				'foto'		=> $foto,
				'client' 	=> 'web'
			);

			if (isset($_FILES['foto']['name'])) {
				if(move_uploaded_file($_FILES['foto']['tmp_name'], $path)){
					$this->curl->simple_post($this->API.'/lapangan',$data,array(CURLOPT_BUFFERSIZE => 10));
					$this->session->set_flashdata('feedback_true', 'Insert Data Berhasil');
				}else {
					$this->session->set_flashdata('feedback_false', 'Insert Data Gagal');
				}
			} else {
				$this->session->set_flashdata('feedback_false', 'Insert Data Gagal');
			}
			redirect('lapangan');
		} else {
			$this->data['content'] = 'lapangan/lapangan_create';
			$this->load->view('layout/main', $this->data);
		}
	}

	public function edit()
	{

	}

	public function delete()
	{
		$id = array('id_lapangan' => $this->uri->segment(3));
		$delete = $this->curl->simple_delete($this->API.'/lapangan',$id, array(CURLOPT_BUFFERSIZE => 10));

			if ($delete) {

				$this->session->set_flashdata('feedback_true', 'Delete Data Berhasil');
			} else {
				$this->session->set_flashdata('feedback_false', 'Delete Data Gagal');
			}
			redirect('lapangan');
	}

}

/* End of file Lapangan.php */
/* Location: ./application/controllers/Lapangan.php */