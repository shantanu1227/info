<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {

	public function index()
	{
		$this->load->view('home');
	}

	public function newuser()
	{
		$this->load->model('model_users');
		$a=$this->model_users->add_user();
		if($a>0){
				$errormsg  = array('errorMessage'=>'A link has been sent to your Email, please Confirm Your Email id.','errorClose'=>'X','errorColor'=>'rgb(24, 175, 48);');
				$this->load->model('model_products');
				$dataThali= array('outputThalis' => $this->model_products->getThali());	
				$dataOffer=array('outputOffers' => $this->model_products->getOffers());
				$this->load->view('home', $dataThali+$dataOffer+$errormsg);	
				}
		else if($a == -1){
				$errormsg  = array('errorMessage'=>'Username already exists.','errorClose'=>'X','errorColor'=>'rgb(214, 38, 38);');
				$this->load->model('model_products');
				$dataThali= array('outputThalis' => $this->model_products->getThali());	
				$dataOffer=array('outputOffers' => $this->model_products->getOffers());
				$this->load->view('home', $dataThali+$dataOffer+$errormsg);	
				}
		else if($a == -2){
				$errormsg  = array('errorMessage'=>'Inserting into database failed.','errorClose'=>'X','errorColor'=>'rgb(214, 38, 38);');
				$this->load->model('model_products');
				$dataThali= array('outputThalis' => $this->model_products->getThali());	
				$dataOffer=array('outputOffers' => $this->model_products->getOffers());
				$this->load->view('home', $dataThali+$dataOffer+$errormsg);	
				}
		else if($a == -3){
				$errormsg  = array('errorMessage'=>'Email sending failed.','errorClose'=>'X','errorColor'=>'rgb(214, 38, 38);');
				$this->load->model('model_products');
				$dataThali= array('outputThalis' => $this->model_products->getThali());	
				$dataOffer=array('outputOffers' => $this->model_products->getOffers());
				$this->load->view('home', $dataThali+$dataOffer+$errormsg);	
				}
	}

	public function confirm_email(){
		$this->load->model('model_users');
		$a=$this->model_users->update_confirmation();
		if($a>0){
				$errormsg  = array('errorMessage'=>'Your email has been confirmed. Please Login','errorClose'=>'X','errorColor'=>'rgb(24, 175, 48);');
				$this->load->model('model_products');
				$dataThali= array('outputThalis' => $this->model_products->getThali());	
				$dataOffer=array('outputOffers' => $this->model_products->getOffers());
				$this->load->view('home', $dataThali+$dataOffer+$errormsg);	
				}
		else if($a == -1){
				$errormsg  = array('errorMessage'=>'Your email has already been confirmed.','errorClose'=>'X','errorColor'=>'rgb(214, 38, 38);');
				$this->load->model('model_products');
				$dataThali= array('outputThalis' => $this->model_products->getThali());	
				$dataOffer=array('outputOffers' => $this->model_products->getOffers());
				$this->load->view('home', $dataThali+$dataOffer+$errormsg);	
				}
		else if($a == -2){
				$errormsg  = array('errorMessage'=>'Your account is no longer available. Please, contact the admin.','errorClose'=>'X','errorColor'=>'rgb(214, 38, 38);');
				$this->load->model('model_products');
				$dataThali= array('outputThalis' => $this->model_products->getThali());	
				$dataOffer=array('outputOffers' => $this->model_products->getOffers());
				$this->load->view('home', $dataThali+$dataOffer+$errormsg);	
				}
	}

}

/* End of file register.php */
/* Location: ./application/controllers/register.php */