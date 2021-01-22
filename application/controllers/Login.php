<?php

defined('BASEPATH') or exit('Ação Inaválida');


class Login extends CI_Controller{

    public function index(){

        $data = [       
            'titulo' => 'Login',    
            'styles' => [
                        //Bootstrap
                        'vendors/bootstrap/dist/css/bootstrap.min.css',
                        //fontwasome
                        'vendors/font-awesome/css/font-awesome.min.css',
                        //BProgress
                        'vendors/nprogress/nprogress.css',
                        // Animate
                        'vendors/animate.css/animate.min.css',
                        //Cuaton theme style
                        'build/css/custom.min.css',
                        ],

    ];

        //$this->load->view('layout/header', $data);
        $this->load->view('login/index', $data);
        
    }

    public function auth()
    {
        
        //echo '<pre>';
        //print_r($this->input->post());
        //exit;

        $identify = $this->security->xss_clean($this->input->post('email'));
        $password = $this->security->xss_clean($this->input->post('password'));
        $remember = FALSE;

        if($this->ion_auth->login($identify, $password, $remember)){
            redirect('home');
        }else{

            $user = $this->core_model->get_by_id('users', ['email' =>$identify]);

            if($this->core_model->get_by_id('users', ['email'=>$identify]) == false){

                $this->session->set_flashdata('info', 'Usuário não localizado !!!');
                redirect('login');
            }

            $this->session->set_flashdata('error', 'Usuário ou senha incorretos !!!');
            redirect('login');
        }

    }

    public function logout()
    {
        $this->ion_auth->logout();
        redirect('login');
    }
    

}