<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employee extends Admin_Controller {

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
	    $this->load->model('admin/Users');
	    
	    // Load User Profiles model
	    $this->load->model('admin/UserProfiles');
	    
	    // Load Careers model
	    $this->load->model('Careers');

	    // Load Division model
	    $this->load->model('Divisions');

	    // Load Applicant model
	    $this->load->model('Applicants');

		// Load Grocery CRUD
	   $this->load->library('grocery_CRUD');

    }
	
    public function index() {
        try {
			// Set our Grocery CRUD
            $crud = new grocery_CRUD();
			// Set query for employee
			$crud->where('group_id',100);
			//$crud->where('users.status','1');
			$crud->where($this->UserProfiles->table.'.status',1);
            // Set tables
            $crud->set_table($this->UserProfiles->table);
			// Handles the default primary key for a specific table. 
			$crud->set_primary_key('user_id',$this->UserProfiles->table);
            // Set CRUD subject
            $crud->set_subject('Employee'); 
			// Set table relation	
			// set_relation_n_n( $field_name, $relation_table, $selection_table, $primary_key_alias_to_this_table, $primary_key_alias_to_selection_table, $title_field_selection_table [ , string $priority_field_relation )    
			// $crud->set_relation_n_n('category', 'film_category', 'category', 'film_id', 'category_id', 'name');
			// $crud->set_relation_n_n('actors', 'film_actor', 'actor', 'film_id', 'actor_id', 'fullname','priority');
			// $crud->set_relation_n_n('user_id', 'users', 'user_groups','id','group_id','name');
            $crud->set_relation('user_id', 'users', 'username','group_id');
            // Set column display 
            $crud->display_as('user_id','Username');
			// Set table relation	    
			//$crud->set_relation('user_id', 'user_profiles', 'first_name');
            // Set column
            $crud->columns('user_id','first_name','last_name','about','phone','birthday','gender');			
            // Set column display 
            //$crud->display_as('profile_id','Profile');
			// Set column display 
            $crud->display_as('group_id','Group');
			// Set custom field display for gender
            $crud->field_type('gender','dropdown',array('1' => 'Male', '0' => 'Female'));  
            // Unset Add
			//$crud->unset_add();
            // Unset Edit
			//$crud->unset_edit();
			// Set upload field
			//$crud->set_field_upload('cv_file','uploads/applicants');
			//$crud->set_field_upload('photo','uploads/applicants');
            $this->load($crud, 'employees');
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
				// Set default group id for 'Employee' group
				$objects->group_id = '100';
				// Set default file_name if existed
				$objects->file_name = !empty($objects->photo) ? $objects->photo : NULL;
				// Set default username from email
				$objects->first_name = $objects->name;
				// Set status default
				$objects->status = 1;
				
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
					$this->Applicants->setEmployeeId($objects);
				}
			}
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
            $output->page_title = 'Employee Listings';
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