<?php

defined('BASEPATH') or exit('Caminho inválido');

class Pagar extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		if (!$this->ion_auth->logged_in()) {
			$this->session->set_flashdata('info', 'Sessão encerrada, favor efetuar o login novamente !!!');
			redirect('login');
		}

		$this->load->model('financeiro_model');
	}

	public function index()
	{
		$data = [
			'titulo' => 'Relação de Contas à Pagar',

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


			'contas_pagar' => $this->financeiro_model->get_all_pagar(),

		];

		//echo '<pre>';
		//print_r($data['contas_pagar']);
		//exit();

		$this->load->view('layout/header', $data);
		$this->load->view('pagar/index');
		$this->load->view('layout/footer');
	}

	public function add(){


			$this->form_validation->set_rules('conta_pagar_fornecedor_id','','required');
			$this->form_validation->set_rules('conta_pagar_data_venc','','required');
			$this->form_validation->set_rules('conta_pagar_valor','','required');
			$this->form_validation->set_rules('conta_pagar_obs','observações','max_length[100]');

			if($this->form_validation->run()){

				$data = elements([
					'conta_pagar_fornecedor_id',
					'conta_pagar_data_venc',
					'conta_pagar_valor',
					'conta_pagar_status',
					'conta_pagar_obs',
				], $this->input->post()
				);
				//verificar se foi paga
				$conta_pagar_status = $this->input->post('conta_pagar_status');

				if($conta_pagar_status == 1){
					$data['conta_pagar_data_pagamento'] = date('Y-m-d H:i:s');
				}

				$data = html_escape($data);

				$this->core_model->insert('contas_pagar', $data);
				redirect('pagar');

			}else{

				//form validation

				$data = [
					'titulo' => 'Atualizar Conta à Pagar',

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
						// stilo
						'build/css/stilo.css',
						//select2
						'vendors/select2/select2.min.css',

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
						//select2
						'vendors/select2/select2.min.js',
						'vendors/select2/app.js',
						//mask
						'vendors/mask/jquery.mask.min.js',
						'vendors/mask/app.js',
						//Custom Theme Scripts
						'build/js/custom.min.js',
					],


					'fornecedores' => $this->core_model->get_all('fornecedores'),

				];


				//echo '<pre>';
				//print_r($data['produtos']);
				//exit();

				$this->load->view('layout/header', $data);
				$this->load->view('pagar/add');
				$this->load->view('layout/footer');
			}
		}

	public function edit($conta_pagar_id = null){

		if(!$conta_pagar_id || !$this->core_model->get_by_id('contas_pagar', ['conta_pagar_id' => $conta_pagar_id])){

			$this->session->set_flashdata('error', 'Conta não localizada !!!');
			redirect('pagar');

		}else{

			$this->form_validation->set_rules('conta_pagar_fornecedor_id','','required');
			$this->form_validation->set_rules('conta_pagar_data_venc','','required');
			$this->form_validation->set_rules('conta_pagar_valor','','required');
			$this->form_validation->set_rules('conta_pagar_obs','observações','max_length[100]');

			if($this->form_validation->run()){

				$data = elements([
					'conta_pagar_fornecedor_id',
					'conta_pagar_data_venc',
					'conta_pagar_valor',
					'conta_pagar_status',
					'conta_pagar_obs',
				], $this->input->post()
				);
				//verificar se foi paga
				$conta_pagar_status = $this->input->post('conta_pagar_status');

				if($conta_pagar_status == 1){
					$data['conta_pagar_data_pagamento'] = date('Y-m-d H:i:s');
				}

				$data = html_escape($data);

				$this->core_model->update('contas_pagar', $data, ['conta_pagar_id' => $conta_pagar_id]);
				redirect('pagar');

			}else{

				//form validation

				$data = [
					'titulo' => 'Atualizar Conta à Pagar',

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
						// stilo
						'build/css/stilo.css',
						//select2
						'vendors/select2/select2.min.css',

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
						//select2
						'vendors/select2/select2.min.js',
						'vendors/select2/app.js',
						//mask
						'vendors/mask/jquery.mask.min.js',
						'vendors/mask/app.js',
						//Custom Theme Scripts
						'build/js/custom.min.js',
					],

					'conta_pagar' => $this->core_model->get_by_id('contas_pagar', ['conta_pagar_id' => $conta_pagar_id]),
					'fornecedores' => $this->core_model->get_all('fornecedores'),

				];


				//echo '<pre>';
				//print_r($data['produtos']);
				//exit();

				$this->load->view('layout/header', $data);
				$this->load->view('pagar/edit');
				$this->load->view('layout/footer');
			}
		}
	}
}
