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
		$this->cart->insert($data);
	}

	function add_cart_item(){
     
    if($this->cart_model->validate_add_cart_item() == TRUE){
         
        // Check if user has javascript enabled
        if($this->input->post('ajax') != '1'){
            redirect('cart'); // If javascript is not enabled, reload the page with new data
        }else{
            echo 'true'; // If javascript is enabled, return true, so the cart gets updated
        }
    }
     
								}
	public function addsubwaytocart()
	{
		$id=$this->input->post('productid');
		$qty=$this->input->post('qty');
		$price=$this->input->post('price');
		$name = $this->input->post('productname');
		$bread = $this->input->post('bread');
		$size = $this->input->post('size');
		$veggies = $this->input->post('veggie');
		$sausages = $this->input->post('extra');
		$comments = $this->input->post('comments',TRUE);
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
               				'$quantity'=>$qty,
               				'sub'=>$name
               				)
            );
		$this->cart->insert($data);	

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

		foreach ($this->cart->contents() as $items) {
			$total_amount=$total_amount+$items['price'];
		}
		$total_amount=$total_amount*0.15;
		
		if($this->model_users->getuserdetails()->creditAmount > $total_amount){

			foreach ($this->cart->contents() as $items){

				if ($this->cart->has_options($items['rowid']) == FALSE){
					$this->model_transaction->addtransaction($userId,$items['id'],$items['qty'],$items['price'],
						$slot,$delivery_date,$ordertime,'');
				}
				else{
					$this->model_transaction->addtransaction($userId,$items['productid'],$items['qty'],$items['price'],
						$slot,$delivery_date,$ordertime,$items['options']);
				}
			}
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
