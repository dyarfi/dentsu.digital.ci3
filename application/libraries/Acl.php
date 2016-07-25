<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Acl extends CI_Controller {
		
	private $_ci;
	
	public function __construct () {

	    $this->_ci 	=& get_instance();

	    $this->_ci->load->helper('url');
	    $this->_ci->load->library('session');
		
		//if (strpos($this->_ci->session->userdata('prev_url'), ADMIN) !== FALSE 
			    //&& $this->_ci->session->userdata('prev_url') != $this->_ci->session->userdata('curr_url')) {
		    // Set Previous URL to current URL
		    //$this->_ci->session->set_userdata('prev_url', $this->_ci->session->userdata('curr_url'));
	    //} else {
		    // Set current URL from current url
		    //$this->_ci->session->set_userdata('curr_url', $this->_ci->uri->uri_string());
	    //}

	    // Set previous URL from previous url session		
	    //$this->previous_url	= $this->_ci->session->userdata('prev_url');
																			
	}
	/**
	* Load the current users data
	*
	* @access	public
	* @param	NULL (session)
	* @return	array object
	*/		
	public function user() {
	
	    $user		= !empty($this->_ci->session->userdata['user_session']) ? $this->_ci->session->userdata['user_session'] : '';
		
		return $user;
	}

	/**
	* Load the current users available module list
	*
	* @access	public
	* @param	NULL (session)
	* @return	array
	*/	
	public function admin_system_modules () {

	    if ($this->user === FALSE) {
		    return array();
	    }	

	    // ------- If User is Login set available data --- start
	    if ($this->user !== '') {
		    //$this->userhistory		= Model_UserHistory::instance();
		    $this->module_list			= json_decode($this->_ci->session->userdata('module_list'),TRUE);
		    $this->module_function_list	= json_decode($this->_ci->session->userdata('module_function_list'),TRUE);
	    }

	    $modules				= array();

	    // Check admin url
	    if (strstr($this->_ci->uri->uri_string, ADMIN) != '') {	
		    // Get module listings
		    $modules	= $this->module_list;			
	    }


	    return $modules;		
	}
	
	/**
	* Destroy the current session
	*
	* @access	public
	* @param	NULL (session)
	* @return	TRUE/FALSE
	*/	
	public function session_destroy () {
		
		//Destroy user session		
	    $this->_ci->session->unset_userdata('module_list');
	    $this->_ci->session->unset_userdata('module_function_list');
	    $this->_ci->session->unset_userdata('user_data');		
	    $this->_ci->session->unset_userdata('user_session');

	    return ($this->_ci->session->sess_destroy());
	}
	
}

