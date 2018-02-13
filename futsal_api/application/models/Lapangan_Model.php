<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lapangan_Model extends CI_Model {

	private $tabel = 'lapangan';

	public function selectLapangan($id)
	{
		if ($id == '') {
			return $this->db->get($this->tabel)
							->result();
		} else {
			return $this->db->where('id_lapangan', $id)
							->get($this->tabel)
							->result();
		}
	}

	public function insertLapangan($data)
	{
		return $this->db->insert($this->tabel, $data);
	}

	public function updateLapangan($id, $data)
	{
		return $this->db->where('id_lapangan',$id)
						->update($this->tabel, $data);
	}

	public function deleteLapangan($id)
	{
		return $this->db->where('id_lapangan', $id)
						->delete($this->tabel);
	}
}

/* End of file Lapangan_Model.php */
/* Location: ./application/models/Lapangan_Model.php */