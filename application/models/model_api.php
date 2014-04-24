<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
This file deals with the android api 

getpending - Fetch the pending items from the database as per the slot
gettransactiondetails - get the transaction details of a product
updatepurchased  - update the purchased flag if the product is purchased
updatedelivered - update the delivered flag if the product is delivered
getpurchased - get all the users who purchased for a slot
getpurchasedusersproducts - get all the purchased product as per user as per slot
checkpassword - check the password of the delivery guy

*/
class Model_api extends CI_Model {

	public function getpending($slotid)
	{
		date_default_timezone_set('Asia/Kolkata');
		$deliverydate = date("Y-m-d");
		$this->db->select('transaction.transactionId,stores.name', FALSE);
		$this->db->from('transaction');
		$this->db->where('deliverySlot',$slotid);
		$this->db->where('purchased','false');
		$this->db->where('deliveryDate',$deliverydate);
		$this->db->join('products', 'products.productId = transaction.productId', 'left');
		$this->db->join('stores', 'stores.shopId = products.shopId', 'left');
		$this->db->order_by('stores.name', 'asc');
		$query = $this->db->get();
		return $query->result(); 
	}

	public function getTransactionDetails($transactionId,$storename)
	{	
		$storename = strtolower($storename);
		$this->db->select('*,transaction.price', FALSE);
		$this->db->from('transaction');
		$this->db->limit(1);
		$this->db->where('transaction.transactionId',$transactionId);
		$this->db->join('users', 'users.userId = transaction.userId', 'left');
		$this->db->join('products','products.productId = transaction.productId','left');
		/*select details from subway*/
		if($storename == 'subway'){
			$this->db->join('subway', 'subway.transactionId = transaction.transactionId', 'left');
			/*select details from xerox*/
		}else if ($storename == 'omega') {
			$this->db->join('xerox', 'xerox.transactionId = transaction.transactionId', 'left');
			/*select details from laundry*/
		}else if ($storename == 'washexpress') {
				$this->db->join('laundry', 'laundry.transactionId = transaction.transactionId', 'left');
		}
		$query = $this->db->get();
		return $query->row();
	}

	public function updatePurchased($transactionId)
	{
		$data = array('purchased'=>'true');
		$this->db->where('transactionId',$transactionId);
		$this->db->update('transaction',$data);
	}


	public function updateDelivered($transactionId)
	{	date_default_timezone_set('Asia/Kolkata');
		$deliveredTime = time();
		$data = array('delivered'=>'true','deliveryTimeStamp'=>$deliveredTime);
		$this->db->where('transactionId',$transactionId);
		$this->db->update('transaction',$data);
	}
	public function getPurchased($slotid)
	{
		date_default_timezone_set('Asia/Kolkata');
		$deliverydate = date("Y-m-d");
		$this->db->select('transaction.userId,users.userName,users.fullName', FALSE);
		$this->db->from('transaction');
		$this->db->where('deliverySlot',$slotid);
		$this->db->where('purchased','true');
		$this->db->where('delivered','false');
		$this->db->where('deliveryDate',$deliverydate);
		$this->db->join('products', 'products.productId = transaction.productId', 'left');
		$this->db->join('users','users.userId = transaction.userId','left');
		$this->db->group_by('transaction.userId');
		$query = $this->db->get();
		return $query->result(); 
	}
	public function getpurchasedusersproducts($slotid,$userId)
	{
		date_default_timezone_set('Asia/Kolkata');
		$deliverydate = date("Y-m-d");
		$this->db->select('*,transaction.price', FALSE);
		$this->db->from('transaction');
		$this->db->where('deliverySlot',$slotid);
		$this->db->where('purchased','true');
		$this->db->where('delivered','false');
		$this->db->where('transaction.userId',$userId);
		$this->db->where('deliveryDate',$deliverydate);
		$this->db->join('products', 'products.productId = transaction.productId', 'left');
		$this->db->join('users','users.userId = transaction.userId','left');
		$query = $this->db->get();
		return $query->result(); 
	}

	public function checkPassword($password)
	{
		$this->db->where('password',$this->encrypt->sha1($password));
		$this->db->where('userId',1);
		$query=$this->db->get('delivery_man',1);
		if($query->num_rows()>0){
			return true;
		}
		return false;
	}

}

/* End of file model_api.php */
/* Location: ./application/models/model_api.php */