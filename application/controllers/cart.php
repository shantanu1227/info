<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cart extends CI_Controller {

	public function index()
	{
		
	}
	public function addtocart()
	{
		$id=$this->input->post('productid');
		$qty=$this->input->post('qty');
		$price=$this->input->post('price');
		$name = $this->input->post('name');
		$data = array(
               'id'      => $id,
               'qty'     => $qty,
               'price'   => $price,
               'name'    => $name 
               );
            
		$this->cart->insert($data); 
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
		$comments = $this->input->post('comments');
		$data = array(
               'id'      => $id,
               'qty'     => $qty,
               'price'   => $price,
               'name'    => $name,
               'options' =>  array('bread'=>$bread,'size'=>$size ,'veggies' => $veggies ,
               				'sausages'=>$sausages,'comments'=>$comments);
            
		$this->cart->insert($data);	

	}

	public function updatecart()
	{
		$total = $this->cart->total_items();

		$item = $this->input->post('rowid');
		$qty = $this->input->post('qty');


		for($i=0;$i<$total;$i++)
		{
			$data = array(
				'rowid' => $item[$i],
				'qty'   => $qty[$i]
				);
			$this->cart->update($data);
		}
	}

	public function emptycart()
	{
		$this->cart->destroy();
	}
	
	public function addXeroxFile(){

		$productName = $this->input->post('productname',TRUE);
		$productPrice = $this->input->post('productprice',TRUE);
		$shopId = 1;

		$directoryName = "/photocopyDocuments"."/";
		$config['upload_path'] = "./assets/img".$directoryName;

		$config['allowed_types'] = 'jpg|png|pdf|doc|odt|docx|xls|img';
		$config['max_size']	= '50000';
		$currcolour = $this->input->post('colour',TRUE);
		$currfrom = $this->input->post('from',TRUE);
		$currto = $this->input->post('to',TRUE);
		

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

/* End of file cart.php */
/* Location: ./application/controllers/cart.php */
