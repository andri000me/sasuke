<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_m extends CI_Model {

	public function getAllUsers()
	{
		$this->db->select('a.id_user, a.user_name, a.user_email, a.is_active, b.user_type');
		$this->db->join('tb_user_type b', 'a.id_type = b.id_type', 'inner');
		$this->db->where('a.id_user != ', $this->session->userdata('uid'));
		return $this->db->get('tb_user a')->result();
	}

	public function getUserType()
	{
		$this->db->order_by('user_type', 'asc');
		return $this->db->get('tb_user_type')->result();
	}

	public function tambahUser($data)
	{
		unset($data['submit']);
		unset($data['user_picture_old']);

		return $this->db->insert('tb_user', $data) ? true : false;
	}

	public function getUserByID($id)
	{
		$this->db->select('user_name, user_email, id_type, user_picture, is_active');
		$this->db->where('md5(id_user)', verify($id));
		return $this->db->get('tb_user')->row_array();
	}

	public function checkUser($username, $email, $mode = 'tambah', $id = NULL)
	{
		$this->db->select('user_name');
		if($mode == 'edit'){
			$this->db->group_start();
		}
		$this->db->where('user_name', $username);
		$this->db->or_where('user_email', $email);
		if($mode == 'edit'){
			$this->db->group_end();
			$this->db->where('md5(id_user) !=', verify($id));
		}
		return $this->db->get('tb_user')->num_rows();
	}

	public function editUser($data, $id)
	{
		unset($data['submit']);
		unset($data['user_picture_old']);

		$this->db->where('md5(id_user)', verify($id));
		return $this->db->update('tb_user', $data) ? true : false;
	}

	public function hapusUser($id)
	{
		$this->db->where('md5(id_user)', verify($id));
		return $this->db->delete('tb_user') ? true : false;
	}
}

/* End of file user_m.php */
/* Location: ./application/models/user_m.php */