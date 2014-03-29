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


		$this->db->where('userId',$userId, FALSE);
		$amountToDeduct = $price + $price*0.15;
		$data2= array('creditAmount','creditAmount'-$amountToDeduct);
		$this->db->update('users', $data2);

		if($othershops != '' ){
			$storeid=$this->getstoreid("Subway");
			$otherdetails= array('transactionId'=>$transactionId,'shopId'=>$storeid,'userId'=>$userId);
			$data3 = $othershops+$otherdetails;
			$this->addsubwaytransaction($data3);
		}

	}

	public function addsubwaytransaction($data)
	{
		$this->db->insert('subway', $data);
	}

	public function getusertransaction($userId)
	{
		$this->db->where('userId',$userId);
		$this->db->from('transaction');
		$this->db->join('products','products.productId=transaction.transactionId');
		return $this->db->get()->result();
	}



}

/* End of file model_transaction.php */
/* Location: ./application/models/model_transaction.php */