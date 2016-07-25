<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

// Model Class Object for Schedules
class Schedules Extends MY_Model {
	// Table name for this model
	public $table = 'schedules';
	
	public function __construct(){
		// Call the Model constructor
		parent::__construct();
		
		$this->_model_vars	= array(
						    'id'	=> 0,						    
						    'conference_id'	=> 0,
                            'date'			=> '',
						    'url'			=> '',
						    'subject'		=> '',
						    'description'	=> '',
						    'is_system' => '',
						    'status'	=> '',
						    'added'	=> '',
						    'modified'	=> '');
		
		$this->db = $this->load->database('default', true);	
		
		// Set default table
		$this->table = $this->db->dbprefix($this->table);
				
	}
	
	public function install() {
		
		$insert_data	= FALSE;

		if (!$this->db->table_exists($this->table)) 
                $insert_data	= TRUE;
                
		$sql	= 'CREATE TABLE IF NOT EXISTS `'.$this->table.'` (
				  `id` int(11) NOT NULL AUTO_INCREMENT,
				  `conference_id` INT(11) UNSIGNED NULL,
                  `date` CHAR(32) NULL, 
				  `url` VARCHAR(255) NULL, 
				  `subject` VARCHAR(255) NULL, 
				  `description` text NOT NULL,
				  `is_system` tinyint(1) NOT NULL DEFAULT \'1\',
				  `status` ENUM(\'publish\', \'unpublish\', \'deleted\') NULL DEFAULT \'publish\', 
				  `added` int(11) NOT NULL,
				  `modified` int(11) NOT NULL, 
				  INDEX (`url`, `status`), 
				  PRIMARY KEY (`id`)
				) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=11;';
				
				
		$this->db->query($sql);
		
        if(!$this->db->query('SELECT * FROM `'.$this->table.'` LIMIT 0, 1;'))
			$insert_data	= TRUE;
		
		if ($insert_data) {
			$sql	 = 'INSERT INTO `'.$this->table.'` (`id`, `url`, `subject`, `description`, `is_system`, `status`, `added`, `modified`)'
					. 'VALUES (12, \'human-resources\', \'Human Resources\', \'Lorem Ipsum Dolor Sit Amet\', 1, \'publish\', '.time().', 0),'
					. '(13, \'creative\', \'Creative\', \'Lorem Ipsum Dolor Sit Amet\', 1, \'publish\', '.time().', 0);';

			$this->db->query($sql);
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
	public function getSchedule($id = null){
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
	public function getAllSchedule($option=null){
		$data = array();        
        if ($option) {
            $this->db->where($option);
        }        
		$this->db->order_by('date','ASC');
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
	public function setSchedule($object=null){
		
		// Set User data
		$data = array(			
                'conference_id' => $object['conference_id'],
				'url' => $object['url'],
				'subject' => $object['subject'],
				'description' => $object['description'],
				'is_system' => $object['is_system'],
				'added'		=> time(),	
				'status' => $object['status']
			    );
		
		// Insert User data
		$this->db->insert($this->table, $data);
		
		// Return last insert id primary
		$insert_id = $this->db->insert_id();					
			
		// Return last insert id primary
		return $insert_id;
		
	}	
	public function deleteSchedule($id) {
		
		// Check ScheduleSchedule id
		$this->db->where('id', $id);
		
		// Delete setting form database
		return $this->db->delete($this->table);
		
	}	
}
