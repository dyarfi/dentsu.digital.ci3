<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

// Model Class Object for Settings
class Settings Extends MY_Model {
	// Table name for this model
	public $table = 'settings';
	
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

		if (!$this->db->table_exists($this->table)) 
                $insert_data	= TRUE;
                
               	$sql	= 'CREATE TABLE IF NOT EXISTS `'.$this->table.'` ('
					. '`id` int(11) unsigned NOT NULL AUTO_INCREMENT,'
					. '`parameter` varchar(255) DEFAULT NULL,'
					. '`alias` varchar(255) DEFAULT NULL,'
					. '`group` varchar(64) DEFAULT NULL,'
					. '`key` varchar(64) DEFAULT NULL,'										
					. '`value` varchar(1024) DEFAULT NULL,'
					. '`is_system` tinyint(1) DEFAULT 1,'
					. '`input_type` enum(\'input\',\'textarea\',\'radio\',\'dropdown\',\'timezones\') DEFAULT NULL,'
					. '`input_size` enum(\'large\',\'medium\',\'small\') DEFAULT NULL,'
					. '`show_editor` enum(\'0\',\'1\') DEFAULT NULL,'
					. '`is_numeric` enum(\'0\',\'1\') DEFAULT NULL,'
					. '`help_text` varchar(512) DEFAULT NULL,'
					. '`status` tinyint(1) DEFAULT 1,'
					. '`added` int(11) DEFAULT NULL,'
					. '`modified` int(11) DEFAULT NULL,'
					. 'PRIMARY KEY (`id`),'
					. 'KEY `name` (`parameter`,`status`)'
					. ') ENGINE=MyISAM DEFAULT CHARSET=utf8;';
				
				
		$this->db->query($sql);
		
        if(!$this->db->query('SELECT * FROM `'.$this->table.'` LIMIT 0 , 1;'))
	    $insert_data	= TRUE;

