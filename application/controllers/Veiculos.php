<?php

defined('BASEPATH') or exit('Ação Inválida');

class Veiculos extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		if (!$this->ion_auth->logged_in()) {
			$this->session->set_flashdata('info', 'Sessão encerrada, favor efetuar o login novamente !!!');
			redirect('login');
		}

		$this->load->model('veiculos_model');
	}

	public function index()
	{
		$data =
			[
				'titulo' => 'Veiculos Cadastradas',

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

				'veiculos' => $this->veiculos_model->get_all(''),
			];

		$this->load->view('layout/header', $data);
		$this->load->view('veiculos/index');
		$this->load->view('layout/footer');
	}

	public function add()
	{


			$this->form_validation->set_rules('veiculo_placa', 'placa', 'trim|min_length[7]|max_length[10]|required|is_unique[veiculos.veiculo_placa]');
			$this->form_validation->set_rules('veiculo_marca_modelo', 'marca/modelo', 'trim|max_length[100]|required');
			$this->form_validation->set_rules('veiculo_uf', 'uf', 'trim|exact_length[2]|required');
			$this->form_validation->set_rules('veiculo_ano_fab', 'ano fabricação', 'trim|exact_length[4]|required');
			$this->form_validation->set_rules('veiculo_ano_mod', 'ano modelo', 'trim|exact_length[4]|required');
			$this->form_validation->set_rules('veiculo_potencia', 'potencia', 'trim|max_length[10]');
			$this->form_validation->set_rules('veiculo_chassi', 'chassi', 'trim|max_length[20]|required|is_unique[veiculos.veiculo_chassi]');
			$this->form_validation->set_rules('veiculo_cilindros', 'n° cilindro', 'trim|max_length[5]');
			$this->form_validation->set_rules('veiculo_cilindrada', 'cilindrada', 'trim|max_length[6]');
			$this->form_validation->set_rules('veiculo_lugares', 'lugares', 'trim|max_length[2]');
			$this->form_validation->set_rules('veiculo_renavam', 'renavam', 'trim|max_length[13]|required|is_unique[veiculos.veiculo_renavam]');
			$this->form_validation->set_rules('veiculo_num_motor', 'numero motor', 'trim|max_length[10]');
			$this->form_validation->set_rules('veiculo_mun_emp', 'municipio emplac.', 'trim|max_length[45]');
			$this->form_validation->set_rules('veiculo_num_crv', 'n° crv.', 'trim|max_length[20]');
			$this->form_validation->set_rules('veiculo_num_duda', 'n° duda.', 'trim|max_length[20]');
			$this->form_validation->set_rules('veiculo_obs', 'obs.', 'trim|max_length[300]');
			$this->form_validation->set_rules('veiculo_restricao', 'restrição', 'trim|max_length[500]');




		if($this->form_validation->run()){

			//exit('validado');

			//echo '<pre>';
			//print_r($this->input->post());
			//exit();

			$data = elements(
				[
					'veiculo_placa',
					'veiculo_marca_modelo',
					'veiculo_tipo_id',
					'veiculo_uf',
					'veiculo_especie_id',
					'veiculo_cor_id',
					'veiculo_combustivel_id',
					'veiculo_fabricacao',
					'veiculo_categoria_id',
					'veiculo_ano_fab',
					'veiculo_ano_mod',
					'veiculo_potencia',
					'veiculo_chassi',
					'veiculo_cilindros',
					'veiculo_cilindrada',
					'veiculo_chassi_rem',
					'veiculo_lugares',
					'veiculo_renavam',
					'veiculo_num_motor',
					'veiculo_mun_emp',
					'veiculo_prop_id',
					'veiculo_venc_dut',
					'veiculo_num_crv',
					'veiculo_dte_crv',
					'veiculo_num_duda',
					'veiculo_obs',
					'veiculo_restricao',

				], $this->input->post()
			);

			//CONVERTER PARA LETRA MAIÚSCULA
			$data ['veiculo_placa'] = strtoupper($this->input->post('veiculo_placa'));
			$data ['veiculo_marca_modelo'] = strtoupper($this->input->post('veiculo_marca_modelo'));
			$data ['veiculo_uf'] = strtoupper($this->input->post('veiculo_uf'));
			$data ['veiculo_potencia'] = strtoupper($this->input->post('veiculo_potencia'));
			$data ['veiculo_chassi'] = strtoupper($this->input->post('veiculo_chassi'));
			$data ['veiculo_num_motor'] = strtoupper($this->input->post('veiculo_num_motor'));
			$data ['veiculo_mun_emp'] = strtoupper($this->input->post('veiculo_mun_emp'));
			$data ['veiculo_obs'] = strtoupper($this->input->post('veiculo_obs'));
			$data ['veiculo_restricao'] = strtoupper($this->input->post('veiculo_restricao'));


			$data = html_escape($data);

			//echo '<pre>';
			//print_r($data);
			//exit();

			$this->core_model->insert('veiculos', $data);
			redirect('veiculos');
		}else{
			//erro de validação

			$data = [
				'titulo' => 'Cadastrar Veículo',
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
					// stilo
					'build/css/stilo.css',
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
					//mask
					'vendors/mask/jquery.mask.min.js',
					'vendors/mask/app.js',
					//Custom Theme Scripts
					'build/js/custom.min.js',

				],

				'tipos' => $this->core_model->get_all('tipos'),
				'cores' => $this->core_model->get_all('cores'),
				'clientes' => $this->core_model->get_all('clientes', ['cliente_ativo' => 1]),
				'especies' => $this->core_model->get_all('especies'),
				'combustiveis' => $this->core_model->get_all('combustivel'),
				'categorias' => $this->core_model->get_all('categorias'),

			];

			// echo '<pre>';
			//print_r($data['cliente']);
			// exit();

			$this->load->view('layout/header', $data);
			$this->load->view('veiculos/add');
			$this->load->view('layout/footer');
		}

	}

	public function edit($veiculo_id = null)
	{
		if(!$veiculo_id || !$this->core_model->get_by_id('veiculos', ['veiculo_id' => $veiculo_id])){

			$this->session->set_flashdata('info','Veículo não localizado !!!');
			redirect('veiculos');
		}else{

			$this->form_validation->set_rules('veiculo_placa', 'placa', 'trim|min_length[7]|max_length[10]|required|callback_placa_check');
			$this->form_validation->set_rules('veiculo_marca_modelo', 'marca/modelo', 'trim|max_length[100]|required');
			$this->form_validation->set_rules('veiculo_uf', 'uf', 'trim|exact_length[2]|required');
			$this->form_validation->set_rules('veiculo_ano_fab', 'ano fabricação', 'trim|exact_length[4]|required');
			$this->form_validation->set_rules('veiculo_ano_mod', 'ano modelo', 'trim|exact_length[4]|required');
			$this->form_validation->set_rules('veiculo_potencia', 'potencia', 'trim|max_length[10]');
			$this->form_validation->set_rules('veiculo_chassi', 'chassi', 'trim|max_length[20]|required|callback_chassi_check');
			$this->form_validation->set_rules('veiculo_cilindros', 'n° cilindro', 'trim|max_length[5]');
			$this->form_validation->set_rules('veiculo_cilindrada', 'cilindrada', 'trim|max_length[6]');
			$this->form_validation->set_rules('veiculo_lugares', 'lugares', 'trim|max_length[2]');
			$this->form_validation->set_rules('veiculo_renavam', 'renavam', 'trim|max_length[13]|required|callback_renavam_check');
			$this->form_validation->set_rules('veiculo_num_motor', 'numero motor', 'trim|max_length[10]');
			$this->form_validation->set_rules('veiculo_mun_emp', 'municipio emplac.', 'trim|max_length[45]');
			$this->form_validation->set_rules('veiculo_num_crv', 'n° crv.', 'trim|max_length[20]');
			$this->form_validation->set_rules('veiculo_num_duda', 'n° duda.', 'trim|max_length[20]');
			$this->form_validation->set_rules('veiculo_obs', 'obs.', 'trim|max_length[300]');
			$this->form_validation->set_rules('veiculo_restricao', 'restrição', 'trim|max_length[500]');


		}

		if($this->form_validation->run()){

			//exit('validado');

			//echo '<pre>';
			//print_r($this->input->post());
			//exit();

			$data = elements(
				[
					'veiculo_placa',
					'veiculo_marca_modelo',
					'veiculo_tipo_id',
					'veiculo_uf',
					'veiculo_especie_id',
					'veiculo_cor_id',
					'veiculo_combustivel_id',
					'veiculo_fabricacao',
					'veiculo_categoria_id',
					'veiculo_ano_fab',
					'veiculo_ano_mod',
					'veiculo_potencia',
					'veiculo_chassi',
					'veiculo_cilindros',
					'veiculo_cilindrada',
					'veiculo_chassi_rem',
					'veiculo_lugares',
					'veiculo_renavam',
					'veiculo_num_motor',
					'veiculo_mun_emp',
					'veiculo_prop_id',
					'veiculo_venc_dut',
					'veiculo_num_crv',
					'veiculo_dte_crv',
					'veiculo_num_duda',
					'veiculo_obs',
					'veiculo_restricao',

				], $this->input->post()
			);

			//CONVERTER PARA LETRA MAIÚSCULA
			$data ['veiculo_placa'] = strtoupper($this->input->post('veiculo_placa'));
			$data ['veiculo_marca_modelo'] = strtoupper($this->input->post('veiculo_marca_modelo'));
			$data ['veiculo_uf'] = strtoupper($this->input->post('veiculo_uf'));
			$data ['veiculo_potencia'] = strtoupper($this->input->post('veiculo_potencia'));
			$data ['veiculo_chassi'] = strtoupper($this->input->post('veiculo_chassi'));
			$data ['veiculo_num_motor'] = strtoupper($this->input->post('veiculo_num_motor'));
			$data ['veiculo_mun_emp'] = strtoupper($this->input->post('veiculo_mun_emp'));
			$data ['veiculo_obs'] = strtoupper($this->input->post('veiculo_obs'));
			$data ['veiculo_restricao'] = strtoupper($this->input->post('veiculo_restricao'));


			$data = html_escape($data);

			$data_venc_dut = $this->input->post('veiculo_venc_dut');
			$data_em_crv = $this->input->post('veiculo_dte_crv');

			//verifica se foi passado a data venc dut e emissão crv
			if (!$data_venc_dut) {
				unset($data['veiculo_venc_dut']);
			}

			if (!$data_em_crv) {
				unset($data['veiculo_dte_crv']);
			}

			//echo '<pre>';
			//print_r($data);
			//exit();

			$this->core_model->update('veiculos', $data, ['veiculo_id' => $veiculo_id]);
			redirect('veiculos');
		}else{
			//erro de validação

			$data = [
				'titulo' => 'Atualizar dados veículo',
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
					// stilo
					'build/css/stilo.css',
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
					//mask
					'vendors/mask/jquery.mask.min.js',
					'vendors/mask/app.js',
					//Custom Theme Scripts
					'build/js/custom.min.js',

				],

				'veiculo' => $this->core_model->get_by_id('veiculos',['veiculo_id' => $veiculo_id]),

				'tipos' => $this->core_model->get_all('tipos'),
				'cores' => $this->core_model->get_all('cores'),
				'clientes' => $this->core_model->get_all('clientes', ['cliente_ativo' => 1]),
				'especies' => $this->core_model->get_all('especies'),
				'combustiveis' => $this->core_model->get_all('combustivel'),
				'categorias' => $this->core_model->get_all('categorias'),

			];

			// echo '<pre>';
			//print_r($data['cliente']);
			// exit();

			$this->load->view('layout/header', $data);
			$this->load->view('veiculos/edit');
			$this->load->view('layout/footer');
		}

	}

	public function placa_check($veiculo_placa)
	{
		$veiculo_id = $this->input->post('veiculo_id');

		if ($this->core_model->get_by_id('veiculos', ['veiculo_placa' => $veiculo_placa, 'veiculo_id!=' =>
			$veiculo_id])) {
			$this->form_validation->set_message('placa_check', 'Essa placa já existe');

			return false;
		} else {
			return true;
		}
	}

	public function renavam_check($veiculo_renavam)
	{
		$veiculo_id = $this->input->post('veiculo_id');

		if ($this->core_model->get_by_id('veiculos', ['veiculo_renavam' => $veiculo_renavam, 'veiculo_id!=' =>
			$veiculo_id])) {
			$this->form_validation->set_message('renavam_check', 'Esse número de renavam já existe');

			return false;
		} else {
			return true;
		}
	}

	public function chassi_check($veiculo_chassi)
	{
		$veiculo_id = $this->input->post('veiculo_id');

		if ($this->core_model->get_by_id('veiculos', ['veiculo_chassi' => $veiculo_chassi, 'veiculo_id!=' =>
			$veiculo_id])) {
			$this->form_validation->set_message('chassi_check', 'Esse número de chassi já existe');

			return false;
		} else {
			return true;
		}
	}
}
