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
		$captcha = array('image'=>$this->model_products->createCaptcha());
		$this->load->view('home', $dataThali+$dataOffer+$errormsg+$captcha);	
	
	}
	public function offers()
	{
	$errormsg  = array('errorMessage'=>'','errorClose'=>'','errorColor'=>'#B10COC');
		$this->load->model('model_products');
			
		$dataOffer=array('outputOffers' => $this->model_products->getOffersseparate());
		$captcha = array('image'=>$this->model_products->createCaptcha());
		$this->load->view('offers', $dataOffer+$errormsg+$captcha);	
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
		$captcha = array('image'=>$this->model_products->createCaptcha());
		$this->load->view('kavya', $data+$errormsg+$dataTiming+$contactNumber+$captcha, FALSE);
	}
	public function skinterface()
	{
		$name=$this->session->userdata('name');
		$isshopkeeper = $this->session->userdata('isShopKeeper');
		
		if($name!='' && $isshopkeeper){
		$this->load->model('model_products');		
		$data= array('products' => $this->model_products->getAllproductsofStore($name) );
		$this->load->model('model_shop');		
		
		$this->load->view('skinterface', $data);
		}else{
		redirect('/','refresh');
		}
	}
	public function deleteoffer()
	{
		$name=$this->session->userdata('name');
		$this->load->model('model_products');
		$data= array('offers' => $this->model_products->getAlloffersofStore($name) );
		$this->load->view('deleteoffer', $data);
	}
	public function koffee()
	{
		$errormsg  = array('errorMessage'=>'','errorClose'=>'','errorColor'=>'#B10COC');
		$this->load->model('model_products');		
		$data= array('output' => $this->model_products->getproducts('koffee') );
		$this->load->model('model_shop');
		$dataTiming= array('outputTimings' => $this->model_shop->getShopDetails('koffee'));
		$contactNumber = array('outputNumber' => $this->model_shop->getShopNumber('koffee'));
		$captcha = array('image'=>$this->model_products->createCaptcha());
		$this->load->view('koffee', $data+$errormsg+$dataTiming+$contactNumber+$captcha, FALSE);
		
	}
	public function cart_index()
	{
		$this->load->model('model_products');
		$errormsg  = array('errorMessage'=>'','errorClose'=>'','errorColor'=>'#B10COC');
		$data = array('content' => $this->cart->contents());
		$captcha = array('image'=>$this->model_products->createCaptcha());
		$this->load->view('cart_index',$data+$errormsg+$captcha);
	}
	public function cart()
	{
		if(!$this->cart->contents()){
		$errormsg  = array('errorMessage'=>'Your Cart Is Empty','errorClose'=>'X','errorColor'=>'rgb(214, 38, 38);');
					$this->load->model('model_products');
					$dataThali= array('outputThalis' => $this->model_products->getThali());	
					$dataOffer=array('outputOffers' => $this->model_products->getOffers());
					$captcha = array('image'=>$this->model_products->createCaptcha());
					$this->load->view('home', $dataThali+$dataOffer+$errormsg+$captcha);	
		}else{
		$this->load->model('model_transaction');
		$this->load->model('model_products');
		$slots = array('slots'=>$this->model_transaction->getSlots());
		$errormsg  = array('errorMessage'=>'','errorClose'=>'','errorColor'=>'#B10COC');
		$captcha = array('image'=>$this->model_products->createCaptcha());
		$this->load->view('cart_show',$errormsg+$slots+$captcha);
		}
	}
	public function skloginpage()
	{	$this->load->model('model_products');
		$errormsg  = array('errorMessage'=>'','errorClose'=>'','errorColor'=>'#B10COC');
		$captcha = array('image'=>$this->model_products->createCaptcha());
		$this->load->view('skloginpage',$errormsg+$captcha);
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
		$captcha = array('image'=>$this->model_products->createCaptcha());
		$this->load->view('bigbite', $data+$errormsg+$dataTiming+$contactNumber+$captcha, FALSE);
	}
	public function washexpress()
	{	$this->load->model('model_products');
		$this->load->model('model_shop');
		$errormsg  = array('errorMessage'=>'','errorClose'=>'','errorColor'=>'#B10COC');
		$dataTiming= array('outputTimings' => $this->model_shop->getShopDetails('washexpress'));
		$contactNumber = array('outputNumber' => $this->model_shop->getShopNumber('washexpress'));
		$captcha = array('image'=>$this->model_products->createCaptcha());
		$this->load->model('model_transaction');
		$slots = array('slots'=>$this->model_transaction->getSlots());
		$this->load->view('washexpress', $errormsg+$dataTiming+$contactNumber+$slots+$captcha, FALSE);
	}
	public function omega()
	{	$this->load->model('model_products');
		$this->load->model('model_shop');
		$errormsg  = array('errorMessage'=>'','errorClose'=>'','errorColor'=>'#B10COC');
		$this->load->model('model_transaction');
		$dataTiming= array('outputTimings' => $this->model_shop->getShopDetails('omega'));
		$slots = array('slots'=>$this->model_transaction->getSlots());
		$contactNumber = array('outputNumber' => $this->model_shop->getShopNumber('omega'));
		$captcha = array('image'=>$this->model_products->createCaptcha());
		$this->load->view('omega',$errormsg+$contactNumber+$slots+$captcha+$dataTiming);
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
		$captcha = array('image'=>$this->model_products->createCaptcha());
		$this->load->view('subway', $data+$dataTiming+$contactNumber+$captcha, FALSE);
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
		$captcha = array('image'=>$this->model_products->createCaptcha());
		$this->load->view('chatkazz', $data+$errormsg+$dataTiming+$contactNumber+$captcha, FALSE);	
	}
	public function qwiches()
	{
		$errormsg  = array('errorMessage'=>'','errorClose'=>'','errorColor'=>'#B10COC');
		$this->load->model('model_products');		
		$data= array('output' => $this->model_products->getproducts('qwiches') );
		$this->load->model('model_shop');
		$dataTiming= array('outputTimings' => $this->model_shop->getShopDetails('qwiches'));
		$contactNumber = array('outputNumber' => $this->model_shop->getShopNumber('qwiches'));
		$captcha = array('image'=>$this->model_products->createCaptcha());
		$this->load->view('qwiches', $data+$errormsg+$dataTiming+$contactNumber+$captcha, FALSE);
	}


	public function oxford()
	{
		$errormsg  = array('errorMessage'=>'','errorClose'=>'','errorColor'=>'#B10COC');
		$this->load->model('model_products');		
		$data= array('output' => $this->model_products->getproducts('oxford') );
		$this->load->model('model_shop');
		$dataTiming= array('outputTimings' => $this->model_shop->getShopDetails('oxford'));
		$contactNumber = array('outputNumber' => $this->model_shop->getShopNumber('oxford'));
		$captcha = array('image'=>$this->model_products->createCaptcha());
		$this->load->view('oxford', $data+$errormsg+$dataTiming+$contactNumber+$captcha, FALSE);
	}
	public function clublaptop()
	{
		$errormsg  = array('errorMessage'=>'','errorClose'=>'','errorColor'=>'#B10COC');
		$this->load->model('model_products');		
		$data= array('output' => $this->model_products->getproducts('clublaptop') );
		$this->load->model('model_shop');
		$dataTiming= array('outputTimings' => $this->model_shop->getShopDetails('clublaptop'));
		$contactNumber = array('outputNumber' => $this->model_shop->getShopNumber('clublaptop'));
		$captcha = array('image'=>$this->model_products->createCaptcha());
		$this->load->view('clublaptop', $data+$errormsg+$dataTiming+$contactNumber+$captcha, FALSE);	
	}
	public function ominfotech()
	{
		$errormsg  = array('errorMessage'=>'','errorClose'=>'','errorColor'=>'#B10COC');
		$this->load->model('model_products');		
		$data= array('output' => $this->model_products->getproducts('ominfotech') );
		$this->load->model('model_shop');
		$dataTiming= array('outputTimings' => $this->model_shop->getShopDetails('ominfotech'));
		$contactNumber = array('outputNumber' => $this->model_shop->getShopNumber('kavya'));
		$captcha = array('image'=>$this->model_products->createCaptcha());
		$this->load->view('ominfotech', $data+$errormsg+$dataTiming+$contactNumber+$captcha, FALSE);
	}
	public function crossword()
	{
		$errormsg  = array('errorMessage'=>'','errorClose'=>'','errorColor'=>'#B10COC');
		$this->load->model('model_products');		
		$data= array('output' => $this->model_products->getproducts('crossword') );
		$this->load->model('model_shop');
		$dataTiming= array('outputTimings' => $this->model_shop->getShopDetails('crossword'));
		$contactNumber = array('outputNumber' => $this->model_shop->getShopNumber('crossword'));
		$captcha = array('image'=>$this->model_products->createCaptcha());
		$this->load->view('crossword', $data+$errormsg+$dataTiming+$contactNumber+$captcha, FALSE);
	}

	public function faq()
	{	$this->load->model('model_products');
		$errormsg  = array('errorMessage'=>'','errorClose'=>'','errorColor'=>'#B10COC');
		$captcha = array('image'=>$this->model_products->createCaptcha());
		$this->load->view('faq',$errormsg+$captcha);
	}
	public function aboutus()
	{	$this->load->model('model_products');
		$errormsg  = array('errorMessage'=>'','errorClose'=>'','errorColor'=>'#B10COC');
		$captcha = array('image'=>$this->model_products->createCaptcha());
		$this->load->view('aboutus',$errormsg+$captcha);
	}

	public function privacy()
	{	
		$this->load->model('model_products');
		$errormsg  = array('errorMessage'=>'','errorClose'=>'','errorColor'=>'#B10COC');
		$captcha = array('image'=>$this->model_products->createCaptcha());
		$this->load->view('privacy',$errormsg+$captcha);
	}

	public function termsnconditions()
	{	
		$this->load->model('model_products');
		$errormsg  = array('errorMessage'=>'','errorClose'=>'','errorColor'=>'#B10COC');
		$captcha = array('image'=>$this->model_products->createCaptcha());
		$this->load->view('termsnconditions',$errormsg+$captcha);
	}


	public function vstationery()
	{
		$errormsg  = array('errorMessage'=>'','errorClose'=>'','errorColor'=>'#B10COC');
		$this->load->model('model_products');		
		$data= array('output' => $this->model_products->getproducts('vstationery') );
		$this->load->model('model_shop');
		$dataTiming= array('outputTimings' => $this->model_shop->getShopDetails('vstationery'));
		$contactNumber = array('outputNumber' => $this->model_shop->getShopNumber('vstationery'));
		$captcha = array('image'=>$this->model_products->createCaptcha());
		$this->load->view('vstationery', $data+$errormsg+$dataTiming+$contactNumber+$captcha, FALSE);
	}
	public function feedback()
	{	
		$this->load->model('model_admin');
		$this->load->model('model_products');
		$this->model_admin->insertFeedback();
		$errormsg  = array('errorMessage'=>'Thank You For Your FeedBack','errorClose'=>'X','errorColor'=>'#00BB0C');
		$dataThali= array('outputThalis' => $this->model_products->getThali());	
		$dataOffer=array('outputOffers' => $this->model_products->getOffers());
		$captcha = array('image'=>$this->model_products->createCaptcha());
		$this->load->view('home', $dataThali+$dataOffer+$errormsg+$captcha);	

	}
	public function myaccount()
	{	$this->load->model('model_products');
		$this->load->model('model_users');
		$errormsg  = array('errorMessage'=>'','errorClose'=>'','errorColor'=>'rgb(214, 38, 38)');
		$userdetails=$this->model_users->getuserdetails();
		if(is_object($userdetails)){
			$this->load->model('model_transaction');
			$transactions=$this->model_transaction->getusertransaction($userdetails->userId);
			$data=array('output' => $userdetails,'transactions'=>$transactions)+$errormsg;
			$captcha = array('image'=>$this->model_products->createCaptcha());
			$this->load->view('myaccount', $data+$captcha);
		}
		else{
			if($userdetails == -1){
				$errorMessage = "Please Log In ";
				$errormsg['errorMessage']=$errorMessage;
				$errormsg['errorClose'] = "X";
				$this->load->model('model_products');
				$dataThali= array('outputThalis' => $this->model_products->getThali());	
				$dataOffer=array('outputOffers' => $this->model_products->getOffers());
				$captcha = array('image'=>$this->model_products->createCaptcha());
				$this->load->view('home', $dataThali+$dataOffer+$errormsg+$captcha);	
			}if ($userdetails == -2) {
				$errorMessage = "Incorrect Session ";
				$errormsg['errorMessage']=$errorMessage;
				$errormsg['errorClose'] = "X";
				$this->load->model('model_products');
				$dataThali= array('outputThalis' => $this->model_products->getThali());	
				$dataOffer=array('outputOffers' => $this->model_products->getOffers());
				$captcha = array('image'=>$this->model_products->createCaptcha());
				$this->load->view('home', $dataThali+$dataOffer+$errormsg+$captcha);	
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
