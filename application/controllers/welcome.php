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
		$this->load->view('home');
	}
	/*Url=http://localhost/info/index.php/welcome/home1*/
	public function home1()
	{
		$this->load->view('home1');
	}
	/*Url=http://localhost/info/index.php/welcome/kavya*/
	public function kavya()
	{
		$this->load->model('model_products');		
		$data= array('output' => $this->model_products->getproducts('kavya') );
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
		$this->load->view('koffee');
	}
	public function bigbite()
	{
		$this->load->view('bigbite');
	}
	public function medicine()
	{
		$this->load->view('medicine');
	}
    public function washexpress()
	{
		$this->load->view('washexpress');
	}
	public function omega()
	{
		$this->load->view('omega');
	}
	public function subway()
	{
		$this->load->view('subway');
	}
	public function apex()
	{
		$this->load->view('apex');
	}
	public function chatkazz()
	{
		$this->load->view('chatkazz');
	}
	public function qwiches()
	{
		$this->load->view('qwiches');
	}
	public function oxford()
	{
		$this->load->view('oxford');
	}
	public function crossword()
	{
		$this->load->view('crossword');
	}
	public function clublaptop()
	{
		$this->load->view('clublaptop');
	}
	public function ominfotech()
	{
		$this->load->view('ominfotech');
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
