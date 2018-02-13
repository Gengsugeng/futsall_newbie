<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	var $API="";
	public $data = array(
						'title' => 'Admin',
						'content' => 'admin/admin_view',
					);

	public function __construct()
	{
		parent::__construct();
		$this->API="http://localhost/futsal_api";
		$this->load->library('curl');
	}

	public function index()
	{
		$this->data['record'] = json_decode($this->curl->simple_get($this->API.'/admin'));
		$this->load->view('layout/main', $this->data);
	}

	public function create()
	{
		if (isset($_POST['submit'])) {
			$data = array(
				'nama'		=> $this->input->post('namaText'),
				'username'	=> $this->input->post('usernameText'),
				'password'	=> $this->input->post('passwordText')
			);
			$insert = $this->curl->simple_post($this->API.'/admin',$data,array(CURLOPT_BUFFERSIZE => 10));

			if ($insert) {
				$this->session->set_flashdata('feedback_true','Insert Data Berhasil');
			} else {
				$this->session->set_flashdata('feedback_false','Insert Data Gagal');
			}
			redirect('admin');
		} else {
			$this->data['content'] = 'admin/admin_create';
			$this->load->view('layout/main', $this->data);
		}
	}

	public function edit()
	{
		if (isset($_POST['submit'])) {
			$data = array(
				'id_admin'	=> $this->uri->segment(3),
				'nama'		=> $this->input->post('namaText'),
				'username'	=> $this->input->post('usernameText')
			);
			$update = $this->curl->simple_put($this->API.'/admin', $data, array(CURLOPT_BUFFERSIZE => 10));

			if ($update) {
				$this->session->set_flashdata('feedback_true', 'Update Data Berhasil');
			} else {
				$this->session->set_flashdata('feedback_false', 'Update Data Gagal');
			}
			redirect('admin');
		} else {
			$id = array('id_admin' => $this->uri->segment(3));
			$this->data['content'] = 'admin/admin_edit';
			$this->data['record'] = json_decode($this->curl->simple_get($this->API.'/admin', $id));
			$this->load->view('layout/main', $this->data);
		}
	}

	public function delete()
	{
		$id = array('id_admin' => $this->uri->segment(3));
		$delete = $this->curl->simple_delete($this->API.'/admin',$id, array(CURLOPT_BUFFERSIZE => 10));

			if ($delete) {
				$this->session->set_flashdata('feedback_true', 'Delete Data Berhasil');
			} else {
				$this->session->set_flashdata('feedback_false', 'Delete Data Gagal');
			}
			redirect('admin');
	}
}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */
