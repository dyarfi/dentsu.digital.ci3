<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
if ( ! function_exists('load_css')) {
	function load_css($filename) {
		 return "<link rel='stylesheet' type='text/css' href='http://". $_SERVER['HTTP_HOST']."/css/".$filename.".php' />";
	}	
}

/*admin -- UNCTION */
if ( ! function_exists('admin_theme')) {
	function admin_theme() { 
		 return base_url(); 
	}	
}

/**************/
if ( ! function_exists('load_css_type')) {
	function load_css_type($filename) { 
		return "<link rel='stylesheet' type='text/css' href='http://". $_SERVER['HTTP_HOST']."/css/".$filename.".css' />";
	}
}

if ( ! function_exists('css_get_admin')) {
	function css_get_admin() {      	
        return base_url()."localized/";
	}
}

if(! function_exists('security_check_login')) {
	function security_check_login() {
		$ci=& get_instance();
		if($ci->session->userdata('user_name')) {

		} else {
			redirect('__admin_login');		
			exit;
		}  
	}
}

if (! function_exists('login_cek')) {	
	function login_cek() {
		$ci=& get_instance();
  		if($ci->session->userdata('user_name')!='')
		{
			return 1;
		} else {
			return 0; 
		}
		//return $slug;
	}
	
	if ( ! function_exists('user_logout')) {
		function user_logout() {
				$ci=& get_instance();
				$ci->session->sess_destroy();
				redirect('__admin_login');
				exit;
			//return $slug;
		}
	}
}
?>