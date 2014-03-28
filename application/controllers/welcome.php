<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	/*URL=http://localhost/info/index.php*/
	public function index()
	{
		$errormsg  = array('errorMessage'=>'','errorClose'=>'','errorColor'=>'#B10COC');
		$this->load->view('home',$errormsg);
	}
	/*Url=http://localhost/info/index.php/welcome/home1*/
	public function home1()
	{
		$this->load->view('home1');
	}
	/*Url=http://localhost/info/index.php/welcome/kavya*/
	public function kavya()
	{
		$errormsg  = array('errorMessage'=>'','errorClose'=>'','errorColor'=>'#B10COC');
		$this->load->model('model_products');		
		$data= array('output' => $this->model_products->getproducts('kavya') )+$errormsg;
		$this->load->view('kavya', $data, FALSE);
	}
	public function skinterface()
	{
		$this->load->helper(array('form'));
		$this->load->model('model_products');		
		$data= array('output' => $this->model_products->getproducts('kavya') );
		$this->load->view('skinterface', $data, FALSE);
	}
    public function koffee()
	{	
		$errormsg  = array('errorMessage'=>'','errorClose'=>'','errorColor'=>'#B10COC');
		$this->load->view('koffee',$errormsg);
	}
	public function bigbite()
	{
		$errormsg  = array('errorMessage'=>'','errorClose'=>'','errorColor'=>'#B10COC');
		$this->load->view('bigbite',$errormsg);
	}
	public function medicine()
	{
		$errormsg  = array('errorMessage'=>'','errorClose'=>'','errorColor'=>'#B10COC');
		$this->load->view('medicine',$errormsg);
	}
    public function washexpress()
	{
		$errormsg  = array('errorMessage'=>'','errorClose'=>'','errorColor'=>'#B10COC');
		$this->load->view('washexpress',$errormsg);
	}
	public function omega()
	{
		$errormsg  = array('errorMessage'=>'','errorClose'=>'','errorColor'=>'#B10COC');
		$this->load->view('omega',$errormsg);
	}
	public function subway()
	{	$errormsg  = array('errorMessage'=>'','errorClose'=>'','errorColor'=>'#B10COC');
		$this->load->model('model_products');		
		$data= array('output' => $this->model_products->getproducts('subway') )+$errormsg;
		$this->load->helper('form');
		$this->load->view('subway', $data, FALSE);
	}
	public function apex()
	{
		$errormsg  = array('errorMessage'=>'','errorClose'=>'','errorColor'=>'#B10COC');
		$this->load->view('apex',$errormsg);
	}
	public function chatkazz()
	{
		$errormsg  = array('errorMessage'=>'','errorClose'=>'','errorColor'=>'#B10COC');
		$this->load->view('chatkazz',$errormsg);
	}
	public function qwiches()
	{
		$errormsg  = array('errorMessage'=>'','errorClose'=>'','errorColor'=>'#B10COC');
		$this->load->view('qwiches',$errormsg);
	}
	public function oxford()
	{
		$errormsg  = array('errorMessage'=>'','errorClose'=>'','errorColor'=>'#B10COC');
		$this->load->view('oxford',$errormsg);
	}
	public function crossword()
	{
		$errormsg  = array('errorMessage'=>'','errorClose'=>'','errorColor'=>'#B10COC');
		$this->load->view('crossword',$errormsg);
	}
	public function clublaptop()
	{
		$errormsg  = array('errorMessage'=>'','errorClose'=>'','errorColor'=>'#B10COC');
		$this->load->view('clublaptop',$errormsg);
	}
	public function ominfotech()
	{
		$errormsg  = array('errorMessage'=>'','errorClose'=>'','errorColor'=>'#B10COC');
		$this->load->view('ominfotech',$errormsg);
	}
	public function faq()
	{
		$errormsg  = array('errorMessage'=>'','errorClose'=>'','errorColor'=>'#B10COC');
		$this->load->view('faq',$errormsg);
	}
	public function aboutus()
	{
		$errormsg  = array('errorMessage'=>'','errorClose'=>'','errorColor'=>'#B10COC');
		$this->load->view('aboutus',$errormsg);
	}
	public function vstationery()
	{
		$errormsg  = array('errorMessage'=>'','errorClose'=>'','errorColor'=>'#B10COC');
		$this->load->view('vstationery',$errormsg);
	}
	public function myaccount()
	{//#b10coc //00bb3c
		$this->load->model('model_users');
		$errormsg  = array('errorMessage'=>'','errorClose'=>'','errorColor'=>'#B10COC');
		$userdetails=$this->model_users->getuserdetails();
		if(is_object($userdetails)){
			$this->load->model('model_transaction');
			$transaction=$this->model_transaction->getusertransaction($userdetails->userId);
			$data=array('output' => $userdetails,'transactions'=>$transactions)+$errormsg;
			$this->load->view('myaccount', $data);
		}
		else{
		if($userdetails == -1){
			$errorMessage = "Please Log In ";
			$errormsg['errorMessage']=$errorMessage;
			$errormsg['errorClose'] = "X";
			$this->load->view("home",$errormsg);
		}if ($userdetails == -2) {
			$errorMessage = "Incorrect Session ";
			$errormsg['errorMessage']=$errorMessage;
			$errormsg['errorClose'] = "X";
			$this->load->view("home",$errormsg);
		}
	}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
