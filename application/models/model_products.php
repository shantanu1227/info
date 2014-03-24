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

	public function addproducts($productName,$productImage,$productPrice,$shopId){
		$data = array('productName' => $productName, 'price' => $productPrice, 
			'productImage' =>$productImage, 'inStock' => 'TRUE','shopId' => $shopId);
		$this->db->insert('products', $data);	
	}


}

/* End of file model_products.php */
/* Location: ./application/models/model_products.php */