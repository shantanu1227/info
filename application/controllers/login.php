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
					$this->load->view('home', $dataThali+$dataOffer+$errormsg);	
					}
		else if($a == -2){
					$errormsg  = array('errorMessage'=>'Incorrect Username or Password','errorClose'=>'X','errorColor'=>'rgb(214, 38, 38);');
					$this->load->model('model_products');
					$dataThali= array('outputThalis' => $this->model_products->getThali());	
					$dataOffer=array('outputOffers' => $this->model_products->getOffers());
					$this->load->view('home', $dataThali+$dataOffer+$errormsg);	
					}			
	}
	public function logout()
	{
		$this->load->model('model_users');
		$this->model_users->logout();
		header("cache-Control: no-store, no-cache, must-revalidate");
		header("cache-Control: post-check=0, pre-check=0", false);
		header("Pragma: no-cache");
		header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
		redirect('/', 'refresh');
	}

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */