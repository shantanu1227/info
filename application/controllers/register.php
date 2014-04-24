<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
	Newuser - The registration on new user.
	Confirm_email - When registration is done then mail is sent to email id and when the 
					user clicks on the link on mail confirmation is done here.
*/
class Register extends CI_Controller {

	public function newuser()
	{
		$this->load->model('model_users');
		$captcha=$this->input->post('captcha');
		if($this->session->userdata('captchaword')== $captcha){
		$a=$this->model_users->add_user();
		if($a>0){
				$errormsg  = array('errorMessage'=>'A link has been sent to your Email, please Confirm Your Email id.','errorClose'=>'X','errorColor'=>'rgb(24, 175, 48);');
				$this->load->model('model_products');
				$dataThali= array('outputThalis' => $this->model_products->getThali());	
				$dataOffer=array('outputOffers' => $this->model_products->getOffers());
				$captcha = array('image'=>$this->model_products->createCaptcha());
				$this->load->view('home', $dataThali+$dataOffer+$errormsg+$captcha);	
				}
		else if($a == -1){
				$errormsg  = array('errorMessage'=>'Username already exists.','errorClose'=>'X','errorColor'=>'rgb(214, 38, 38);');
				$this->load->model('model_products');
				$dataThali= array('outputThalis' => $this->model_products->getThali());	
				$dataOffer=array('outputOffers' => $this->model_products->getOffers());
				$captcha = array('image'=>$this->model_products->createCaptcha());
				$this->load->view('home', $dataThali+$dataOffer+$errormsg+$captcha);	
				}
		else if($a == -2){
				$errormsg  = array('errorMessage'=>'Inserting into database failed.','errorClose'=>'X','errorColor'=>'rgb(214, 38, 38);');
				$this->load->model('model_products');
				$dataThali= array('outputThalis' => $this->model_products->getThali());	
				$dataOffer=array('outputOffers' => $this->model_products->getOffers());
				$captcha = array('image'=>$this->model_products->createCaptcha());
				$this->load->view('home', $dataThali+$dataOffer+$errormsg+$captcha);	
				}
		else if($a == -3){
				$errormsg  = array('errorMessage'=>'Email sending failed.','errorClose'=>'X','errorColor'=>'rgb(214, 38, 38);');
				$this->load->model('model_products');
				$dataThali= array('outputThalis' => $this->model_products->getThali());	
				$dataOffer=array('outputOffers' => $this->model_products->getOffers());
				$captcha = array('image'=>$this->model_products->createCaptcha());
				$this->load->view('home', $dataThali+$dataOffer+$errormsg+$captcha);	
				}
			}else{
				$errormsg  = array('errorMessage'=>'Invalid Captcha.','errorClose'=>'X','errorColor'=>'rgb(214, 38, 38);');
				$this->load->model('model_products');
				$dataThali= array('outputThalis' => $this->model_products->getThali());	
				$dataOffer=array('outputOffers' => $this->model_products->getOffers());
				$captcha = array('image'=>$this->model_products->createCaptcha());
				$this->load->view('home', $dataThali+$dataOffer+$errormsg+$captcha);	
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
				$captcha = array('image'=>$this->model_products->createCaptcha());
				$this->load->view('home', $dataThali+$dataOffer+$errormsg+$captcha);	
				}
		else if($a == -1){
				$errormsg  = array('errorMessage'=>'Your email has already been confirmed.','errorClose'=>'X','errorColor'=>'rgb(214, 38, 38);');
				$this->load->model('model_products');
				$dataThali= array('outputThalis' => $this->model_products->getThali());	
				$dataOffer=array('outputOffers' => $this->model_products->getOffers());
				$captcha = array('image'=>$this->model_products->createCaptcha());
				$this->load->view('home', $dataThali+$dataOffer+$errormsg+$captcha);	
				}
		else if($a == -2){
				$errormsg  = array('errorMessage'=>'Your account is no longer available. Please, contact the admin.','errorClose'=>'X','errorColor'=>'rgb(214, 38, 38);');
				$this->load->model('model_products');
				$dataThali= array('outputThalis' => $this->model_products->getThali());	
				$dataOffer=array('outputOffers' => $this->model_products->getOffers());
				$captcha = array('image'=>$this->model_products->createCaptcha());
				$this->load->view('home', $dataThali+$dataOffer+$errormsg+$captcha);	
				}
	}

}

/* End of file register.php */
/* Location: ./application/controllers/register.php */