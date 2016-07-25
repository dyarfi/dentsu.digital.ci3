<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

// Model Class Object for Attachments
class Attachments Extends MY_Model {
    
	// Table name for this model
	public $table = 'participant_attachment_submissions';
	
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
			    . '`participant_id` INT(11) UNSIGNED NULL, '
			    . '`type` VARCHAR(255) NULL, '
			    . '`url` VARCHAR(255) NULL, '
			    . '`title` VARCHAR(255) NULL, '
			    . '`file_name` TEXT NULL, '
			    . '`attribute` TEXT NULL, '			    
			    . '`count` INT(11) NULL , '	
			    . '`status` TINYINT(1) NULL DEFAULT 1, '
			    . '`added` INT(11) NULL, '
			    . '`modified` INT(11) NULL, '
			    . 'INDEX (`participant_id`, `url`) '
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
        $options = array(); 
        if ($status) {
            $options = array('status' => $status);
        }
        $this->db->where($options,1);
        $this->db->from($this->table);
        $data = $this->db->count_all_results();
	    return $data;
	}
    
	public function getParticipantAttachment($participant_id = null){
	    if(!empty($participant_id)){
            $data = array();
            $options = array('participant_id' => $participant_id);
            $Q = $this->db->get_where($this->table,$options,1);
            if ($Q->num_rows() > 0){
                foreach ($Q->result_object() as $row)
                $data = $row;
            }
            $Q->free_result();
		return $data;
	    }
	}

	public function getParticipantAttachmentByType($participant_id = null, $type = 'fabric'){
	    if(!empty($participant_id) && !empty($type)) {
            $data = array();
            $options = array('participant_id' => $participant_id, 'type' => $type);
            $Q = $this->db->get_where($this->table,$options,1);
            if ($Q->num_rows() > 0){
                foreach ($Q->result_object() as $row)
                $data = $row;
            }
            $Q->free_result();
		return $data;
	    }
	}
    
	public function getAttachment($id = null){
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
	
	public function getAllAttachment($type=''){
		
		$data = array();
		
		if ($type !='') {
			$options = ['status'=>1,'type'=>$type];
			$this->db->where($options);
		}

	    $this->db->order_by('added');
	    $Q = $this->db->get($this->table);
	    if ($Q->num_rows() > 0){
			$data = $Q->result_object();
	    }
	    
	    $Q->free_result();

	    return $data;
	}	
	
	public function getByType($type = null){
		if(!empty($type)){
			$data = array();
			$options = array('type' => $type,'status'=>1);
			$Q = $this->db->get_where($this->table,$options,1);
			if ($Q->num_rows() > 0){
				foreach ($Q->result_object() as $row)
				$data = $row;
			}
			$Q->free_result();
			return $data;
		}
	}	

	// Set attachment for new or update
	public function setAttachment($object=null){

	    // Set Attachment data
	    $data = array(	
		    'participant_id'   => $object['participant_id'],
		    'url'	=> $object['url'],
		    'title'	=> $object['title'],
		    'count'	=> $object['count'],
		    'file_name'	=> $object['file_name'],
		    'attribute'	=> $object['attribute'],		    
		    'type'		=> $object['type'],
		    'status'    => $object['status'],
		    'added'		=> time(),
		    'modified'  => $object['modified']
	    );

		if ($this->getParticipantAttachment($object['participant_id'])) {

  			// Update User data             
		    $this->db->where('participant_id', $object['participant_id']);      

		    // Return last insert id primary
		    $update = $this->db->update($this->table, $data);	

		    // Return update
		    return $update;
		    
		} else {

			// Insert Attachment data
		    $this->db->insert($this->table, $data);

		    // Return last insert id primary
		    $insert_id = $this->db->insert_id();

		    // Return last insert id primary
		    return $insert_id;		  

		}    
		
	}	
	
	// Delete Participant
	public function deleteAttachment($id) {
		
	    // Check Participant id
	    $this->db->where('id', $id);

	    // Delete Participant form database
	    return $this->db->delete($this->table);		
	}	
}
