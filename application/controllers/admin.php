<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

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
		$this->load->model('model_admin');	
		$this->model_admin->removeuserBalance($userId,$deductAmount);	
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