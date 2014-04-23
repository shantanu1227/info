<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
addtocart - Adding a product to you cart
addsubwaytocart - Adding a subway Product to your cart
updatecart - to change quantity in cart
emptycart - destroy the cart
addxeroxfile - add a photocopy document in transaction
addlaundry - add a Laundry bill reciept
checkout - Make the final transaction for products in cart
Deletetransaction - To delete a transaction for a user
sendmail - To send a mail
*/

class Cart extends CI_Controller {

	public function addtocart()
	{
		$id=$this->input->post('product_id');
		$qty=$this->input->post('quantity');
		$price=$this->input->post('product_price');
		$name = $this->input->post('product_name');
		$data = array(
			'id'      => $id,
			'qty'     => $qty,
			'price'   => $price,
			'name'    => $name 
			);
		$contents = $this->cart->contents();
		foreach ($contents as $items) {
			if($items['id']==$id){
				if ($this->cart->has_options($items['rowid']) == FALSE){
					$data = array(
						'rowid' => $items['rowid'],
						'qty'   => $qty+$items['qty']
						);
					$this->cart->update($data);
					return ;
				}
			}
		}
		$this->cart->insert($data);
	}

	public function addsubwaytocart()
	{
		$id=$this->input->post('productid');
		$qty=$this->input->post('qty');
		$price=$this->input->post('price');
		$name =$this->input->post('productname');
		$bread = $this->input->post('bread');
		$size = $this->input->post('size');
		$veggies = $this->input->post('veggie');
		if(!empty($veggies))
			$veggies=implode(',',$veggies);
		$sausages = $this->input->post('extra');
		if(!empty($sausages))
			$sausages = implode(',', $sausages);
		$comments = $this->input->post('comments',TRUE);
		$comments = trim($comments);
		$price = $price*$size;
		$data = array(
			'id'      => $id,
			'qty'     => $qty,
			'price'   => $price,
			'name'    => $name,
			'options' =>  array(
				'bread'=>$bread,
				'size'=>$size ,
				'veggies' => $veggies ,
				'sauce'=>$sausages,
				'additionalComment'=>$comments,
				'sub'=>$name
				)
			);
		$this->cart->insert($data);	
		redirect('welcome/subway','refresh');
	}

	public function updatecart()
	{
		$total = $this->cart->total_items();

		$item = $this->input->post('rowid');
		$qty = $this->input->post('qty');
		for($i=0; $i <count($item);$i++)
		{
			
			$data = array(
				'rowid' => $item[$i],
				'qty'   => $qty[$i]
				);
			$this->cart->update($data);
		}
		redirect('welcome/cart','refresh');
	}

	public function emptycart()
	{
		$this->cart->destroy();
		redirect('welcome/','refresh');

	}

