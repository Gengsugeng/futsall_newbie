<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan_Model extends CI_Model {

	private $tabel = 'pemesanan';

	public function selectPemesanan($id,$lap,$penyewa)
	{
		$select = 'pemesanan.id_pemesanan,pemesanan.id_penyewa,pemesanan.id_lapangan,penyewa.nama as nama, lapangan.nama as lapangan, pemesanan.lama, pemesanan.bayar, pemesanan.jam, pemesanan.tgl_pesan, pemesanan.tgl_main, transaksi.id_pemesanan as transaksi';

		if ($id == '' && $lap == '' && $penyewa == '') {
			return $this->db->select($select)
							->join('penyewa','penyewa.id_penyewa = pemesanan.id_penyewa','left')
							->join('lapangan','lapangan.id_lapangan = pemesanan.id_lapangan','left')

							->join('transaksi','pemesanan.id_pemesanan = transaksi.id_pemesanan','left')
							->order_by('pemesanan.id_pemesanan', 'desc')
							->get($this->tabel)
							->result();
		}else if($lap == '' && $penyewa == '' ){
			return $this->db->where('pemesanan.id_pemesanan', $id)
							->select($select)
							->join('penyewa','penyewa.id_penyewa = pemesanan.id_penyewa','left')
							->join('lapangan','lapangan.id_lapangan = pemesanan.id_lapangan','left')
							->join('transaksi','pemesanan.id_pemesanan = transaksi.id_pemesanan','left')
							->order_by('pemesanan.id_pemesanan', 'desc')
							->get($this->tabel)
							->result();
		} elseif ($id == '' && $lap == '') {
			return $this->db->where('pemesanan.id_penyewa', $penyewa)
							->select($select)
							->join('penyewa','penyewa.id_penyewa = pemesanan.id_penyewa','left')
							->join('lapangan','lapangan.id_lapangan = pemesanan.id_lapangan','left')
							->join('transaksi','pemesanan.id_pemesanan = transaksi.id_pemesanan','left')
							->order_by('pemesanan.id_pemesanan', 'desc')
							->get($this->tabel)
							->result();
		}elseif ($id == '' && $penyewa == '') {
			return $this->db->where('pemesanan.id_lapangan', $lap)
							->select($select)
							->join('penyewa','penyewa.id_penyewa = pemesanan.id_penyewa','left')
							->join('lapangan','lapangan.id_lapangan = pemesanan.id_lapangan','left')
							->join('transaksi','pemesanan.id_pemesanan = transaksi.id_pemesanan','left')
							->order_by('pemesanan.id_pemesanan', 'desc')
							->get($this->tabel)
							->result();
		} elseif ($id == '') {
			return $this->db->where('pemesanan.id_penyewa', $penyewa)
							->where('pemesanan.id_lapangan', $lap)
							->select($select)
							->join('penyewa','penyewa.id_penyewa = pemesanan.id_penyewa','left')
							->join('lapangan','lapangan.id_lapangan = pemesanan.id_lapangan','left')
							->join('transaksi','pemesanan.id_pemesanan = transaksi.id_pemesanan','left')
							->order_by('pemesanan.id_pemesanan', 'desc')
							->get($this->tabel)
							->result();
		}else{
			return $this->db->where('pemesanan.id_penyewa', $penyewa)
							->where('pemesanan.id_lapangan', $lap)
							->where('pemesanan.id_pemesanan', $id)
							->select($select)
							->join('penyewa','penyewa.id_penyewa = pemesanan.id_penyewa','left')
							->join('lapangan','lapangan.id_lapangan = pemesanan.id_lapangan','left')
							->join('transaksi','pemesanan.id_pemesanan = transaksi.id_pemesanan','left')
							->order_by('pemesanan.id_pemesanan', 'desc')
							->get($this->tabel)
							->result();
		}
	}

	public function insertPemesanan($data)
	{
		return $this->db->insert($this->tabel, $data);
	}

	public function updatePemesanan($id, $data)
	{
		return $this->db->where('id_pemesanan', $id)
						->update($this->tabel, $data);
	}

	public function deletePemesanan($id)
	{
		return $this->db->where('id_pemesanan', $id)
						->delete($this->tabel);
	}

	public function cekHarga($id)
	{
		return $this->db->where('id_lapangan', $id)
						->select('harga')
						->get('lapangan')
						->result();
	}
}

/* End of file Pemesanan_Model.php */
/* Location: ./application/models/Pemesanan_Model.php */