<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH .'/libraries/REST_Controller.php';

class Transaksi extends REST_Controller {

	public function __construct($config = 'rest')
	{
		parent::__construct($config);
		$this->load->model('Transaksi_Model','tm');
		$this->load->model('Pemesanan_Model','pm');
		$this->load->library('ciqrcode');
	}

	public function index_get()
	{
		$id = $this->get('id_transaksi');
		$psn = $this->get('id_pemesanan');
		$penyewa = $this->get('id_penyewa');
		$data = $this->tm->selectTransaksi($id,$psn,$penyewa);

		if ($id == null) {
			$this->response($data,200);
		} else {
			$this->response($data,200);
		}
	}

	public function index_post()
	{
		$id = random_string('alnum', 8);
		
		$params['data'] = $id;
		$params['level'] = 'H';
		$params['size'] = 10;
		$params['savename'] = FCPATH.'upload/qr/'.$id.'.png';
		$this->ciqrcode->generate($params);

		$qr = $id.'.png';

		$data = array(
				'id_transaksi' => $id,
				'id_pemesanan' => $this->post('id_pemesanan'),
				'id_penyewa' => $this->post('id_penyewa'),
				'status' => $this->post('status'),
				'bukti' => $this->post('bukti'),
				'kurang' => $this->post('kurang'),
				'qr_code' => $qr,
				'verified' => $this->post('verified'),
				'scan'	=> $this->post('scan')
			);

		if($data['status'] == 'DP'){
			$psn = $this->get('id_pemesanan');
			$dp = $data['kurang'];

			$harga = $this->pm->selectPemesanan($psn,null,null);
			foreach ($harga as $h) {
				$hrg = $h->bayar;
			}

			$kurang = $hrg - $dp;

			$data['kurang'] = $kurang;
			$client = $this->post('client');

			if(/*!empty($_FILES['bukti']['name']) && */$client == 'web'){
				/*$file = $_FILES['bukti']['name'];
				$path = './upload/bukti/'.$file;
				$data['bukti'] = $file;

				move_uploaded_file($_FILES['bukti']['tmp_name'],$path);*/
				$insert = $this->tm->insertTransaksi($data);

				if ($insert) {
				$this->response(array("status" => "true" , "result" => $data, "message" => "Data Berhasil Ditambahkan"),200);
				} else {
					$this->response(array("status" => "false", "message" => "Data Gagal Ditambahkan"),502);
				}
			}

		}else if($data['status'] == 'Lunas'){

			$client = $this->post('client');

			if(/*!empty($_FILES['bukti']['name']) && */$client == 'web'){
				/*$file = $_FILES['bukti']['name'];
				$path = './upload/bukti/'.$file;
				$data['bukti'] = $file;

				move_uploaded_file($_FILES['bukti']['tmp_name'],$path);*/
				$insert = $this->tm->insertTransaksi($data);

				if ($insert) {
				$this->response(array("status" => "true" , "result" => $data, "message" => "Data Berhasil Ditambahkan"),200);
				} else {
					$this->response(array("status" => "false", "message" => "Data Gagal Ditambahkan"),502);
				}
			}			
		}
	}

	public function index_put()
	{
		$id = $this->put('id_transaksi');

		$data = array(
				'id_transaksi' => $id,
				'verified' => $this->put('verified'),
				'scan' => $this->put('scan')
			);

		$update = $this->tm->updateTransaksi($id,$data);

		if ($update) {
			$this->response(array("status" => "true" , "result" => $data, "message" => "Data Berhasil Diupdate"),200);
		} else {
			$this->response(array("status" => "false","message" => "Data Gagal Diupdate"),502);
		}
	}

	public function index_delete()
	{
		$id = $this->delete('id_transaksi');

		$delete = $this->tm->deleteTransaksi($id);
		if ($delete) {
			$this->response(array("status" => "true", "message" => "Data Berhasil Dihapus"),201);
		} else {
			$this->response(array("status" => "false", "message" => "Data Gagal Dihapus"),502);
		}
	}

}

/* End of file Transaksi.php */
/* Location: ./application/controllers/Transaksi.php */