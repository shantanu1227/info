<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shop extends CI_Controller {


	public function index()
	{
		
	}

	public function addProducts(){

		$productName = $this->input->post('productname',TRUE);
		$productPrice = $this->input->post('productprice',TRUE);
		$shopId = 1;

		$directoryName = "/kavya"."/";
		$config['upload_path'] = "./assets/img".$directoryName;

		$config['allowed_types'] = 'jpg|png';
		$config['max_size']	= '50000';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

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
			$productImage = $directoryName.$output['file_name'];
			$this->model_products->addproducts($productName,$productImage,
			$productPrice,$shopId);
			redirect('/welcome/skinterface', 'refresh');
		}
	}

}

/* End of file shop.php */
/* Location: ./application/controllers/shop.php */
