<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Submission extends Admin_Controller {

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

	    // Load User model
	    //$this->load->model('admin/Users');
	    
	    // Load User Profiles model
	    //$this->load->model('admin/UserProfiles');
	    
	    // Load Conference model
	    $this->load->model('Conferences');

	    // Load Information model
	    $this->load->model('Informations');

	    // Load Schedule model
	    $this->load->model('Schedules');
        
        // Load Submission model
	    $this->load->model('Submissions');

		// Load Grocery CRUD
	   $this->load->library('grocery_CRUD');

    }
	
    public function index() {
        try {
			// Set our Grocery CRUD
            $crud = new grocery_CRUD();
			// Set query for Submission
			//$crud->where('group_id',100);
			//$crud->where('tbl_users.status','1');
			//$crud->where('tbl_user_profiles.status',1);
            // Set tables
            $crud->set_table($this->Submissions->table);
			// Handles the default primary key for a specific table. 
			//$crud->set_primary_key('user_id','tbl_user_profiles');
            // Set CRUD subject
            $crud->set_subject('Submission'); 
            
            // Fields
            $crud->fields('subject','url','description','user_id','status','added','modified');
            
			// Set column
            $crud->columns('subject','description','added','modified','status');			
            // Set field type
            $crud->field_type('user_id','hidden', ACL::user()->id);
            $crud->field_type('added','hidden');
            $crud->field_type('modified','hidden');
            $crud->field_type('url','hidden');
            // This callback escapes the default auto field output of the field added at the add form
			$crud->callback_add_field('added', function () {
                return '<input type="hidden" maxlength="50" value="'.time().'" name="added">';
            });
			// This callback escapes the default auto field output of the field modified at the edit form
            $crud->callback_edit_field('modified', function () {
                return '<input type="hidden" maxlength="50" value="'.$time.'" name="modified">';
            });
            // Unset Add
			//$crud->unset_add();
            // Unset Edit
			//$crud->unset_edit();
			// Set upload field
			//$crud->set_field_upload('cv_file','uploads/applicants');
			//$crud->set_field_upload('photo','uploads/speakers');
            $this->load($crud, 'Submissions');
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }
    
    public function set($id=null) {
		if (!empty($id)) {
			$objects = $this->Applicants->getApplicant($id);
			if($objects) {

			/*
			[id] => 2
			[career_id] => 6
			[name] => Defrian Yarfi
			[email] => defrian.yarfi@gmail.com
			[gender] => 1
			[marital_status] => 1
			[id_number] => ASDAD12312312313
			[phone] => 647474747
			[address] => 45745747
			[birth_date] => 4567457
			[birth_place] => 
			[education_grade] => 1
			[education_name] => 
			[education_major] => 
			[education_from] => 
			[education_to] => 
			[employment_name] => 
			[employment_position] => 
			[employment_from] => 
			[employment_to] => 
			[photo] => 3b394-1513781_10205610488526266_3600135193534162242_n.jpg
			[cv_file] => 976bd-export-2015-02-13_14_37_25.xls
			[is_located] => 0
			[is_related] => 0
			[messages] => <p>457457457</p>
			[available_date] => 0
			[expected_salary] => 0
			[status] => 1
			[added] => 0
			[modified] => 0
			 */

			// Set default username from email
			$objects->username = $objects->email;
			// Set default password from 'Password1'
			$objects->password = 'Password1';
			// Set default group id for 'Submission' group
			$objects->group_id = '100';
			// Set default file_name if existed
			$objects->file_name = !empty($objects->photo) ? $objects->photo : NULL;

			// Set default username from email
			$objects->first_name = $objects->name;

			/*
			 * 'username'	=> $object['username'],
				'email'	=> $object['email'],			
				'password'	=> sha1($object['username'].$object['password']),	
				'group_id'	=> @$object['group_id'],			
				'added'	=> time(),	
				'status'	=> $object['status']

			 * 
				'user_id'	=> $insert_id,
				'gender'	=> !empty($object['gender']) ? $object['gender'] : NULL,
				'first_name'	=> !empty($object['first_name']) ? $object['first_name'] : NULL,
				'last_name'	=> !empty($object['last_name']) ? $object['last_name'] : NULL,
				'birthday'	=> !empty($object['birthday']) ? $object['birthday'] : NULL,
				'phone'		=> !empty($object['phone']) ? $object['phone'] : NULL,	
				'mobile_phone'	=> !empty($object['mobile_phone']) ? $object['mobile_phone'] : NULL,
				'fax'		=> !empty($object['fax']) ? $object['fax'] : NULL,
				'website'	=> !empty($object['website']) ? $object['website'] : NULL,
				'about'		=> !empty($object['about']) ? $object['about'] : NULL,
				'division'	=> !empty($object['division']) ? $object['division'] : NULL,
				'added'		=> time(),	
				'status'	=> 1)
			 */

			$user_id = $this->Users->setUser((array) $objects);

				if ($user_id) {
					$objects->user_id = $user_id;
					$this->Applicants->setSubmissionId($objects);
				}
			}
		}
    }
    
    private function load($crud, $nav) {
        $output = $crud->render();
        $output->nav = $nav;
        if ($crud->getState() == 'list') {
            // Set Title 
            $output->page_title = 'Submission Listings';
            // Set Main Template
            $output->main       = 'template/admin/metronix';
            // Set Primary Template
            $this->load->view('template/admin/template.php', $output);
        } else {
            $this->load->view('template/admin/popup.php', $output);
        }    
    }
}

/* End of file applicant.php */
/* Location: ./application/module/career/controllers/applicant.php */