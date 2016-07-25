<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PageMenu extends Admin_Controller {

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
            $crud->set_subject('Page Menu');                            
            // Set column
            $crud->columns('name','title','position','description','status');	
			// Unsets the fields at the add form.
			$crud->unset_add_fields('parent_id','sub_level','has_child','user_id','order','count','is_system','added','modified');
			// Unsets the fields at the edit form.
			$crud->unset_edit_fields('parent_id','sub_level','has_child','user_id','order','count','is_system','added','modified');
			// Set custom field display for position
				$crud->field_type('position','dropdown',array('top'=>'Top','bottom'=>'Bottom'));  
			// Sets the required fields of add and edit fields
			$crud->required_fields('subject','name','position','status');   
            // Set upload field
            //$crud->set_field_upload('file_name','uploads/pages');
            $this->load($crud, 'page');
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
            $output->page_title = 'Page Menu Listings';
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
/* Location: ./application/module/page/controllers/pagemenu.php */