<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
	addproducts - for shopkeeper to add products
	changestatus - for shopkeeper to change its availability whether open or close
	editproducts - editing a product info such as name or price or its availability
	addoffer - shopkeeper can add its daily offers
	deleteoffer - shopkeeper can delete its added offer
	login - login for shopkeeper
	logout - logout for shopkeeper
*/

class Shop extends CI_Controller {


	public function addProducts(){
		$name=$this->session->userdata('name');
		$isshopkeeper = $this->session->userdata('isShopKeeper');

		if($name!='' && $isshopkeeper){
			$productName = $this->input->post('productname',TRUE);
			$productPrice = $this->input->post('productprice',TRUE);
			$shopId = $this->session->userdata('ShopuserId');
			$storename = strtolower($name);
			$directoryName = "/".$storename."/";
			$config['upload_path'] = "./assets/img".$directoryName;

			$config['allowed_types'] = 'jpg|png';
			$config['max_size']	= '50000';
		//$config['max_width']  = '1024';
		//$config['max_height']  = '768';

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload())
			{
				print_r($this->upload->display_errors());
				print_r($config['upload_path']);
			}
			else
			{
				$this->load->model('model_products');
				$output = $this->upload->data();
				$productImage = $storename."/".$output['file_name'];
				$this->model_products->addproducts($productName,$productImage,
					$productPrice,$shopId);
				redirect('/welcome/skinterface', 'refresh');
			}
		}
	}
	public function changeStatus(){
	$name=$this->session->userdata('name');
	$storename = strtolower($name);
	$shopstatus = $this->input->post('status',TRUE);
				$this->load->model('model_shop');
				
				$this->model_shop->changeShopStatus($shopstatus, $storename);
				redirect('/welcome/skinterface', 'refresh');
	}
	public function addOffers(){
		$name=$this->session->userdata('name');
		$isshopkeeper = $this->session->userdata('isShopKeeper');

		if($name!='' && $isshopkeeper){
			$offerName = $this->input->post('offername',TRUE);
			$shopId = $this->session->userdata('ShopuserId');
			$config['upload_path'] = "./assets/img";

			$config['allowed_types'] = 'jpg|png';
			$config['max_size']	= '50000';
		//$config['max_width']  = '1024';
		//$config['max_height']  = '768';

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload())
			{
				print_r($this->upload->display_errors());
				print_r($config['upload_path']);
			}
			else
			{
				$this->load->model('model_products');
				$output = $this->upload->data();
				$offerImage = $output['file_name'];
				$this->model_products->addoffers($offerName,$offerImage,$shopId);
				redirect('/welcome/skinterface', 'refresh');
			}
		}
	}

	public function editProducts(){
		
		$name=$this->session->userdata('name');
		$isshopkeeper = $this->session->userdata('isShopKeeper');

		if($name!='' && $isshopkeeper){

			$productId = $this->input->post('productid',TRUE);
			$productName = $this->input->post('editedproductname',TRUE);
			$productPrice = $this->input->post('editedproductprice',TRUE);
			$productInStock = $this->input->post('stock');
			$shopId = $this->session->userdata('ShopuserId');
			$storename = strtolower($name);
			$directoryName = "/".$storename."/";
			$config['upload_path'] = "./assets/img".$directoryName;

			$config['allowed_types'] = 'jpg|png';
			$config['max_size']	= '50000'; 
		//$config['max_width']  = '1024';
		//$config['max_height']  = '768';
			$changeimage = $this->input->post('changeimage');
			if($changeimage != "false"){
				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload())
				{
					print_r($this->upload->display_errors());
					print_r($config['upload_path']);
				}
				else
				{
					$this->load->model('model_products');
					$output = $this->upload->data();
					$productImage = $storename."/".$output['file_name'];
					$this->model_products->editproducts($productName,$productImage,
						$productPrice,$shopId, $productId, $productInStock);
					redirect('/welcome/skinterface', 'refresh');

				}
			}
			else{
				$this->load->model('model_products');
				$this->model_products->editproducts($productName,'',
					$productPrice,$shopId, $productId, $productInStock);	
				redirect('/welcome/skinterface', 'refresh');

			}
		}
	}
	
	public function removeoffer()
	{
		$name=$this->session->userdata('name');
		$isshopkeeper = $this->session->userdata('isShopKeeper');
		if($name!='' && $isshopkeeper){
		$offerid = $this->input->post('offerid');
		$this->load->model('model_products');
		$this->model_products->deleteoffer($offerid);
		redirect('/welcome/deleteoffer','refresh');
		}else{
		redirect('/','refresh');
		}
	}
	
	public function login()
	{
		if($this->session->userdata('userId')==''){
			$username = $this->input->post('username',TRUE);
			$password = $this->input->post('password',TRUE);
			$this->load->model('model_shop');
			$output=$this->model_shop->login($username,$password);
			if($output>0){
				redirect('welcome/skinterface');
			}else{
				redirect('/');
			}
		}else{
			redirect('/');
		}
	}
		
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/');
		
	}
}

/* End of file shop.php */
/* Location: ./application/controllers/shop.php */
