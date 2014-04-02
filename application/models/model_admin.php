<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_admin extends CI_Model {

    public function adduserBalance($userId,$balance){
	$this->db->where('userId', $userId);
	$addbalance_data= $this->db->get('users')->result();
	//print_r($data[0]->creditAmount);
	$addbalance_data[0]->creditAmount = $addbalance_data[0]->creditAmount + $balance;
	$this->db->where('userId', $userId);
	$this->db->update('users', $addbalance_data[0]); 
	return;
	}

    public function removeuserBalance($userId,$balance){
    $this->db->where('userId', $userId);
	$removebalance_data = $this->db->get('users')->result();
	//print_r($data[0]->creditAmount);
	$removebalance_data[0]->creditAmount = $removebalance_data[0]->creditAmount - $balance;
	$this->db->where('userId', $userId);
	$this->db->update('users', $removebalance_data[0]); 
	return;
	}

    public function removeuser($userId) {
	$this->db->where('userId', $userId);
	$removeuser_data= $this->db->get('users')->result();
    $removeuser_data[0]->authToken = md5(rand(0,7)); //some bug ?? 
    $removeuser_data[0]->verified = "false";
    $this->db->where('userId', $userId);
	$this->db->update('users',$removeuser_data[0]);	
	return ;
    }

    public function addDeliveryguybalance($userId,$balance) {
	$this->db->where('userId', $userId);
	$del_data = $this->db->get('delivery_man')->result();
	//print_r($data[0]->creditAmount);
	$del_data[0]->creditLeft = $del_data[0]->creditLeft + $balance;
	$this->db->where('userId', $userId);
	$this->db->update('delivery_man', $del_data[0]); 
	return;
	}

	public function removeDeliveryguybalance($userId,$balance) {
	$this->db->where('userId', $userId);
	$del_data = $this->db->get('delivery_man')->result();
	//print_r($data[0]->creditAmount);
	$del_data[0]->creditLeft = $del_data[0]->creditLeft - $balance;
	$this->db->where('userId', $userId);
	$this->db->update('delivery_man', $del_data[0]); 
	return;
	}

	public function insertFeedback()
	{
		$comment=$this->input->post('comment',TRUE);
		$data=array('commment'=>$comment);
		$this->db->insert('sitefeedback',$data);
	}

}