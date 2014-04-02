<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_transaction extends CI_Model {


	public function getstoreid($storeName)
	{
		$this->db->where('name', $storeName);
		$query=$this->db->get('stores', 1);
		$row = $query->row();
		$storeid = $row->shopId;
		return $storeid;	
	} 

	public function addtransaction($userId,$productId,$quantity,$price,$slot,$deliveryDate,$orderTime,$othershops)
	{
		$data = array('userId'=>$userId,'productId'=>$productId,'quantity' =>$quantity ,'price' => $price,
			'deliverySlot'=>$slot,'deliveryDate'=>$deliveryDate,'orderTimeStamp'=>$orderTime);
		$this->db->insert('transaction', $data);
		
		$transaction_id=$this->db->insert_id();

		$this->db->where('userId',$userId);
		$query=$this->db->get('users',1);
		$result=$query->row();
		$amountToDeduct = ($price*$quantity)*1.15;
		$final_amount=$result->creditAmount-$amountToDeduct;
		$data2 = array('creditAmount'=>$final_amount);
		$this->db->where('userId',$userId);
		$query=$this->db->update('users', $data2);
		if($othershops != '' ){
			$otherdetails= array('transactionId'=>$transaction_id);
			if($othershops['size'] == 1){
				$othershops['size'] ='6-inch';
			}else{
				$othershops['size'] = 'footlong';
			}
			$data3 = $othershops+$otherdetails;
			$this->addsubwaytransaction($data3);
		}

	}

	public function addsubwaytransaction($data)
	{
		$this->db->insert('subway', $data);
	}
	
	public function addxerox($userId,$quantity,$price,$slot,$deliveryDate,$orderTime,$xeroxarray)
	{
		$this->db->where('products.productName', 'xerox');
		$this->db->where('stores.name','omega');
		$this->db->join('stores', 'stores.shopId = products.shopId');
		$this->db->from('products');
		$query = $this->db->get();

		$productId=$query->row()->productId;

		$data = array('userId'=>$userId,'productId'=>$productId,'quantity' =>$quantity ,'price' => $price,
			'deliverySlot'=>$slot,'deliveryDate'=>$deliveryDate,'orderTimeStamp'=>$orderTime);
		$this->db->insert('transaction', $data);
		
		$transaction_id=$this->db->insert_id();
		$data2 = array('transactionId'=>$transaction_id)+$xeroxarray;
		$this->db->insert('xerox',$data2);

		$this->db->where('userId',$userId);
		$query=$this->db->get('users',1);
		$result=$query->row();
		$amountToDeduct = ($price*$quantity)*1.15;
		$final_amount=$result->creditAmount-$amountToDeduct;
		$data2 = array('creditAmount'=>$final_amount);
		$this->db->where('userId',$userId);
		$query=$this->db->update('users', $data2);
	}

	public function addlaundry($userId,$quantity,$price,$slot,$deliveryDate,$orderTime,$laundryarray)
	{
		$this->db->where('products.productName', 'laundry');
		$this->db->where('stores.name','washexpress');
		$this->db->join('stores', 'stores.shopId = products.shopId');
		$this->db->from('products');
		$query = $this->db->get();

		$productId=$query->row()->productId;

		$data = array('userId'=>$userId,'productId'=>$productId,'quantity' =>$quantity ,'price' => $price,
			'deliverySlot'=>$slot,'deliveryDate'=>$deliveryDate,'orderTimeStamp'=>$orderTime);
		$this->db->insert('transaction', $data);
		
		$transaction_id=$this->db->insert_id();
		$data2 = array('transactionId'=>$transaction_id)+$laundryarray;
		$this->db->insert('laundry',$data2);

		$this->db->where('userId',$userId);
		$query=$this->db->get('users',1);
		$result=$query->row();
		$amountToDeduct = ($price*$quantity)*1.15;
		$final_amount=$result->creditAmount-$amountToDeduct;
		$data2 = array('creditAmount'=>$final_amount);
		$this->db->where('userId',$userId);
		$query=$this->db->update('users', $data2);
	}

	public function getusertransaction($userId)
	{
		$this->db->select('*,transaction.price', FALSE);
		$this->db->where('userId',$userId);
		$this->db->from('transaction');
		$this->db->join('products','products.productId=transaction.productId');
		return $this->db->get()->result();
	}

	public function deleteTransaction($transactionId)
	{
		$this->db->where('transactionId',$transactionId);
	}

	public function getstoreName($productId)
	{
		$this->db->where('productId',$productId);
		$this->db->from('products');
		$this->db->join('stores', 'stores.shopId = products.shopId');
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->row()->name;
	}
	public function getSlots()
	{
		date_default_timezone_set('Asia/Kolkata');
		$time = date("H:i");
		$this->db->where('starttimings >',$time);
		return $this->db->get('slots')->result();
		
	}	
	public function getallSlots()
	{
		return $this->db->get('slots');
	}

}

/* End of file model_transaction.php */
/* Location: ./application/models/model_transaction.php */