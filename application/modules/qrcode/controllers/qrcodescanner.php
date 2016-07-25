<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Qrcodescanner extends Admin_Controller {

    /**
     * Index Qrcodescanner for this controller.
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
	
    public function __construct() {
            parent::__construct();
			
            // Load Qrcodescanners model
            $this->load->model('Qrcodes');
			
            // Load Qrcodescanners model
            //$this->load->model('Qrcodescanners');

            // Load Grocery CRUD
            //$this->load->library('grocery_CRUD');
			
			// Load QR Code Library
			//$this->load->library('QRGenerator');
			
			// Load CI Helpers
			//$this->load->helper('string');
			
			// Generate serial first
			//$this->serial = 'qr-'.random_string('alnum', 16);
    }
	
    public function index() {
		
		// Load qr codes js scanner 
		$data['js_files'] = array(base_url('assets/admin/plugins/qr-codes/llqrcode.js'),base_url('assets/admin/plugins/qr-codes/webqr.js'));
		
		// Load qr code js execution
		$data['js_inline'] = "load();setimg('".base_url()."assets/admin/img/')";
		
		// Set main template
		$data['main'] = 'qrcode/qrcodescanner_index';

		// Set module with URL request 
		$data['module_title'] = $this->module;

		// Set admin title page with module menu
		$data['page_title'] = $this->module_menu;

		// Load admin template
		$this->load->view('template/admin/template', $this->load->vars($data));
    }
    	
}

/* End of file Qrcodescanner.php */
/* Location: ./application/module/Qrcodescanner/controllers/Qrcodescanner.php */