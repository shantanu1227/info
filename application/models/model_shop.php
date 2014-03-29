<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_shop extends CI_Model {

    public function getShopDetails($storeName) {
    	#$this->db->where('date',$currentDate);
		#$this->db->join('stores','stores.shopId=thali.shopId');
		#$this->db->from('thali');
		#$results = $this->db->get();
		#return $results->result();
		
		$this->db->where('name', $storeName);
		$query=$this->db->get('stores', 1);
		$row = $query->row();
		#print_r($row);
		$storeid = $row->shopId;
	
		$this->db->where('shopId',$storeid);
		return $this->db->get('shoptimings')->result();

		#$this->db->where('stores',$currentDate);
		#$this->db->join('stores','stores.shopId=thali.shopId');
		#$this->db->from('thali');
		#$results = $this->db->get();
		#return $results->result();
		
		#$query=$this->db->get('shoptimings', 1);
		#$row = $query->row();
		#$storeid = $row->shopId;
		#$this->db->where('shopId', $storeid);
		#return $this->db->get('shoptimings')->result();
    }
}