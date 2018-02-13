<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH .'/libraries/REST_Controller.php';

class Admin extends REST_Controller {
	
	public function __construct($config = 'rest')
	{
		parent::__construct($config);
		$this->load->model('Admin_Model','am',TRUE);
	}

	public function index_get()
	{
		$id = $this->get('id_admin');
		$data = $this->am->selectAdmin($id);
		$total = $this->am->countAdmin();

		if ($id == null) {
			$this->response($data,200);
			
		} else {
			$this->response($data,200);
		}
	}

	public function index_post()
	{
		$data = array(
				'id_admin'	=> $this->post('id_admin'),
				'nama'		=> $this->post('nama'),
				'username'	=> $this->post('username'),
				'password'	=> md5($this->post('password'))
			);

		$insert = $this->am->insertAdmin($data);

		if ($insert) {
			$this->response(array("status" => "true" , "result" => $data, "message" => "Data Berhasil Ditambahkan"),200);
		} else {
			$this->response(array("status" => "false", "message" => "Data Gagal Ditambahkan"),502);
		}
	}

	public function index_put()
	{
		$id = $this->put('id_admin');
		$data = array(
				'id_admin'	=> $this->put('id_admin'),
				'nama'		=> $this->put('nama'),
				'username'	=> $this->put('username'),
			);

		$update = $this->am->updateAdmin($id,$data);

		if ($update) {
			$this->response(array("status" => "true" , "result" => $data, "message" => "Data Berhasil Diupdate"),200);
		} else {
			$this->response(array("status" => "false","message" => "Data Gagal Diupdate"),502);
		}
	}

	public function index_delete()
	{
		$id = $this->delete('id_admin');

		$delete = $this->am->deleteAdmin($id);
		if ($delete) {
			$this->response(array("status" => "true", "message" => "Data Berhasil Dihapus"),201);
		} else {
			$this->response(array("status" => "false", "message" => "Data Gagal Dihapus"),502);
		}
	}

}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */