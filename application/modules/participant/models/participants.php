<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

// Model Class Object for Participants
class Participants Extends MY_Model {
    
    // Table name for this model
    public $table = 'participants';

    public function __construct(){
	// Call the Model constructor
	parent::__construct();

	$this->db = $this->load->database('default', true);

	// Set default table
	$this->table = $this->db->dbprefix($this->table);

    }

    public function install() {

		$insert_data	= FALSE;

		if (!$this->db->table_exists($this->table)) 
		$insert_data	= FALSE;

		$sql	= 'CREATE TABLE IF NOT EXISTS `'.$this->table.'` ('
				. '`id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, '
				. '`identifier_id` VARCHAR(64) NULL, '
                . '`identity` VARCHAR(32) NULL, '
				. '`profile_url` VARCHAR(255) NULL, '
                . '`photo_url` VARCHAR(512) NULL, '
                . '`email` VARCHAR(72) NULL, '
                . '`website` VARCHAR(72) NULL, '
                . '`password` VARCHAR(100) NULL, '
				. '`username` VARCHAR(255) NULL, '
				. '`name` VARCHAR(255) NULL, '
				. '`gender` VARCHAR(12) NULL, '
				. '`age` TINYINT(2) NULL, '
                . '`nationality_id` INT(11) NULL, '
                . '`research_area` VARCHAR(255) NULL, '
                . '`occupation` VARCHAR(64) NULL, '
                . '`about` TEXT NULL, '
                . '`address` VARCHAR(512) NULL, '
                . '`region` VARCHAR(64) NULL, '
				. '`phone_number` VARCHAR(32) NULL, '
                . '`phone_home` VARCHAR(32) NULL, '
                . '`id_number` VARCHAR(32) NULL, '
				. '`file_name` VARCHAR(512) NULL, '
                . '`verify` VARCHAR(8) NULL, '
				. '`completed` TINYINT(1) NULL, '
                . '`logged_in` TINYINT(1) NOT NULL DEFAULT 0, '
                . '`last_login` INT(11) NULL, '
                . '`session_id` VARCHAR(40) NOT NULL, '
				. '`status` TINYINT(1) NOT NULL DEFAULT 0, '
				. '`join_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, '
                . '`modified` INT(11) NULL, '
				. 'INDEX (`name`) '
				. ') ENGINE=MYISAM DEFAULT CHARSET=utf8;';

		$this->db->query($sql);

		if(!$this->db->query('SELECT * FROM `'.$this->table.'` LIMIT 0 , 1;'))
			$insert_data	= TRUE;

		if ($insert_data) {
			$sql	= '';
			$this->db->query($sql);
		}

		return $this->db->table_exists($this->table);

    }

    public function getCount($status = null){
		$options = array();
		if ($status) {
			$options = array('status' => $status);
		}
		$this->db->where($options,1);
		$this->db->from($this->table);
		$data = $this->db->count_all_results();
		return $data;
    }
    
    public function getParticipantByIdentity($identifier_id='',$identity='') {
        
        if(!empty($identifier_id)){
			$data = array();
			$options = array('identifier_id' => $identifier_id,'identity'=>$identity);
			$Q = $this->db->get_where($this->table,$options,1);
			if ($Q->num_rows() > 0){
				foreach ($Q->result_object() as $row)
				$data = $row;
			}
			$Q->free_result();
			return $data;
		}
        
    }
    
    public function getActivation($params='') {
        if(!empty($params)){
			$data = array();
			$options = $params;
			$Q = $this->db->get_where($this->table,$options,1);
			if ($Q->num_rows() > 0){
				foreach ($Q->result_object() as $row)
				$data = $row;
			}
            if (!empty($data)) {
                //Get user id
                $this->db->where('id', $data->id);
                // Set data to update
                $update = array('status'=>1,'logged_in'=>1,'session_id'=>$this->session->userdata('session_id'),'last_login'=>time());
                //Return result
                $this->db->update($this->table, $update);
            }
            $Q->free_result();
            return $data;
		}        
    }
    
