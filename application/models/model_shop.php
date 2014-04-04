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

    public function getShopNumber ($storeName) {
		$this->db->where('name', $storeName);
		$query=$this->db->get('stores', 1);
		$row = $query->row();
		#print_r($row);
		$storeid = $row->shopId;
	
		$this->db->where('shopId',$storeid);
		return $this->db->get('stores')->result();
	 }
	 public function changeShopStatus ($shopstatus, $storeName) {
		$this->db->where('name', $storeName);
		$query=$this->db->get('stores', 1);
		$row = $query->row();
		#print_r($row);
		$storeid = $row->shopId;
		$data = array('currentStatus' => $shopstatus);
			$this->db->where('shopId', $storeid);
			$this->db->update('shoptimings', $data); 
		
	 }
	 
	 public function login($username,$password)
	 {
		
		/*
		  Error -1  Incorrect Login Credentials 
		*/
		$this->db->where('userName',$username);
		$this->db->where('password',$this->encrypt->sha1($password));
		$result=$this->db->get('stores',1); //1 represents that limit is set to 1 in db query
		if($result->num_rows()>0){
			/*Set Session And User Is Loggedin*/
			$rows = $result->row();
                $newdata = array(
                    'userId' => $rows->shopId,
                    'name' => $rows->name,
                    'userEmail' => $rows->email,
                    'userMobile' => $rows->contactNo,
					'isShopKeeper'=>TRUE,
                    'loggedIn' => TRUE
                );         
            	$this->session->set_userdata($newdata);
            	return 1;
		}
		else{
			return -1;
		}
	}

}