	<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Shop extends CI_Controller {


		public function index()
		{
			
		}

		public function addProducts(){
			$name=$this->session->userdata('name');
			$isshopkeeper = $this->session->userdata('isShopKeeper');

			if($name!='' && $isshopkeeper){
				$productName = $this->input->post('productname',TRUE);
				$productPrice = $this->input->post('productprice',TRUE);
				$shopId = $this->session->userdata('userId');
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
		public function addOffers(){
			$name=$this->session->userdata('name');
			$isshopkeeper = $this->session->userdata('isShopKeeper');

			if($name!='' && $isshopkeeper){
				$offerName = $this->input->post('offername',TRUE);
				$shopId = $this->session->userdata('userId');
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
				$shopId = $this->session->userdata('userId');
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
		public function login()
		{
			if($this->session->userdata('userName')==''){
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
	}

	/* End of file shop.php */
	/* Location: ./application/controllers/shop.php */
