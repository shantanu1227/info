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

    public function addThali($shopId,$lunch,$dinner) {
	date_default_timezone_set('Asia/Kolkata');
	$currentDate=date("d-m-Y");
	$currentdata = array('shopId' => $shopId ,'lunch' => $lunch ,'dinner' => $dinner, 'date' => $currentDate); 
	$this->db->insert('thali', $currentdata); 
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

	public function changeDeliveryguypass($userId,$pass) {
	$this->db->where('userId', $userId);
	$changedelpass_data = $this->db->get('delivery_man')->result();
	//print_r($data[0]->creditAmount);
	$changedelpass_data[0]->password = $this->encrypt->sha1($pass);
	$this->db->where('userId', $userId);
	$this->db->update('delivery_man', $changedelpass_data[0]); 
	return;
	}

	public function insertFeedback()
	{
		$comment=$this->input->post('comment',TRUE);
		$data=array('comment'=>$comment);
		$this->db->insert('sitefeedback',$data);
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