<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_Model extends CI_Model {

	private $tabel = 'transaksi';

	public function selectTransaksi($id,$psn,$penyewa)
	{
		$select = 'transaksi.id_transaksi, transaksi.id_pemesanan, transaksi.id_penyewa, penyewa.nama,lapangan.nama as lapangan,pemesanan.lama,pemesanan.bayar, pemesanan.jam, pemesanan.tgl_main,transaksi.status, transaksi.bukti, transaksi.kurang,transaksi.verified, transaksi.scan, transaksi.qr_code';
		if ($id == '' && $psn =='') {
			$this->db->join('pemesanan', 'pemesanan.id_pemesanan = transaksi.id_pemesanan', 'left');
			$this->db->join('lapangan', 'lapangan.id_lapangan = pemesanan.id_lapangan', 'left');
			$this->db->join('penyewa', 'penyewa.id_penyewa = transaksi.id_penyewa', 'left');
			$this->db->select($select);
			$query = $this->db->get($this->tabel);
			return $query->result();

		}else if($psn == '' && $penyewa == ''){
			$this->db->where('transaksi.id_transaksi', $id);
			$this->db->join('pemesanan', 'pemesanan.id_pemesanan = transaksi.id_pemesanan', 'left');
			$this->db->join('lapangan', 'lapangan.id_lapangan = pemesanan.id_lapangan', 'left');
			$this->db->join('penyewa', 'penyewa.id_penyewa = transaksi.id_penyewa', 'left');
			$this->db->select($select);
			$query = $this->db->get($this->tabel);
			return $query->result();

		}else if($id == '' && $penyewa == ''){
			$this->db->where('transaksi.id_pemesanan', $psn);
			$this->db->join('pemesanan', 'pemesanan.id_pemesanan = transaksi.id_pemesanan', 'left');
			$this->db->join('lapangan', 'lapangan.id_lapangan = pemesanan.id_lapangan', 'left');
			$this->db->join('penyewa', 'penyewa.id_penyewa = transaksi.id_penyewa', 'left');
			$this->db->select($select);
			$query = $this->db->get($this->tabel);
			return $query->result();
		}else if ($id == '' && $psn == '') {
			$this->db->where('transaksi.id_penyewa', $penyewa);
			$this->db->join('pemesanan', 'pemesanan.id_pemesanan = transaksi.id_pemesanan', 'left');
			$this->db->join('lapangan', 'lapangan.id_lapangan = pemesanan.id_lapangan', 'left');
			$this->db->join('penyewa', 'penyewa.id_penyewa = transaksi.id_penyewa', 'left');
			$this->db->select($select);
			$query = $this->db->get($this->tabel);
			return $query->result();

		} elseif ($id == '') {
			$this->db->where('transaksi.id_pemesanan', $psn);
			$this->db->where('transaksi.id_penyewa', $penyewa);
			$this->db->join('pemesanan', 'pemesanan.id_pemesanan = transaksi.id_pemesanan', 'left');
			$this->db->join('lapangan', 'lapangan.id_lapangan = pemesanan.id_lapangan', 'left');
			$this->db->join('penyewa', 'penyewa.id_penyewa = transaksi.id_penyewa', 'left');
			$this->db->select($select);
			$query = $this->db->get($this->tabel);
			return $query->result();
		}
		else{
			$this->db->where('transaksi.id_transaksi', $id);
			$this->db->where('transaksi.id_pemesanan', $psn);
			$this->db->where('transaksi.id_penyewa', $penyewa);
			$this->db->join('pemesanan', 'pemesanan.id_pemesanan = transaksi.id_pemesanan', 'left');
			$this->db->join('lapangan', 'lapangan.id_lapangan = pemesanan.id_lapangan', 'left');
			$this->db->join('penyewa', 'penyewa.id_penyewa = transaksi.id_penyewa', 'left');
			$this->db->select($select);
			$query = $this->db->get($this->tabel);
			return $query->result();
		}
	}

	public function insertTransaksi($data)
	{
		return $this->db->insert($this->tabel, $data);
	}

	public function updateTransaksi($id, $data)
	{
		return $this->db->where('id_transaksi', $id)
						->update($this->tabel, $data);
	}

	public function deleteTransaksi($id)
	{
		return $this->db->where('id_transaksi', $id)
						->delete($this->tabel);
	}
}

/* End of file Transaksi_Model.php */
/* Location: ./application/models/Transaksi_Model.php */