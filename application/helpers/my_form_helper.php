<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if ( ! function_exists('create_slug'))
{
	function create_slug($string) {
		//Unwanted:  {UPPERCASE} ; / ? : @ & = + $ , . ! ~ * ' ( )
		$string = strtolower($string);
		//Strip any unwanted characters
		$string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
		//Clean multiple dashes or whitespaces
		$string = preg_replace("/[\s-]+/", " ", $string);
		//Convert whitespaces and underscore to dash
		$string = preg_replace("/[\s_]/", "-", $string);
		return $string;
	}
}


if ( ! function_exists('get_input_admin'))
{
	function get_input_admin($code){
  	$string="
	 <div class=\"control-group\">
     <label class=\"control-label\" for=\"input\">".$code['title']."</label>
                <div class=\"controls\">
               <input type=\"".$code['type']."\" class=\"".$code['class']."\" id=\"".$code['id_']."\" name=\"".$code['name']."\">
                </div>
                </div>
	";
   	echo $string;
	}
}

if ( ! function_exists('get_date_admin'))
{
	function get_date_admin($code){
		$today = date("d/m/Y");  
		//echo $today;exit;
		$string=" 
		<div class=\"control-group\">
                <label class=\"control-label\" for=\"input\">".$code['title']."</label>
				<div class=\"controls\">
				<div class=\"input-append\">
				<input class=\"datepicker input-small\" value=\"".$today."\" type=\"".$code['type']."\" name=\"".$code['name']."\"><span class=\"add-on\"><i class=\"awe-calendar\"></i></span>
				</div>
				</div>
				</div>";
				echo $string;
	}
}

if ( ! function_exists('get_textarea_admin'))
{
	function get_textarea_admin($code){
	$string="  <div class=\"control-group\">
                <label class=\"control-label\" for=\"input\">".$code['title']."</label>
                <div class=\"controls\">
         <textarea class=\"input-xxlarge\" id=\"textarea\" name=\"".$code['name']."\" rows=\"".$code['rows']."\"></textarea>
                </div>
                </div>";
	echo $string;
	}
}

if ( ! function_exists('get_wywisg_admin'))
{
	function get_wywisg_admin($code){
		$string="<div class=\"control-group\">  <label class=\"control-label\" for=\"input\">".$code['title']."</label>
					<div class=\"controls\">
						<textarea id=\"".$code['name']."\" class=\"wysihtml5\" name=\"".$code['name']."\" placeholder=\"".$code['opening']."\" rows=\"".$code['rows']."\"></textarea>
					</div>
				</div>   ";
		echo $string;
	}
	
}