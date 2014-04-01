<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cart extends CI_Controller {

	public function index()
	{
		
	}
	public function addtocart()
	{
		$id=$this->input->post('product_id');
		$qty=$this->input->post('quantity');
		$price=$this->input->post('product_price');
		$name = $this->input->post('product_name');
		$data = array(
			'id'      => $id,
			'qty'     => $qty,
			'price'   => $price,
			'name'    => $name 
			);
		$contents = $this->cart->contents();
		foreach ($contents as $items) {
			if($items['id']==$id){
			 	if ($this->cart->has_options($items['rowid']) == FALSE){
			 			$data = array(
								'rowid' => $items['rowid'],
								'qty'   => $qty+$items['qty']
								);
						$this->cart->update($data);
						return ;
			 		}
			 }
		}
		$this->cart->insert($data);
	}

	public function addsubwaytocart()
	{
		$id=$this->input->post('productid');
		$qty=$this->input->post('qty');
		$price=$this->input->post('price');
		$name =$this->input->post('productname');
		$bread = $this->input->post('bread');
		$size = $this->input->post('size');
		$veggies = $this->input->post('veggie');
		$veggies=implode(',',$veggies);
		$sausages = $this->input->post('extra');
		$sausages = implode(',', $sausages);
		$comments = $this->input->post('comments',TRUE);
		$comments = trim($comments);
		$price = $price*$size;
		$data = array(
			'id'      => $id,
			'qty'     => $qty,
			'price'   => $price,
			'name'    => $name,
			'options' =>  array(
				'bread'=>$bread,
				'size'=>$size ,
				'veggies' => $veggies ,
				'sauce'=>$sausages,
				'additionalComment'=>$comments,
				'price'=>$price,
				'quantity'=>$qty,
				'sub'=>$name
				)
			);
		$this->cart->insert($data);	
		redirect('welcome/subway','refresh');
	}

	public function updatecart()
	{
		$total = $this->cart->total_items();

		$item = $this->input->post('rowid');
		$qty = $this->input->post('qty');
		for($i=0; $i <count($item);$i++)
		{
			$data = array(
				'rowid' => $item[$i],
				'qty'   => $qty[$i]
				);
			$this->cart->update($data);
		}
		redirect('welcome/cart','refresh');
	}

	public function emptycart()
	{
		$this->cart->destroy();
		redirect('welcome/','refresh');

	}

	public function addXeroxFile(){

		$colour = $this->input->post('colour',TRUE);
		$from = $this->input->post('from',TRUE);
		$to = $this->input->post('to',TRUE);

		$shopId = 1;

		$directoryName = "/photocopyDocuments"."/";
		$config['upload_path'] = "./assets/img".$directoryName;

		$config['allowed_types'] = 'jpg|png|pdf|doc|odt|docx|xls|img';
		$config['max_size']	= '50000';


		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			print_r($this->upload->display_errors());
			print_r($config['upload_path']);
		}
		else
		{


		}
	}

	public function checkout()
	{
		$this->load->model('model_products');
		$userId=$this->session->userdata('userId');
		if($userId == ''){
			$errormsg  = array('errorMessage'=>'Please Login To Checkout','errorClose'=>'X','errorColor'=>'rgb(214, 38, 38);');
			$dataThali= array('outputThalis' => $this->model_products->getThali());	
			$dataOffer=array('outputOffers' => $this->model_products->getOffers());
			$this->load->view('home', $dataThali+$dataOffer+$errormsg);	
		}elseif($this->cart->total_items()<=0){
			$errormsg  = array('errorMessage'=>'There are no items in Your Cart','errorClose'=>'X','errorColor'=>'rgb(214, 38, 38);');
			$dataThali= array('outputThalis' => $this->model_products->getThali());	
			$dataOffer=array('outputOffers' => $this->model_products->getOffers());
			$this->load->view('home', $dataThali+$dataOffer+$errormsg);	
		}else{
			$slot=$this->input->post('slotId');
			$delivery_date=$this->input->post('deliverydate');
			$ordertime = time();
			$this->load->model('model_transaction');
			$this->load->model('model_users');
			$total_amount=0;
			$mailproductname="";

			foreach ($this->cart->contents() as $items) {
				$total_amount=$total_amount+$items['price'];
			}
			$total_amount=$total_amount*1.15;
			$current_amount = $this->model_users->getuserdetails()->creditAmount ;
			if($current_amount > $total_amount){

				foreach ($this->cart->contents() as $items){

					if ($this->cart->has_options($items['rowid']) == FALSE){
						$this->model_transaction->addtransaction($userId,$items['id'],$items['qty'],$items['price'],
							$slot,$delivery_date,$ordertime,'');
						$mailproductname=$mailproductname.$items['name']." From Shop ".$this->model_transaction->getstoreName($items['id']). " Qty ".$items['qty']." Price ".$items['price']."<br>";
					}
					else{
						$this->model_transaction->addtransaction($userId,$items['id'],$items['qty'],$items['price'],
							$slot,$delivery_date,$ordertime,$items['options']);
						$mailproductname=$mailproductname.$items['name']." From Shop ".$this->model_transaction->getstoreName($items['id']). " Qty ".$items['qty']." Price ".$items['price']." <br> ";
					}
				}


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
				$this->email->to("punit9462@gmail.com");

				$this->email->subject('New Order');
				$this->email->message('New order of '.$this->session->userdata('userName').'Contact '.$this->session->userdata('userMobile').' Slot '.$slot.'<br>'.$mailproductname);
				//$this->email->send();


				$this->cart->destroy();
				$errormsg  = array('errorMessage'=>'Your Transaction Is complete','errorClose'=>'X','errorColor'=>'rgb(24, 175, 48)');
				$dataThali= array('outputThalis' => $this->model_products->getThali());	
				$dataOffer=array('outputOffers' => $this->model_products->getOffers());
				$this->load->view('home', $dataThali+$dataOffer+$errormsg);	
			}else{
				$errormsg  = array('errorMessage'=>'Insufficient Balance Please Recharge','errorClose'=>'X','errorColor'=>'rgb(214, 38, 38);');
				$dataThali= array('outputThalis' => $this->model_products->getThali());	
				$dataOffer=array('outputOffers' => $this->model_products->getOffers());
				$this->load->view('home', $dataThali+$dataOffer+$errormsg);	
			}
		}
	}

}


/* End of file cart.php */
/* Location: ./application/controllers/cart.php */
