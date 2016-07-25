<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Question extends Admin_Controller {

    /**
     * Index Question for this controller.
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

        $this->load->library('grocery_CRUD');
        //$this->load->model('user_model');
        // Load Questionnaires model
        $this->load->model('Questionnaires');
        // Load Questions model        
        $this->load->model('Questions');
    }

    public function index() {
        try {
            $crud = new grocery_CRUD();
            $crud->set_table($this->Questions->table);
            $crud->set_subject('List Questions');
            $crud->columns('question_text', 'questionnaire_id','status');                      

            $crud->display_as('questionnaire_id', 'Questionnaires');
            $crud->display_as('user_id', 'User');

            $crud->callback_column('questionnaire_id', array($this, '_callback_questionnaires'));

            $crud->callback_column('modified', array($this, '_callback_modified'));
            $crud->callback_column('added', array($this, '_callback_added'));
            
            $crud->field_type('questionnaire_id','dropdown',@$this->Questionnaires->get_values_questionnaires());    
            //$crud->field_type('user_id','dropdown',$this->user_model->get_values_users());    
            
            $crud->field_type('status','dropdown',array('1' => 'Enable', '0' => 'Disable'));

//            $crud->columns('name', 'email', 'phphone_number', 'twitter', 'total_image');
//            $crud->callback_column('total_image', array($this, '_callback_total_image'));
//            $crud->display_as('name', 'Name');
//            $crud->display_as('email', 'Email');
//            $crud->display_as('phone_number', 'Phone Number');
//            $crud->display_as('twitter', 'Phone Number');
//            $crud->display_as('total_image', 'Total Image Submitted');
            //$crud->columns('name', 'team_id');


            //$crud->callback_column('fb_pic_url',array($this,'_callback_pic'));

            //$crud->unset_add();            
            //$crud->unset_edit();
            //$crud->unset_delete();
            
            $this->load($crud, 'questions');
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    public function _callback_modified ($value, $row) {
        return time();
    }

    public function _callback_added ($value, $row) {
        return time();
    }

    public function _callback_pic($value = '', $primary_key = null){
        return '<a href="'.$value.'" class="image-thumbnail">'
        . '<img src="'.$value.'" height="50px"> </a>';
    }

    public function _callback_total_image($value, $row) {
        $total = $this->user_model->total_image_submitted($row->participant_id);
        return $total;
    }

    public function list_image() {
        try {
            $crud = new grocery_CRUD();
            $crud->set_table('liner_image');
            $crud->set_subject('List Image');
            $crud->set_relation('participant_id', 'liner_participant', 'name');
            $crud->columns('participant_id', 'email', 'phone_number', 'twitter', 'image_url', 'total_vote');
            $crud->callback_column('total_vote', array($this, '_callback_total_vote'));
            $crud->callback_column('email', array($this, '_callback_get_email'));
            $crud->callback_column('phone_number', array($this, '_callback_get_phone'));
            $crud->callback_column('twitter', array($this, '_callback_get_twitter'));
//            
            $crud->display_as('participant_id', 'Name');
            $crud->display_as('image_url', 'Image');
            $crud->set_field_upload('image_url', 'uploads');
            $crud->display_as('TOTAL_VOTE', 'Total Vote');
            $crud->order_by('(SELECT COUNT(1) FROM liner_vote AV WHERE AV.image_id = liner_image.image_id)', 'desc');
            $crud->unset_add();
            $crud->unset_edit();
            $crud->unset_delete();
            $this->load($crud, 'sound');
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }      

    public function _callback_questionnaires($value, $row) {
        $questionnaire = $this->Questionnaires->get_questionnaires($row->questionnaire_id);
        return $questionnaire->questionnaire_text;
    }

    public function _callback_total_vote($value, $row) {
        $total = $this->user_model->total_vote_admin($row->image_id);
        return $total;
    }

    public function _callback_get_email($value, $row) {
        $total = $this->user_model->get_email($row->image_id);
        return $total;
    }

    public function _callback_get_phone($value, $row) {
        $total = $this->user_model->get_phone($row->image_id);
        return $total;
    }

    public function _callback_get_twitter($value, $row) {
        $total = $this->user_model->get_twitter($row->image_id);
        return $total;
    }

    public function user() {
        try {
            $crud = new grocery_CRUD();
            $crud->set_table('users');
            $crud->set_subject('User');
            $crud->unset_columns('password');
            $crud->change_field_type('password', 'password');
            $crud->display_as('username', 'Username');
            $crud->display_as('password', 'Password');
            $crud->callback_before_insert(array($this, 'encrypt_password_callback'));
            $crud->callback_before_update(array($this, 'encrypt_password_callback'));
            $this->load($crud, 'user');
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    function encrypt_password_callback($post_array, $primary_key = null) {
        if (isset($post_array['password'])) {
            $post_array['password'] = sha1($post_array['password']);
        }
        return $post_array;
    }

	private function load($crud, $nav) {
        $output = $crud->render();
        $output->nav = $nav;
        if ($crud->getState() == 'list') {
            // Set Qrcode Title 
            $output->page_title = 'Question Listings';
            // Set Main Template
            $output->main       = 'template/admin/metronix';
            // Set Primary Template
            $this->load->view('template/admin/template.php', $output);
        } else {
            $this->load->view('template/admin/popup.php', $output);
        }    
    }

}

?>
