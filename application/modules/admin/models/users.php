<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

// Model Class Object for Users
class Users Extends CI_Model {
	// Table name for this model
	protected $table = 'users';
	
	public function __construct(){
	    // Call the Model constructor
	    parent::__construct();

	    // Set default db
	    $this->db = $this->load->database('default', true);		
	    // Set default table
	    $this->table = $this->db->dbprefix($this->table);			
				
	}
	
	public function install() {
		
		$insert_data	= FALSE;

		if (!$this->db->table_exists($this->table)) {
		    $insert_data	= TRUE;

		    $sql            = 'CREATE TABLE IF NOT EXISTS `'.$this->table.'` ('
				    . '`id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,'
				    . '`email` VARCHAR(255) NOT NULL, '
				    . '`password` VARCHAR(100) NOT NULL, '
				    . '`username` VARCHAR(160) NOT NULL, '
				    . '`group_id` INT(11) UNSIGNED NOT NULL, '
				    . '`is_system` TINYINT(3) NOT NULL DEFAULT 0, '
				    . '`last_login` INT(11) UNSIGNED NOT NULL, '
				    . '`logged_in` INT(1) UNSIGNED NOT NULL,'
				    . '`session_id` VARCHAR(40) NOT NULL, '
				    . '`status` INT(1) UNSIGNED NOT NULL,'
				    . '`added` INT(11) UNSIGNED NOT NULL, '
				    . '`modified` INT(11) UNSIGNED NOT NULL, '
				    . 'INDEX (`email`, `group_id`) '
				    . ') ENGINE=MYISAM DEFAULT CHARSET=utf8;';
		    
		    $this->db->query($sql);
		}
		
		if(!$this->db->query('SELECT * FROM `'.$this->table.'` LIMIT 0, 1;'))
				$insert_data	= TRUE;
		
		if ($insert_data) {
			$sql	= 'INSERT INTO `'.$this->table.'` '
				. '(`id`,`email`,`password`,`username`,`group_id`,`is_system`,`last_login`,`logged_in`,`session_id`,`status`,`added`,`modified`) '
				. 'VALUES '
				. '(NULL, \'admin@admin.com\', \'dd94709528bb1c83d08f3088d4043f4742891f4f\', \'admin\', 1, 1, 0, '.time().', NULL, 1, '.time().', 0), '
				. '(NULL, \'administrator\', \'12506e739378348ec662bb015bfd2288362dcc1c\', \'Administrator\', 2, 1, 0, '.time().', NULL, 1, '.time().', 0), '
				. '(NULL, \'user@testing.com\', \'12506e739378348ec662bb015bfd2288362dcc1c\', \'User\', 99, 0, 0, '.time().', NULL, 1, '.time().', 0), '
				. '(NULL, \'employee@employee.com\', \'12506e739378348ec662bb015bfd2288362dcc1c\', \'Employee Staff\', 100, 0, 0, '.time().', NULL, 1, '.time().', 0);';

			if ($sql) $this->db->query($sql);
		}

		return $this->db->table_exists($this->table);
		
	}
	
	public function getCount($status = null){
	    $data = array();
	    $options = array('status' => $status);
	    $this->db->where($options,1);
	    $this->db->from($this->table);
	    $data = $this->db->count_all_results();
	    return $data;
	}
	
