<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
Index - Home page is loaded
Offers - Offers page is loaded
skloginpage - shopkeeper login page
skinterface - shopkeeper interface page
*/

class Welcome extends CI_Controller {

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
	public function kavya()
	{
		$this->load->view('kavya', $this->getadditionaldetails('kavya'), FALSE);
	}
	public function koffee()
	{
		$this->load->view('koffee', $this->getadditionaldetails('koffee'), FALSE);	
	}
	public function bigbite()
	{
		$this->load->view('bigbite', $this->getadditionaldetails('bigbite'), FALSE);
	}
	public function washexpress()
	{
		$this->load->model('model_transaction');
		$slots = array('slots'=>$this->model_transaction->getSlots());
		$this->load->view('washexpress', $this->getadditionaldetails('washexpress')+$slots, FALSE);
	}
	public function omega()
	{
		$this->load->model('model_transaction');
		$slots = array('slots'=>$this->model_transaction->getSlots());
		$this->load->view('omega',$this->getadditionaldetails('omega')+$slots,FALSE);
	}

	public function subway()
	{
		$this->load->view('subway',$this->getadditionaldetails('subway'), FALSE);
	}
	public function chatkazz()
	{
		$this->load->view('chatkazz',$this->getadditionaldetails('chatkazz'), FALSE);	
	}
	public function qwiches()
	{
		$this->load->view('qwiches', $this->getadditionaldetails('qwiches'), FALSE);
	}
	public function oxford()
	{
		$this->load->view('oxford', $this->getadditionaldetails('oxford'), FALSE);
	}
	public function clublaptop()
	{
		$this->load->view('clublaptop', $this->getadditionaldetails('clublaptop'), FALSE);	
	}
	public function ominfotech()
	{
		$this->load->view('ominfotech',$this->getadditionaldetails('ominfotech'), FALSE);
	}
	public function crossword()
	{	
		$this->load->view('crossword', $this->getadditionaldetails('crossword'), FALSE);
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
	private function getadditionaldetails($storeName)
	{
		$errormsg  = array('errorMessage'=>'','errorClose'=>'','errorColor'=>'#B10COC');
		$this->load->model('model_products');		
		$data= array('output' => $this->model_products->getproducts($storeName) );
		$this->load->model('model_shop');
		$dataTiming= array('outputTimings' => $this->model_shop->getShopDetails($storeName));
		$contactNumber = array('outputNumber' => $this->model_shop->getShopNumber($storeName));
		$captcha = array('image'=>$this->model_products->createCaptcha());
		return $errormsg+$data+$dataTiming+$contactNumber+$captcha;
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

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
