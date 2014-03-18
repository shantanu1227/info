<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	/*URL=http://localhost/info/index.php*/
	public function index()
	{
		$this->load->view('home');
	}
	/*Url=http://localhost/info/index.php/welcome/home1*/
	public function home1()
	{
		$this->load->view('home1');
	}
	/*Url=http://localhost/info/index.php/welcome/kavya*/
	public function kavya()
	{
		$this->load->view('kavya');
	}
    public function koffee()
	{
		$this->load->view('koffee');
	}
	public function bigbite()
	{
		$this->load->view('bigbite');
	}
	public function medicine()
	{
		$this->load->view('medicine');
	}
    public function laundromart()
	{
		$this->load->view('laundromart');
	}
	public function omega()
	{
		$this->load->view('omega');
	}
	public function subway()
	{
		$this->load->view('subway');
	}
	public function apex()
	{
		$this->load->view('apex');
	}
	public function chatkazz()
	{
		$this->load->view('chatkazz');
	}
	public function qwiches()
	{
		$this->load->view('qwiches');
	}
	public function oxford()
	{
		$this->load->view('oxford');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
