<?php

defined('BASEPATH') or exit('Caminho inválido');

class Formas_pagamentos extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!$this->ion_auth->logged_in()) {
            $this->session->set_flashdata('info', 'Sessão encerrada, favor efetuar o login novamente !!!');
            redirect('login');
        }

    }

    public function index()
    {
		$data =
			[
				'titulo' => 'Formas Pgto Cadastradas',

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
					//DataTable
					'vendors/datatables.net-bs/css/dataTables.bootstrap.min.css',
					'vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css',
					'vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css',
					'vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css',
					'vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css'
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
					//DataTable
					'vendors/datatables.net/js/jquery.dataTables.min.js',
					'vendors/datatables.net-bs/js/dataTables.bootstrap.min.js',
					'vendors/datatables.net/js/app.js',
					'vendors/datatables.net-responsive/js/dataTables.responsive.min.js',
					'vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js',

					//Custom Theme Scripts
					'build/js/custom.min.js',
				],

            'formas_pagamentos' => $this->core_model->get_all('formas_pagamentos'),
        ];

       // echo '<pre>';
       // print_r($data['contas_pagar']);
       // exit();

        $this->load->view('layout/header', $data);
        $this->load->view('formas_pagamentos/index');
        $this->load->view('layout/footer');
    }

	public function add(){



			$this->form_validation->set_rules('forma_pagamento_nome', 'nome forma pgto', 'trim|required|min_length[4]|max_length[45]|is_unique[formas_pagamentos.forma_pagamento_nome]');


			if ($this->form_validation->run()) {


				$data = elements(
					[
						'forma_pagamento_nome',
						'forma_pagamento_ativa',
						'forma_pagamento_aceita_parc',
					], $this->input->post()
				);

				$data ['forma_pagamento_nome'] = strtoupper($this->input->post('forma_pagamento_nome'));

				$data = html_escape($data);

				$this->core_model->insert('formas_pagamentos', $data);
				redirect('pag');


			}else{

				$data =
					[
						'titulo' => 'Cadastrar Formas Pgto',

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
							//stilo css
							'build/css/stilo.css',

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
						],

					];

				// echo '<pre>';
				// print_r($data['contas_pagar']);
				// exit();

				$this->load->view('layout/header', $data);
				$this->load->view('formas_pagamentos/add');
				$this->load->view('layout/footer');

			}
		}


    public function edit($forma_pagamento_id =null){

        if(!$forma_pagamento_id || !$this->core_model->get_by_id('formas_pagamentos', ['forma_pagamento_id' => $forma_pagamento_id])){

            $this->session->set_flashdata('error', 'Forma de pagamento não localizada');
            redirect('modulo');

        }else{

            $this->form_validation->set_rules('forma_pagamento_nome', 'nome forma pgto', 'trim|required|min_length[4]|max_length[45]|callback_forma_check');
            

            if ($this->form_validation->run()) {

                $forma_pagamento_ativa = $this->input->post('forma_pagamento_ativa');

                //verificação para o modulo vendas 
                if($this->db->table_exists('vendas')){

                    if($forma_pagamento_ativa == 0 && $this->core_model->get_by_id('vendas', ['venda_forma_pagamento_id' => $forma_pagamento_id, 'venda_status' => 0])){
                        $this->session->set_flashdata('info', 'Solicitação não atendida, forma de pagemento sendo utilizada em Vendas !!!');
                        redirect('modulo');
                    }
                }

                //verificação para o modulo vendas 
                if($this->db->table_exists('ordem_servicos')){

                    if($forma_pagamento_ativa == 0 && $this->core_model->get_by_id('ordem_servicos', ['ordem_servicos_forma_pagamento_id' => $forma_pagamento_id, 'ordem_servicos_status' => 0])){
                        $this->session->set_flashdata('info', 'Solicitação não atendida, forma de pagemento sendo utilizada em Ordem de serviços !!!');
                        redirect('modulo');
                    }
                }

                $data = elements(
                    [
                        'forma_pagamento_nome',                    
                        'forma_pagamento_ativa',
                        'forma_pagamento_aceita_parc',
                    ], $this->input->post()
                );

				$data ['forma_pagamento_nome'] = strtoupper($this->input->post('forma_pagamento_nome'));

                $data = html_escape($data);
                   
                $this->core_model->update('formas_pagamentos', $data, ['forma_pagamento_id' => $forma_pagamento_id]);
                redirect('pag');


            }else{

				$data =
					[
						'titulo' => 'Formas Pgto Cadastradas',

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
							//stilo css
							'build/css/stilo.css',

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
						],

                    'forma_pagamento' => $this->core_model->get_by_id('formas_pagamentos', ['forma_pagamento_id' => $forma_pagamento_id])
                ];
        
               // echo '<pre>';
               // print_r($data['contas_pagar']);
               // exit();
        
                $this->load->view('layout/header', $data);
                $this->load->view('formas_pagamentos/edit');
                $this->load->view('layout/footer');

            }          
        }
    }

    public function del($forma_pagamento_id = null)
    {
        if (!$forma_pagamento_id || !$this->core_model->get_by_id('formas_pagamentos', ['forma_pagamento_id' => $forma_pagamento_id])) {
            $this->session->set_flashdata('error', 'Forma de pagamento não localizada !!!');
            redirect('pag');
            
        }elseif ($this->core_model->get_by_id('formas_pagamentos', ['forma_pagamento_id' => $forma_pagamento_id, 'forma_pagamento_ativa' => 1])) {
            $this->session->set_flashdata('info', 'Solicitação não atendida, forma de pagamento ativa !!!');
            redirect('pag');
            
        }else{

            $this->core_model->delete('formas_pagamentos', ['forma_pagamento_id' => $forma_pagamento_id]);
            redirect('pag');
        } 
     
    }

    public function forma_check($forma_pagamento_nome)
    {
        $forma_pagamento_id = $this->input->post('forma_pagamento_id');

        if ($this->core_model->get_by_id('formas_pagamentos', ['forma_pagamento_nome' => $forma_pagamento_nome, 'forma_pagamento_id!=' => $forma_pagamento_id])) {
            $this->form_validation->set_message('forma_check', 'Essa forma de pagamento já existe');

            return false;
        } else {
            return true;
        }
    }
}