	    if ($insert_data) {
		$sql	= 'INSERT INTO `'.$this->table.'` (`id`, `parameter`, `alias`, `group`, `key`, `value`, `status`, `added`, `modified`) VALUES '
			    .'(1, \'email_marketing\', \'Email Marketing\',\'\',\'\',\'marketing@\', \'1\', 1334835773, NULL), '
			    .'(2, \'email_administrator\', \'Email Administrator\',\'\',\'\', \'administrator@\', \'1\', 1334835773, 1336122482), '
			    .'(3, \'email_hrd\', \'Email HRD\',\'\',\'\', \'hrd@\', \'1\', 1334835773, NULL), '
			    .'(4, \'email_info\', \'Email Info\',\'\',\'\', \'info@\', \'1\', 1334835773, NULL), '
			    .'(5, \'email_template\', \'Email Template\',\'\',\'\', \'&dash;\', \'1\', 1334835773, NULL), '					
			    .'(6, \'maintenance_template\', \'Maintenance Mode Template\',\'\',\'\', \'<h2>The site is off for <span><h1>MAINTENANCE</h1></span></h2>\', \'1\', 1334835773, NULL), '						
			    .'(7, \'contactus_address\', \'Contact Address\',\'\',\'\', \'&dash;\', \'1\', 1334835773, NULL), '
			    .'(8, \'contactus_gmap\', \'GMaps Location\',\'\',\'\', \'http://maps.google.com/maps?q=-6.217668,106.812992&num=1&t=m&z=18\', \'1\', 1334835773, NULL), '
			    .'(9, \'no_phone\', \'Number Phone\',\'\',\'\', \'(021) 522.3715\', \'1\', 1334835773, NULL), '
			    .'(10, \'no_fax\',  \'Number Fax\',\'\',\'\', \'(021) 522.3718\', \'1\', 1334835773, NULL), '
			    .'(11, \'title_default\', \'Website Title Default\',\'\',\'\', \'We build on solid foundation, effective, construction and visual appeal\', \'1\', NULL, NULL), '
			    .'(12, \'title_name\', \'Company Title Name\',\'\',\'\', \'PT. Default (Web Agency in Jakarta)\', \'1\', NULL, 1336118568), '	
			    .'(13, \'site_logo\', \'Site Logo\',\'\',\'\', \'logo.png\', \'1\', NULL, 1336118568), '	
			    .'(14, \'language\', \'Default Site Language\',\'\',\'\', \'en\', \'1\', NULL, 1336118568), '	
			    .'(15, \'counter\', \'Site Counter\',\'\',\'\', \'123\', \'1\', NULL, 1336118568), '
			    .'(16, \'copyright\', \'Copyright\',\'\',\'\', \'© 2012 COMPANY NAME COPYRIGHT. All Rights Reserved.\', \'1\', NULL, 1336118568), '
			    .'(17, \'site_name\', \'Site Name\',\'\',\'\', \' Default <br/> PT. Default (Web Agency in Jakarta).\', \'1\', NULL, 1336118568), '
			    .'(18, \'site_quote\', \'Quote\',\'\',\'\', \'We provide solution for your Websites\', \'1\', NULL, 1336118568), '
			    .'(19, \'site_description\', \'Website Description\',\'\',\'\', \'We provide solution for your Company Website \', \'1\', NULL, 1336118568), '						
			    .'(20, \'socmed_facebook\', \'Facebook\',\'\',\'\', \'http://facebook.com\', \'1\', NULL, 1336118568), '
			    .'(21, \'socmed_twitter\', \'Twitter\',\'\',\'\', \'http://twitter.com\', \'1\', NULL, 1336118568), '
			    .'(22, \'socmed_gplus\', \'Google Plus\',\'\',\'\', \'http://plus.google.com\', \'1\', NULL, 1336118568), '
			    .'(23, \'socmed_linkedin\', \'LinkedIn\',\'\',\'\', \'http://linkedin.com\', \'1\', NULL, 1336118568), '
			    .'(24, \'socmed_pinterest\', \'Pinterest\',\'\',\'\', \'http://pinterest.com\', \'1\', NULL, 1336118568), '
			    .'(25, \'registered_mark\', \'Registered\',\'\',\'\', \'We provide solution for your Websites\', \'1\', NULL, 1336118568),'
			    .'(26, \'google_analytics\', \'Analytics\',\'\',\'\', \'Code Snippet\', \'1\', NULL, 1336118568), '
			    .'(27, \'ext_link\', \'Ext Link\',\'\',\'\', \'http://www.apb-career.net\', \'1\', NULL, 1336118568);';

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
	
	public function getSetting($id = null){
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
	
	public function getAllSetting($status=null){
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
	
	public function setSetting($object=null){
		
		// Set Setting data
		$data = array(			
					'parameter' => $object['parameter'],
					'alias' => $object['alias'],
					'value' => $object['value'],
					'help_text' => $object['help_text'],
					'is_system' => 1,
					'added'	=> time(),	
					'status' => $object['status']
				);
		
		// Insert Setting data
		$this->db->insert($this->table, $data);
		
		// Return last insert id primary
		$insert_id = $this->db->insert_id();					
			
		// Return last insert id primary
		return $insert_id;
		
	}
	
	public function updateSetting($object=null){
		
		// Set Setting data
		$data = array(			
						'parameter' => $object['parameter'],
						'alias' => $object['alias'],
						'value' => $object['value'],
						'help_text' => $object['help_text'],
						'modified'  => time(),	
						'status' => $object['status']
					);
		
		// Update Setting data             
		$this->db->where('id', $object['id']);      

		// Return last insert id primary
		$update = $this->db->update($this->table, $data);					
			
		// Return last insert id primary
		return $update;
		
	}
	
	public function setStatus($id=null,$status=null) {
	   
	    //Get user id
	    $this->db->where('id', $id);
	    
	    //Return result
	    return $this->db->update($this->table, array('status'=>$status,'modified'=>time()));

	}
	
	public function deleteSetting($id) {
		
		// Check Setting id
		$this->db->where('id', $id);
		
		// Delete setting form database
		return $this->db->delete($this->table);
		
	}	
}
