<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Conference_Banner extends Admin_Controller {

    public function __construct() {
            parent::__construct();

            // Load Conferences model
            $this->load->model('conference/Conferences');

            // Load Image CRUD
            $this->load->library('image_CRUD');
      
    }
	
    public function index() {
        
        try {
            
            $image_crud = new image_CRUD();
		
            $image_crud->set_primary_key_field('id');
            $image_crud->set_url_field('file_name');
            $image_crud->set_table('tbl_conference_banners');
            $image_crud->set_title_field('title')        
            ->set_relation_field('conference_id')
            ->set_ordering_field('priority')
            ->set_image_path('uploads/banners');
            
            $this->load($image_crud);
        
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
        
    }
    
    private function load($crud) {
        
        $output = $crud->render();

        // Set Title 
        $output->page_title = 'Conference Banner Listings';

        // Set Main Template
        $output->main       = 'upload_index';

        // Set Output 
        $data->output       = $output;

        // Set Primary Template
        $this->load->view('template/admin/popup_uploader', $output);
            
    }
}
