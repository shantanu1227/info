<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_admin extends CI_Model {

    public function setuserBalance($userId,$balance){
		$this->db->where('userId', $userId);
		$query = $this->db->get('users', 1);
		$row = $query->row();
		$creditAmnt = $row->creditAmount;
		$creditAmnt = $creditAmnt + $balance;
		$this->db->where('userId', $userId);
		$this->db->set('creditAmount', $creditAmnt, FALSE);
		$this->db->where('userId', $userId);
		$this->db->update('users');
    }
	public function insertFeedback()
	{
		$comment=$this->input->post('comment',TRUE);
		$data=array('comment'=>$comment);
		$this->db->insert('sitefeedback',$data);
	}
}