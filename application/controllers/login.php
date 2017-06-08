<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {

	public function accept()
	{
			$input = $this->input->post();
			// $pwd = md5($input['member_pass']);
			$query = $this->db
			->where('member_email',$input['member_email'])
			->where('member_pass',$input['member_pass'])
			->get('n_member')
			->result_array();
			// echo "<pre>";
			// print_r($query);
			// exit();
			if (count($query) > 0) {
				session_start();
				$_SESSION['id'] = $query[0]['member_id'];
				$_SESSION['email'] = $query[0]['member_email'];
				$_SESSION['status'] = $query[0]['member_status'];

				if ($_SESSION['status'] == 10) {
					$_SESSION['ADMIN'] = 10;
					redirect('admin/dashboard');
				}elseif ($_SESSION['status'] == 2) {
					$_SESSION['MEMBER'] = 2;
					redirect('member/dashboard');
				}

				// $_SESSION['MEMBER'] = $input[0]['member_id'];
				// redirect('member/dashboard');
				//
				// $_SESSION['ADMIN'] = $input[0]['member_id'];
				// redirect('admin/dashboard');
			} else {
				// $data['error'] = 'กรุณาตรวจสอบรหัสผ่านของท่าน';
				// $this->load->view('news_login',$data);
				echo "<script> alert ('กรุณาตรวจสอบรหัสผ่านของท่าน')</script>";
				echo "<meta http-equiv='refresh' content='0; url=../admin' />";
			}
	}
	public function logout()
	{
		session_start();
		session_destroy();

		redirect('admin');
	}



}
