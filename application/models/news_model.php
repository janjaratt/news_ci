<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class news_model extends CI_Model {

	public function news_getall()
	{
		$dataall = $this ->db
		->join('n_type','n_news.news_type=n_type.type_id')
		->get('n_news') ->result_array();

		return $dataall;
	}
	public function news_get_status1()
	{
		$dataall = $this ->db
		->where('news_status',1)
		->join('n_type','n_news.news_type=n_type.type_id')
		->get('n_news') ->result_array();

		return $dataall;
	}
	public function news_get_status2()
	{
		date_default_timezone_set("Asia/Bangkok");

		$dataall = $this ->db
		->where('news_status',2)
		->where('news_date_exp >',date('Y-m-d'))
		->where('news_date_add <=',date('Y-m-d'))
		->join('n_type','n_news.news_type=n_type.type_id')
		->get('n_news') ->result_array();

		return $dataall;
	}
	public function news_get_date_exp()
	{
		date_default_timezone_set("Asia/Bangkok");

		$dataall = $this ->db
		->where('news_status',2)
		->where('news_date_exp <',date('Y-m-d'))
		->join('n_type','n_news.news_type=n_type.type_id')
		->get('n_news') ->result_array();

		return $dataall;
	}

	public function news_get_by($id)
	{
		$dataall = $this ->db
		->where('news_id',$id)
		->join('n_type','n_news.news_type=n_type.type_id')
		->get('n_news') ->result_array();


		return $dataall;
	}
	public function news_add($input)
	{
		$this->db->insert('n_news',$input);
	}
	public function news_edit($input)
	{
		$this->db
		->where('news_id',$input['news_id'])
		->update('n_news',$input);
	}
	public function news_delete($id)
	{
		$this->db
		->where('news_id',$id)
		->delete('n_news');
	}
	public function news_accept($input)
	{
		$this->db
		->where('news_id',$input['news_id'])
		->update('n_news',$input);
	}

	public function get_type()
	{
		$dataall = $this ->db
		->get('n_type') ->result_array();
		return $dataall;
	}

}
