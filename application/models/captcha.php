<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

// Model Class Object for Captcha
class Captcha extends CI_Model {
	var $table = 'captcha';
	var $expiration = 60;
	function __construct(){
		// Call the Model constructor
		parent::__construct();
		// Set database library		
		$this->db = $this->load->database('default', true);		
		
	}
	
	function install () {
		$insert_data		= FALSE;

		if (!$this->db->table_exists($this->table)) {
			$insert_data	= TRUE;

			$sql	= 'CREATE TABLE IF NOT EXISTS `'.$this->table.'` ('
					. '`id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,'
					. '`time` INT(11) NULL, '
					. '`ip_address` VARCHAR(16) NULL,'					
					. '`word` VARCHAR(10) NULL'	
					. ') ENGINE=MYISAM';

			$this->db->query($sql);
		}
	}
	
	function image() {
		
		$captcha = array(
			'word'		=> random_string('alpha', 5),
			'img_path'	=> 'assets/static/captcha/image/',
			'img_url'	=> base_url().'assets/static/captcha/image/',
			'font_path'	=> 'assets/static/captcha/fonts/Gragsie.ttf',
			'img_width'	=> '120',
			'img_height' => '34',
			'expiration' => $this->expiration,
			'time'		 => time()
		);
				
		// Set captcha expired data
		$expire = $captcha['time'] - $captcha['expiration'];
		
		// Delete captcha from database
		$this->db->where('time <', $expire);
		$this->db->delete('captcha');
		
		// Set value to insert
		$value = array(
			'time'		=> $captcha['time'],
			'ip_address'=> $this->input->ip_address(),
			'word'		=> $captcha['word'],
		);
			
		// Insert new Captcha data to database
		$this->db->insert('captcha',$value);
					
		return create_captcha($captcha);
	}
	
	function match($word) {
		// Set expired time
		$expire = time() - $this->expiration;
		// Find expired and delete
		$this->db->where('time <',$expire);
		$this->db->delete($this->table);
		// Set query to find matches
		$query = $this->db->limit(1)->get_where($this->table, array('word'=>$word));
		
		// Check result
		if($query->num_rows() == 0) {
			// Return false if not exists
			return false;
		} else {
			// Return true if not exists
			return true;
		}
		
	}
	
}