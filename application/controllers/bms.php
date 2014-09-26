<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class BMS extends BMS_Controller
{
	function __construct()
	{
		parent::__construct();
		
		$this->data['s_page_title'] = 'Home';
		$this->data['s_page_header'] = 'home';
		$this->data['s_page_type'] = 'home';
		$this->data['a_cs_scripts'] = array(
			base_url() . 'application/public/css/main.css',
			base_url() . 'application/public/css/bms_style.css',
			);

		$this->data['a_js_scripts'] = array( 
			base_url() . 'application/public/js/modernizr.custom.js',
			base_url() . 'application/public/js/jquery.lettering.js',
			base_url() . 'application/public/js/jquery-2.1.1.min.js',
			);
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->library('session');
	} //end of function __construct

	function index()
	{	
		if( $this->session->userdata('CategoryID') != null){
			$this->load->helper('file');
			$this->load->model('admin_model');
			$this->data['userdata'] = $this->session->userdata('CategoryID');
			$s_main_content = 'project/main_page';
		}else{
			$s_main_content = 'error';
		}
		$this->data['s_main_content'] = $s_main_content;
		$this->load->view('includes/template', $this->data);
	} //end of function index
}
?>
