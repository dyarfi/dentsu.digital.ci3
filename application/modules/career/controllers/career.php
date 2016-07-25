<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Career extends Admin_Controller {

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
            $crud->set_table($this->Careers->table);
            // Set CRUD subject
            $crud->set_subject('Career');                            
            // Set table relation
            $crud->set_relation('division_id', $this->Divisions->table, 'subject');
            // Set column
            $crud->columns('subject', 'name','division_id','sent_to','status');   
            // The fields that user will see on add and edit form
            $crud->fields('subject','name','division_id','responsibilities','requirements','start_date','end_date','attributes','status');
			// Unsets the fields at the add form.
			$crud->unset_add_fields('count','added','modified');
			// Unsets the fields at the edit form.
			$crud->unset_edit_fields('count','added','modified');
            // Fields callback 
            $crud->callback_field('attributes',array($this,'_callback_attributes'));
            // Sets the required fields of add and edit fields
			$crud->required_fields('subject','name','status');          
			// Set column display 
            $crud->display_as('division_id', 'Division');
			// Set custom field display for status
            $crud->field_type('status','dropdown',array('1' => 'Active', '0' => 'Inactive')); 
            // Set upload field
            $crud->set_field_upload('file_name','uploads/careers');
            $this->load($crud, 'career');
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }
    
    public function _callback_attributes($value = '', $primary_key = null)
    {
        return '<!-- +30 <input type="text" maxlength="50" value="'.$value.'" name="phone" style="width:462px"> -->';
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
            $output->page_title = 'Career Listings';
            // Set Main Template
            $output->main       = 'template/admin/metronix';
            // Set Primary Template
            $this->load->view('template/admin/template.php', $output);
        } else {
            $this->load->view('template/admin/popup.php', $output);
        }    
    }
}

/* End of file career.php */
/* Location: ./application/module/career/controllers/career.php */