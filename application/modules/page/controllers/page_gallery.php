<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page_Gallery extends Admin_Controller {

    public function __construct() {

            parent::__construct();

            // Load Conferences model
            $this->load->model('page/Pages');

            // Load Image CRUD
            $this->load->library('image_CRUD');            
            
    }
	
    public function index() {
        
        try {
            
            $image_crud = new image_CRUD();
		
            $image_crud->set_primary_key_field('id');
            $image_crud->set_url_field('file_name');
            $image_crud->set_table('tbl_page_images');
            $image_crud->set_relation_field('field_id')
            ->set_ordering_field('priority')
            ->set_image_path('uploads/pages');
            
            $this->load($image_crud);
        
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
        
    }
    
    private function load($crud) {
        
        $output = $crud->render();

        // Set Title 
        $output->page_title = 'Page Gallery Listings';

        // Set Main Template
        $output->main       = 'upload_index';

        // Set Output 
        $data->output       = $output;

        // Set Primary Template
        $this->load->view('template/admin/popup_uploader', $output);
            
    }
}
