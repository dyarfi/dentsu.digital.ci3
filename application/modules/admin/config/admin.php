<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// Developers Name
$config['developer_name']	= 'Dentsu Digital Division'; 
$config['developer_url']	= 'http://dentsu.digital/';

// Upload PATH and URL
$config['upload_path']		= BASEPATH.'uploads/users/';
$config['upload_url']		= 'uploads/users/';

$config['gender']		= array(''=>'',1=>'Male',2=>'Female');
$config['status']		= array(''=>'',1=>'Active',2=>'Inactive');
$config['is_system']		= array(''=>'',1=>'Yes',2=>'No');
$config['enum_default']		= array(''=>'',1=>'Yes',2=>'No');

$config['default_page']		= ADMIN . 'user/view/{admin_id}';

/* End of file admin.php */

/* Location: ./application/modules/admin/config/admin.php */