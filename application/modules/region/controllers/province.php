<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Province extends Admin_Controller {
    
    public function __construct() {
            parent::__construct();

            // Load Participant model
            //$this->load->model('region/Province');
 
            // Load Grocery CRUD
            $this->load->library('grocery_CRUD');
      
    }
	
    public function index() {
        try {
	    // Set our Grocery CRUD
            $crud = new grocery_CRUD();
            // Set tables
            $crud->set_table('tbl_provinces');
            // Set CRUD subject
            $crud->set_subject('Province');                            
            // Set column
            $crud->columns('name');			
			// The fields that user will see on add and edit form
			//$crud->fields('subject','name','menu_id','synopsis','text','publish_date','unpublish_date','status','added','modified');
			// Set column display 
			$crud->display_as('name','Province');
			// Changes the default field type
			//$crud->field_type('added', 'hidden');
			//$crud->field_type('modified', 'hidden');
			// This callback escapes the default auto field output of the field name at the add form
			//$crud->callback_add_field('added',array($this,'_callback_time_added'));
			// This callback escapes the default auto field output of the field name at the edit form
			//$crud->callback_edit_field('modified',array($this,'_callback_time_modified'));
			// This callback escapes the default auto field output of the field name at the add/edit form. 
			// $crud->callback_field('status',array($this,'_callback_dropdown'));
			// This callback escapes the default auto column output of the field name at the add form
			$crud->callback_column('added',array($this,'_callback_time'));
			$crud->callback_column('modified',array($this,'_callback_time'));  
			//$crud->callback_column('fb_pic_url',array($this,'callback_pic'));
			// Sets the required fields of add and edit fields
			//$crud->required_fields('subject','name','text','status'); 
            // Set upload field
            // $crud->set_field_upload('file_name','uploads/pages');
            $crud->unset_add();
            $crud->unset_edit();
            $crud->unset_delete();
            $this->load($crud, 'province');
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
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
    
    public function callback_pic($value = '', $primary_key = null){
	//print_r($primary_key->fb_id);
	//exit;
        return '<a href="'.$value.'" class="image-thumbnail"><img src="'.$value.'"></a>';
	//. '<img src="//graph.facebook.com/'.$primary_key->fb_id.'/picture?type=normal"></a>';
    }
    
    private function load($crud, $nav) {
        $output = $crud->render();
        $output->nav = $nav;
        if ($crud->getState() == 'list') {
            // Set Participant Title 
            $output->page_title = 'Province Listings';
            // Set Main Template
            $output->main       = 'template/admin/metronix';
            // Set Primary Template
            $this->load->view('template/admin/template.php', $output);
        } else {
            $this->load->view('template/admin/popup.php', $output);
        }    
    }
}
