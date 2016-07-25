<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Colorscanner extends Admin_Controller {

    /**
     * Index Colorscanner for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -  
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in 
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
	
    public function __construct() {
            parent::__construct();
			
            // Load Colorscanners model
            $this->load->model('Colors');            
            $this->load->model('Colorpersonals');
            $this->load->model('Colorcontents');
			
            // Load Colorscanners model
            //$this->load->model('Colorscanners');

            // Load Grocery CRUD
            //$this->load->library('grocery_CRUD');
			
			// Load QR Code Library
			//$this->load->library('QRGenerator');
			
			// Load CI Helpers
			//$this->load->helper('string');
			
			// Generate serial first
			//$this->serial = 'qr-'.random_string('alnum', 16);
    }
	
    public function index() {
		
        
		// Load js color tracking 
		$data['js_files'] = array(
            //base_url('assets/admin/plugins/tracking.js/platform.js'),
            //base_url('assets/admin/plugins/tracking.js/polymer.js'),            
            base_url('assets/admin/plugins/tracking.js/tracking-min.js')        
        );
		$img = base_url("assets/admin/img/works/img5.jpg");
        // Load 
        $data['js_inline'] = "
        
        var canvas = document.querySelector('canvas');
            canvas.addEventListener('track', function(event) {
              event.detail.data.forEach(function(rect) {
                plotRectangle(canvas, rect);
              });
            });
            //window.addEventListener('polymer-ready', function(event) {
              // Waits the image to be loaded into the canvas.
              tracking.Canvas.loadImage(canvas, '".$img."', 0, 0, 552, 386, function() {
                //canvas.trackerTask.stop().run();
              });
            //});
        
        window.onload = function() {
              var img = document.getElementById('img');
              var demoContainer = document.querySelector('.demo-container');

              var tracker = new tracking.ColorTracker(['magenta', 'cyan', 'yellow']);

              tracker.on('track', function(event) {
                event.data.forEach(function(rect) {
                  window.plot(rect.x, rect.y, rect.width, rect.height, rect.color);
                });
              });

              tracking.track('#img', tracker);

              window.plot = function(x, y, w, h, color) {
                var rect = document.createElement('div');
                document.querySelector('.demo-container').appendChild(rect);
                rect.classList.add('rect');
                rect.style.border = '2px solid ' + color;
                rect.style.width = w + 'px';
                rect.style.height = h + 'px';
                rect.style.left = (img.offsetLeft + x) + 'px';
                rect.style.top = (img.offsetTop + y) + 'px';
              };
            };

            function plotRectangle(el, rect, opt_div) {
              var div = opt_div || document.createElement('div');
              div.style.position = 'absolute';
              div.style.border = '2px solid ' + (rect.color || 'magenta');
              div.style.width = rect.width + 'px';
              div.style.height = rect.height + 'px';
              div.style.left = el.offsetLeft + rect.x + 'px';
              div.style.top = el.offsetTop + rect.y + 'px';
              document.body.appendChild(div);
              return div;
            }
        ";
		
		// Set main template
		$data['main'] = 'color/colorscanner_index';

		// Set module with URL request 
		$data['module_title'] = $this->module;

		// Set admin title page with module menu
		$data['page_title'] = $this->module_menu;

		// Load admin template
		$this->load->view('template/admin/template', $this->load->vars($data));
    }
    	
}

/* End of file Colorscanner.php */
/* Location: ./application/module/Colorscanner/controllers/Colorscanner.php */