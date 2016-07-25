<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Division extends Admin_Controller {

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

    public function __construct() {
	    parent::__construct();

	    // Load Careers model
	    $this->load->model('Careers');

	    // Load Division model
	    $this->load->model('Divisions');

	    // Load Grocery CRUD
	    $this->load->library('grocery_CRUD');
    }
	
    public function index() {
        try {
	    // Set our Grocery CRUD
            $crud = new grocery_CRUD();
            // Set tables
            $crud->set_table($this->Divisions->table);
            // Set CRUD subject
            $crud->set_subject('Division');                    
            // Set column
            $crud->columns('subject','name','description','status');	
			// Sets the required fields of add and edit fields
			$crud->required_fields('subject','name','status');    
			// Set custom field display for status
            $crud->field_type('status','dropdown',array('1' => 'Active', '0' => 'Inactive')); 
            // Set upload field
            //$crud->set_field_upload('file_name','uploads/careers_divisions');
			// Set load crud            
            $this->load($crud, 'divisions');
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }
    
    public function _callback_total_image($value, $row) {
        $total = $this->user_model->total_image_submitted($row->participant_id);
        return $total;
    }
    
    private function load($crud, $nav) {
        $output = $crud->render();
        $output->nav = $nav;
        if ($crud->getState() == 'list') {
            // Set Page Title 
            $output->page_title = 'Division Listings';
            // Set Main Template
            $output->main       = 'template/admin/metronix';
            // Set Primary Template
            $this->load->view('template/admin/template.php', $output);
        } else {
            $this->load->view('template/admin/popup.php', $output);
        }    
    }
}

/* End of file division.php */
/* Location: ./application/module/career/controllers/division.php */