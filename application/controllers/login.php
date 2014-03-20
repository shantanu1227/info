<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->model('model_users');
		$a=$this->model_users->login();
		if($a>0){
			$this->load->view('home');
		}
		else{
			$data= array('output' => $a );
			$this->load->view('test', $data, FALSE);
		}
	}

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */