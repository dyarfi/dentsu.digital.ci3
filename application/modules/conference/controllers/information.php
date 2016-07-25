<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Information extends Admin_Controller {

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
            $this->load->model('conference/Conferences');

             // Load Information model
            $this->load->model('conference/Informations');

            // Load Schedule model
            $this->load->model('conference/Schedules');

            // Load Speaker model
            $this->load->model('conference/Speakers');

            // Load Grocery CRUD
            $this->load->library('grocery_CRUD');

    }
	
    public function index() {
        try {
	    // Set our Grocery CRUD
            $crud = new grocery_CRUD();
            // Set tables
            $crud->set_table($this->Informations->table);
            // Set CRUD subject
            $crud->set_subject('Information');                            
            // Set table relation
            $crud->set_relation('conference_id', $this->Conferences->table, 'name');
            // Set column
            $crud->columns('subject','conference_id','cover','status');   
            // Unsets the fields at the add form.
			$crud->unset_add_fields('count','added','modified');
			// Unsets the fields at the edit form.
			$crud->unset_edit_fields('count','added','modified');
			// Sets the required fields of add and edit fields
			$crud->required_fields('subject','url','conference_id','status');          
			// Set column display 
            $crud->display_as('conference_id', 'Conference');
			// Set custom field display for status
            $crud->field_type('status','dropdown',array('1' => 'Active', '0' => 'Inactive')); 
            $crud->field_type('user_id','hidden');
            $crud->field_type('added','hidden');
            $crud->field_type('modified','hidden');
            
            // This callback escapes the default auto field output of the field added at the add form
			$crud->callback_add_field('added', function () {
                return '<input type="hidden" maxlength="50" value="'.time().'" name="added">';
            });
			// This callback escapes the default auto field output of the field modified at the edit form
            $crud->callback_edit_field('modified', function () {
                return '<input type="hidden" maxlength="50" value="'.$time.'" name="modified">';
            });
            
            // Set upload field
            $crud->set_field_upload('cover','uploads/informations');
            $this->load($crud, 'Information');
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
            // Set Title 
            $output->page_title = 'Information Listings';
            // Set Main Template
            $output->main       = 'template/admin/metronix';
            // Set Primary Template
            $this->load->view('template/admin/template.php', $output);
        } else {
            $this->load->view('template/admin/popup.php', $output);
        }    
    }
}

/* End of file Information.php */
/* Location: ./application/module/Information/controllers/Information.php */