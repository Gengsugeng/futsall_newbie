<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH .'/libraries/REST_Controller.php';

class Penyewa extends REST_Controller {

	public function __construct($config = 'rest')
	{
		parent::__construct($config);
		$this->load->model('Penyewa_Model','pm');
	}

	public function index_get()
	{
		$id = $this->get('id_penyewa');
		$data = $this->pm->selectPenyewa($id);

		if ($id == null) {
			$this->response($data,200);
		} else {
			$this->response($data,200);
		}
	}

	public function login_get()
	{
		$email = $this->get('email');
		$password = md5($this->get('password'));

		$cek = $this->pm->cekLogin($email,$password);
		if ($cek == 1) {
			$data = $this->pm->dataLogin($email,$password);
			$this->response($data,200);
		} else {
			$this->response(array("message" => "login gagal"),501);
		}
	}

	public function index_post()
	{
		$data = array(
				'id_penyewa' => $this->post('id_penyewa'),
				'nama' => $this->post('nama'),
				'alamat' => $this->post('alamat'),
				'telepon' => $this->post('telepon'),
				'email' => $this->post('email'),
				'password' => md5($this->post('password'))
			);

		$insert = $this->pm->insertPenyewa($data);

		if ($insert) {
			$this->response(array("status" => "true" , "result" => $data, "message" => "Data Berhasil Ditambahkan"),200);
		} else {
			$this->response(array("status" => "false", "message" => "Data Gagal Ditambahkan"),502);
		}
	}

	public function index_put()
	{
		$id = $this->put('id_penyewa');
		$data = array(
				'id_penyewa' => $this->put('id_penyewa'),
				'nama' => $this->put('nama'),
				'alamat' => $this->put('alamat'),
				'telepon' => $this->put('telepon'),
				'email' => $this->put('email'),
				'password' => $this->put('password'),
			);

		$update = $this->pm->updatePenyewa($id,$data);

		if ($update) {
			$this->response(array("status" => "true" , "result" => $data, "message" => "Data Berhasil Diupdate"),200);
		} else {
			$this->response(array("status" => "false","message" => "Data Gagal Diupdate"),502);
		}
	}

	public function index_delete()
	{
		$id = $this->delete('id_penyewa');

		$delete = $this->pm->deletePenyewa($id);
		if ($delete) {
			$this->response(array("status" => "true", "message" => "Data Berhasil Dihapus"),201);
		} else {
			$this->response(array("status" => "false", "message" => "Data Gagal Dihapus"),502);
		}
	}

}

/* End of file Penyewa.php */
/* Location: ./application/controllers/Penyewa.php */