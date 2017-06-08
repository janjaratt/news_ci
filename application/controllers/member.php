<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class member extends CI_Controller {

	public function index()
	{
		$this->load->view('news_login');
	}
	public function dashboard()
	{
		session_start();
		if ($_SESSION['status'] == 2) {



		$data['news'] = $this ->news_model->news_getall();

		$this->load->view('template/header',$data);
		$this->load->view('admin/admin_index');
		$this->load->view('template/footer');
		}
		else {
			redirect('admin');
		}
	}
	public function news_list()
	{
		session_start();
		$data['news'] = $this ->news_model->news_get_status2();

		$this->load->view('template/header',$data);
		$this->load->view('admin/news_list');
		$this->load->view('template/footer');

	}
	public function news_list_2()
	{
		session_start();
		$data['news'] = $this ->news_model->news_get_status1();

		$this->load->view('template/header',$data);
		$this->load->view('admin/news_list_2');
		$this->load->view('template/footer');

	}
	public function news_list_3()
	{
		session_start();
		$data['news'] = $this ->news_model->news_get_date_exp();

		$this->load->view('template/header',$data);
		$this->load->view('admin/news_list_3');
		$this->load->view('template/footer');

	}

	public function news_update()
	{
		session_start();
		$id = $this->uri->segment(3);
		$data['news_edit'] = $this ->news_model->news_get_by($id);
		$data['type'] = $this ->news_model->get_type();
		// echo "<pre>";
		// print_r($data);
		// exit();
		$this->load->view('template/header',$data);
		$this->load->view('admin/news_form');
		$this->load->view('template/footer');
	}
	public function news_form()
	{
		session_start();
		$data['type'] = $this ->news_model->get_type();

		$this->load->view('template/header',$data);
		$this->load->view('admin/news_form');
		$this->load->view('template/footer');

	}
	public function news_add()
	{
		session_start();
		$input = $this->input->post();

		$pathinfo = pathinfo($_FILES['news_pic']['name'],PATHINFO_EXTENSION);
		$new_file = date('YmdHis').".".$pathinfo;
		move_uploaded_file($_FILES['news_pic']['tmp_name'],"uploads/news/".$new_file);

		$input['news_pic'] = $new_file;
		// $input = array(
		// 	'news_name' => $this->input->post('news_name'),
		// 	'news_detail' => $this->input->post('news_detail'),
		// 	'news_type' => $this->input->post('news_type'),
		// 	'news_date_add' => $this->input->post('news_date_add'),
		// 	'news_date_exp' => $this->input->post('news_date_exp'),
		// 	'news_pic' => $this->input->post('news_pic')
		// );
		$this->news_model->news_add($input);
 	redirect('admin/news_list');
	}

	public function news_edit()
	{

		$input = $this->input->post();

		if (!empty($_FILES['news_pic']['name']))
		{
			$pathinfo = pathinfo($_FILES['news_pic']['name'],PATHINFO_EXTENSION);
			$new_file = date('YmdHis').".".$pathinfo;
			move_uploaded_file($_FILES['news_pic']['tmp_name'],"uploads/news/".$new_file);

			$input['news_pic'] = $new_file;
		}

		$this->news_model->news_edit($input);
 	redirect('admin/news_list');
	}

	public function news_delete()
	{
		$id = $this->uri->segment(3);
		$this->news_model->news_delete($id);
		redirect('admin/news_list');
	}
	public function news_accept()
	{
		$id = $this->uri->segment(3);
		$input = array(
			'news_status' => 2,
			'news_id' => $id,
		);
		$this->news_model->news_accept($input);
 	redirect('admin/news_list_2');
	}



	// ////////////////////member///////////////////////////////
	public function member_list()
	{
		$data['member'] = $this ->member_model->member_getall();

		$this->load->view('template/header',$data);
		$this->load->view('admin/member_list');
		$this->load->view('template/footer');

	}
	public function member_list_2()
	{
		$data['member'] = $this ->member_model->member_getall_2();

		$this->load->view('template/header',$data);
		$this->load->view('admin/member_list_2');
		$this->load->view('template/footer');

	}

	public function member_update()
	{
		$id = $this->uri->segment(3);
		$data['member_edit'] = $this ->member_model->member_get_by($id);

		$this->load->view('template/header',$data);
		$this->load->view('admin/member_form');
		$this->load->view('template/footer');
	}
	public function member_form()
	{

		$this->load->view('template/header');
		$this->load->view('admin/member_form');
		$this->load->view('template/footer');

	}
	public function member_add()
	{
		$input = $this->input->post();

		$this->member_model->member_add($input);
 	redirect('admin/member_list');
	}

	public function member_edit()
	{
		$input = $this->input->post();

		$this->member_model->member_edit($input);
 	redirect('admin/member_list');
	}

	public function member_delete()
	{
		$id = $this->uri->segment(3);
		$this->member_model->member_delete($id);
		redirect('admin/member_list');
	}
	public function member_accept()
	{
		$id = $this->uri->segment(3);
		$input = array(
			'member_status' => 2,
			'member_id' => $id,
		);
		$this->member_model->member_accept($input);
 	redirect('admin/member_list_2');
	}



}