	public function getUser($id = null){
	    if(!empty($id)){
		$data = array();
		$options = array('id' => $id);
		$Q = $this->db->get_where($this->table,$options,1);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_object() as $row)
			$data = $row;
		}
		$Q->free_result();
		return $data;
	    }
	}
	
	public function getUserByEmail($email = null){
	    if(!empty($email)){
		$data = array();
		$options = array('email' => $email);
		$Q = $this->db->get_where($this->table,$options,1);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_object() as $row)
			$data = $row;
		}
		$Q->free_result();
		return $data;
	    }
	}
	
	public function getUserByUsername($username = null){
	    if(!empty($username)){
		$data = array();
		$options = array('username' => $username);
		$Q = $this->db->get_where($this->table,$options,1);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_object() as $row)
			$data = $row;
		}
		$Q->free_result();
		return $data;
	    }
	}
	
	public function getAllUser($status=''){
	    $data = array();
            if ($status) {
                $options = array('status'=>$status);
                $this->db->where($options,1);
            }
	    $this->db->order_by('added');
	    $Q = $this->db->get($this->table);
		if ($Q->num_rows() > 0){
			//foreach ($Q->result_object() as $row){
				//$data[] = $row;
			//}
			$data = $Q->result_object();
		}
	    $Q->free_result();
	    return $data;
	}
	
	// Get user's Email from posts 
	public function getUserEmail($email=null){
	    if(!empty($email)){
		$data = array();

		// Option and query result
		$options = array('email' => $email);			
		$Q = $this->db->get_where($this->table,$options,1);

		// Check result
		if($Q->num_rows() > 0) {
			// Return true if not exists
			return true;
		} else {
			// Return false if exists
			return false;
		}		 
	    }
	}
	
	// Get user's Password from hashed password 
	public function getUserPassword($password=null){
	    if(!empty($password)){
		$data = array();

		// Option and query result
		$options = array('password' => $password);			
		$Q = $this->db->get_where($this->table,$options,1);

		// Check result
		if($Q->num_rows() > 0) {
			// Return true if not exists
			return true;
		} else {
			// Return false if exists
			return false;
		}		 
	    }
	}
        
	// Get loggedin count for all user
	public function getLoginCount() {
            $data = array();
	    $options = array('status' => $status);
	    $this->db->where($options,1);
	    $this->db->from($this->table);
	    $data = $this->db->count_all_results();
	    return $data;            
        }
        
	// Get all users Login stats by login date
	public function getLoginStats() {
	    
	    $sql = 'SELECT count(id) total_login, FROM_UNIXTIME(`last_login`, \'%Y/%m/%d\') last_login '
                    .'FROM `'. $this->table .'`'
                    .'WHERE FROM_UNIXTIME(`last_login`, \'%Y/%m/%d\') >= \''.date('Y/m/d',strtotime("-5 month", time())).'\' '
                    .'AND FROM_UNIXTIME(`last_login`, \'%Y/%m/%d\') <= \''.date('Y/m/d').'\' '
                    .'GROUP BY FROM_UNIXTIME(`last_login`, \'%Y/%m/%d\') ORDER BY `last_login` ASC';
	    
	    $query = $this->db->query($sql);
            
	    return $query->result_object();
	}
        
	// Authenticate function for user login
	public function login($object=null){		
        // Check parameters
	    if(!empty($object)){
            $data = array();

            // Find username or email from input
            $this->db->where('username', $object['username'])
            ->or_where('email', $object['username']); 

            // Query the table
            $Q = $this->db->get($this->table,1);               

            if ($Q->num_rows() > 0){				
                // Query login
                $result = $Q->row_object();
                $salted = hash('sha1',$object['password'].$result->verify);
                // Check if salted password is match
                if (intval($Q->row()->status) === 1 && intval($Q->row()->password === $salted) === 1) {
                    // Update login state to true
                    $this->setLoggedIn($Q->row()->id);
                    $data = $Q->row();
                } else {
                    $data = 'disabled';
                }
            } 			 
            
            // Free result
            $Q->free_result();
            return $data;
	    }
	}
	
	public function setLastLogin($id=null) {
	    //Get user id
	    $this->db->where('id', $id);
	    //Return result
	    return $this->db->update($this->table, array('last_login'=>time(),'logged_in'=>0));
	}
	
	public function setLoggedIn($id=null) {
	    //Get user id
	    $this->db->where('id', $id);
	    //Return result
	    return $this->db->update($this->table, array('logged_in'=>1,'session_id'=>$this->session->userdata('session_id')));
	}
	
	public function setPassword($user=null,$changed=''){
		
	    $password = ($changed) ? $changed : random_string('alnum', 8);

	    $data = array('password' => sha1($user->username.$password));

	    $this->db->where('id', $user->id);
	    $this->db->update($this->table, $data); 

	    return $password;
		
	}	
	
	public function setUser($object=null){
		
	    // Set User data
	    $data = array(
			'username'	=> $object['username'],
			'email'	=> $object['email'],			
			'password'	=> sha1($object['username'].$object['password']),	
			'group_id'	=> @$object['group_id'],			
			'added'	=> time(),	
			'status'	=> $object['status']
	    );

	    // Insert User data
	    $this->db->insert($this->table, $data);

	    // Return last insert id primary
	    $insert_id = $this->db->insert_id();

	    // Check if last is existed
	    if ($insert_id) {

		    // Unset previous data
		    unset($data);

		    // Set User Profile data
		    $data = array(
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
				    'file_name'	=> !empty($object['file_name']) ? $object['file_name'] : NULL,
				    'added'		=> time(),	
				    'status'	=> 1);

		    // Insert User Profile 
		    $this->db->insert('tbl_user_profiles', $data);

	    }

	    // Return last insert id primary
	    return $insert_id;
		
	}	
	
	public function setStatus($id=null,$status=null) {
            
            // Get user id
	    $this->db->where('id', $id);
	    
	    // Return result
	    return $this->db->update($this->table, array('status'=>$status,'modified'=>time()));

	}
	
	public function updateUser($object=null){
	    
	    // Set User data
	    $data = array(
		'username'  => $object['username'],
		'email'	    => $object['email'],			
		'group_id'  => @$object['group_id'],			
		'modified'  => time(),	
		'status'    => $object['status']
	    );

	    // Update User data             
	    $this->db->where('id', $object['id']);      

	    // Return last insert id primary
	    $update = $this->db->update($this->table, $data);	

	    // Check if last is existed
	    if ($update) {

		    // Unset previous data
		    unset($data);

		    // Set User Profile data
		    $data = array(
				    'user_id'	=> $object['id'],
				    'gender'	=> !empty($object['gender']) ? $object['gender'] : '',
				    'first_name'    => !empty($object['first_name']) ? $object['first_name'] : '',
				    'last_name'	    => !empty($object['last_name']) ? $object['last_name'] : '',
				    'birthday'	    => !empty($object['birthday']) ? $object['birthday'] : '',
				    'phone'	    => !empty($object['phone']) ? $object['phone'] : '',	
				    'mobile_phone'  => !empty($object['mobile_phone']) ? $object['mobile_phone'] : '',
				    'fax'	=> !empty($object['fax']) ? $object['fax'] : '',
				    'website'	=> !empty($object['website']) ? $object['website'] : '',
				    'about'	=> !empty($object['about']) ? $object['about'] : '',
				    'division'	=> !empty($object['division']) ? $object['division'] : '',
				    'modified'	=> time(),	
				    'status'	=> $object['status']);
		    
			// Get User Profile ID 
		    $query = $this->db->get_where('tbl_user_profiles', array('user_id'=>$object['id'])); 
			
			// Check if profile exists
			if($query->num_rows() == 0) {
				
				// Insert if not found User Profile 
				$data['added'] = time();
				$this->db->insert('tbl_user_profiles', $data);
				
			} else {
				 
				// Update User Profile 
				$this->db->where('user_id', $object['id']);
				$this->db->update('tbl_user_profiles', $data);
				
			}
	    }

	    // Return last id
	    return $update;
		
	}
	
	public function deleteUser($id) {
		
		// Check user id
		$this->db->where('id', $id);
		
		// Delete user form database
		if ($this->db->delete($this->table)) {
			
			// Check user profile id
			$this->db->where('user_id', $id);
			
			// Delete user profile form database		
			return $this->db->delete('tbl_user_profiles');
			
		}		
	}	
}
