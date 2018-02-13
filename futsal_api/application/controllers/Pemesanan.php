<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH .'/libraries/REST_Controller.php';

class Pemesanan extends REST_Controller {

	public function __construct($config = 'rest')
	{
		parent::__construct($config);
		$this->load->model('Pemesanan_Model','pm');
	}

	public function index_get()
	{
		$id = $this->get('id_pemesanan');
		$lap = $this->get('id_lapangan');
		$penyewa = $this->get('id_penyewa');

		$data = $this->pm->selectPemesanan($id,$lap,$penyewa);

		if ($id == null) {
			$this->response($data,200);
		} else {
			$this->response($data,200);
		}
	}

	public function index_post()
	{
		$data = array(
				'id_pemesanan' => $this->post('id_pemesanan'),
				'id_penyewa' => $this->post('id_penyewa'),
				'id_lapangan' => $this->post('id_lapangan'),
				'lama' => $this->post('lama'),
				'bayar' => '',
				'jam' => $this->post('jam'),
				'tgl_pesan' => date('Y-m-d'),
				'tgl_main' =>  $this->post('tgl_main')
			);
/*		$data['id_pemesanan'] = random_string('alnum', 4);*/
		$lama = $data['lama'];
		$harga = $this->pm->cekHarga($data['id_lapangan']);

		foreach ($harga as $h) {
			$hrg = $h->harga;
		}
		$total = $lama * $hrg;
		$data['bayar'] = $total;
		$insert = $this->pm->insertPemesanan($data);

		if ($insert) {
			$this->response(array("status" => "true" , "result" => $data, "message" => "Data Berhasil Ditambahkan"),200);
		} else {
			$this->response(array("status" => "false", "message" => "Data Gagal Ditambahkan"),502);
		}
	}

	public function index_put()
	{
		$id = $this->put('id_pemesanan');
		$data = array(
				'id_pemesanan' => $this->post('id_admin'),
				'id_penyewa' => $this->post('id_penyewa'),
				'id_lapangan' => $this->post('id_lapangan'),
				'lama' => $this->post('lama'),
				'jam' => $this->post('jam'),
				'tgl_pesan' => $this->post('tgl_pesan'),
				'tgl_main' => $this->post('tgl_main')
			);

		$update = $this->pm->updatePemesanan($id,$data);

		if ($update) {
			$this->response(array("status" => "true" , "result" => $data, "message" => "Data Berhasil Diupdate"),200);
		} else {
			$this->response(array("status" => "false","message" => "Data Gagal Diupdate"),502);
		}
	}

	public function index_delete()
	{
		$id = $this->delete('id_pemesanan');

		$delete = $this->pm->deletePemesanan($id);
		if ($delete) {
			$this->response(array("status" => "true", "message" => "Data Berhasil Dihapus"),201);
		} else {
			$this->response(array("status" => "false", "message" => "Data Gagal Dihapus"),502);
		}
	}

}

/* End of file Pemesanan.php */
/* Location: ./application/controllers/Pemesanan.php */