<?php

defined('BASEPATH') or exit('Caminho Inválido');

class Empresa extends CI_Controller{

    public function __construct()
    {
        parent::__construct();

        if(!$this->ion_auth->logged_in()){

            $this->session->set_flashdata('info', ('Sessão encerrada, favor efetuar o login novamente !!!'));
            redirect('login');
        }

        if(!$this->ion_auth->is_admin()){

            $this->session->set_flashdata('error', 'ACESSO NEGADO !!!');
            redirect('home');

        }
    }

    public function index()
    {
        

		$this->form_validation->set_rules('empresa_razao_social','razão social','required|min_length[5]|max_length[145]');
		$this->form_validation->set_rules('empresa_nome_fantasia','nome fantasia','required|min_length[5]|max_length[145]');
		$this->form_validation->set_rules('empresa_cnpj','cnpj','required|exact_length[18]');
		$this->form_validation->set_rules('empresa_ie','Insc. Est.','required|min_length[5]|max_length[25]');
		$this->form_validation->set_rules('empresa_tel_fixo','','');
		$this->form_validation->set_rules('empresa_tel_movel','tel. movel','required|exact_length[15]');
		$this->form_validation->set_rules('empresa_email','','required|valid_email|max_length[100]');
		$this->form_validation->set_rules('empresa_site','site','valid_url|max_length[100]');
		$this->form_validation->set_rules('empresa_cep','','required|exact_length[9]');
		$this->form_validation->set_rules('empresa_endereco','','required|max_length[145]');
		$this->form_validation->set_rules('empresa_bairro','','required|max_length[45]');
		$this->form_validation->set_rules('empresa_numero','','required|max_length[10]');
		$this->form_validation->set_rules('empresa_cidade','cidade','required|max_length[45]');
		$this->form_validation->set_rules('empresa_estado','','required|max_length[2]');
		$this->form_validation->set_rules('empresa_obs','','max_length[500]');


        
		if ($this->form_validation->run()){

            exit('validado');

			$data = elements(
				[
					'empresa_razao_social',
					'empresa_nome_fantasia',
					'empresa_cnpj',
					'empresa_ie',
					'empresa_tel_fixo',
					'empresa_tel_movel',
					'empresa_email',
					'empresa_site',
					'empresa_cep',
					'empresa_endereco',
					'empresa_bairro',
					'empresa_numero',
					'empresa_cidade',
					'empresa_estado',
					'empresa_obs',
				], $this->input->post()
			);

			//echo '<pre>';
			//print_r($data);
			//exit();

			$data = html_escape($data);

			$this->core_model->update('empresa',$data, ['empresa_id' => 1]);

			$this->session->set_flashdata('sucesso', 'Dados atualizados com sucesso !!!');
			redirect('empresa');


		}else{

            $data = [       
                'titulo' => 'Editar dados Empresariais',    
                'styles' => [
                            //Bootstrap
                            'vendors/bootstrap/dist/css/bootstrap.min.css',
                            //fontwasome
                            'vendors/font-awesome/css/font-awesome.min.css',
                            //BProgress
                            'vendors/nprogress/nprogress.css',
                            // iCheck
                            'vendors/iCheck/skins/flat/green.css',
                            //Cuaton theme style
                            'build/css/custom.min.css',
							//Cuaton theme style fonts, breadcrumb
							'build/css/app.css',
                            ],
                    
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
                            'build/js/custom.min.js',
                            //mask
                            'vendors/mask/jquery.mask.min.js',
                            'vendors/mask/app.js',
                            ],                  
                'empresa' => $this->core_model->get_by_id('empresa',['empresa_id' => 1]),
    
            ];
    
               // echo '<pre>';
                //print_r($data['empresa']);
               // exit();

			$this->load->view('layout/header', $data);
			$this->load->view('empresa/index');
			$this->load->view('layout/footer');
		}
    }


}
