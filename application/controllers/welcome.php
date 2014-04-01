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
		$this->load->model('model_products');
		$dataThali= array('outputThalis' => $this->model_products->getThali());	
		$dataOffer=array('outputOffers' => $this->model_products->getOffers());
		$this->load->view('home', $dataThali+$dataOffer+$errormsg);	
	}
	/*Url=http://localhost/info/index.php/welcome/kavya*/
	public function kavya()
	{
		$errormsg  = array('errorMessage'=>'','errorClose'=>'','errorColor'=>'#B10COC');
		$this->load->model('model_products');		
		$data= array('output' => $this->model_products->getproducts('kavya') );
		$this->load->model('model_shop');
		$dataTiming= array('outputTimings' => $this->model_shop->getShopDetails('kavya'));
		$this->load->view('kavya', $data+$errormsg+$dataTiming, FALSE);
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
		$this->load->model('model_products');		
		$data= array('output' => $this->model_products->getproducts('koffee') );
		$this->load->model('model_shop');
		$dataTiming= array('outputTimings' => $this->model_shop->getShopDetails('koffee'));
		$this->load->view('koffee', $data+$errormsg+$dataTiming, FALSE);
	}
	public function cart_index()
	{
		$errormsg  = array('errorMessage'=>'','errorClose'=>'','errorColor'=>'#B10COC');
		$data = array('content' => $this->cart->contents());
		$this->load->view('cart_index',$data+$errormsg);
	}
	public function cart()
	{	$this->load->model('model_transaction');
		$slots = array('slots'=>$this->model_transaction->getSlots());
		$errormsg  = array('errorMessage'=>'','errorClose'=>'','errorColor'=>'#B10COC');
		$this->load->view('cart_show',$errormsg+$slots);
	}
	public function bigbite()
	{
		$errormsg  = array('errorMessage'=>'','errorClose'=>'','errorColor'=>'#B10COC');
		$this->load->model('model_products');		
		$data= array('output' => $this->model_products->getproducts('bigbite') );
		$this->load->model('model_shop');
		$dataTiming= array('outputTimings' => $this->model_shop->getShopDetails('bigbite'));
		$this->load->view('bigbite', $data+$errormsg+$dataTiming, FALSE);
	}
	public function washexpress()
	{
		$this->load->model('model_shop');
		$errormsg  = array('errorMessage'=>'','errorClose'=>'','errorColor'=>'#B10COC');
		$dataTiming= array('outputTimings' => $this->model_shop->getShopDetails('washexpress'));
		$this->load->view('washexpress', $errormsg+$dataTiming, FALSE);
	}
	public function omega()
	{
		$errormsg  = array('errorMessage'=>'','errorClose'=>'','errorColor'=>'#B10COC');
		$this->load->view('omega',$errormsg);
	}

	public function subway()
	{
		$errormsg  = array('errorMessage'=>'','errorClose'=>'','errorColor'=>'#B10COC');
		$this->load->model('model_products');		
		$data= array('output' => $this->model_products->getproducts('subway') )+$errormsg;
		$this->load->helper('form');
		$this->load->model('model_shop');
		$dataTiming= array('outputTimings' => $this->model_shop->getShopDetails('subway'));
		$this->load->view('subway', $data+$dataTiming, FALSE);
	}
	public function apex()
	{
		$errormsg  = array('errorMessage'=>'','errorClose'=>'','errorColor'=>'#B10COC');
		$this->load->view('apex',$errormsg);
	}
	public function chatkazz()
	{
		$errormsg  = array('errorMessage'=>'','errorClose'=>'','errorColor'=>'#B10COC');
		$this->load->model('model_products');		
		$data= array('output' => $this->model_products->getproducts('chatkazz') );
		$this->load->model('model_shop');
		$dataTiming= array('outputTimings' => $this->model_shop->getShopDetails('chatkazz'));
		$this->load->view('chatkazz', $data+$errormsg+$dataTiming, FALSE);	
	}
	public function qwiches()
	{
		$errormsg  = array('errorMessage'=>'','errorClose'=>'','errorColor'=>'#B10COC');
		$this->load->model('model_products');		
		$data= array('output' => $this->model_products->getproducts('qwiches') );
		$this->load->model('model_shop');
		$dataTiming= array('outputTimings' => $this->model_shop->getShopDetails('qwiches'));
		$this->load->view('qwiches', $data+$errormsg+$dataTiming, FALSE);
	}


		public function oxford()
		{
			$errormsg  = array('errorMessage'=>'','errorClose'=>'','errorColor'=>'#B10COC');
		$this->load->model('model_products');		
		$data= array('output' => $this->model_products->getproducts('oxford') );
		$this->load->model('model_shop');
		$dataTiming= array('outputTimings' => $this->model_shop->getShopDetails('oxford'));
		$this->load->view('oxford', $data+$errormsg+$dataTiming, FALSE);
		}
		public function clublaptop()
		{
			$errormsg  = array('errorMessage'=>'','errorClose'=>'','errorColor'=>'#B10COC');
		$this->load->model('model_products');		
		$data= array('output' => $this->model_products->getproducts('clublaptop') );
		$this->load->model('model_shop');
		$dataTiming= array('outputTimings' => $this->model_shop->getShopDetails('clublaptop'));
		$this->load->view('clublaptop', $data+$errormsg+$dataTiming, FALSE);	
		}
			public function ominfotech()
			{
				$errormsg  = array('errorMessage'=>'','errorClose'=>'','errorColor'=>'#B10COC');
		$this->load->model('model_products');		
		$data= array('output' => $this->model_products->getproducts('ominfotech') );
		$this->load->model('model_shop');
		$dataTiming= array('outputTimings' => $this->model_shop->getShopDetails('ominfotech'));
		$this->load->view('ominfotech', $data+$errormsg+$dataTiming, FALSE);
			}
			public function crossword()
			{
				$errormsg  = array('errorMessage'=>'','errorClose'=>'','errorColor'=>'#B10COC');
		$this->load->model('model_products');		
		$data= array('output' => $this->model_products->getproducts('crossword') );
		$this->load->model('model_shop');
		$dataTiming= array('outputTimings' => $this->model_shop->getShopDetails('crossword'));
		$this->load->view('crossword', $data+$errormsg+$dataTiming, FALSE);
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
		$this->load->model('model_products');		
		$data= array('output' => $this->model_products->getproducts('vstationery') );
		$this->load->model('model_shop');
		$dataTiming= array('outputTimings' => $this->model_shop->getShopDetails('vstationery'));
		$this->load->view('vstationery', $data+$errormsg+$dataTiming, FALSE);
			}
			public function feedback()
			{	
				$this->load->model('model_admin');
				$this->load->model('model_products');
				$this->model_admin->insertFeedback();
				$errormsg  = array('errorMessage'=>'Thank You For Your FeedBack','errorClose'=>'X','errorColor'=>'#00BB0C');
				$dataThali= array('outputThalis' => $this->model_products->getThali());	
				$dataOffer=array('outputOffers' => $this->model_products->getOffers());
				$this->load->view('home', $dataThali+$dataOffer+$errormsg);	
				
			}
			public function myaccount()
			{
		$this->load->model('model_users');
		$errormsg  = array('errorMessage'=>'','errorClose'=>'','errorColor'=>'rgb(214, 38, 38)');
		$userdetails=$this->model_users->getuserdetails();
		if(is_object($userdetails)){
			$this->load->model('model_transaction');
			$transactions=$this->model_transaction->getusertransaction($userdetails->userId);
			$data=array('output' => $userdetails,'transactions'=>$transactions)+$errormsg;
			$this->load->view('myaccount', $data);
		}
		else{
			if($userdetails == -1){
				$errorMessage = "Please Log In ";
				$errormsg['errorMessage']=$errorMessage;
				$errormsg['errorClose'] = "X";
			$this->load->model('model_products');
		$dataThali= array('outputThalis' => $this->model_products->getThali());	
		$dataOffer=array('outputOffers' => $this->model_products->getOffers());
		$this->load->view('home', $dataThali+$dataOffer+$errormsg);	
			}if ($userdetails == -2) {
				$errorMessage = "Incorrect Session ";
				$errormsg['errorMessage']=$errorMessage;
				$errormsg['errorClose'] = "X";
				$this->load->model('model_products');
				$dataThali= array('outputThalis' => $this->model_products->getThali());	
				$dataOffer=array('outputOffers' => $this->model_products->getOffers());
				$this->load->view('home', $dataThali+$dataOffer+$errormsg);	
			}
		}
	}

	

	public function admin()
	{
		$this->load->view('admin');
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
