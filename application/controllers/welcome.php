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
		$this->load->model('model_products');
		$dataThali= array('outputThalis' => $this->model_products->getThali());	
		$dataOffer=array('outputOffers' => $this->model_products->getOffers());
		#print_r($dataOffer);
		$this->load->view('home', $dataThali+$dataOffer);	
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
		$this->load->model('model_products');		
		$data= array('output' => $this->model_products->getproducts('koffee') );
		$this->load->view('koffee', $data, FALSE);
	}
	public function bigbite()
	{
		$this->load->model('model_products');		
		$data= array('output' => $this->model_products->getproducts('bigbite') );
		$this->load->view('bigbite', $data, FALSE);
	}
	public function medicine()
	{
		$this->load->model('model_products');		
		$data= array('output' => $this->model_products->getproducts('medicine') );
		$this->load->view('medicine', $data, FALSE);
	}
    public function washexpress()
	{
		$this->load->model('model_products');		
		$data= array('output' => $this->model_products->getproducts('washexpress') );
		$this->load->view('washexpress', $data, FALSE);
	}
	public function omega()
	{
		$this->load->model('model_products');		
		$data= array('output' => $this->model_products->getproducts('omega') );
		$this->load->view('omega', $data, FALSE);
	}
	public function subway()
	{	$this->load->model('model_products');		
		$data= array('output' => $this->model_products->getproducts('subway') );
		$this->load->helper('form');
		$this->load->view('subway', $data, FALSE);
	}
	public function apex()
	{
		$this->load->model('model_products');		
		$data= array('output' => $this->model_products->getproducts('apex') );
		$this->load->view('apex', $data, FALSE);
	}
	public function chatkazz()
	{
		$this->load->model('model_products');		
		$data= array('output' => $this->model_products->getproducts('chatkazz') );
		$this->load->view('chatkazz', $data, FALSE);
	}
	public function qwiches()
	{
		$this->load->model('model_products');		
		$data= array('output' => $this->model_products->getproducts('qwiches') );
		$this->load->view('qwiches', $data, FALSE);
	}
	public function oxford()
	{
		$this->load->model('model_products');		
		$data= array('output' => $this->model_products->getproducts('oxford') );
		$this->load->view('oxford', $data, FALSE);
	}
	public function crossword()
	{
		$this->load->model('model_products');		
		$data= array('output' => $this->model_products->getproducts('crossword') );
		$this->load->view('crossword', $data, FALSE);
	}
	public function clublaptop()
	{
		$this->load->model('model_products');		
		$data= array('output' => $this->model_products->getproducts('clublaptop') );
		$this->load->view('clublaptop', $data, FALSE);
	}
	public function ominfotech()
	{
		$this->load->model('model_products');		
		$data= array('output' => $this->model_products->getproducts('ominfotech') );
		$this->load->view('ominfotech', $data, FALSE);
	}
	public function faq()
	{
		$this->load->view('faq');
	}
	public function aboutus()
	{
		$this->load->view('aboutus');
	}
	public function vstationery()
	{
		$this->load->model('model_products');		
		$data= array('output' => $this->model_products->getproducts('vstationery') );
		$this->load->view('vstationery', $data, FALSE);
	}
	public function myaccount()
	{
		$this->load->view('myaccount');
	}
	public function admin()
	{
		$this->load->model('model_products');		
		$data= array('output' => $this->model_products->getproducts('admin') );
		$this->load->view('admin', $data, FALSE);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
