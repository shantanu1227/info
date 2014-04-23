<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
Admin Pages Are Controlled here
Index - Shows the login page for admin if you are already logged in as user
		then you would be redirected to home page.
Login - When Admin enters user credentials login function checks the correct credential or not
Adminfunctions - Page where all admin functions are loaded.
BanAccount - Ban a particular user.
Recharge Account - Recharge a account's credit
Deduct Amount  - To deduct credit from a account on a particular transaction if anything extra to
				 be brought.
UpdateThali - To update the daily thalis.
*/

class Admin extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('userName')=='' )	{
		if($this->session->userdata('AdminuserName')!=''){
			$this->load->model('model_admin');
			$data = array('thalis'=>$this->model_admin->getThaliStores());
			$this->load->view('admin',$data);
		}else{
			$this->load->view('adminlogin');
		}
		}else{
			redirect('/','refresh');
		}
	}
	public function login()
	{
		$username = $this->input->post('adminUsername',TRUE);
		$password = $this->input->post('adminPassword',TRUE);
		$this->load->model('model_admin');
		$output=$this->model_admin->login($username,$password);
		if($output>0){
			redirect('admin/adminfunctions','refresh');
		}else{
			redirect('/','refresh');
		}
	}
	public function adminfunctions()
	{
		if($this->session->userdata('AdminuserName')!=''){
			$this->load->model('model_admin');
			$data = array('thalis'=>$this->model_admin->getThaliStores());
			$this->load->view('admin',$data);
		}else{
			redirect('/','refresh');
		}
	}

	public function banAccount()
	{
		if($this->session->userdata('AdminuserName')!='' && $this->session->userdata('userName')==''){
		$userId=$this->input->post('username');
		$this->load->model('model_admin');	
		$this->model_admin->removeuser($userId);
		redirect('/admin/adminfunctions','refresh');
		}else{
			redirect('/','refresh');
		}
	}
	public function rechargeAccount()
	{
		if($this->session->userdata('AdminuserName')!='' && $this->session->userdata('userName')==''){
		$userId=$this->input->post('username');
		$rechargeAmount=$this->input->post('recamount');
		$this->load->model('model_admin');	
		$this->model_admin->adduserBalance($userId,$rechargeAmount);	
		redirect('/admin/adminfunctions','refresh');
		}else{
			redirect('/','refresh');
		}
	}
	public function deductAmount()
	{
		if($this->session->userdata('AdminuserName')!='' && $this->session->userdata('userName')==''){
		$userId=$this->input->post('username');
		$deductAmount=$this->input->post('deductamount');
		$transactionid = $this->input->post('transactionid');
		$this->load->model('model_admin');	
		$this->model_admin->removeuserBalance($userId,$deductAmount,$transactionid);	
		redirect('/admin/adminfunctions','refresh');
		}else{
			redirect('/','refresh');
		}
	}

	public function updateThali()
	{
		if($this->session->userdata('AdminuserName')!='' && $this->session->userdata('userName')==''){
		$shopId=$this->input->post('shopId');
		$lunch = $this->input->post('lunch');
		$dinner = $this->input->post('dinner');
		$this->load->model('model_admin');	
		$this->model_admin->addThali($shopId,$lunch,$dinner);
		redirect('/admin/adminfunctions','refresh');
		}else{
			redirect('/','refresh');
		}	
	}
}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */