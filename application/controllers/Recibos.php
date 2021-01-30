<?php

defined('BASEPATH') or exit('Ação Inválida');

class Recibos extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		if (!$this->ion_auth->logged_in()) {
			$this->session->set_flashdata('info', 'Sessão encerrada, favor efetuar o login novamente !!!');
			redirect('login');
		}

		$this->load->model('recibo_servicos_model');

	}

	public function index()
	{
		$data =
			[
				'titulo' => 'Relação de Recibos',

				'styles' => [
					//Bootstrap
					'vendors/bootstrap/dist/css/bootstrap.min.css',
					//fontwasome
					'vendors/font-awesome/css/font-awesome.min.css',
					//BProgress
					'vendors/nprogress/nprogress.css',
					// iCheck
					'vendors/iCheck/skins/flat/green.css',
					//jQuery custom content scroller
					'vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css',
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

				'recibos_servicos' => $this->recibo_servicos_model->get_all(''),
			];

		//echo '<pre>';
		//print_r($data['ordens_servicos']);
		//exit();

		$this->load->view('layout/header', $data);
		$this->load->view('recibos/index');
		$this->load->view('layout/footer');
	}

	public function add(){

		//validação campos
		$this->form_validation->set_rules('recibo_servico_cliente_id','','required');

		$this->form_validation->set_rules('recibo_servico_veiculo_id','placa','trim|required');

		$this->form_validation->set_rules('recibo_servico_forma_pagamento_id','','required');

		if($this->form_validation->run()){

			//echo '<pre>';
			//print_r($this->input->post());
			//exit();

			$recibo_servico_valor_total = str_replace('R$', '', trim($this->input->post('recibo_servico_valor_total')));

			$data = elements([
				'recibo_servico_forma_pagamento_id',
				'recibo_servico_cliente_id',
				'recibo_servico_veiculo_id',
				'recibo_servico_valor_desconto',
				'recibo_servico_valor_total',
				'recibo_servico_obs',
				'recibo_servico_total_pago',
				'recibo_servico_troco'
			], $this->input->post()
			);


			$data['recibo_servico_valor_total'] = trim(preg_replace('/\$/','', $recibo_servico_valor_total));

			$data = html_escape($data);

			$this->core_model->insert('recibos_servicos', $data, true);

			//recuperar ID
			$id_recibo_servico = $this->session->userdata('last_id');

			//echo '<pre>';
			//print_r($id_ordem_servico);
			//exit();


			$servico_id = $this->input->post('servico_id');
			$servico_quantidade = $this->input->post('servico_quantidade');
			$servico_desconto = str_replace('%','', $this->input->post('servico_desconto'));
			$servico_preco = str_replace('R$','', $this->input->post('servico_preco'));
			$servico_item_total = str_replace('R$','', $this->input->post('servico_item_total'));

			$servico_preco = str_replace(',','.', $servico_preco);
			$servico_item_total = str_replace(',','', $servico_item_total);

			$qty_servico = count($servico_id);

			$ordem_servico_id = $this->input->post('ordem_servico_id');

			for($i = 0; $i < $qty_servico; $i++){

				$data = [
					'recibo_ts_id_recibo_servico' => $id_recibo_servico,
					'recibo_ts_id_servico' => $servico_id[$i],
					'recibo_ts_quantidade' => $servico_quantidade[$i],
					'recibo_ts_valor_unitario' => $servico_preco[$i],
					'recibo_ts_valor_desconto' => $servico_desconto[$i],
					'recibo_ts_valor_total' => $servico_item_total[$i],
					'recibo_ts_total_pago' => $this->input->post('recibo_servico_total_pago'),
					'recibo_ts_valor_troco' => $this->input->post('recibo_servico_troco'),
				];

				$data = html_escape($data);

				//echo '<pre>';
				//print_r($data);
				//exit();

				$this->core_model->insert('recibo_tem_servicos', $data);
			}

			//redirect('os');
			redirect('recibos/imprimir/'. $id_recibo_servico);

		}else{


			$data = [
				'titulo' => 'Emitir Recibos',
				'styles' => [
					//select2
					'vendors/select2/select2.min.css',
					//autocomplete
					'vendors/autocomplete/jquery-ui.css',
					'vendors/autocomplete/estilo.css',
					//Bootstrap
					'vendors/bootstrap/dist/css/bootstrap.min.css',
					//fontwasome
					'vendors/font-awesome/css/font-awesome.min.css',
					//BProgress
					'vendors/nprogress/nprogress.css',
					// iCheck
					'vendors/iCheck/skins/flat/green.css',
					//jQuery custom content scroller
					'vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css',
					//Cuaton theme style
					'build/css/custom.min.css',
					//Cuaton theme style fonts, breadcrumb
					'build/css/app.css',
					// stilo
					'build/css/stilo.css',
				],

				'scripts' => [
					//autocomplete
					'vendors/autocomplete/jquery-migrate.js', // 1°
					'vendors/calcx/jquery-calx-sample-2.2.8.min.js',
					'vendors/calcx/os.js',
					'vendors/select2/select2.min.js',
					'vendors/select2/app.js',
					//jQuery -->
					'vendors/jquery/dist/jquery.min.js',
					'vendors/autocomplete/jquery-ui.js', // ultimo na sequencia
					//mask
					'vendors/mask/jquery.mask.min.js',
					'vendors/mask/app.js',
					//troco
					'src/js/troco.js',
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

				'clientes' => $this->core_model->get_all('clientes', ['cliente_ativo' => 1]),

				'veiculos' => $this->core_model->get_all('veiculos'),

				'formas_pagamentos' => $this->core_model->get_all('formas_pagamentos', ['forma_pagamento_ativa' => 1]),


			];


			//echo '<pre>';
			//print_r($data['veiculos']);
			//exit();

			$this->load->view('layout/header', $data);
			$this->load->view('recibos/add');
			$this->load->view('layout/footer');
		}
	}

	public function edit($recibo_servico_id = null){

		if(!$recibo_servico_id || !$this->core_model->get_by_id('recibos_servicos', ['recibo_servico_id' =>
				$recibo_servico_id])){
			$this->session->set_flashdata('error', 'Recibo não localizado !!!');
			redirect('recibos');

		}else{
			//validação campos
			$this->form_validation->set_rules('recibo_servico_cliente_id','','required');

			$this->form_validation->set_rules('recibo_servico_veiculo_id','placa','trim|required');

			$this->form_validation->set_rules('recibo_servico_forma_pagamento_id','','required');

			if($this->form_validation->run()){

				//echo '<pre>';
				//print_r($this->input->post());
				//exit();

				$recibo_servico_valor_total = str_replace('R$', '', trim($this->input->post
				('recibo_servico_valor_total')));

				$data = elements([
					'recibo_servico_forma_pagamento_id',
					'recibo_servico_cliente_id',
					'recibo_servico_veiculo_id',
					'recibo_servico_valor_desconto',
					'recibo_servico_valor_total',
					'recibo_servico_obs',
					'recibo_servico_total_pago',
					'recibo_servico_troco'
				], $this->input->post()
				);


				$data['recibo_servico_valor_total'] = trim(preg_replace('/\$/','', $recibo_servico_valor_total));

				$data = html_escape($data);

				$this->core_model->update('recibos_servicos', $data, ['recibo_servico_id' => $recibo_servico_id]);

				//deletando de ordem tem serviços os serviços antigos da ordem editada
				$this->recibo_servicos_model->delete_old_services($recibo_servico_id);

				$servico_id = $this->input->post('servico_id');
				$servico_quantidade = $this->input->post('servico_quantidade');
				$servico_desconto = str_replace('%','', $this->input->post('servico_desconto'));
				$servico_preco = str_replace('R$','', $this->input->post('servico_preco'));
				$servico_item_total = str_replace('R$','', $this->input->post('servico_item_total'));

				$servico_preco = str_replace(',','.', $servico_preco);
				$servico_item_total = str_replace(',','', $servico_item_total);

				$qty_servico = count($servico_id);

				$ordem_servico_id = $this->input->post('recibo_servico_id');

				for($i = 0; $i < $qty_servico; $i++){

					$data = [
						'recibo_ts_id_recibo_servico' => $ordem_servico_id,
						'recibo_ts_id_servico' => $servico_id[$i],
						'recibo_ts_quantidade' => $servico_quantidade[$i],
						'recibo_ts_valor_unitario' => $servico_preco[$i],
						'recibo_ts_valor_desconto' => $servico_desconto[$i],
						'recibo_ts_valor_total' => $servico_item_total[$i],
						'recibo_ts_total_pago' => $this->input->post('recibo_servico_total_pago'),
						'recibo_ts_valor_troco' => $this->input->post('recibo_servico_troco'),
					];

					$data = html_escape($data);

					$this->core_model->insert('recibo_tem_servicos', $data);

				}

				//redirect('os');
				redirect('recibos/imprimir/'. $recibo_servico_id);

			}else{


				$data = [
					'titulo' => 'Editar Recibos',
					'styles' => [
						//select2
						'vendors/select2/select2.min.css',
						//autocomplete
						'vendors/autocomplete/jquery-ui.css',
						'vendors/autocomplete/estilo.css',
						//Bootstrap
						'vendors/bootstrap/dist/css/bootstrap.min.css',
						//fontwasome
						'vendors/font-awesome/css/font-awesome.min.css',
						//BProgress
						'vendors/nprogress/nprogress.css',
						// iCheck
						'vendors/iCheck/skins/flat/green.css',
						//jQuery custom content scroller
						'vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css',
						//Cuaton theme style
						'build/css/custom.min.css',
						//Cuaton theme style fonts, breadcrumb
						'build/css/app.css',
						// stilo
						'build/css/stilo.css',
					],

					'scripts' => [

						//autocomplete
						'vendors/autocomplete/jquery-migrate.js', // 1°
						'vendors/calcx/jquery-calx-sample-2.2.8.min.js',
						'vendors/calcx/os.js',
						'vendors/select2/select2.min.js',
						'vendors/select2/app.js',
						//jQuery -->
						'vendors/jquery/dist/jquery.min.js',
						'vendors/autocomplete/jquery-ui.js', // ultimo na sequencia
						//mask
						'vendors/mask/jquery.mask.min.js',
						'vendors/mask/app.js',
						//troco
						'src/js/troco.js',
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

					'clientes' => $this->core_model->get_all('clientes', ['cliente_ativo' => 1]),

					'veiculos' => $this->core_model->get_all('veiculos'),

					'formas_pagamentos' => $this->core_model->get_all('formas_pagamentos', ['forma_pagamento_ativa' => 1]),

					'recibo_tem_servicos' => $this->recibo_servicos_model->get_all_recibos_by_recibo
					($recibo_servico_id),

				];

				$recibo_servico = $data['recibo_servico'] = $this->recibo_servicos_model->get_by_id
				($recibo_servico_id);

				//echo '<pre>';
				//print_r($recibo_servico);
				//exit();

				$this->load->view('layout/header', $data);
				$this->load->view('recibos/edit');
				$this->load->view('layout/footer');
			}
		}
	}

	public function del($recibo_servico_id = null){

		if(!$recibo_servico_id || !$this->core_model->get_by_id('recibos_servicos', ['recibo_servico_id' =>
				$recibo_servico_id])){
			$this->session->set_flashdata('error', 'Recibo não localizado !!!');
			redirect('recibos');
		}

		$this->core_model->delete('recibos_servicos', ['recibo_servico_id' => $recibo_servico_id]);
		redirect('recibos');

	}

	public function imprimir($recibo_servico_id = null){

		if(!$recibo_servico_id || !$this->core_model->get_by_id('recibos_servicos', ['recibo_servico_id' =>
				$recibo_servico_id])){
			$this->session->set_flashdata('error', 'Recibo não localizado !!!');
			redirect('recibos');

		}else{

			$data = [

				'titulo' => 'Escolha uma opção',

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
					'build/js/custom.min.js'
				],

				'recibo_servico' => $this->core_model->get_by_id('recibos_servicos', ['recibo_servico_id' =>
					$recibo_servico_id]),

				//enviar dados da ordem
			];

			$this->load->view('layout/header', $data);
			$this->load->view('recibos/imprimir');
			$this->load->view('layout/footer');

		}

	}

	public function imprimirA4($recibo_servico_id = null)
	{
		if(!$recibo_servico_id || !$this->core_model->get_by_id('recibos_servicos', ['recibo_servico_id' =>
				$recibo_servico_id])){
			$this->session->set_flashdata('error', 'Recibo não localizado !!!');
			redirect('recibos');
		}

		$this->data['titulo'] = 'Impressão Recibo';
		$this->data['custom_error'] = '';
		$this->data['empresa'] = $this->core_model->get_by_id('empresa', ['empresa_id' => 1]);
		$this->data['recibo_servico'] = $this->recibo_servicos_model->get_by_id($recibo_servico_id);
		$this->data['servicos_recibo'] = $this->recibo_servicos_model->get_all_recibos($recibo_servico_id);
		$this->data['valor_final_recibo'] = $this->recibo_servicos_model->get_valor_final_recibo($recibo_servico_id);

		$this->load->view('recibos/imprimirOs', $this->data);


		//echo '<pre>';
		//print_r($this->data['ordem_servico']);
		//exit();

	}
}
