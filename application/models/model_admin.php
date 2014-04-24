<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
Models deal with the database functioning 
This model deals with admin functionalities

adduserbalance - to add credit to a student
removeuserbalance - to deduct amount from students balance if anything extra was ordered like 
					extra cheese in subway
removeuser - To ban a particular user if any mischievious activity was found
addthali - To add the daily thali available in infocity
insertfeedback - Customers to add feedback to the website
getthalistores - get the stores which gives thali service
login - login for admin 
*/ 
class Model_admin extends CI_Model {

	public function adduserBalance($userId,$balance)
	{
		/*Error -1 usernot found*/
		$this->db->where('userName', $userId);
		$query = $this->db->get('users');
		if($query->num_rows()>0){
			$addbalance_data= $query->result();
			$addbalance_data[0]->creditAmount = $addbalance_data[0]->creditAmount + $balance;
			$this->db->where('userName', $userId);
			$this->db->update('users', $addbalance_data[0]); 
			$count = $this->db->affected_rows();
			return $count;
		}else{
			return -1;
		}
	}

	public function removeuserBalance($userId,$balance,$transactionid)
	{
		/*Error -1 Incorrect UserId Id
		  Error -2 Incorrect Transaction Id
		*/
		$this->db->where('transactionId',$transactionid);
		$query=$this->db->get('transaction');   

		if($query->num_rows()>0){
			$row=$query->row();
			$amount = $row->price;

			$this->db->where('userName', $userId);
			$query = $this->db->get('users');
			if($query->num_rows()>0){
				$newamount = $amount+$balance;
				$this->db->where('transactionId',$transactionid);
				$data = array('price'=>$newamount);
				$this->db->update('transaction', $data);

				$this->db->where('userName', $userId);
				$removebalance_data =$query->result();
				$removebalance_data[0]->creditAmount = $removebalance_data[0]->creditAmount - $balance;
				$this->db->where('userName', $userId);
				$this->db->update('users', $removebalance_data[0]); 
				$count = $this->db->affected_rows();
				return $count;
			}
			return -1;
		}
		return -2;
	}

	public function removeuser($userId) 
	{
		/*Error -1 User not found*/
		$this->db->where('userName', $userId);
		$query = $this->db->get('users');
		if($query->num_rows()>0){
		$removeuser_data= $query->result();
	    $removeuser_data[0]->authToken = md5(rand(0,7));
	    $removeuser_data[0]->verified = "false";
	    $this->db->where('userName', $userId);
	    $this->db->update('users',$removeuser_data[0]);	
	    $count = $this->db->affected_rows();
	    return $count;
		}
		return -1;
	}

	public function addThali($shopId,$lunch,$dinner) 
	{
		date_default_timezone_set('Asia/Kolkata');
		$currentDate=date("d-m-Y");
		$currentdata = array('shopId' => $shopId ,'lunch' => $lunch ,'dinner' => $dinner, 'date' => $currentDate); 
		$this->db->insert('thali', $currentdata); 
		return ;
	}

	public function insertFeedback()
	{
		$comment=$this->input->post('comment',TRUE);
		$data=array('comment'=>$comment);
		$this->db->insert('sitefeedback',$data);
	}

	public function getThaliStores()
	{
		$this->db->where('storetype.type', 'Thali');
		$this->db->join('stores', 'stores.typeId = storetype.typeId');
		$this->db->from('storetype');
		$query = $this->db->get();
		return $query->result();
	}

	public function login($username,$password)
	{
		$this->db->where('username',$username);
		$this->db->where('password', $this->encrypt->sha1($password));
		$query=$this->db->get('admin');
		if($query->num_rows()>0){
			$rows = $query->row();
			$newdata = array(
				'AdminuserName' => $rows->username,
				'AdminName' => $rows->name,
				'isAdmin' => TRUE,
				'loggedIn' => TRUE,
				);         
			$this->session->set_userdata($newdata);
			return 1;
		}else{
			return -1;
		}
	}

}