<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		
        $data = [
            'titulo' => 'Home',

            'styles' => [
                //Bootstrap
                'vendors/bootstrap/dist/css/bootstrap.min.css',
                //fontwasome
                'vendors/font-awesome/css/font-awesome.min.css',
                //BProgress
                'vendors/nprogress/nprogress.css',
                //jQuery custom content scroller
                'vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css',
                //Cuaton theme style
                'build/css/custom.min.css'],

            'scripts' => [
                //jQuery -->
                'vendors/jquery/dist/jquery.min.js',
                //Bootstrap
                'vendors/bootstrap/dist/js/bootstrap.bundle.min.js',
                //FastClick
                'vendors/fastclick/lib/fastclick.js',
                //BProgress
                'vendors/nprogress/nprogress.js',
                //jQuery custom content scroller
                'vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js', 
                //Custom Theme Scripts
                'build/js/custom.min.js'
               ],            
        ];

        $this->load->view('layout/header', $data);
        $this->load->view('home/index');
        $this->load->view('layout/footer');
    }
	}

