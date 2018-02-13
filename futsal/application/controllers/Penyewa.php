<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penyewa extends CI_Controller {

	public $API="";
	public $data = array(
						'title' => 'Penyewa',
						'content' => 'penyewa/penyewa_view',
					);
	public function __construct()
	{
		parent::__construct();
		$this->API="http://localhost/futsal_api";
		$this->load->library('curl');
	}

	public function index()
	{
		$this->data['record'] = json_decode($this->curl->simple_get($this->API.'/penyewa'));
		$this->load->view('layout/main', $this->data);
	}

	public function create()
	{
		if (isset($_POST['submit'])) {
			$data = array(
				'nama'		=> $this->input->post('namaText'),
				'alamat'	=> $this->input->post('alamatText'),
				'email'		=> $this->input->post('emailText'),
				'telepon'	=> $this->input->post('teleponText'),
				'password'	=> $this->input->post('passwordText')
			);
			$insert = $this->curl->simple_post($this->API.'/penyewa',$data,array(CURLOPT_BUFFERSIZE => 10));

			if ($insert) {
				$this->session->set_flashdata('feedback_true','Insert Data Berhasil');
				redirect('penyewa');
			} else {
				$this->session->set_flashdata('feedback_false','Insert Data Gagal');
				redirect('penyewa');
			}
		} else {
			$this->data['content'] = 'penyewa/penyewa_create';
			$this->load->view('layout/main', $this->data);
		}
	}

	public function edit()
	{

	}

	public function delete()
	{
		$id = array('id_penyewa' => $this->uri->segment(3));
		$delete = $this->curl->simple_delete($this->API.'/penyewa',$id, array(CURLOPT_BUFFERSIZE => 10));

			if ($delete) {
				$this->session->set_flashdata('feedback_true', 'Delete Data Berhasil');
			} else {
				$this->session->set_flashdata('feedback_false', 'Delete Data Gagal');
			}
			redirect('penyewa');
	}

}

/* End of file Penyewa.php */
/* Location: ./application/controllers/Penyewa.php */