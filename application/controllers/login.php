<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
 {

	public function index()
	{
		$this->load->model('model_users');
		$a=$this->model_users->login();
		if($a>0){
			redirect('/', 'refresh');
		}
		else if($a == -1){
					$errormsg  = array('errorMessage'=>'Please Confirm Your Email id','errorClose'=>'X','errorColor'=>'rgb(214, 38, 38);');
					$this->load->model('model_products');
					$dataThali= array('outputThalis' => $this->model_products->getThali());	
					$dataOffer=array('outputOffers' => $this->model_products->getOffers());		
					$captcha = array('image'=>$this->model_products->createCaptcha());
					$this->load->view('home', $dataThali+$dataOffer+$errormsg+$captcha);	
					}
		else if($a == -2){
					$errormsg  = array('errorMessage'=>'Incorrect Username or Password','errorClose'=>'X','errorColor'=>'rgb(214, 38, 38);');
					$this->load->model('model_products');
					$dataThali= array('outputThalis' => $this->model_products->getThali());	
					$dataOffer=array('outputOffers' => $this->model_products->getOffers());
					$captcha = array('image'=>$this->model_products->createCaptcha());
					$this->load->view('home', $dataThali+$dataOffer+$errormsg+$captcha);	
					}			
	}
	public function logout()
	{
		$this->load->model('model_users');
		$this->model_users->logout();
		$this->load->library('output');
		$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
		$this->output->set_header("Pragma: no-cache");
		redirect('/', 'refresh');
		$this->model_users->logout();


	}

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */