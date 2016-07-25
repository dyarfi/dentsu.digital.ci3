<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

// Model Class Object for LocationLogs
class LocationLogs Extends MY_Model {
	// Table name for this model
	public $table = 'location_logs';
	
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

		    $sql = 'CREATE TABLE IF NOT EXISTS `'.$this->table.'` ('
				    . '`id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,'
			   	    . '`session_id` VARCHAR(64) NULL, '
				    . '`url` VARCHAR(255) NULL, '
				    . '`user_id` INT(11) UNSIGNED NULL, '
				    . '`http_code` INT(11) UNSIGNED NOT NULL, '
				    . '`status_code` VARCHAR(160) NULL, '
				    . '`bytes_served` INT(11) NULL, '
				    . '`total_time` VARCHAR(160) NULL, '
					. '`ip_address` INT(11) NULL DEFAULT 0, '
				    . '`geolocation` VARCHAR(512) NULL, '
					. '`referrer` VARCHAR(255) NULL, '
				    . '`user_agent` VARCHAR(255) NULL, '
					. '`is_mobile` INT(1) NULL, '
				    . '`status` INT(1) UNSIGNED NOT NULL,'
				    . '`added` INT(11) UNSIGNED NOT NULL, '
				    . '`modified` INT(11) UNSIGNED NOT NULL, '
				    . 'INDEX (`url`, `user_id`) '
				    . ') ENGINE=MYISAM DEFAULT CHARSET=utf8;';
		    
		    $this->db->query($sql);
		}
		
		
		if(!$this->db->query('SELECT * FROM `'.$this->table.'` LIMIT 0, 1;'))
			$insert_data	= TRUE;
		
		if ($insert_data) {
			$sql	= '';
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
	
	public function getServerLog($id = null){
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
	
	public function getAllServerLog($admin=null){
		$data = array();
		$this->db->order_by('added','DESC');
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
	
	public function setServerLog($object=null){

		// Set ServerLog data
		$data = array(
			'session_id'	=> $object['session_id'],
			'url'			=> $object['url'],	
			'user_id'		=> @$object['user_id'],	
			'status_code'	=> $object['status_code'],	
			'bytes_served'	=> $object['bytes_served'],
			'total_time'	=> $object['total_time'],
			'ip_address'	=> $object['ip_address'],	
			'geolocation'	=> $object['geolocation'],
			'http_code'		=> $object['http_code'],	
			'referrer'		=> @$object['referrer'],			
			'user_agent'	=> @$object['user_agent'],
			'is_mobile'		=> @$object['is_mobile'],
			'status'		=> $object['status'],
			'added'			=> $object['added']
		);
		
		// Insert ServerLog data
		$this->db->insert($this->table, $data);
		
		// Return last insert id primary
		$insert_id = $this->db->insert_id();
			
		// Return last insert id primary
		return $insert_id;
		
	}	
	
	public function deleteServerLog($id) {
		
		// Check log
		$this->db->where('id', $id);
			
		// Delete log form database		
		return $this->db->delete($this->table);
		
	}
	
	public function truncate(){
	    // Set data to be emptied
	    $result = $this->db->query("TRUNCATE TABLE `".$this->table."`");

	    // Data emptied return will be 0 zero
	    return !$result;
	}
}
