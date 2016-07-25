<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends Admin_Controller {

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
			
            // Load Pages model
            $this->load->model('Pages');

            // Load PageMenu model
            $this->load->model('PageMenus');

            // Load Grocery CRUD
            $this->load->library('grocery_CRUD');
			      
    }
	
    public function index() {
        try {
	    // Set our Grocery CRUD
            $crud = new grocery_CRUD();
            // Set tables
            $crud->set_table($this->Pages->table);
            // Set CRUD subject
            $crud->set_subject('Page');                            
            // Set table relation
            $crud->set_relation('menu_id',$this->PageMenus->table,'name');
			// Add custom column
            // Set column
            $crud->columns('subject','name','menu_id','synopsis','text','gallery','status','added','modified');			
			// The fields that user will see on add and edit form
			$crud->fields('subject','name','menu_id','synopsis','text','publish_date','unpublish_date','status','added','modified');
            // Set column display 
            $crud->display_as('menu_id','Menu');
			// Changes the default field type
			$crud->field_type('name', 'hidden');
			$crud->field_type('added', 'hidden');
			$crud->field_type('modified', 'hidden');
			
			// This callback escapes the default auto field output of the field name at the add form
			$crud->callback_add_field('added',array($this,'_callback_time_added'));
			// This callback escapes the default auto field output of the field name at the edit form
			$crud->callback_edit_field('modified',array($this,'_callback_time_modified'));
			// This callback escapes the default auto field output of the field name at the add/edit form. 
			// $crud->callback_field('status',array($this,'_callback_dropdown'));
			// This callback escapes the default auto column output of the field name at the add form
			$crud->callback_column('added',array($this,'_callback_time'));
			$crud->callback_column('modified',array($this,'_callback_time'));  
			
			// Set callback before database set
            $crud->callback_before_insert(array($this,'_callback_url'));
            $crud->callback_before_update(array($this,'_callback_url'));
			
            // Callback Column 
            $crud->callback_column('gallery',array($this,'_callback_gallery'));

			// Sets the required fields of add and edit fields
			$crud->required_fields('subject',/*'name',*/'text','status'); 
            
			// Set upload field
            // $crud->set_field_upload('file_name','uploads/pages');
			 
			$state = $crud->getState();
			$state_info = $crud->getStateInfo();
			//print_r($state);
			if ($state == 'add') {
				// GC Add Method
			} else if($state == 'edit') {
				// GC Edit Method. 
			} else {
				// GC List Method
			}			

            $this->load($crud, 'page');
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }
	
	public function _callback_url($value, $primary_key) {
        // Set url_title() function to set readable text
        $value['name'] = url_title($value['name'],'-',true);
        // Return update database
		return $value; 
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
    
    public function _callback_total_image($value, $row) {
        $total = $this->user_model->total_image_submitted($row->participant_id);
        return $total;
    }
    
    public function _callback_gallery ($value,$row) {
        if ($row->id) { 
            return '<a href="'.base_url(ADMIN).'/page_gallery/index/'.$row->id.'" class="fancyframe iframe"><span class="btn btn-default btn-mini glyphicon glyphicon-camera"></span></a>'; 
        } else { 
            return '-';
        }
    }

    private function load($crud, $nav) {
        $output = $crud->render();
        $output->nav = $nav;
        if ($crud->getState() == 'list') {
            // Set Page Title 
            $output->page_title = 'Page Listings';
            // Set Main Template
            $output->main       = 'template/admin/metronix';
            // Set Primary Template
            $this->load->view('template/admin/template.php', $output);
        } else {
            $this->load->view('template/admin/popup.php', $output);
        }    
    }
}

/* End of file page.php */
/* Location: ./application/module/page/controllers/page.php */