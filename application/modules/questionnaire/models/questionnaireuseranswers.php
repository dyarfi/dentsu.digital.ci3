<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

// Model Class Object for Questionnaire User Answers
class QuestionnaireUserAnswers Extends MY_Model {
    
	// Table name for this model
	public $table = 'questionnaire_user_answers';
	
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
				. '`participant_id` INT(11) NULL , '
				. '`user_questionnaire_id` INT(11) NULL , '	
				. '`question_id` INT(11) NULL , '	
				. '`status` TINYINT(1) NULL DEFAULT 1, '
				. '`added` INT(11) NULL, '
				. '`modified` INT(11) NULL, '
				. 'INDEX (`participant_id`) '
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
		$data = array();
		$options = array('status' => $status);
		$this->db->where($options,1);
		$this->db->from($this->table);
		$data = $this->db->count_all_results();
		return $data;
	}
	
	public function getUserAnswer($id = null){
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
	
	public function getAllUserAnswer($admin=null){
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
	
	public function setUserAnswer($object=null){
		
		if (is_array($object['questionnaire_id'])) {
			$data = array();
			$insert_ids = array();
			foreach ($object['questionnaire_id'] as $key => $value) {
				$data[$key]['participant_id'] 		 = $object['participant_id'];
				$data[$key]['user_questionnaire_id'] = $key;
				$data[$key]['question_id']	= $value;
				$data[$key]['status']		= 1;
				$data[$key]['added']		= time();
				$data[$key]['modified']		= time();
				$this->db->insert($this->table, $data[$key]);
				$insert_ids[]				= $key;
			}
			return $insert_ids;
		}


		// Insert UserAnswer data
		//$this->db->insert($this->table, $data);
		
		// Return last insert id primary
		//$insert_id = $this->db->insert_id();
			
		// Return last insert id primary
		//return $insert_id;
		
	}	
	
	// Delete UserAnswer
	public function deleteUserAnswer($id) {
		
		// Check UserAnswer id
		$this->db->where('id', $id);
		
		// Delete UserAnswer form database
		return $this->db->delete($this->table);		
	}	
}
