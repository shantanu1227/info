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
	public function offers()
	{
	$errormsg  = array('errorMessage'=>'','errorClose'=>'','errorColor'=>'#B10COC');
		$this->load->model('model_products');
			
		$dataOffer=array('outputOffers' => $this->model_products->getOffersseparate());
		$this->load->view('offers', $dataOffer+$errormsg);	
	}
	/*Url=http://localhost/info/index.php/welcome/kavya*/
	public function kavya()
	{
		$errormsg  = array('errorMessage'=>'','errorClose'=>'','errorColor'=>'#B10COC');
		$this->load->model('model_products');		
		$data= array('output' => $this->model_products->getproducts('kavya') );
		$this->load->model('model_shop');
		$dataTiming= array('outputTimings' => $this->model_shop->getShopDetails('kavya'));
		$contactNumber = array('outputNumber' => $this->model_shop->getShopNumber('kavya'));
		$this->load->view('kavya', $data+$errormsg+$dataTiming+$contactNumber, FALSE);
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
		$contactNumber = array('outputNumber' => $this->model_shop->getShopNumber('koffee'));
		$this->load->view('koffee', $data+$errormsg+$dataTiming+$contactNumber, FALSE);
	}
	public function cart_index()
	{
		$errormsg  = array('errorMessage'=>'','errorClose'=>'','errorColor'=>'#B10COC');
		$data = array('content' => $this->cart->contents());
		$this->load->view('cart_index',$data+$errormsg);
	}
	public function cart()
	{	
		$this->load->model('model_transaction');
		$slots = array('slots'=>$this->model_transaction->getSlots());
		$errormsg  = array('errorMessage'=>'','errorClose'=>'','errorColor'=>'#B10COC');
		$this->load->view('cart_show',$errormsg+$slots);
	}
	public function skloginpage()
	{
		$errormsg  = array('errorMessage'=>'','errorClose'=>'','errorColor'=>'#B10COC');
		$this->load->view('skloginpage',$errormsg);
	}
	public function adminlogin()
	{
		$errormsg  = array('errorMessage'=>'','errorClose'=>'','errorColor'=>'#B10COC');
		$this->load->view('adminlogin',$errormsg);
	}
	public function bigbite()
	{
		$errormsg  = array('errorMessage'=>'','errorClose'=>'','errorColor'=>'#B10COC');
		$this->load->model('model_products');		
		$data= array('output' => $this->model_products->getproducts('bigbite') );
		$this->load->model('model_shop');
		$dataTiming= array('outputTimings' => $this->model_shop->getShopDetails('bigbite'));
		$contactNumber = array('outputNumber' => $this->model_shop->getShopNumber('bigbite'));
		$this->load->view('bigbite', $data+$errormsg+$dataTiming+$contactNumber, FALSE);
	}
	public function washexpress()
	{
		$this->load->model('model_shop');
		$errormsg  = array('errorMessage'=>'','errorClose'=>'','errorColor'=>'#B10COC');
		$dataTiming= array('outputTimings' => $this->model_shop->getShopDetails('washexpress'));
		$contactNumber = array('outputNumber' => $this->model_shop->getShopNumber('washexpress'));
		$this->load->view('washexpress', $errormsg+$dataTiming+$contactNumber, FALSE);
	}
	public function omega()
	{
		$this->load->model('model_shop');
		$errormsg  = array('errorMessage'=>'','errorClose'=>'','errorColor'=>'#B10COC');
		$contactNumber = array('outputNumber' => $this->model_shop->getShopNumber('omega'));
		$this->load->view('omega',$errormsg+$contactNumber);
	}

	public function subway()
	{
		$errormsg  = array('errorMessage'=>'','errorClose'=>'','errorColor'=>'#B10COC');
		$this->load->model('model_products');		
		$data= array('output' => $this->model_products->getproducts('subway') )+$errormsg;
		$this->load->helper('form');
		$this->load->model('model_shop');
		$dataTiming= array('outputTimings' => $this->model_shop->getShopDetails('subway'));
		$contactNumber = array('outputNumber' => $this->model_shop->getShopNumber('subway'));
		$this->load->view('subway', $data+$dataTiming+$contactNumber, FALSE);
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
		$contactNumber = array('outputNumber' => $this->model_shop->getShopNumber('chatkazz'));
		$this->load->view('chatkazz', $data+$errormsg+$dataTiming+$contactNumber, FALSE);	
	}
	public function qwiches()
	{
		$errormsg  = array('errorMessage'=>'','errorClose'=>'','errorColor'=>'#B10COC');
		$this->load->model('model_products');		
		$data= array('output' => $this->model_products->getproducts('qwiches') );
		$this->load->model('model_shop');
		$dataTiming= array('outputTimings' => $this->model_shop->getShopDetails('qwiches'));
		$contactNumber = array('outputNumber' => $this->model_shop->getShopNumber('qwiches'));
		$this->load->view('qwiches', $data+$errormsg+$dataTiming+$contactNumber, FALSE);
	}


	public function oxford()
	{
		$errormsg  = array('errorMessage'=>'','errorClose'=>'','errorColor'=>'#B10COC');
		$this->load->model('model_products');		
		$data= array('output' => $this->model_products->getproducts('oxford') );
		$this->load->model('model_shop');
		$dataTiming= array('outputTimings' => $this->model_shop->getShopDetails('oxford'));
		$contactNumber = array('outputNumber' => $this->model_shop->getShopNumber('oxford'));
		$this->load->view('oxford', $data+$errormsg+$dataTiming+$contactNumber, FALSE);
	}
	public function clublaptop()
	{
		$errormsg  = array('errorMessage'=>'','errorClose'=>'','errorColor'=>'#B10COC');
		$this->load->model('model_products');		
		$data= array('output' => $this->model_products->getproducts('clublaptop') );
		$this->load->model('model_shop');
		$dataTiming= array('outputTimings' => $this->model_shop->getShopDetails('clublaptop'));
		$contactNumber = array('outputNumber' => $this->model_shop->getShopNumber('clublaptop'));
		$this->load->view('clublaptop', $data+$errormsg+$dataTiming+$contactNumber, FALSE);	
	}
	public function ominfotech()
	{
		$errormsg  = array('errorMessage'=>'','errorClose'=>'','errorColor'=>'#B10COC');
		$this->load->model('model_products');		
		$data= array('output' => $this->model_products->getproducts('ominfotech') );
		$this->load->model('model_shop');
		$dataTiming= array('outputTimings' => $this->model_shop->getShopDetails('ominfotech'));
		$contactNumber = array('outputNumber' => $this->model_shop->getShopNumber('kavya'));
		$this->load->view('ominfotech', $data+$errormsg+$dataTiming+$contactNumber, FALSE);
	}
	public function crossword()
	{
		$errormsg  = array('errorMessage'=>'','errorClose'=>'','errorColor'=>'#B10COC');
		$this->load->model('model_products');		
		$data= array('output' => $this->model_products->getproducts('crossword') );
		$this->load->model('model_shop');
		$dataTiming= array('outputTimings' => $this->model_shop->getShopDetails('crossword'));
		$contactNumber = array('outputNumber' => $this->model_shop->getShopNumber('crossword'));
		$this->load->view('crossword', $data+$errormsg+$dataTiming+$contactNumber, FALSE);
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
		$contactNumber = array('outputNumber' => $this->model_shop->getShopNumber('vstationery'));
		$this->load->view('vstationery', $data+$errormsg+$dataTiming+$contactNumber, FALSE);
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
