<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Conference extends Admin_Controller {

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

        // Load Conference model
        $this->load->model('Conferences');
        $this->load->model('Submissions');

	    // Load Informations model
	    $this->load->model('Informations');

	    // Load Schedule model
	    $this->load->model('Schedules');

        // Load Speaker model
        $this->load->model('Speakers');

		// Load Grocery CRUD
		$this->load->library('grocery_CRUD');


        // Load Image CRUD
        $this->load->library('image_CRUD');

    }
	
    public function index() {
        try {
			// Set our Grocery CRUD
            $crud = new grocery_CRUD();
			// Set tables
            $crud->set_table($this->Conferences->table);
            // Set CRUD subject
            $crud->set_subject('Conference');
            
            $crud->set_relation_n_n('speakers', $this->Speakers->table_pivot,  $this->Speakers->table, $this->Speakers->table_pivot.'.conference_id', 'speaker_id', 'subject', 'priority');
            $crud->set_relation_n_n('submissions', $this->Submissions->table_pivot, $this->Submissions->table, $this->Submissions->table_pivot.'.conference_id', 'submission_id', 'subject', 'priority');
            
            // Set new action
			//$crud->add_action('Set To Employee', '', '','fa fa-arrow-circle-left',array($this,'_callback_set_conference_to_employee'));
			
			// Set column to display in add / edit
            $crud->columns('name','subject','description','seat','open_date','close_date','banners','gallery','status');
            
            // Callback Column 
            $crud->callback_column('gallery',array($this,'_callback_gallery'));
            
            // Callback Column 
            $crud->callback_column('banners',array($this,'_callback_banner'));            
            
            // Set column display 
            $crud->display_as('is_submit','Submissions');
			$crud->display_as('is_speaker','Speakers');
            $crud->display_as('is_invitation','Invitation');
			$crud->display_as('registration_fee','Registration Fee');
			
            // Fields
            $crud->fields('type','url','name','subject','speakers','submissions','synopsis','description','open_date','close_date','registration_fee','is_speaker','is_invitation','is_submit','messages','seat','location','user_id','status','added','modified');
            // Set field type
            $crud->field_type('user_id','hidden', ACL::user()->id);
            $crud->field_type('added','hidden');
            $crud->field_type('modified','hidden');
            $crud->field_type('url','hidden');
            
            // Set custom field display
            $crud->field_type('type','dropdown',array('1' => 'Conference', '2' => 'Symposium','3'=>'Seminar','3'=>'Colloquium','4'=>'Workshop','5'=>'Roundtable')); 
            $crud->field_type('is_submit','true_false',array('1' => 'Yes', '0' => 'No')); 
            $crud->field_type('is_speaker','true_false',array('1' => 'Yes', '0' => 'No')); 
            $crud->field_type('is_invitation','true_false',array('1' => 'Yes', '0' => 'No')); 
            $crud->field_type('is_fee','true_false',array('1' => 'Yes', '0' => 'No')); 
            // Set date fields
            $crud->field_type('open_date','date');
            $crud->field_type('close_date','date');            
			// Set custom field display for status
            $crud->field_type('status','enum',array('publish', 'draft', 'unpublish')); 
            
            // This callback escapes the default auto field output of the field added at the add form
			$crud->callback_add_field('added', function () {
                return '<input type="hidden" maxlength="50" value="'.time().'" name="added">';
            });
			// This callback escapes the default auto field output of the field modified at the edit form
            $crud->callback_edit_field('modified', function () {
                return '<input type="hidden" maxlength="50" value="'.$time.'" name="modified">';
            });
			
            // Set callback before database set
            $crud->callback_before_insert(array($this,'_callback_url'));
            $crud->callback_before_update(array($this,'_callback_url'));
            
            // Set upload field
			//$crud->set_field_upload('cover_photo','uploads/conferences');
            
            $this->load($crud, 'Conferences');
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }
    
    public function _callback_url($value, $primary_key) {
        // Set url_title() function to set readable text
        $value['url'] = url_title($value['name'],'-',true);
        // Return update database
		return $value; 
    }
   
    public function _callback_time ($value, $row) {
		return empty($value) ? '-' : date('D, d-M-Y',$value);
    }
    
    public function _callback_gallery ($value,$row) {
        if ($row->id) { 
            return '<a href="'.base_url(ADMIN).'/conference_gallery/index/'.$row->id.'" class="fancyframe iframe"><span class="btn btn-default btn-mini glyphicon glyphicon-camera"></span></a>'; 
        } else { 
            return '-';
        }
    }
    
    public function _callback_banner ($value,$row) {
        if ($row->id) { 
            return '<a href="'.base_url(ADMIN).'/conference_banner/index/'.$row->id.'" class="fancyframe iframe"><span class="btn btn-default btn-mini glyphicon glyphicon-picture"></span></a>'; 
        } else { 
            return '-';
        }
    }
    
    public function _callback_set_link ($value, $row) {
		if ($row->user_id == NULL) { 
			return '<a href="'.base_url(ADMIN).'/employee/set/'.$row->id.'" class="fa fa-arrow-circle-left">&nbsp;</a>'; 
		} else { 
			return 'Already Employed';
		}
    }
   
    private function load($crud, $nav) {
        $output = $crud->render();
        $output->nav = $nav;
        if ($crud->getState() == 'list') {
            // Set Page Title 
            $output->page_title = 'Conference Listings';
            // Set Main Template
            $output->main       = 'template/admin/metronix';
            // Set Primary Template
            $this->load->view('template/admin/template.php', $output);
        } else {
            $this->load->view('template/admin/popup.php', $output);
        }    
    }
}

/* End of file Conference.php */
/* Location: ./application/module/career/controllers/Conference.php */