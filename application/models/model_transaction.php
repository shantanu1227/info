<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_transaction extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getShopName($shopid)
	{
		$this->db->where('shopId',$shopid, FALSE);
		$query = $this->db->get('stores',1);
		$row = $query->row();
		return $row->name;
	} 
	public function addtransaction($userId,$productId,$quantity,$price,$slot,$deliveryDate,$orderTime,$othershops)
	{
		$data = array('userId'=>$userId,'productId'=>$productId,'quantity' =>$quantity ,'price' => $price,
			'deliverySlot'=>$slot,'deliveryDate'=>$deliveryDate,'orderTimeStamp'=>$orderTime);
		$this->db->insert('transaction', $data);
		

		$this->db->where('userId',$userId, FALSE);
		$amountToDeduct = $price + $price*0.15;
		$data2= array('creditAmount','creditAmount-$amountToDeduct');
		$this->db->update('users', $data2);


		$this->db->where('productId', $productId, FALSE);
		$query = $this->db->get('products',1);
		$row = $query->row();
		if(getShopName($row->shopId) === "Subway"){
			addsubwaytransaction($othershops);
		}


	}
	public function addsubwaytransaction($data)
	{
		$this->db->insert('subway', $data);
	}


}

/* End of file model_transaction.php */
/* Location: ./application/models/model_transaction.php */