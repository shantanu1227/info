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
getadditionaldetails  - Gives the thali array with error array
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
			$data = $this->getadditionaldetails('','','');
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
			if($this->model_admin->removeuser($userId)>0){
				$data=$this->getadditionaldetails('User Banned Successfully','X','rgb(24, 175, 48)');
				$this->load->view('admin',$data);
				header( "refresh:3;url=".URL."admin/adminfunctions" );		
			}else {
				/*Show Error*/
				$data=$this->getadditionaldetails('Incorrect UserId','X','rgb(214, 38, 38);');
				$this->load->view('admin',$data);
				header( "refresh:3;url=".URL."admin/adminfunctions" );		
			}
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
			if($this->model_admin->adduserBalance($userId,$rechargeAmount)>0){	
				$data=$this->getadditionaldetails('Recharge Done Successfully','X','rgb(24, 175, 48)');
				$this->load->view('admin',$data);
				header( "refresh:3;url=".URL."admin/adminfunctions" );
			}else{
				/*Show error*/
				$data=$this->getadditionaldetails('Incorrect UserId Or Amount','X','rgb(214, 38, 38);');
				$this->load->view('admin',$data);
				header( "refresh:3;url=".URL."admin/adminfunctions" );
			}
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
			$output=$this->model_admin->removeuserBalance($userId,$deductAmount,$transactionid);
			if($output>0){
				$data=$this->getadditionaldetails('Amount Deducted Successfully','X','rgb(24, 175, 48)');
				$this->load->view('admin',$data);
				header( "refresh:3;url=".URL."admin/adminfunctions" );
			}else{
				/*Show Error*/
				if($output==0){
					$data=$this->getadditionaldetails('Incorrect Amount','X','rgb(214, 38, 38);');
					$this->load->view('admin',$data);
					header( "refresh:3;url=".URL."admin/adminfunctions" );
				}else if($output==-1){
					$data=$this->getadditionaldetails('User Id Not Found','X','rgb(214, 38, 38);');
					$this->load->view('admin',$data);
					header( "refresh:3;url=".URL."admin/adminfunctions" );
				}else{
					$data=$this->getadditionaldetails('Transaction Id Not Found','X','rgb(214, 38, 38);');
					$this->load->view('admin',$data);
					header( "refresh:3;url=".URL."admin/adminfunctions" );
				}
			}			
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
	private function getadditionaldetails($errormsg,$errorclose,$errorcolor)
	{
		$this->load->model('model_admin');
		$data = array('thalis'=>$this->model_admin->getThaliStores());
		$errormsg  = array('errorMessage'=>$errormsg,'errorClose'=>$errorclose,'errorColor'=>$errorcolor);
		return $errormsg+$data;
	}
}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */