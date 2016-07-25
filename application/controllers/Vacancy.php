<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vacancy extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
		// Load user related model in admin module
		$this->load->model('admin/Users');
		$this->load->model('admin/UserProfiles');

		$this->load->model('career/Careers');
		$this->load->model('career/Divisions');
					
	}
	
	public function index() {
		
		// Set main template
		$data['main'] = 'vacancy';
				
		// Set site title page with module menu
		$data['page_title'] = 'Vacancy';

		// Get career data from database
		$data['vacancies']  = $this->Careers->getAllCareer();

		// Load admin template
		$this->load->view('template/public/template', $this->load->vars($data));
		
	}
	
	public function view($name='') {
	
		// Set vacany data
		$data['vacancy'] = $this->Careers->getCareerByName($name);

		// Set main template
		$data['main'] = 'vacancy';
				
		// Set site title page with module menu
		$data['page_title'] = 'Vacancy Detail';
		
		// Load admin template
		$this->load->view('template/public/template', $this->load->vars($data));
		
	}

	public function apply($vacancy='') {
		


		print_r($this->input->post());		


		// Set main template
		$data['main'] = 'vacancy';
				
		// Set site title page with module menu
		$data['page_title'] = 'Apply Vacancy';
		
		// Load admin template
		$this->load->view('template/public/template', $this->load->vars($data));
		
	}
}

/* End of file vacancy.php */
/* Location: ./application/controllers/vacancy.php */