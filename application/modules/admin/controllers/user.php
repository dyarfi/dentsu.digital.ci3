<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

// Class for Users in Admin
class User extends Admin_Controller {

    public $_class_name; 
	public $_config;

    public function __construct() {
        parent::__construct();

	    // Set class name
	    $this->_class_name = $this->controller;
		    
        // Load user related model
        $this->load->model('Users');
        $this->load->model('UserProfiles');
        $this->load->model('UserGroups');		
        $this->load->model('Captcha');

        // Load config files
        $this->_config = $this->load->config('admin',true);

    }		

    public function index() {		

        // Set default statuses
        $data['statuses'] = $this->configs['status'];

	    // Set class name to view
	    $data['class_name'] = $this->_class_name;

        // Get users data
        $rows = $this->Users->getAllUser();
        
        $temp_rows = array();
            
        if($rows) {
			$i = 0;
            foreach($rows as $row){		
                $temp_rows[$i]->id = $row->id;
                $temp_rows[$i]->username = $row->username;
                $temp_rows[$i]->email = $row->email;
                $temp_rows[$i]->added = $row->added;
                $temp_rows[$i]->modified = $row->modified;
                $temp_rows[$i]->status = $data['statuses'][$row->status];
                $temp_rows[$i]->group_id = $this->UserGroups->getGroupName_ById($row->group_id);
                $i++;
            }
        }

        if (@$temp_rows) $data['rows'] = $temp_rows;
		
	    // User profiles
        $data['user_profiles'] = $this->UserProfiles->getUserProfile($this->acl->user()->id);
	    
        // Set main template
        $data['main'] = 'users/users_index';

        // Set module with URL request 
        $data['module_title'] = $this->module;

        // Set admin title page with module menu
        $data['page_title'] = $this->module_menu;

        // Load admin template
        $this->load->view('template/admin/template', $this->load->vars($data));

    }	
    
    public function add() {
		
	    // Default data setup
	    $fields	= array(
			    'username'		=> '',
			    'email'		=> '',
			    'password'		=> '',
			    'password1'		=> '',
			    'gender'		=> '',				
			    'group_id'		=> '',
			    'first_name'	=> '',
			    'last_name'		=> '',				
			    'birthday'		=> '',
			    'phone'		=> '',	
			    'mobile_phone'	=> '',				
			    'fax'		=> '',
			    'website'		=> '',
			    'about'		=> '',
			    'division'		=> '',
			    'status'		=> '');

	    $errors	= $fields;

	    $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[24]|xss_clean');
	    $this->form_validation->set_rules('email', 'Email','trim|valid_email|required|min_length[5]|max_length[36]|callback_match_email|xss_clean');
	    $this->form_validation->set_rules('password', 'Password','trim|required');
	    $this->form_validation->set_rules('password1', 'Retype Password','trim|required|matches[password]');
	    $this->form_validation->set_rules('gender', 'Gender','required');		
	    $this->form_validation->set_rules('group_id', 'Group','required');
	    $this->form_validation->set_rules('first_name', 'First Name','trim');
	    $this->form_validation->set_rules('last_name', 'Last Name','required');
	    $this->form_validation->set_rules('birthday', 'Birthday','required');
	    $this->form_validation->set_rules('phone', 'Phone','trim|is_natural|xss_clean|max_length[25]');
	    $this->form_validation->set_rules('mobile_phone', 'Mobile Phone','trim');		
	    $this->form_validation->set_rules('fax', 'Fax','trim|is_natural|xss_clean|max_length[25]');
	    $this->form_validation->set_rules('website', 'Website','trim|prep_url|xss_clean|max_length[35]');
	    $this->form_validation->set_rules('about', 'About','trim|xss_clean|max_length[1000]');
	    $this->form_validation->set_rules('division', 'Division','trim|xss_clean|max_length[55]');				
	    $this->form_validation->set_rules('status', 'Status','required');

	    // Check if post is requested
	    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		    // Validation form checks
		    if ($this->form_validation->run() == FALSE)
		    {
			    // Set error fields
			    $error = array();
			    foreach(array_keys($fields) as $error) {
				    $errors[$error] = form_error($error);
			    }

			    // Set previous post merge to default
			    $fields = array_merge($fields, $this->input->post());
		    }
		    else
		    {

			    // Set data to add to database
			    $this->Users->setUser($this->input->post());

			    // Set message
			    $this->session->set_flashdata('message','User created!');

			    // Redirect after add
			    redirect(ADMIN. $this->controller . '/index');

		    }

	    } 	

