<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penyewa_Model extends CI_Model {

	private $tabel = 'penyewa';

	public function selectPenyewa($id)
	{
		if ($id == '') {
			return $this->db->get($this->tabel)
							->result();
		} else {
			return $this->db->where('id_penyewa', $id)
							->get($this->tabel)
							->result();
		}
	}

	public function cekLogin($email,$password)
	{
		return $this->db->where('email', $email)
						->where('password',$password)
						->get($this->tabel)
						->num_rows();
	}

	public function dataLogin($email,$password)
	{
		return $this->db->where('email', $email)
						->where('password',$password)
						->get($this->tabel)
						->result();
	}

	public function insertPenyewa($data)
	{
		return $this->db->insert($this->tabel, $data);
	}

	public function updatePenyewa($id, $data)
	{
		return $this->db->where('id_penyewa', $id)
						->update($this->tabel, $data);
	}

	public function deletePenyewa($id)
	{
		return $this->db->where('id_penyewa', $id)
						->delete($this->tabel);
	}
}

/* End of file Penyewa_Model.php */
/* Location: ./application/models/Penyewa_Model.php */