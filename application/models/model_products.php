<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
This deals with the products database and offers

getproducts - get products according to storename
addproducts - add product from skinterface
addoffer - add offer from skinterface
getthali  - gives the thali based on current date
getoffers - gives the current 4 offers available
getoffersseperate -gives all the offers
editproducts - edit a given product details
getAllproductsofStore - gives all the products of a store whether they are 
						available or not
getAlloffersofStore - gives all the offers of a particular store
deleteoffer - delete an offer
createCaptcha - creating captcha
*/
class Model_products extends CI_Model {

	public function getproducts($storeName)
	{
		$this->db->where('name', $storeName);
		$query=$this->db->get('stores', 1);
		$row = $query->row();
		$storeid = $row->shopId;
		$this->db->where('shopId', $storeid);
		$this->db->where('inStock','TRUE');
		return $this->db->get('products')->result();
	}

	public function addproducts($productName,$productImage,$productPrice,$shopId) 
	{
		$data = array('productName' => $productName, 'price' => $productPrice, 
			'productImage' =>$productImage, 'inStock' => 'TRUE','shopId' => $shopId);
		$this->db->insert('products', $data);	
	}
	public function addoffers($offerName,$offerImage,$shopId) 
	{
		$data = array('offerName' => $offerName, 
			'OfferImageUrl' =>$offerImage,'shopId' => $shopId);
		$this->db->insert('offers', $data);	
		
	}

	public function getThali() 
	{
		date_default_timezone_set('Asia/Kolkata');
		$currentDate=date("d-m-Y");
		$this->db->where('date',$currentDate);
		$this->db->join('stores','stores.shopId=thali.shopId');
		$this->db->from('thali');
		$results = $this->db->get();
		return $results->result();
		//print_r($results); #$results;
	}

	public function getOffers()
	 {
		$this->db->order_by("offers.offerId", "desc");
		$this->db->join('stores','offers.shopId=stores.shopId');
		$this->db->from('offers');
		$this->db->limit(4);
		$results = $this->db->get();
		#print_r ($results->result());#->result();
		return $results->result();
		#return $this->db->get('offers')->results();
	}
	public function getOffersseparate() 
	{
		$this->db->order_by("offers.offerId", "desc");
		$this->db->join('stores','offers.shopId=stores.shopId');
		$this->db->from('offers');
		
		$results = $this->db->get();
		#print_r ($results->result());#->result();
		return $results->result();
		#return $this->db->get('offers')->results();
	}
	public function createCaptcha()
	{
		$options = array('img_path'=>'./assets/captcha/','img_url'=>URL.'assets/captcha/','img_width'=>'150','img_height'=>'40','expiration'=>7200);
		$cap = create_captcha($options);
		$image = $cap['image'];
		$this->session->set_userdata('captchaword', $cap['word']);
		return $image;
	}
	
	public function editproducts($productName,$productImage,
		$productPrice,$shopId, $productId, $productInStock) 
	{
		if($productImage == ""){
			$data = array('productName' => $productName, 'price' => $productPrice, 'inStock' => $productInStock,'shopId' => $shopId);
			$this->db->where('productId', $productId);
			$this->db->update('products', $data); 
			
		}else{
			$data = array('productName' => $productName, 'price' => $productPrice, 
				'productImage' =>$productImage, 'inStock' => $productInStock,'shopId' => $shopId);
			$this->db->where('productId', $productId);
			$this->db->update('products', $data); 
		}
	}
	
	public function getAllproductsofStore($storeName)
	{
		$this->db->where('name', $storeName);
		$query=$this->db->get('stores', 1);
		$row = $query->row();
		$storeid = $row->shopId;
		$this->db->where('shopId', $storeid);
		return $this->db->get('products')->result();
	}
	public function getAlloffersofStore($storeName)
	{
		$this->db->where('name', $storeName);
		$query=$this->db->get('stores', 1);
		$row = $query->row();
		$storeid = $row->shopId;
		$this->db->where('shopId', $storeid);
		return $this->db->get('offers')->result();
	}
	public function deleteoffer($offerid)
	{
		$this->db->where('offerId',$offerid);
		$this->db->delete('offers'); 	
	}
	
}

/* End of file model_products.php */
/* Location: ./application/models/model_products.php */