<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

// Model Class Object for Configurations
class Configurations Extends MY_Model {
	
	public $table = 'configurations';
	
	public function __construct(){
	    // Call the Model constructor
	    parent::__construct();		

	    // Set default db
	    $this->db = $this->load->database('default', true);		
	    // Set default table
	    $this->table = $this->db->dbprefix($this->table);		
	}
	
	public function install () {
	    $insert_data		= FALSE;

	    if (!$this->db->table_exists($this->table)) {
		    $insert_data	= TRUE;

		    $sql	= 'CREATE TABLE IF NOT EXISTS `'.$this->table.'` ('
				    . '`parameter` VARCHAR(150) NOT NULL DEFAULT \'\', '
				    . '`value` VARCHAR(150) NOT NULL DEFAULT \'\', '
				    . 'PRIMARY KEY (`parameter`, `value`) '
				    . ') ENGINE=MYISAM DEFAULT CHARSET=utf8;';

		    $this->db->query($sql);
	    }

	    if ($insert_data) {
		$sql	= 'INSERT INTO `'.$this->table.'` '
				. '(`parameter`, `value`) '
				. 'VALUES '
				. '(\'install\', \'0\'),'
				. '(\'maintenance\', \'0\'),'
				. '(\'environment\', \'0\'),'
				. '(\'theme\', \'default\')';

		if ($sql) $this->db->query($sql);
	    }

	    return $this->db->table_exists($this->table);
	}

	public function getConfiguration($param = null){
	    if(!empty($param)) {
		$data = array();
		$options = array('parameter' => $param);
		$Q = $this->db->get_where($this->table,$options,1);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_object() as $row)
			$data = $row;
		}
		$Q->free_result();
		return $data;
	    }
	}
	
	public function getAllConfiguration(){
	    $data = array();
	    $Q = $this->db->get($this->table);
		if ($Q->num_rows() > 0){
		    //foreach ($Q->result_array() as $row){
			    //$data[] = $row;
		    //}
		    $data = $Q->result_object();
		}
	    $Q->free_result();
	    return $data;
	}
	
	public function getConfiguration_ByParam($param = null){
	    $data = '';
	    $options = array('parameter' => $param);
	    $Q = $this->db->get_where($this->table,$options,1);
	    if ($Q->num_rows() > 0){
		    foreach ($Q->result_object() as $row)
			    $data = $row->value;
	    }
	    $Q->free_result();
	    return $data;
	}
	
	public function setConfiguration($object=null){
				
	    $data = array(
			'parameter' => $object['parameter'],
			'value'		=> $object['value']
		);

	    $this->db->insert($this->table, $data);
		
	}
	
	public function updateConfiguration($object=null){
	    $data = array(
			'parameter' => $object['parameter'],
			'value'		=> $object['value']
	    );
	    $this->db->where('parameter', $object['parameter']);
	    return $this->db->update($this->table, $data);
	}
	
	public function deleteConfiguration($param){
	    $this->db->where('parameter', $param);
	    return $this->db->delete($this->table);
	}
}