    public function getParticipant($id = null){
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

    public function getAllParticipant($admin=null){
		$data = array();
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

	public function getConferences($id='',$participant_id = ''){
		
		$this->db->select('*');
        $this->db->from('tbl_participant_conferences');
        $this->db->join('tbl_conferences', 'tbl_participant_conferences.conference_id = tbl_conferences.id');
        $this->db->join('tbl_participant_conference_completed', 'tbl_participant_conferences.participant_id = tbl_participant_conference_completed.participant_id');
        $this->db->where('tbl_participant_conferences.conference_id', $id)->where('tbl_participant_conferences.participant_id', $participant_id);
        
        $Q = $this->db->get();
        
		if ($Q->num_rows() > 0){
			foreach ($Q->result_object() as $row){
                $data[] = $row;
            }
		}
		$Q->free_result();
		
		// Update User data
		return $data;
		
	}
    
    // Get participant's Email from posts 
	public function getEmail($email=null){
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
    
    // Get participant's by their Email from posts 
    public function getByEmail($email = null){
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
	// Get all Participants Join stats by join_date
	public function getJoinStats() {
	    
		/* SELECT count(`part_id`) `total_join`, date(`join_date`) `join_date` FROM `tbl_participants` WHERE date(`join_date`) >= '2014-10-25' AND date(`join_date`) <= '2015-03-25' GROUP BY date(`join_date`) ORDER BY `join_date` ASC */
		
	    $sql = 'SELECT count(`id`) `total_join`, date(`join_date`) `join_date` '
                    .'FROM `'. $this->table .'`'
                    .'WHERE date(`join_date`) >= \''.date('Y-m-d',strtotime("-5 month", time())).'\' '
                    .'AND date(`join_date`) <= \''.date('Y/m/d').'\' '
                    .'GROUP BY date(`join_date`) ORDER BY `join_date` ASC';
	    
	    $query = $this->db->query($sql);
            
	    return $query->result_object();
	}
    
    // Authenticate function for user login
	public function login($object=null){		
	    if(!empty($object)){
		$data = array();
		$options = array(
				'email' => $object['email'], 
				'password' => sha1($object['email'].$object['password']));

		$Q = $this->db->get_where($this->table,$options,1);
		if ($Q->num_rows() > 0){				
		    foreach ($Q->result_object() as $row) {
                if (intval($row->status) === 1) {
                    // Update login state to true
                    $this->setLoggedIn($row->id);
                    $data = $row;
                } else {
                    $data = 'disabled';
                }
		    }
		} 			 
        
		$Q->free_result();
		return $data;
	    }
	}
	/*
    public function setActivation($object='') {
        //Get user id
	    $this->db->where('id', $object->id);
        // Set data to update
        $update = array('status'=>1,'completed'=>1,'logged_in'=>1,'session_id'=>$this->session->userdata('session_id'),'last_login'=>time());
	    //Return result
	    return $this->db->update($this->table, $update);
	}
    */
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
    
    public function setParticipant($object=null){

		// Set Participant data
		$data = array(			
            'identifier_id' => @$object['identifier_id'],
            'identity'      => @$object['identity'],
            'profile_url'   => @$object['profile_url'],
            'identity'  => @$object['identity'],
            'username'	=> @$object['username'],
            'name'		=> @$object['name'],
            'gender'	=> @$object['gender'],
            'email'		=> @$object['email'],
            'website'	=> @$object['website'],
            'age'       => @$object['age'],
            'nationality_id' => @$object['nationality_id'],
			'id_number'	=> @$object['id_number'],
            'research_area' => @$object['research_area'],
            'occupation' => @$object['occupation'],
            'about' => @$object['about'],
            'address'	=> @$object['address'],
            'region'	=> @$object['region'],
            'phone_number' => @$object['phone'],
            'photo_url'	=> @$object['photo_url'],			
            'status' => @$object['status']
		);

		// Insert Participant data
		$this->db->insert($this->table, $data);

		// Return last insert id primary
		$insert_id = $this->db->insert_id();

		// Return last insert id primary
		return $insert_id;

    }	

    // Delete page
    public function deleteParticipant($id) {

		// Check page id
		$this->db->where('id', $id);

		// Delete page form database
		return $this->db->delete($this->table);		
    }	
	
}
