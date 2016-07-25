<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('get_login_fb')) {
	
	function get_login_fb() {
		$user_profile=array();
		$ci=& get_instance();
		$user = $ci->facebook->getUser();
		//$user = $this->facebook->getUser();
		if ($user) {
		  try {
			$user_profile = $ci->facebook->api('/me');

		  } catch (FacebookApiException $e) {
			//error_log($e);
			//print('Error: ' . $e);
			return $user_profile;

		  }
		}
		return $user_profile;
//$naitik = $ci->facebook->api('/naitik');
		/*
		$data['user_profile']=array();
		$data_user_=array();
	
	if($user) {
          try {
                $data['user_profile'] = $this->facebook->api('/me');
				return $data['user_profile'];
            } catch (FacebookApiException $e) {
                $user = null;
				return $data['user_profile'];
            }
        }*/

	}
		
	/*check LIKE */
	if ( ! function_exists('get_like_fb'))
	{
		function get_like_fb()
		{
			$user_profile=array();
			$ci=& get_instance();
			$user = $ci->facebook->getUser();
		
			if ($user) {
 				 try {
					 $signed_request = $ci->facebook->getSignedRequest();
						//$liked = $signed_request["page"]["liked"];
    					//$user_profile = $ci->facebook->api('/me/like/151977074843952');
	
  					} catch (FacebookApiException $e) {
    
   					 return $signed_request;
	
  							}
			}
		}


	}
	/********* LIKE **********/
	
		
if ( ! function_exists('create_slug')) {
	function create_slug($string){
		$slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
		return $slug;
	}
}

if ( ! function_exists('get_template'))
{
	function get_template(){
	   $slug=base_url()."temp/organon/";
	   return $slug;
	}
}

//===============//

if ( ! function_exists('login_cek')) {
	
	function login_cek(){
		$ci=& get_instance();
		if($ci->session->userdata('user_name')) {
		
		} else {
			redirect('_admin_login');		
			exit;
		}
		//return $slug;
	}
}
//===============//

//===============//
if ( ! function_exists('user_logout'))
{
	
	function user_logout(){
		$ci=& get_instance();
		$ci->session->sess_destroy();
		redirect('_admin_login');
		
		exit;	
		//return $slug;
	}
}
//===============//

	if ( ! function_exists('getOriginal')) {
		function getOriginal($url_string) {
			// $url_parts = explode("/",$url_string);
			 //$url_title = $url_parts[1];
			 $title_parts = array_map("ucfirst",
					explode("_",$url_string));
			 return implode(" ",$title_parts);
		 }
	}

	if ( ! function_exists('get_js_date')) {
		function get_js_date() {

			$sluga=base_url()."temp/organon/";
			$string =  "<script src=\"".$sluga."js/plugins/datepicker/bootstrap-datepicker.js\"></script>";
			$string.="<script>
					$(document).ready(function() {
						$('.datepicker').datepicker();
						});
						</script>";
			return $string;
		}
	}
}