<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

// Model Class Object for Submissions
class Submissions Extends MY_Model {
	// Table name for this model
	public $table = 'conference_submissions';
	public $table_pivot = 'conference_attach_submissions';

	
	public function __construct(){
		// Call the Model constructor
		parent::__construct();
		
		$this->_model_vars	= array(
						    'id'			=> 0,
						    'url'			=> '',
						    'subject'		=> '',
                            'description'	=> '',
                            'file_name'		=> '',                            
                            'user_id'		=> 0,
						    'count'			=> 0,
						    'status'		=> '',
						    'added'			=> 0,
						    'modified'		=> 0);
		
		$this->db = $this->load->database('default', true);	
		
		// Set default table
		$this->table = $this->db->dbprefix($this->table);

		// Set default table_pivot
		$this->table_pivot = $this->db->dbprefix($this->table_pivot);
				
	}
	
	public function install() {
		
		$insert_data	= FALSE;

		if (!$this->db->table_exists($this->table)) 
                $insert_data	= TRUE;
                
		$sql	= 'CREATE TABLE IF NOT EXISTS `'.$this->table.'` ('
				. '`id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, '
				. '`url` VARCHAR(255) NULL, '
				. '`subject` VARCHAR(255) NULL, '
                . '`description` TEXT NULL, '                
                . '`file_name` VARCHAR(255) NULL, '
				. '`user_id` TINYINT(3) NULL , '
				. '`count` INT(11) NULL , '		
				. '`status` TINYINT(1) NULL , '
				. '`added` INT(11) UNSIGNED NULL, '
				. '`modified` INT(11) UNSIGNED NULL, '
				. 'INDEX (`url`) '
				. ') ENGINE=MYISAM DEFAULT CHARSET=utf8;';
				
				
		$this->db->query($sql);
		
        if(!$this->db->query('SELECT * FROM `'.$this->table.'` LIMIT 0, 1;'))
			$insert_data	= TRUE;
		
		/*
		if ($insert_data) {
			$sql	= 'INSERT INTO `'.$this->table.'` (`id`, `division_id`, `name`, `sent_to`, `ref_no`, `start_date`, `end_date`, `synopsis`, `qualification`, `location`, `language`, `status`, `is_deleted`, `added`, `modified`)'
				    . ' VALUES '
				    . '(1, 13, \'Web Developer\', \'defrian@webarq.com\', \'234210\', 0, 0, \'Synopsis\', \'Qualification\', \'\', \'indonesia\', \'publish\', 0, '.time().', 1336032870),'
				    . '(2, 13, \'Web Designer\', \'defrian@webarq.com\', \'234211\', 0, 0, \'Synopsis\', \'Qualification\', \'\', \'english\', \'publish\', 0, '.time().', 1336032823);';

			$this->db->query($sql);
		}
		*/

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
    
	public function getSubmission($id = null){
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
    
	public function getByConference($conference_id = null){
        
		if(!empty($conference_id)){
            
			$this->db->select('*');
            $this->db->from('tbl_conference_submissions');
            $this->db->join($this->table, 'tbl_conference_submissions.submission_id = tbl_submissions.id');
            $this->db->where('tbl_conference_submissions.conference_id', $conference_id);
            $this->db->order_by('tbl_conference_submissions.priority','DESC');
            
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
	}
    
	public function getByParameter($param = null){
		if(!empty($param)){
			$data = array();
			$options = array('parameter' => $email);
			$Q = $this->db->get_where($this->table,$options,1);
			if ($Q->num_rows() > 0){
				foreach ($Q->result_object() as $row)
				$data = $row;
			}
			$Q->free_result();
			return $data;
		}
	}
    
	public function getAllSubmission($status=null){
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
    
	public function setSubmission($object=null){
		
		// Set User data
		$data = array(			
				'conference_id'	=> @$object['conference_id'],
                'url'			=> @$object['url'],
                'subject'		=> @$object['subject'],
                'nationality_id'=> @$object['nationality_id'],
                'research_area' => @$object['research_area'],
                'biography'		=> @$object['biography'],
                'added'     => time(),	
				'status'    => $object['status']
			    );
		
		// Insert User data
		$this->db->insert($this->table, $data);
		
		// Return last insert id primary
		$insert_id = $this->db->insert_id();					
			
		// Return last insert id primary
		return $insert_id;
		
	}	
	public function deleteSubmission($id) {
		
		// Check Submission id
		$this->db->where('id', $id);
		
		// Delete setting form database
		return $this->db->delete($this->table);
		
	}	
}
