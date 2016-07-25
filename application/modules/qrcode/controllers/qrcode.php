<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Qrcode extends Admin_Controller {

    /**
     * Index Qrcode for this controller.
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

            // Load Qrcodes model
            $this->load->model('Qrcodes');

            // Load Grocery CRUD
            $this->load->library('grocery_CRUD');
			
			// Load QR Code Library
			$this->load->library('QRGenerator');
			
			// Load CI Helpers
			$this->load->helper('string');
			
			// Generate serial first
			$this->serial = 'qr-'.random_string('alnum', 16);
    }
	
    public function index() {
		try {
	    // Set our Grocery CRUD
            $crud = new grocery_CRUD();
            // Set tables
            $crud->set_table($this->Qrcodes->table);
            // Set CRUD subject
            $crud->set_subject('qrcode');                            
            // Set column
            $crud->columns('name','text','serial','file_name','status','added','modified');			
			// The fields that user will see on add and edit form
			$crud->fields('name','text','serial','file_name','status','added','modified');
			// Changes the default field type
			$crud->unset_texteditor('text');
			$crud->unset_texteditor('serial');
			$crud->field_type('file_name', 'hidden');
			//$crud->field_type('qrcode_url', 'hidden');
			$crud->field_type('added', 'hidden');
			$crud->field_type('modified', 'hidden');
			// This callback escapes the default auto field output of the field name at the add form
			$crud->callback_add_field('added',array($this,'_callback_time_added'));
			// This callback escapes the default auto field output of the field name at the edit form
			$crud->callback_edit_field('modified',array($this,'_callback_time_modified'));
			// This callback escapes the default auto field output of the field name at the add/edit form. 
			// $crud->callback_field('status',array($this,'_callback_dropdown'));
			// This callback escapes the default auto column output of the field name at the add form
			$crud->callback_column('file_name',array($this,'_callback_filename'));
			$crud->callback_column('added',array($this,'_callback_time'));
			$crud->callback_column('modified',array($this,'_callback_time'));  
			$crud->unset_edit();
			$crud->unset_delete();
			// Sets the required fields of add and edit fields
			$crud->required_fields('name','text','serial','status'); 
            // Set upload field
            // $crud->set_field_upload('file_name','uploads/Qrcodes');
			
			$state = $crud->getState();
			
			if ($state == 'export')
			{
				//Do your awesome coding here.
				$crud->callback_column('file_name',array($this,'_callback_filename_url'));				
			} else if ($state == 'add') {
				//Do your awesome coding here.
				$crud->callback_field('file_name',array($this,'_callback_qrcode'));
				$crud->callback_field('serial',array($this,'_callback_serial'));
			} else if ($state == 'edit') {
				//Do your awesome coding here.
				$crud->callback_field('file_name',array($this,'_callback_qrcode'));
				$crud->callback_field('modified',array($this,'_callback_time_modified'));
			}
			
            $this->load($crud, 'Qrcode');
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }
    
	public function _callback_filename($value, $row) {
		$row->file_name = strip_tags($row->file_name);
        return '<div class="text-center"><a href="'.$row->file_name.'" class="image-thumbnail iframe text-center"><img height="110px" src="'.$row->file_name.'"/></a></div>';
    }
	
    public function _callback_time ($value, $row) {
		return empty($value) ? '-' : date('D, d-M-Y',$value);
    }
    
    public function _callback_time_added ($value, $row) {
		$time = time();
		return '<input type="hidden" maxlength="50" value="'.$time.'" name="added">';
    }
    
    public function _callback_time_modified ($value, $row) {
		$time = time();
		return '<input type="hidden" maxlength="50" value="'.$time.'" name="modified">';
    }
	
	public function _callback_qrcode ($value, $row) {
		$ex2 = new QRGenerator($this->serial,100); 
		$img2 = "<img src=".$ex2->generate().">"; 
		return '<input type="text" maxlength="100" readonly value="'.$ex2->generate().'" name="file_name">'.$img2;
    }
	
	public function _callback_serial ($value, $row) {
		$time = time();
		return '<input type="text" maxlength="100" readonly value="'.$this->serial.'" name="serial">';
    }
    
	public function _callback_filename_url($value, $row) {
		return ($row->file_name) ? $row->file_name : '-';
	}
	
    public function _callback_total_image($value, $row) {
        $total = $this->user_model->total_image_submitted($row->participant_id);
        return $total;
    }
    
    private function load($crud, $nav) {
        $output = $crud->render();
        $output->nav = $nav;
        if ($crud->getState() == 'list') {
            // Set Qrcode Title 
            $output->Qrcode_title = 'Qrcode Listings';
            // Set Main Template
            $output->main       = 'template/admin/metronix';
            // Set Primary Template
            $this->load->view('template/admin/template.php', $output);
        } else {
            $this->load->view('template/admin/popup.php', $output);
        }    
    }
}

/* End of file Qrcode.php */
/* Location: ./application/module/Qrcode/controllers/Qrcode.php */