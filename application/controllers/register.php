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
		if($a>0)
			$this->load->view('home');
		else{
			echo $a;
		}
	}

	public function confirm_email(){
		$this->load->model('model_users');
		$a=$this->model_users->update_confirmation();
		if($a>0){
			redirect('/', 'refresh');
		}else{
			echo $a;
		}
	}

}

/* End of file register.php */
/* Location: ./application/controllers/register.php */