<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Model extends CI_Model {

	private $tabel = 'admin';

	public function selectAdmin($id)
	{
		if ($id == '') {
			$query = $this->db->get($this->tabel);
			return $query->result();
		} else {
			return $this->db->where('id_admin', $id)
							->get($this->tabel)
							->result();
		}
	}

	public function countAdmin()
	{
		$query = $this->db->get($this->tabel);
		
		return $query->num_rows();
	}

	public function insertAdmin($data)
	{
		return $this->db->insert($this->tabel, $data);
	}

	public function updateAdmin($id, $data)
	{
		return $this->db->where('id_admin', $id)
						->update($this->tabel, $data);
	}

	public function deleteAdmin($id)
	{
		return $this->db->where('id_admin', $id)
						->delete($this->tabel);
	}
}

/* End of file Admin_Model.php */
/* Location: ./application/models/Admin_Model.php */