	public function addXeroxFile()
	{

		$userId=$this->session->userdata('userId');
		if($userId == ''){
			$this->load->model('model_products');
			$errormsg  = array('errorMessage'=>'Please Login To Checkout','errorClose'=>'X','errorColor'=>'rgb(214, 38, 38);');
			$dataThali= array('outputThalis' => $this->model_products->getThali());	
			$dataOffer=array('outputOffers' => $this->model_products->getOffers());
			$captcha = array('image'=>$this->model_products->createCaptcha());
			$this->load->view('home', $dataThali+$dataOffer+$errormsg+ $captcha);	
		}else{
			$color = $this->input->post('colour',TRUE);
			$startpage = $this->input->post('from',TRUE);
			$endpage = $this->input->post('to',TRUE);
			$quantity = $this->input->post('qty',TRUE);
			$price = $endpage-$startpage+1;
			$slot = $this->input->post('slotId');
			date_default_timezone_set('Asia/Kolkata');
			$ordertime = time();
			$deliverydate = date("Y-m-d");


			$this->load->model('model_users');
			$current_amount = $this->model_users->getuserdetails()->creditAmount;
			if($current_amount > ($quantity*$price*TAX)){

				$directoryName = "photocopyDocuments"."/";
				$config['upload_path'] = "./assets/img/".$directoryName;

				//$config['allowed_types'] = 'jpg|png|pdf|doc|odt|docx|xls|img|docx|txt|jpeg|html|xlsx';
				$config['allowed_types'] ='*';
				$config['max_size']	= '4096';
				$config['encrypt_name'] = TRUE;

				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload())
				{
					print_r($this->upload->display_errors());
				}
				else
				{
					if($color=="1"){
						$price=$price*2;
						$color="color";
					}else{
						$color="bw";
					}
					$uploaddata=$this->upload->data();
					$data1=array('fileName'=>$uploaddata['file_name'],'startpage'=>$startpage,
						'endpage'=>$endpage,'color'=>$color);
					$this->load->model('model_transaction');
					$userId=$this->session->userdata('userId');
					$transactionId=$this->model_transaction->addxerox($userId,$quantity,$price,$slot,$deliverydate,$ordertime,$data1);
					$message= "Transaction Id:".$transactionId."<br>Print details are:<br>Color:".$color."<br>Qty=".$quantity."<br>Pages:".$startpage."-".$endpage."<br>FileLocation: ".IMG.$directoryName.$uploaddata['file_name'];
					$this->sendmail('New Order',$slot,'PhotoCopy',$message,$this->session->userdata('userEmail'));
					$errormsg  = array('errorMessage'=>'Order Placed Successfully','errorClose'=>'X','errorColor'=>'rgb(24, 175, 48)');					
					$this->load->model('model_shop');
					$this->load->model('model_products');
					$slots = array('slots'=>$this->model_transaction->getSlots());
					$contactNumber = array('outputNumber' => $this->model_shop->getShopNumber('omega'));
					$captcha = array('image'=>$this->model_products->createCaptcha());
					$this->load->view('omega',$errormsg+$contactNumber+$slots+$captcha);					
					header( "refresh:3;url=".URL."welcome/omega" );		

				}
			}else{
				$this->load->model('model_shop');
				$dataTiming= array('outputTimings' => $this->model_shop->getShopDetails('omega'));
				$contactNumber = array('outputNumber' => $this->model_shop->getShopNumber('omega'));
				$errormsg  = array('errorMessage'=>'Insufficient Balance Please Recharge','errorClose'=>'X','errorColor'=>'rgb(214, 38, 38);');
				$this->load->model('model_transaction');
				$this->load->model('model_products');
				$slots = array('slots'=>$this->model_transaction->getSlots());
				$captcha = array('image'=>$this->model_products->createCaptcha());
				$this->load->view('omega',$errormsg+$dataTiming+$contactNumber+$slots+$captcha);

			}
		}
	}

	public function addLaundry()
	{

		$userId=$this->session->userdata('userId');
		if($userId == ''){
			$this->load->model('model_products');
			$errormsg  = array('errorMessage'=>'Please Login To Checkout','errorClose'=>'X','errorColor'=>'rgb(214, 38, 38);');
			$dataThali= array('outputThalis' => $this->model_products->getThali());	
			$dataOffer=array('outputOffers' => $this->model_products->getOffers());
			$captcha = array('image'=>$this->model_products->createCaptcha());
			$this->load->view('home', $dataThali+$dataOffer+$errormsg+$captcha);	
		}else{
			$billNo = $this->input->post('billno');
			$price = $this->input->post('billAmount');

			$quantity=1;
			$slot = $this->input->post('slotId');
			date_default_timezone_set('Asia/Kolkata');
			$ordertime = time();
			$deliverydate = date("Y-m-d");

			$this->load->model('model_users');
			$current_amount = $this->model_users->getuserdetails()->creditAmount;
			if($current_amount > ($quantity*$price*TAX)){

				$directoryName = "laundryImages"."/";
				$config['upload_path'] = "./assets/img/".$directoryName;

				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['max_size']	= '4096';
				$config['encrypt_name'] = TRUE;

				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload())
				{
					print_r($this->upload->display_errors());
				}
				else
				{
					$uploaddata=$this->upload->data();
					$data1=array('billImage'=>$uploaddata['file_name'],'billNo'=>$billNo);
					$this->load->model('model_transaction');
					$userId=$this->session->userdata('userId');
					$this->model_transaction->addlaundry($userId,$quantity,$price,$slot,$deliverydate,$ordertime,$data1);
					$message= "Laundry details are:<br>Bill No:".$billNo."<br>Price=".$price."<br>Bill Image : ".IMG.$directoryName.$uploaddata['file_name'];
					$this->sendmail('New Order',$slot,'Laundry',$message,'');
					$errormsg  = array('errorMessage'=>'Order Placed Successfully','errorClose'=>'X','errorColor'=>'rgb(24, 175, 48)');
					$this->load->model('model_shop');
					$this->load->model('model_products');
					$this->load->model('model_transaction');
					$slots = array('slots'=>$this->model_transaction->getSlots());
					$dataTiming= array('outputTimings' => $this->model_shop->getShopDetails('washexpress'));
					$contactNumber = array('outputNumber' => $this->model_shop->getShopNumber('washexpress'));
					$captcha = array('image'=>$this->model_products->createCaptcha());
					$this->load->view('washexpress',$errormsg+$dataTiming+$contactNumber+$slots+$captcha);					
					header( "refresh:3;url=".URL."welcome/washexpress" );		
				}
			}else{
				$this->load->model('model_shop');
				$dataTiming= array('outputTimings' => $this->model_shop->getShopDetails('washexpress'));
				$contactNumber = array('outputNumber' => $this->model_shop->getShopNumber('washexpress'));
				$errormsg  = array('errorMessage'=>'Insufficient Balance Please Recharge','errorClose'=>'X','errorColor'=>'rgb(214, 38, 38);');
				$this->load->model('model_transaction');
				$this->load->model('model_products');
				$slots = array('slots'=>$this->model_transaction->getSlots());
				$captcha = array('image'=>$this->model_products->createCaptcha());
				$this->load->view('washexpress',$errormsg+$dataTiming+$contactNumber+$slots+$captcha);
			}
		}

	}

	public function checkout()
	{
		$this->load->model('model_products');
		$userId=$this->session->userdata('userId');
		if($userId == ''){
			$errormsg  = array('errorMessage'=>'Please Login To Checkout','errorClose'=>'X','errorColor'=>'rgb(214, 38, 38);');
			$dataThali= array('outputThalis' => $this->model_products->getThali());	
			$dataOffer=array('outputOffers' => $this->model_products->getOffers());
			$captcha = array('image'=>$this->model_products->createCaptcha());
			$this->load->view('home', $dataThali+$dataOffer+$errormsg+$captcha);	
		}elseif($this->cart->total_items()<=0){
			$errormsg  = array('errorMessage'=>'There are no items in Your Cart','errorClose'=>'X','errorColor'=>'rgb(214, 38, 38);');
			$dataThali= array('outputThalis' => $this->model_products->getThali());	
			$dataOffer=array('outputOffers' => $this->model_products->getOffers());
			$captcha = array('image'=>$this->model_products->createCaptcha());
			$this->load->view('home', $dataThali+$dataOffer+$errormsg+ $captcha);	
		}else{
			$slot=$this->input->post('slotId');
			date_default_timezone_set('Asia/Kolkata');
			$ordertime = time();
			$delivery_date = date("Y-m-d");
			$this->load->model('model_transaction');
			$this->load->model('model_users');
			$total_amount=0;
			$mailproductname="";

			foreach ($this->cart->contents() as $items) {
				$total_amount=$total_amount+$items['price'];
			}
			$total_amount=$total_amount*TAX;
			$current_amount = $this->model_users->getuserdetails()->creditAmount ;
			if($current_amount > $total_amount){

				foreach ($this->cart->contents() as $items){

					if ($this->cart->has_options($items['rowid']) == FALSE){
						$this->model_transaction->addtransaction($userId,$items['id'],$items['qty'],$items['price'],
							$slot,$delivery_date,$ordertime,'');
						$mailproductname=$mailproductname.$items['name']." From Shop ".$this->model_transaction->getstoreName($items['id']). " Qty ".$items['qty']." Price ".$items['price']."<br>";
					}
					else{
						$this->model_transaction->addtransaction($userId,$items['id'],$items['qty'],$items['price'],
							$slot,$delivery_date,$ordertime,$items['options']);
						$mailproductname=$mailproductname.$items['name']." From Shop ".$this->model_transaction->getstoreName($items['id']). " Qty ".$items['qty']." Price ".$items['price']." <br> ";
					}
				}


				$config = Array(
					'protocol' => 'smtp',
					'smtp_host' => 'ssl://smtp.googlemail.com',
					'smtp_port' => 465,
					'smtp_user' => ' virtualinfocity@gmail.com',
					'smtp_pass' => ' virtualinfocity@daiict',
					'mailtype'  => 'html', 
					'charset'   => 'iso-8859-1'
					);
				$this->load->library('email',$config);
				$this->email->set_newline("\r\n");
				$this->email->from('virtualinfocity@gmail.com', 'Virtual Infocity');
				$this->email->to("201101061@daiict.ac.in");

				$this->email->subject('New Order');
				$this->email->message('New order of '.$this->session->userdata('userName').'Contact '.$this->session->userdata('userMobile').' Slot '.$slot.'<br>'.$mailproductname);
				//$this->email->send();


				$this->cart->destroy();
				$errormsg  = array('errorMessage'=>'Your Transaction Is complete','errorClose'=>'X','errorColor'=>'rgb(24, 175, 48)');
				$dataThali= array('outputThalis' => $this->model_products->getThali());	
				$dataOffer=array('outputOffers' => $this->model_products->getOffers());
				$this->load->view('home', $dataThali+$dataOffer+$errormsg);	
			}else{
				$errormsg  = array('errorMessage'=>'Insufficient Balance Please Recharge','errorClose'=>'X','errorColor'=>'rgb(214, 38, 38);');
				$dataThali= array('outputThalis' => $this->model_products->getThali());	
				$dataOffer=array('outputOffers' => $this->model_products->getOffers());
				$this->load->model('model_products');
				$captcha = array('image'=>$this->model_products->createCaptcha());
				$this->load->view('home', $dataThali+$dataOffer+$errormsg+$captcha);	
			}
		}
	}

	public function deletetransaction()
	{
		if ($this->session->userdata('userName')!='' && $this->session->userdata('userId')!='') {
			$transactionId=$this->input->post('transactionId');
			$userId=$this->session->userdata('userId');
			$this->load->model('model_transaction');
			$transactionDetail=$this->model_transaction->getTransactionDetails($transactionId);
			$output=$this->model_transaction->deleteTransaction($transactionId,$userId);
			if($output>0){
				$productName= $transactionDetail->productName;
				$message = "Shop Name: ".$transactionDetail->name."<br> Qty: ".$transactionDetail->quantity."<br> Price".$transactionDetail->price;
				$slot=$transactionDetail->deliverySlot;
				$this->sendmail('Order Cancelled',$slot,$productName,$message,'');
				}
		}
		redirect('welcome/myaccount','refresh');
	}
	
	public function sendmail($orderType,$slot,$productname,$message,$cc)
	{
			$config = Array(
					'protocol' => 'smtp',
					'smtp_host' => 'ssl://smtp.googlemail.com',
					'smtp_port' => 465,
					'smtp_user' => ' virtualinfocity@gmail.com',
					'smtp_pass' => ' virtualinfocity@daiict',
					'mailtype'  => 'html', 
					'charset'   => 'iso-8859-1'
					);
				$this->load->library('email',$config);
				$this->email->set_newline("\r\n");
				$this->email->from('virtualinfocity@gmail.com', 'Virtual Infocity');
				$this->email->to("punit9462@gmail.com");
				if(!empty($cc))
					$this->email->cc($cc);

				$this->email->subject($orderType);
				$this->email->message($orderType.' of '.$this->session->userdata('userName').'  Contact '.$this->session->userdata('userMobile').' Slot '.$slot.'<br>'.$productname.'<br>'.$message);
				//$this->email->send();


	}

}


/* End of file cart.php */
/* Location: ./application/controllers/cart.php */
