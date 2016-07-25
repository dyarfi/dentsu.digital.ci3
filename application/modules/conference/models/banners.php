<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

// Model Class Object for Banners
class Banners Extends MY_Model {
    
	// Table name for this model
	public $table = 'conference_banners';
	
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
			    . '`conference_id` INT(11) UNSIGNED NULL, '
			    . '`url` VARCHAR(255) NULL, '
			    . '`title` VARCHAR(255) NULL, '
			    . '`file_name` TEXT NULL, '
			    . '`priority` INT(11) DEFAULT NULL, '
			    . '`count` INT(11) NULL , '	
			    . '`status` TINYINT(1) NULL DEFAULT 1, '
			    . '`added` INT(11) NULL, '
			    . '`modified` INT(11) NULL, '
			    . 'INDEX (`conference_id`, `url`) '
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
	
	public function getBanner($id = null){
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
	
	public function getAllBanner($options=null){
	    $data = array();
        if ($options) {
            $this->db->where($options);
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
	
	public function setBanner($object=null){

	    // Set Banner data
	    $data = array(	
		    'conference_id'   => $object['conference_id'],
		    'url'	=> $object['url'],
		    'title'	=> $object['title'],
            'file_name'	=> $object['file_name'],            
            'priority'	=> $object['priority'],
		    'user_id'	=> $object['user_id'],		    
		    'count'	=> $object['count'],
		    'status'    => $object['status'],
		    'added'	=> time(),	
		    'modified'  => $object['status']
	    );

	    // Insert Banner data
	    $this->db->insert($this->table, $data);

	    // Return last insert id primary
	    $insert_id = $this->db->insert_id();

	    // Return last insert id primary
	    return $insert_id;
		
	}	
	
	// Delete Participant
	public function deleteBanner($id) {
		
	    // Check Participant id
	    $this->db->where('id', $id);

	    // Delete Participant form database
	    return $this->db->delete($this->table);		
	}	
}
