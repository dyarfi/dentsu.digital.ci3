<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Upload extends Public_Controller {

	public function __construct() {
		parent::__construct();				
	}
	
	public function index() { }

	public function image() {
			
		// Check if the request via AJAX
		if (!$this->input->is_ajax_request()) {
			exit('No direct script access allowed');		
		}	
		
		// Show the loader on user
		// usleep(1000000);
		
		// Define initialize result
		$result['result'] = '';
		
			// Set validation config
			$config = array(
				array('field' => 'image_name', 
                      'label' => 'File', 
                      'rules' => 'trim|required|xss_clean|max_length[35]'));

			// Set rules to form validation
			$this->form_validation->set_rules($config);
			
			// Run validation for checking
			if ($this->form_validation->run() === FALSE) {
								
					if($_FILES) {					
						
						$file_hash	= md5(time() + rand(100, 999));
						$file_data	= pathinfo($_FILES['fileupload']['name']);
						$file_rename	= $file_hash.'.'.$file_data['extension'];
											
						$file_element_name = 'fileupload';
						
						$config['upload_path'] = './uploads/gallery/';
						$config['allowed_types'] = 'gif|jpg|png';
						$config['max_size'] = 1024 * 8;
						$config['encrypt_name'] = FALSE;
						$config['overwrite'] = FALSE;
						$config['file_name'] = $file_rename;

						$this->load->library('upload', $config);
						
						if (!$this->upload->do_upload($file_element_name))
						{
						  $status = 'error!';
						  $msg = $this->upload->display_errors('', '');
						}
						else
						{
							
							$data = $this->upload->data();
							$image_path = $data['full_path'];
							
							if(file_exists($image_path))
							{
								$status = "success";
								$msg = "File successfully uploaded";
							}
							else
							{
							 $status = "error";
							 $msg = "Something went wrong when saving the file, please try again.";
							}
						}
						
						$config['source_image']	= $data['full_path'];
						$config['create_thumb'] = TRUE;
						$config['maintain_ratio'] = TRUE;
						$config['width']	= 193;
						$config['height']	= 193;
                        
						$this->load->library('image_lib', $config); 

						$this->image_lib->resize();                        
		
						$thumb = $data['raw_name'].'_thumb'.$data['file_ext'];
						$result['files'][] = array(
												'name'	=>$data['file_name'],
												'size'	=>$data['file_size'],
												'type'	=>$data['image_type'],
												'url'	=> 'uploads/gallery/'. $data['file_name'],
												//'file_id'		=> $file_id,
												'thumbnailUrl'	=>'uploads/gallery/'. $thumb,
												//'deleteUrl'		=>URL::site(ADMIN).'/news/filedelete/'.$file_id,
												//'deleteType'	=>'DELETE'
												);									
					}																
				
			} else {
				
				// Unset captcha post
				// unset($_POST['captcha']); 				
					
				// Send message if account not found					
				$result['result']['code'] = 0;
				$result['result']['text'] = 'Image not Found';
			}

		// Return data esult
		$data['json'] = $result;
		
		// Load data into view		
		$this->load->view('json', $this->load->vars($data));	
		
	}
	
	// Check if upload dir exists or create one and upload file if true and return file name
	public static function _upload_to ($file, $name, $upload_path='', $file_perm = '') {
		if (!empty($upload_path)) {
			
			if ( ! is_dir($upload_path) OR ! is_writable(realpath($upload_path))) {	
				mkdir($upload_path);
			}

			// Make the filename into a complete path			
			$filename = realpath($upload_path).DIRECTORY_SEPARATOR.$file['name'];
			
			if (move_uploaded_file($file['tmp_name'], $filename))
			{
				if ($file_perm !== FALSE)
				{
					// Set permissions on filename
					chmod($filename, $file_perm);
				}

				// Return new file path
				return $filename;
			}
			
		} else {
			return false;
		}
		
	}

	public function upload_result() {
		
		// Detect if data sent by POST
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			
			// Get the data sent and replace unwanted string
			$base64img = str_replace('data:image/png;base64,', '', $this->input->post("data"));
			$base64img = str_replace('data:image/jpeg;base64,', '', $base64img);

			// Decode base64 data sent
			$return = base64_decode($base64img);
			$filename = uniqid() . '.png';

			// Generate unique image name 
			$file = 'uploads/gallery/' . $filename;

			// Default result empty variable
			$result = '';

			// Put file to upload directory
	    	if (file_put_contents($file, $return)) {

    			// Send success message 
				$result['result']['code'] = 1;
				$result['result']['text'] = 'Success';				
				$result['result']['file'] = $file;

				$object['participant_id'] 	= $this->participant->id;				
				$object['type'] 			= $this->input->get("type");
				$object['file_name']		= $filename;
				$object['status'] 			= 1;
				$object['modified'] 		= time();

				$this->Attachments->setAttachment($object);


	    	} else {

				// Send fail message
				$result['result']['code'] = 0;
				$result['result']['text'] = 'Failed';
				$result['result']['file'] = '';

	    	}

			// Return data esult
			$data['json'] = $result;
			
			// Load data into view		
			$this->load->view('json', $this->load->vars($data));	

		}	

	}
	
}

/* End of file upload.php */
/* Location: ./application/controllers/upload.php */