<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class member_model extends CI_Model {

	public function member_getall()
	{
		$dataall = $this ->db
		->where('member_status >',1)
		->get('n_member') ->result_array();

		return $dataall;
	}
	public function member_getall_2()
	{
		$dataall = $this ->db
		->where('member_status',1)
		->get('n_member') ->result_array();

		return $dataall;
	}

	public function member_get_by($id)
	{
		$dataall = $this ->db
		->where('member_id',$id)
		->get('n_member') ->result_array();


		return $dataall;
	}
	public function member_add($input)
	{
		$this->db->insert('n_member',$input);
	}
	public function member_edit($input)
	{
		$this->db
		->where('member_id',$input['member_id'])
		->update('n_member',$input);
	}
	public function member_delete($id)
	{
		$this->db
		->where('member_id',$id)
		->delete('n_member');
	}
	public function member_accept($input)
	{
		$this->db
		->where('member_id',$input['member_id'])
		->update('n_member',$input);
	}

}
