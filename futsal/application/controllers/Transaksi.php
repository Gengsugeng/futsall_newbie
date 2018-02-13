<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	public $API="";
	public $data = array(
						'title' => 'Transaksi',
						'content' => 'transaksi/transaksi_view',
					);

	public function __construct()
	{
		parent::__construct();
		$this->API="http://localhost/futsal_api";
		$this->load->library('curl');
		$this->load->helper('file');
	}

	public function index()
	{
		$this->data['record'] = json_decode($this->curl->simple_get($this->API.'/transaksi'));
		$this->load->view('layout/main', $this->data);
	}

	public function create()
	{
		$id_pemesanan = $this->uri->segment(3);
		$id_penyewa = $this->uri->segment(4);

		

		if (isset($_POST['submit'])) {
			$url = 'C:/xampp/htdocs/futsal_api/upload/lapangan/';
		$bukti = $_FILES['bukti']['name'];
		$path = $url.$bukti;

			$data = array(
				'id_pemesanan'	=> $this->input->post('pesanText'),
				'id_penyewa'	=> $this->input->post('penyewaText'),
				'status'		=> $this->input->post('statusText'),
				'bukti'			=> $bukti,
				'kurang'		=> $this->input->post('dpText'),
				'verified'		=> 0,
				'scan'			=> 0,
				'client'		=> 'web'
			);
			if (isset($_FILES['bukti']['name'])) {
				if(move_uploaded_file($_FILES['bukti']['tmp_name'], $path)){
					$this->curl->simple_post($this->API.'/transaksi',$data,array(CURLOPT_BUFFERSIZE => 10));
					$this->session->set_flashdata('feedback_true', 'Insert Data Berhasil');
				}else {
					$this->session->set_flashdata('feedback_false', 'Insert Data Gagal');
				}
			} else {
				$this->session->set_flashdata('feedback_false', 'Insert Data Gagal');
			}
			redirect('pemesanan/create');
			/*$insert = $this->curl->simple_post($this->API.'/transaksi',$data,array(CURLOPT_BUFFERSIZE => 10));

			if ($insert) {
				$this->session->set_flashdata('feedback_true','Proses Transaksi Berhasil');
				redirect('transaksi');			
			} else {
				$this->session->set_flashdata('feedback_false','Proses Transaksi Gagal');
				redirect('pemesanan/create');
			}*/
		} else {
			$id = array('id_pemesanan' => $id_pemesanan);
			$bayar = json_decode($this->curl->simple_get($this->API.'/pemesanan',$id));
			foreach ($bayar as $b) {
				$byr = $b->bayar;
			}
			$this->data['bayar'] = $byr;
			$this->data['id_pemesanan'] = $id_pemesanan;
			$this->data['id_penyewa'] = $id_penyewa;
			$this->data['content'] = 'transaksi/transaksi_form';
			$this->load->view('layout/main', $this->data);
		}
	}

	public function edit()
	{
		$id = array('id_transaksi' => $this->uri->segment(3));

		if(isset($_POST['submit'])){
			$data = array(
				'id_transaksi' => $id,
				'verified' => 1,
				'scan' => 0
			);

			$update = $this->curl->simple_put($this->API.'/transaksi',$data,array(CURLOPT_BUFFERSIZE => 10));

			if ($update) {
				$this->session->set_flashdata('feedback_true','Verifikasi OK');
				redirect('transaksi');			
			} else {
				$this->session->set_flashdata('feedback_false','Verifikasi Gagal');
				redirect('transaksi');
			}
		}else {
			$this->data['record'] = json_decode($this->curl->simple_get($this->API.'/transaksi',$id));
		$this->data['content'] = 'transaksi/transaksi_cek';
		$this->data['foto'] = $this->API.'/upload/lapangan/';
		$this->load->view('layout/main',$this->data);
		}
		
	}

	public function delete()
	{
		$id = array('id_transaksi' => $this->uri->segment(3));
		$delete = $this->curl->simple_delete($this->API.'/transaksi',$id, array(CURLOPT_BUFFERSIZE => 10));

			if ($delete) {
				$this->session->set_flashdata('feedback_true', 'Delete Data Berhasil');
			} else {
				$this->session->set_flashdata('feedback_false', 'Delete Data Gagal');
			}
			redirect('transaksi');
	}

}

/* End of file Transaksi.php */
/* Location: ./application/controllers/Transaksi.php */