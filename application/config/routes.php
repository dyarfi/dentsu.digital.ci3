<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

/*
| -------------------------------------------------------------------------
| MODULE ADMIN PANEL ROUTING - [START]
| ------------------------------------------------------------------------- 
*/

$admin = (ADMIN) ? str_replace('/', '', ADMIN) : '';

$route[$admin]						= "admin/authenticate";
$route[$admin.'/authenticate']		= "admin/authenticate/index";
$route[$admin.'/authenticate/(:any)']	= "admin/authenticate/$1";

/***** Administrator module menu mandatory [start] *****/
$route[$admin.'/dashboard/(.+)']	= 'admin/dashboard/$1';
$route[$admin.'/user/(.+)']			= 'admin/user/$1/$2';
$route[$admin.'/usergroup/(.+)']	= 'admin/usergroup/$1/$2';
$route[$admin.'/language/(.+)']		= 'admin/language/$1/$2';
$route[$admin.'/modulelist/(:any)']	= 'admin/modulelist/$1';
$route[$admin.'/setting/(.+)']		= 'admin/setting/$1/$2'; 
$route[$admin.'/serverlog/(.+)']	= 'admin/serverlog/$1/$2';
/***** Administrator module menu mandatory [end] *****/

$route[$admin.'/career/(.+)']		= 'career/$1/$2';
$route[$admin.'/division/(.+)']	= 'career/division/$1/$2';
$route[$admin.'/applicant/(.+)']	= 'career/applicant/$1/$2';
$route[$admin.'/employee/(.+)']	= 'career/employee/$1/$2';

$route[$admin.'/page/(.+)']		= 'page/$1/$2';
$route[$admin.'/pagemenu/(.+)']	= 'page/pagemenu/$1/$2';

$route[$admin.'/qrcode/(.+)']			= 'qrcode/$1/$2';
$route[$admin.'/qrcodescanner/(.+)']	= 'qrcode/qrcodescanner/$1/$2';

$route[$admin.'/questionnaire/(.+)']		= 'questionnaire/$1/$2';
$route[$admin.'/question/(.+)']			= 'questionnaire/question/$1/$2';
$route[$admin.'/questionrule/(.+)']		= 'questionnaire/questionrule/$1/$2';
$route[$admin.'/questionuseranswer/(.+)']	= 'questionnaire/questionuseranswer/$1/$2';

// Participant and Attachment Routes
$route[$admin.'/participant/(.+)']			= 'participant/$1/$2';
$route[$admin.'/participant_answer/(.+)']		= 'participant/participant_answer/$1/$2';

// Color
$route[$admin.'/color/(.+)']			= 'color/$1/$2';
$route[$admin.'/colorscanner/(.+)']	= 'color/colorscanner/$1/$2';
$route[$admin.'/colorcontent/(.+)']	= 'color/colorcontent/$1/$2';
$route[$admin.'/colorpersonal/(.+)']	= 'color/colorpersonal/$1/$2';

// Participant and Attachment Routes
$route[$admin.'/participant/(.+)']	= 'participant/$1/$2';
$route[$admin.'/attachment/(.+)']		= 'participant/attachment/$1/$2';

//$route[$admin.'/(:any)'] = '$1';

/*
| -------------------------------------------------------------------------
| MODULE ADMIN PANEL ROUTING - [END]
| ------------------------------------------------------------------------- 
*/

//$route['default_controller'] = 'home';
$route['default_controller'] = 'welcome';
//$route['(:any)']			 = 'home/menu/$1';
//$route['(:any)/page/(:any)'] = 'home/page/$1/$2';
$route['download/(:num)']	 = 'download';
$route['404_override']		 = '';

/* End of file routes.php */
/* Location: ./application/config/routes.php */