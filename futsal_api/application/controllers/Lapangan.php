<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH .'/libraries/REST_Controller.php';

class Lapangan extends REST_Controller {

	public function __construct($config = 'rest')
	{
		parent::__construct($config);
		$this->load->model('Lapangan_Model','lm');
	}

	public function index_get()
	{
		$id = $this->get('id_lapangan');
		$data = $this->lm->selectLapangan($id);

		if ($id == null) {
			$this->response($data,200);
		} else {
			$this->response($data,200);
		}
	}

	public function index_post()
	{
		$data = array(
				'id_lapangan' => $this->post('id_lapangan'),
				'nama' => $this->post('nama'),
				'ukuran' => $this->post('ukuran'),
				'texture' => $this->post('texture'),
				'harga' => $this->post('harga'),
				'foto' => $this->post('foto')
			);

		$client = $this->post('client');

		if ($client == 'web') {
			$insert = $this->lm->insertLapangan($data);

			if ($insert) {
				$this->response(array("status" => "true" , "result" => $data, "message" => "Data Berhasil Ditambahkan"),200);
			} else {
				$this->response(array("status" => "false", "message" => "Data Gagal Ditambahkan"),502);
			}
		} else {
			$file = $_FILES['foto']['name'];
			$path = './upload/lapangan/'.$file;
			$data['foto'] = $file;

			if (isset($_FILES['foto']['name'])) {
				if(move_uploaded_file($_FILES['foto']['tmp_name'], $path)){
					//$insert = 
					$this->lm->insertLapangan($data);
					$this->response(array("status" => "true" , "result" => $data, "message" => "Data Berhasil Ditambahkan"),200);
				}else {
					$this->response(array("status" => "false", "message" => "Data Gagal Ditambahkan"),502);
				}
			} else {
				$this->response(array("status" => "foto kosong", "result" => $data),200);
			}
		}
	}

	public function index_put()
	{
		$id = $this->put('id_lapangan');
		$data = array(
				'id_lapangan' => $this->put('id_lapangan'),
				'nama' => $this->put('nama'),
				'ukuran' => $this->put('ukuran'),
				'texture' => $this->put('texture'),
				'harga' => $this->put('harga'),
				// 'foto' => $this->put('foto')
			);

		$update = $this->lm->updateLapangan($id,$data);

		if ($update) {
			$this->response(array("status" => "true" , "result" => $data, "message" => "Data Berhasil Diupdate"),200);
		} else {
			$this->response(array("status" => "false","message" => "Data Gagal Diupdate"),502);
		}
	}

	public function index_delete()
	{
		$id = $this->delete('id_lapangan');

		$delete = $this->lm->deleteLapangan($id);
		$foto = $this->lm->selectLapangan($id);
		if ($delete) {
			foreach ($foto as $g) {
				$path = str_replace("application/upload/lapangan/","",APPPATH).$g->foto;
			}
			unlink($path);
			$this->response(array("status" => "true", "message" => "Data Berhasil Dihapus"),201);
		} else {
			$this->response(array("status" => "false", "message" => "Data Gagal Dihapus"),502);
		}
	}

}

/* End of file Lapangan.php */
/* Location: ./application/controllers/Lapangan.php */