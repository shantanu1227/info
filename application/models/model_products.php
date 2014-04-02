<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_products extends CI_Model {

	public function getproducts($storeName){
		$this->db->where('name', $storeName);
		$query=$this->db->get('stores', 1);
		$row = $query->row();
		$storeid = $row->shopId;
		$this->db->where('shopId', $storeid);
		return $this->db->get('products')->result();
	}

	public function addproducts($productName,$productImage,$productPrice,$shopId) {
		$data = array('productName' => $productName, 'price' => $productPrice, 
			'productImage' =>$productImage, 'inStock' => 'TRUE','shopId' => $shopId);
		$this->db->insert('products', $data);	
	}

	public function getThali() {
		date_default_timezone_set('Asia/Kolkata');
		$currentDate=date("d-m-Y");
		$this->db->where('date',$currentDate);
		$this->db->join('stores','stores.shopId=thali.shopId');
		$this->db->from('thali');
		$results = $this->db->get();
		return $results->result();
		//print_r($results); #$results;
	}

	public function getOffers() {
		$this->db->join('stores','offers.shopId=stores.shopId');
		$this->db->from('offers');
		$results = $this->db->get();
		#print_r ($results->result());#->result();
		return $results->result();
		#return $this->db->get('offers')->results();
	}
	
	public function editproducts($productName,$productImage,
			$productPrice,$shopId, $productId, $productInStock) {
	if($productImage == ""){
	$data = array('productName' => $productName, 'price' => $productPrice, 'inStock' => $productInStock,'shopId' => $shopId);
	$this->db->where('productId', $productId);
	$this->db->update('products', $data); 
							
	}
	else{
			$data = array('productName' => $productName, 'price' => $productPrice, 
			'productImage' =>$productImage, 'inStock' => $productInStock,'shopId' => $shopId);
	$this->db->where('productId', $productId);
	$this->db->update('products', $data); 
	}
	}
	
	
							
	
	
}

/* End of file model_products.php */
/* Location: ./application/models/model_products.php */