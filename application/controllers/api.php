<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api extends CI_Controller {

	public function index()
	{
		
	}

	public function getPending()
	{
		$slot = $this->input->get('slotid');
		$password = $this->input->get('password');
		$this->load->model('model_api');
		if($this->model_api->checkPassword($password)){
			$result=$this->model_api->getpending($slot);
			$pending = array();
			foreach ($result as $value) {
				$temp = array('transactionId'=>$value->transactionId,'storeName'=>$value->name);
				array_push($pending,$temp);
			}
			$this->output->set_content_type('application/json')->set_output(json_encode($pending));
		}else{
			echo "Incorrect Password";
		}
	}

	public function getTransactionDetail()
	{
		$transactionId = $this->input->get('transactionId');
		$storename = $this->input->get('storeName'); 
		$storename = strtolower($storename);
		$password = $this->input->get('password');
		$this->load->model('model_api');
		if($this->model_api->checkPassword($password)){
			$result=$this->model_api->getTransactionDetails($transactionId,$storename); 
			$productdetails = '';
			if($storename == 'subway'){
				
				$productdetails = "Bread:".$result->bread."\nSause:".$result->sauce."\nVeggies:".$result->veggies.
				"\nSize: ".$result->size."\nAdditionalComment:".$result->additionalComment; 
				
			}else if($storename == 'washexpress'){
				$productdetails ='Bill No:'.$result->billNo."\nBill Image:".IMG."laundryImages/".$result->billImage;
			}else if($storename == 'omega'){
				$productdetails ='Start Page:'.$result->startpage."\nEnd Page:".$result->endpage."\nColor:".$result->color."\nDocument location:".IMG."photocopyDocuments/".$result->fileName;
			}
			$details = array('transactionId'=>$result->transactionId,'productName'=>$result->productName,
				'price'=>$result->price,'qty'=>$result->quantity,'details'=>$productdetails,'fullName'=>$result->fullName
				,'mobileNo'=>$result->mobileNo);
			$this->output->set_content_type('application/json')->set_output(json_encode($details));
		}else {
			echo "Incorrect Password";
		}
	}
	public function updatePurchased()
	{
		$transactionId = $this->input->post('transactionId');
		$password = $this->input->get('password');
		$this->load->model('model_api');
		if($this->model_api->checkPassword($password)){
			$this->model_api->updatePurchased($transactionId);
		}
	}
	public function getPurchasedUsers()
	{
		$slot = $this->input->get('slotid');
		$password = $this->input->get('password');
		$this->load->model('model_api');
		if($this->model_api->checkPassword($password)){
			$result = $this->model_api->getPurchased($slot);
			$purchased = array();
			foreach ($result as $value) {
				$temp = array('userid'=>$value->userId,'username'=>$value->fullName.' ('.$value->userName.')');
				array_push($purchased, $temp);
			}
			$this->output->set_content_type('application/json')->set_output(json_encode($purchased));
		}else{
			echo "Incorrect Password";
		}
	}
	public function getpurchasedproductsforuser()
	{
		$slot = $this->input->get('slotid');
		$userid = $this->input->get('userid');
		$password = $this->input->get('password');
		$this->load->model('model_api');
		if($this->model_api->checkPassword($password)){
			$result=$this->model_api->getpurchasedusersproducts($slot,$userid); 
			$products = array();
			$amount = 0;
			$userName = ''; 
			$fullName = '';
			$mobileNo = '';
			foreach ($result as $value) {
				$temp = array('transactionId'=>$value->transactionId,'productName'=>$value->productName,
					'price'=>$value->price,'qty'=>$value->quantity);
				$amount += ($value->price*$value->quantity);
				array_push($products,$temp);
				$userName = $value->userName;
				$fullName = $value->fullName;
				$mobileNo = $value->mobileNo;
			}
			$total = $amount*TAX;	
			$output = array('username'=>$userName,'fullName'=>$fullName,'mobileNo'=>$mobileNo,'products'=>$products,'total'=>$total);
			$this->output->set_content_type('application/json')->set_output(json_encode($output));
		}else{
			echo "Incorrect Password";
		}
	}
	public function updatedelivered()
	{
		$transactionId = $this->input->post('transactionId');
		$password = $this->input->get('password');
		$this->load->model('model_api');
		if($this->model_api->checkPassword($password)){
			foreach ($transactionId as $transaction) {
				$this->model_api->updatedelivered($transaction);
			}
		}
	}

}

/* End of file api.php */
/* Location: ./application/controllers/api.php */