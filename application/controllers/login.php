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
		else{
			$data= array('output' => $a );
			$this->load->view('test', $data, FALSE);
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