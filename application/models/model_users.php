<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Model_users extends CI_Model{

		function check_user_exist($UserName){
			$this->db->where('userName',$UserName);
			$query=$this->db->get('users');
			if($query->num_rows() >0 ){
				return true;
			}
			else {
				return false;
			}
		}

		function add_user(){
			
			/*Error -1 = Username Already Exist
			  Error -2 = Inserting Into Database Failed
			  Error -3 = Email Sending Failed
			 */


			$username=$this->input->post('username',TRUE);  //Second Parameter for XSS Filtering
			
			if($this->check_user_exist($username)){
				return -1;
			}
			$name=$this->input->post('fullname',TRUE);
			$emailaddress=$username.'@daiict.ac.in';
			$password=$this->input->post('password');
			$phone=$this->input->post('phone',TRUE);
			$address=$this->input->post('address',TRUE);
			$generated_token=md5(rand(0,7));
			$hashed_password=$this->encrypt->sha1($password);
			$data=array('userName' => $username, 'fullName' => $name,'password' =>$hashed_password,
						 'email' => $emailaddress,'address' => $address, 'mobileNo' => $phone ,'authToken'=> $generated_token );		

			$config = Array(
				'protocol' => 'smtp',
				'smtp_host' => 'ssl://smtp.googlemail.com',
				'smtp_port' => 465,
				'smtp_user' => ' virtualinfocity@gmail.com',
				'smtp_pass' => ' virtualinfocity@daiict',
				'mailtype'  => 'html', 
				'charset'   => 'iso-8859-1'
				);
			$this->load->library('email',$config);
			$this->email->set_newline("\r\n");
			$this->email->from('virtualinfocity@gmail.com', 'Virtual Infocity');
			$this->email->to($emailaddress);
		
			$this->email->subject('Register Email Address');
			$this->email->message('Hello, Pls Confirm Your Email Address '.URL.'register/confirm_email?auth_token='.$generated_token.'&emailaddress='.$emailaddress );
			
			if($out=$this->email->send())
			{
				$this->db->insert('users', $data);
				$affected_rows=$this->db->affected_rows();
				if($affected_rows>0){
					return $out;	
				}
				else {
					return -2;
				}
			}
			else
			{ 
				return -3; //Error Sending Email
			}
		}	
		function update_confirmation(){
			
			/*Error -1 Already Confirmed
			  Error -2 Invalid Credentials
			*/

			$emailaddress=$this->input->get('emailaddress',TRUE);
			$auth_token=$this->input->get('auth_token',TRUE);
			$this->db->where('email',$emailaddress);
			$this->db->where('authToken',$auth_token);
			$query = $this->db->get('users');

	        if($query->num_rows() >0 ){
	            $row = $query->row();
	            $id =$row->userId;
	            $data = array('verified' => 'true');
	            $this->db->where('userId', $id);
				$this->db->update('users', $data);
				$affected_rows=$this->db->affected_rows();
				if($affected_rows>0){
					return $affected_rows;	
				}
				else{
					return -1;
				}
			}
			else{
				return -2;
			}
		}

	function login(){

		/*Error -1  User Has Not COnfirmed
		  Error -2  Incorrect Login Credentials 
		*/
		$username=$this->input->post('username',TRUE);
		$password=$this->input->post('password',TRUE);
		$this->db->where('userName',$username);
		$this->db->where('password',$this->encrypt->sha1($password));
		$result=$this->db->get('users',1); //1 represents that limit is set to 1 in db query
		if($result->num_rows()>0){
			/*Set Session And User Is Loggedin*/
			$rows = $result->row();
			if($rows->verified==='true'){
                $newdata = array(
                    'userId' => $rows->userId,
                    'userName' => $rows->userName,
                    'userEmail' => $rows->email,
                    'userMobile' => $rows->mobileNo,
                    'loggedIn' => TRUE,
                );         
            	$this->session->set_userdata($newdata);
            	return 1;
        	}
        	else{
        		return -1;
        	}
		}
		else{
			return -2;
		}
	}

	public function logout()
    {
        $this->session->sess_destroy();
    }	

    public function getuserdetails()
    {
    	/*Error -1 UserNot Logged In*/
    	/*Error -2 Session Incorrtect*/
    	$userId = $this->session->userdata('userId');
    	if($userId == '')
    	{
    		return -1;
    	}
    	$this->db->where('userId', $userId, FALSE);
    	$query = $this->db->get('users',1);
    	if($query->num_rows()>0){
    		return $query->row();
    	}
    	else{
    		return -2;
    	}

    }
}