		// Load js for administrator login
		$data['js_files'] = array(base_url('assets/admin/scripts/custom/form-user.js'));
		
		// Load JS execution
		$data['js_inline'] = "FormUser.init();";
		
	    // Set Action
	    $data['action'] = 'add';

	    // Set Param
	    $data['param']	= '';

	    // Set error data to view
	    $data['errors'] = $errors;

	    // User Groups Data
	    $data['user_groups']	= $this->UserGroups->getAllUserGroup();

	    // User Status Data
	    $data['statuses']	= @$this->configs['status'];

	    // User Gender Data
	    $data['genders']	= @$this->configs['gender'];

	    // Post Fields
	    $data['fields']		= (object) $fields;

	    // Set class name to view
	    $data['class_name'] = $this->_class_name;

	    // Main template
	    $data['main']		= 'users/users_form';		

	    // Set module with URL request 
	    $data['module_title'] = $this->module;

	    // Set admin title page with module menu
	    $data['page_title'] = $this->module_menu;

	    // Admin view template
	    $this->load->view('template/admin/template', $this->load->vars($data));

    }
	
    public function edit($id=0){
				
	    // Check if param is given or not and check from database
	    if (empty($id) || !$this->Users->getUser($id)) {
		    $this->session->set_flashdata('message','Item not found!');
		    // Redirect to index
		    redirect(ADMIN. $this->controller . '/index');
	    }	
	    //Default data setup
	    $fields	= array(
			    'username'		=> '',
			    'email'			=> '',
			    //'password'		=> '',
			    //'password1'		=> '',
			    'gender'		=> '',				
			    'group_id'		=> '',
			    'first_name'	=> '',
			    'last_name'		=> '',				
			    'birthday'		=> '',
			    'phone'			=> '',	
			    'mobile_phone'	=> '',				
			    'fax'			=> '',
			    'website'		=> '',
			    'about'			=> '',
			    'division'		=> '',
			    'status'		=> '');

	    $errors	= $fields;

	    $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[24]|xss_clean');
	    //$this->form_validation->set_rules('email', 'Email','trim|valid_email|required|min_length[5]|max_length[24]|callback_match_email|xss_clean');
	    //$this->form_validation->set_rules('password', 'Password','trim|required');
	    //$this->form_validation->set_rules('password1', 'Retype Password','trim|required|matches[password]');
	    $this->form_validation->set_rules('gender', 'Gender','required');		
	    $this->form_validation->set_rules('group_id', 'Group','required');
	    $this->form_validation->set_rules('first_name', 'First Name','trim');
	    $this->form_validation->set_rules('last_name', 'Last Name','required');
	    $this->form_validation->set_rules('birthday', 'Birthday','required');
	    $this->form_validation->set_rules('phone', 'Phone','trim|is_natural|xss_clean|max_length[25]');
	    $this->form_validation->set_rules('mobile_phone', 'Mobile Phone','trim');		
	    $this->form_validation->set_rules('fax', 'Fax','trim|is_natural|xss_clean|max_length[25]');
	    $this->form_validation->set_rules('website', 'Website','trim|prep_url|xss_clean|max_length[35]');
	    $this->form_validation->set_rules('about', 'About','trim|xss_clean|max_length[1000]');
	    $this->form_validation->set_rules('division', 'Division','trim|xss_clean|max_length[55]');				
	    $this->form_validation->set_rules('status', 'Status','required');

	    // Check if post is requested		
	    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		    // Validation form checks
		    if ($this->form_validation->run() == FALSE) {

			    // Set error fields
			    $errors = array();
			    foreach(array_keys($fields) as $error) {
				    $errors[$error] = form_error($error);
			    }

			    // Set previous post merge to default
			    $fields = array_merge($fields, $this->input->post());	

			    //print_r($this->input->post());

		    } else {

			    $posts = array(
				    // Primary Accounts
				    'id' => $id,
				    'group_id' => $this->input->post('group_id'),
				    'username' => $this->input->post('username'),
				    'email' => $this->input->post('email'),
				    'backend_access' => $this->input->post('backend_access'),
				    'full_backend_access' => $this->input->post('full_backend_access'),
				    'status' => $this->input->post('status'),
				    // Profile Accounts
				    'gender'	=> $this->input->post('gender'),				
				    'first_name'	=> $this->input->post('first_name'),
				    'last_name'	=> $this->input->post('last_name'),				
				    'birthday'	=> $this->input->post('birthday'),
				    'phone'		=> $this->input->post('phone'),	
				    'mobile_phone'	=> $this->input->post('mobile_phone'),				
				    'fax'		=> $this->input->post('fax'),
				    'website'	=> $this->input->post('website'),
				    'about'		=> $this->input->post('about'),
				    'division'	=> $this->input->post('division')
			    );

			    // Set data to add to database
			    $this->Users->updateUser($posts);

			    // Set message
			    $this->session->set_flashdata('message','User updated');

			    // Redirect after add
			    redirect(ADMIN. $this->controller . '/index');

		    }

	    } else {	

		    // Set password1 to null
		    $fields['password1']	= '';

		    // Set fields from database
		    $_fields		= array_merge($fields,(array) $this->Users->getUser($id));

		    $profile	= (array) $this->UserProfiles->getUserProfile($id);									
		    $fields		= (object) array_merge($_fields,$profile);

	    }

		// Load js for administrator login
		$data['js_files'] = array(base_url('assets/admin/scripts/custom/form-user.js'));
		
		// Load JS execution
		$data['js_inline'] = "FormUser.init();";
		
	    // Set Action
	    $data['action'] = 'edit';

	    // Set Param
	    $data['param']	= $id;

	    // Set error data to view
	    $data['errors'] = $errors;

	    // Set field data to view
	    $data['fields'] = (object) $fields;		

	    // User Status Data
	    $data['statuses']   = $this->configs['status'];

	    // User Gender Data
	    $data['genders']    = $this->configs['gender'];

	    // User Groups Data
	    $data['user_groups'] = $this->UserGroups->getAllUserGroup();

	    // Set class name to view
	    $data['class_name'] = $this->_class_name;

	    // Set form to view
	    $data['main'] = 'users/users_form';			

	    // Set module with URL request 
	    $data['module_title'] = $this->module;

	    // Set admin title page with module menu
	    $data['page_title'] = $this->module_menu;

	    // Set admin template
	    $this->load->view('template/admin/template', $this->load->vars($data));

    }
	
    public function delete($id){

		if ($id == 1) {
			$this->session->set_flashdata('message','Not allowed to editing!');
			// Redirect to index
			redirect(base_url().'admin/user');
		}

        // Delete user data
        $this->Users->deleteUser($id);

        // Set flash message
        $this->session->set_flashdata('message','User deleted');

        // Redirect after delete
        redirect(ADMIN. $this->controller . '/index');

    }

    public function view($id=null){
		
        // Check if data is found and redirect if false
        if (empty($id) && (int) count($id) == 0) {
            $this->session->set_flashdata('message',"Error submission.");
            redirect(ADMIN. $this->controller . '/index');
        }

        // Check if user data ID is found and redirect if false
        $user = $this->Users->getUser($id);
        if (!count($user)){
            $this->session->set_flashdata('message',"Data not found.");			
            redirect(ADMIN. $this->controller . '/index');
        }

        // Load js files
		$data['js_files'] = array(
			base_url('assets/admin/plugins/jquery-file-upload/js/vendor/jquery.ui.widget.js'),
			base_url('assets/admin/plugins/jquery-file-upload/js/jquery.iframe-transport.js'),
			base_url('assets/admin/plugins/jquery-file-upload/js/jquery.fileupload.js'),
			base_url('assets/admin/plugins/jquery-file-upload/js/jquery.fileupload-process.js'),
			base_url('assets/admin/plugins/jquery-file-upload/js/jquery.fileupload-validate.js'),
			base_url('assets/admin/plugins/jquery-file-upload/js/jquery.fileupload-ui.js'),
		);
		
		// Load js for administrator login
		$data['js_files'] = array(base_url('assets/admin/scripts/custom/form-user.js'));
		
		// Load JS execution
		$data['js_inline'] = "FormUser.init();";

        // BASE PATH for upload admin media
        $data['upload_path']	= $this->_config['upload_path'];

        // URL for upload admin media
        $data['upload_url']		= $this->_config['upload_url'];

        // Captcha data
        $data['captcha']		= $this->Captcha->image();

        // User account data
        $data['user']			= $this->Users->getUser($id);		

        // User profile data
        $data['user_profile']	= $this->UserProfiles->getUserProfile($id);

        // Main template
        $data['main']	= 'users/users_view';

        // Set module with URL request 
        $data['module_title'] = $this->module;

        // Set admin title page with module menu
        $data['page_title'] = $this->module_menu;

        // Load admin template
        $this->load->view('template/admin/template',$this->load->vars($data));
    }

    // Ajax Methods for this controller and module
    public function ajax($action='') {

            // Check if the request via AJAX
            if (!$this->input->is_ajax_request()) {
                    exit('No direct script access allowed');		
            }	

            // Define initialize result
            $result['result'] = '';

            // Action Update User Profile via Ajax
            if ($action === 'update') {			

		    // Set validation config
		    $config = array(
			array('field' => 'first_name', 
			      'label' => 'First Name', 
			      'rules' => 'trim|required|xss_clean|max_length[25]'),	
			array('field' => 'last_name', 
			      'label' => 'Last Name', 
			      'rules' => 'trim|xss_clean|max_length[25]'),
			array('field' => 'captcha', 
			      'label' => 'Captcha', 
			      'rules' => 'trim|xss_clean|max_length[6]|callback_match_captcha'),
			array('field' => 'phone', 
			      'label' => 'Phone', 
			      'rules' => 'trim|is_natural|xss_clean|max_length[25]'),
				    array('field' => 'mobile_phone', 
			      'label' => 'Mobile Phone', 
			      'rules' => 'trim|is_natural|xss_clean|max_length[25]'),
				    array('field' => 'website', 
			      'label' => 'Website', 
			      'rules' => 'trim|prep_url|xss_clean|max_length[35]'),
				    array('field' => 'about', 
			      'label' => 'About', 
			      'rules' => 'trim|xss_clean|max_length[1000]'),
				    array('field' => 'division', 
			      'label' => 'Division', 
			      'rules' => 'trim|xss_clean|max_length[55]')
		     );

                    // Set rules to form validation
                    $this->form_validation->set_rules($config);

                    // Run validation for checking
                    if ($this->form_validation->run() === FALSE) {

                            // Send errors to JSON text
                            $result['result']['code'] = 0;
                            $result['result']['text'] = validation_errors();

                    } else {

                            // Unset captcha post
                            unset($_POST['captcha']); 

                            // Set User Data
                            $user_profile = $this->UserProfiles->setUserProfiles($this->input->post());			

                            // Check data if user is exists and status is active
                            if (!empty($user_profile) && $user_profile->status == 1) {

                                    // Send message if true 
                                    $result['result']['code'] = 1;
                                    $result['result']['text'] = 'Changes saved !';

                            } else if (!empty($user_profile) && $user->status != 1) { 

                                    // Send message if account is not active
                                    $result['result']['code'] = 2;
                                    $result['result']['text'] = 'Your account profile is not active';			

                            } else {

                                    // Send message if account not found					
                                    $result['result']['code'] = 0;
                                    $result['result']['text'] = 'Profile not found';			
                            }
                    }

            // Checking Action via Ajax
            } else if ($action === 'check') {			

                    // Check Username users via Ajax
                    if ($this->uri->segments[5] === 'username') {

                            // Set User Data
                            $user = $this->Users->getUserByUsername($this->input->post('username'));			

                            // Check data
                            if (!empty($user) && $user->status == 1) {

                                    // Send message if true 
                                    $result['result']['code'] = 1;
                                    $result['result']['text'] = 'Username already exist!';

                            } else if (!empty($user) && $user->status != 1) {

                                    // Send message if account is not active
                                    $result['result']['code'] = 2;
                                    $result['result']['text'] = 'Your account profile is not active';			

                            } else {

                                    // Send message if account not found
                                    $result['result']['code'] = 0;
                                    $result['result']['text'] = 'Profile not found';			

                            }	

                    // Check Email users via Ajax	
                    } else if ($this->uri->segments[5] === 'email') {			

                            // Set User Data
                            $user = $this->Users->getUserByEmail($this->input->post('email'));			

                            // Check data
                            if (!empty($user) && $user->status == 1) {

                                    // Send message if true 
                                    $result['result']['code'] = 1;
                                    $result['result']['text'] = 'Email already exist!';

                            } else if (!empty($user) && $user->status != 1) { 

                                    // Send message if account is not active
                                    $result['result']['code'] = 2;
                                    $result['result']['text'] = 'Your account profile is not active';		

                            } else {

                                    // Send message if account not found
                                    $result['result']['code'] = 0;
                                    $result['result']['text'] = 'Email not found';			

                            }	

                    // Check Password users via Ajax	
                    } else if ($this->uri->segments[5] === 'password') {		

                            // Default hash
                            $hash_password = '';

                            // Change to Password hash from POST
                            if ($_POST['password'] !== '') {
                                    $hash_password		= sha1($_POST['username'].$_POST['password']);
                                    $_POST['password']	= $hash_password;								
                            }

                            //print_r($this->Users->getUserPassword($this->input->post('password')));

                            // Set validation config
                            $config = array(
                                            array(
                                                    'field'   => 'password1', 
                                                    'label'   => 'New Password' ,
                                                    'rules'   => 'trim|required'),						
                                            array(
                                                    'field'   => 'password2', 
                                                    'label'   => 'Re-type New Password', 
                                                    'rules'   => 'trim|required|matches[password1]'),
                                            /*array(
                                                    'field'   => 'password', 
                                                    'label'   => 'Password', 
                                                    'rules'   => 'trim|required|max_length[255]|callback_match_password')*/
                            );

                            // Set rules to form validation
                            $this->form_validation->set_rules($config);

                            // Run validation for checking
                            if ($this->form_validation->run() === FALSE) {

                                    // Send errors to JSON text
                                    $result['result']['code'] = 0;
                                    $result['result']['text'] = validation_errors();

                            } else {

                                    // Get user with the user id post
                                    $user	= $this->Users->getUser($this->input->post('user_id'));					
                                    $newp	= $this->Users->setPassword($user, $this->input->post('password1')); 

                                    $this->load->library('email');

									$this->email->from('noreply');
									$this->email->to($user->email);
									$this->email->subject('Your new password');
									$this->email->message('Hey <b>'.$user->username.'</b>, this is your new password: <b>'.$newp.'</b>');

									$this->email->send();
									
                                    // Check if the password is changed
                                    if (!empty($newp)) {

                                            // Send success update password result
                                            $result['result']['code'] = 1;
                                            $result['result']['text'] = 'Password changed, new password is <b>'.$newp.'</b>';

                                    } else {

                                            // Send success update password result
                                            $result['result']['code'] = 2;
                                            $result['result']['text'] = 'Can not change password, please come back later';

                                    }

                            }
                    }		
            } 		
            // Check user data and Add via Ajax	
            else if($action === 'add') {

                    $result['result'] = '';

            }

            // Return data esult
            $data['json'] = $result;

            // Load data into view		
            $this->load->view('json', $this->load->vars($data));	
    }

    public function forgot_password() {

		// Check if the request via AJAX
		if (!$this->input->is_ajax_request()) {
			exit('No direct script access allowed');		
		}

		// Define initialize result
		$result['result'] = '';

		// Get User Data
		$user = $this->Users->getUserByEmail($this->input->post('email'));

		if (!empty($user) && $user->status == 1) {

			$password = $this->Users->setPassword($user);

			$result['result']['code'] = 1;
			$result['result']['text'] = 'Your new password: <b>'. $password .'</b>';			

			$this->load->library('email');

			$this->email->from('noreply');
			$this->email->to($user->email);
			$this->email->subject('Your new password');
			$this->email->message('Hey <b>'.$user->username.'</b>, this is your new password: <b>'.$password.'</b>');

			$this->email->send();

		} else if (!empty($user) && $user->status != 1) { 

			// Account is not Active
			$result['result']['code'] = 2;
			$result['result']['text'] = 'Your account is not active';			

		} else {

			// Account is not existed
			$result['result']['code'] = 0;
			$result['result']['text'] = 'Email or User not found';			

		}

		$data['json'] = $result;	
		print_r($data['json']); exit;
		$this->load->view('json', $this->load->vars($data));				

    }
    
    // Action for update item status
    public function change() {	
		if ($this->input->post('check') !='') {
		    $rows	= $this->input->post('check');
		    foreach ($rows as $row) {
			// Set id for load and change status
			$this->Users->setStatus($row,$this->input->post('select_action'));
			$this->UserProfiles->setStatus($row,$this->input->post('select_action'));
		    }
		    // Set message
		    $this->session->set_flashdata('message','Status changed!');
		    redirect(ADMIN.$this->_class_name.'/index');
		} else {	
		    // Set message
		    $this->session->set_flashdata('message','Data not Available');
		    redirect(ADMIN.$this->_class_name.'/index');			
		}
    }

    public function search() { }

	public function upload() {

		// Check if the request via AJAX
		if (empty($_POST)) {
			exit('No direct script access allowed');		
		}	
				
		$config = array(
			array('field' => 'image_name', 
                  'label' => 'File', 
                  'rules' => 'trim|required|xss_clean|max_length[35]'));
		
		// Set rules to form validation
		$this->form_validation->set_rules($config);
		
		// Run validation for checking
		if ($this->form_validation->run() === FALSE) {

			$profile['user_id']		= $this->session->userdata('user_session')->id;
			$profile['file_name'] 	= $this->input->post('image_temp');
			$profile['modified']	= time();

			$profile_id 			= $this->UserProfiles->setUserProfiles($profile);

			if ($profile_id) redirect(base_url(ADMIN) . '/user/index');

		} else {

		}
								
	}

	public function image() {
			
		// Check if the request via AJAX
		if (!$this->input->is_ajax_request()) {
			exit('No direct script access allowed');		
		}	
		
		// Define initialize result
		$result['result'] = '';
								
		if($_FILES && $_SERVER['REQUEST_METHOD'] == 'POST') {					
				
				// uncomment to see javascript loading progress
				//usleep(2000000);
				
				$upload		= TRUE;
				$file_hash	= md5(time() + rand(100, 999));
				$file_data	= pathinfo($_FILES['fileupload']['name']);
									
				$file_element_name = 'fileupload';
				
				$config['upload_path'] = './uploads/users/';
				$config['allowed_types'] = 'gif|jpg|png|doc|txt';
				$config['max_size'] = 1024 * 8;
				$config['encrypt_name'] = FALSE;
				
				$this->load->library('upload', $config);

				$thumb	= $file_data['filename'].'_thumb.'.$file_data['extension'];
				
				if(file_exists($config['upload_path'].$_FILES['fileupload']['name'])) {
					
					$upload	= FALSE;
				
				}
				
				if (!$this->upload->do_upload($file_element_name) || $upload === FALSE)
				{
					$status = 'error!';
					$msg = $this->upload->display_errors('', '');
				}
				else
				{
					//if ($upload == TRUE) {

						//$data = $this->upload->data();

						//$image_path = $data['full_path'];

						//$file_name	= self::_upload_to($_FILES[$file_element_name]['tmp_name'], $file_hash.'.'.$file_data['extension'], './uploads/users/', 0777);

						$config['source_image']	= $config['upload_path'].$_FILES['fileupload']['name'];
						$config['create_thumb'] = TRUE;
						$config['maintain_ratio'] = TRUE;
						$config['width']	= 264;
						$config['height']	= 220;

						$this->load->library('image_lib', $config); 

						$this->image_lib->resize();

						//$file_data	= pathinfo($file_name);

						$file_mime	= $_FILES['fileupload']['type'];

						$thumb = $file_data['filename'].'_thumb.'.$file_data['extension'];
					//}
					
					$status = "success";
					$msg = "File successfully uploaded";

				}
				
						//print_r($msg);
						//exit;

				$result['files'][] = array(
										'name'	=> $file_data['basename'],
										'size'	=> $_FILES['fileupload']['size'],
										'type'	=> $_FILES['fileupload']['type'],
										'url'	=> 'uploads/users/'. $file_data['basename'],
										//'file_id'		=> $file_id,
										'thumbnailUrl'	=>'uploads/users/'. $thumb,
										//'deleteUrl'		=>URL::site(ADMIN).'/news/filedelete/'.$file_id,
										'deleteType'	=>'DELETE'
										);						
		} else {
					
				// Send message if account not found					
				$result['result']['code'] = 0;
				$result['result']['text'] = 'Image not Found';
		}

		// Return data esult
		$data['json'] = $result;
		
		// Load data into view		
		$this->load->view('json', $this->load->vars($data));	
		
	}
	
	// Check if upload dir exists or create one and upload file if true and return file name
	public static function _upload_to ($file, $name, $upload_path='', $file_perm = '') {
		if (!empty($upload_path)) {
			
			if ( ! is_dir($upload_path) OR ! is_writable(realpath($upload_path))) {	
				mkdir($upload_path);
			}

			// Make the filename into a complete path			
			$filename = realpath($upload_path).DIRECTORY_SEPARATOR.$file['name'];
			
			if (move_uploaded_file($file['tmp_name'], $filename))
			{
				if ($file_perm !== FALSE)
				{
					// Set permissions on filename
					chmod($filename, $file_perm);
				}

				// Return new file path
				return $filename;
			}
			
		} else {
			return false;
		}
		
	}

    // -------------- CALLBACK METHODS -------------- //

    // Match Email post to Database
    public function match_email($email) {		

		// Check email if empty
		if ($email == '') {
				$this->form_validation->set_message('match_email', 'The %s can not be empty.');
				return false;
		}
		// Check email if match
		else if ($this->Users->getUserEmail($email) == 1) {
				$this->form_validation->set_message('match_email', 'The %s is already taken.');			
				return false;
		} else {
				return true;
		} 

    }

    // Match Captcha post to Database
    public function match_captcha($captcha) {		

		// Check captcha if empty
		if ($captcha == '') {
				$this->form_validation->set_message('match_captcha', 'The %s code can not be empty.');
				return false;
		}
		// Check captcha if match
		else if ($this->Captcha->match($captcha)) {
				return true;
		} 

    }

    // Match Password post to Database
    public function match_password($password) {

		// Check password if empty
		if ($password == '') {
				$this->form_validation->set_message('match_password', 'The %s can not be empty.');
				return false;
		}
		// Check password if match
		else if ($this->Users->getUserPassword($password) != 1) {
				$this->form_validation->set_message('match_password', 'The %s not match with your current password.');			
				return false;
		// Match current password
		} else {
				return true;
		}

    }

    // Reload Captcha to the view
    public function reload_captcha() {

		// Send image to display Captcha
		$captcha = $this->Captcha->image();

		// Echo captcha Image
		echo $captcha['image'];
		exit;

    }

    public function export() {

		// Data collection        
        $users = $this->Users->getAllUser();
        
		// Return excel data
        return $this->excel->export($users);

    }
}