<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if(!$this->ion_auth->logged_in()){
            //$this->session->set_flashdata('info', 'Sessão encerrada, favor efetuar o login novamente !!!');
            redirect('login');
        } 
    }

	
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

