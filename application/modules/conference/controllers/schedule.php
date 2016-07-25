<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Schedule extends Admin_Controller {

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

	    // Load Conferences model
	    $this->load->model('Conferences');

	    // Load Schedule model
	    $this->load->model('Schedules');

	    // Load Grocery CRUD
	    $this->load->library('grocery_CRUD');
    }
	
    public function index() {
        try {
            // Set our Grocery CRUD
            $crud = new grocery_CRUD();
            // Set tables
            $crud->set_table($this->Schedules->table)->order_by('date','asc');
            // Set CRUD subject
            $crud->set_subject('Schedule');               
            // Set table relation
            $crud->set_relation('conference_id', $this->Conferences->table, 'name');
            // Set column
            $crud->columns('subject','date','conference_id','description','status');	
			// Sets the required fields of add and edit fields
			$crud->required_fields('subject','date','description','status');    
			// Set custom field display for status
            $crud->field_type('date','date');
            $crud->field_type('status','dropdown',array('1' => 'Active', '0' => 'Inactive'));
            $crud->field_type('url','hidden');
            $crud->field_type('user_id','hidden');
            $crud->field_type('added','hidden');
            $crud->field_type('modified','hidden');
            // Set column display
            $crud->display_as('conference_id','Conference');
            // Set callback before database set
            $crud->callback_before_insert(array($this,'_callback_url'));
            $crud->callback_before_update(array($this,'_callback_url'));
            // This callback escapes the default auto field output of the field added at the add form
			$crud->callback_add_field('added', function () {
                return '<input type="hidden" maxlength="50" value="'.time().'" name="added">';
            });
			// This callback escapes the default auto field output of the field modified at the edit form
            $crud->callback_edit_field('modified', function () {
                return '<input type="hidden" maxlength="50" value="'.$time.'" name="modified">';
            });
            // Set upload field
            // $crud->set_field_upload('file_name','uploads/careers_Schedules');
			// Set load crud            
            $this->load($crud, 'Schedules');
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }
    
    public function _callback_url($value, $primary_key) {
        // Set url_title() function to set readable text
        $value['url'] = url_title($value['subject'],'-',true);
        // Return update database
		return $value; 
    }
    
    public function _callback_total_image($value, $row) {
        $total = $this->user_model->total_image_submitted($row->participant_id);
        return $total;
    }
    
    private function load($crud, $nav) {
        $output = $crud->render();
        $output->nav = $nav;
        if ($crud->getState() == 'list') {
            // Set Title 
            $output->page_title = 'Schedule Listings';
            // Set Main Template
            $output->main       = 'template/admin/metronix';
            // Set Primary Template
            $this->load->view('template/admin/template.php', $output);
        } else {
            $this->load->view('template/admin/popup.php', $output);
        }    
    }
}

/* End of file Schedule.php */
/* Location: ./application/module/career/controllers/Schedule.php */