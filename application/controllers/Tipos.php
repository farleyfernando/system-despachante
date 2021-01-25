<?php

defined('BASEPATH') or exit('Ação Inválida');

class Tipos extends CI_Controller
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
				'titulo' => 'Tipos Cadastrados',

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
				'tipos' => $this->core_model->get_all('tipos'),
			];

		$this->load->view('layout/header', $data);
		$this->load->view('tipos/index');
		$this->load->view('layout/footer');
	}

	public function add()
	{

		$this->form_validation->set_rules('tipo_nome', 'nome do tipos', 'trim|min_length[2]|max_length[145]|required|is_unique[tipos.tipo_nome]');

		if($this->form_validation->run()){

			//echo '<pre>';
			//print_r($this->input->post());
			//exit();

			$data = elements(
				[
					'tipo_nome',
					'tipo_ativo'
				], $this->input->post()
			);

			$data ['tipo_nome'] = strtoupper($this->input->post('tipo_nome'));

			$data = html_escape($data);

			$this->core_model->insert('tipos', $data);
			redirect('tipos');
		}else{
			//erro de validação

			$data = [
				'titulo' => 'Cadastrar Tipos',
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
					//Custom Theme Scripts
					'build/js/custom.min.js',
				],
			];

			// echo '<pre>';
			//print_r($data['cliente']);
			// exit();

			$this->load->view('layout/header', $data);
			$this->load->view('tipos/add');
			$this->load->view('layout/footer');
		}

	}

	public function edit($tipo_id = null)
	{
		if(!$tipo_id || !$this->core_model->get_by_id('tipos', ['tipo_id' => $tipo_id])){

			$this->session->set_flashdata('info','Serviço não localizado !!!');
			redirect('tipos');
		}else{

			$this->form_validation->set_rules('tipo_nome', 'nome da tipos', 'trim|min_length[2]|max_length[145]|required|callback_nome_check');

		}

		if($this->form_validation->run()){

			//echo '<pre>';
			//print_r($this->input->post());
			//exit();

			$data = elements(
				[
					'tipo_nome',
					'tipo_ativo'
				], $this->input->post()
			);

			$data ['tipo_nome'] = strtoupper($this->input->post('tipo_nome'));

			$data = html_escape($data);

			$this->core_model->update('tipos', $data, ['tipo_id' => $tipo_id]);
			redirect('tipos');
		}else{
			//erro de validação

			$data = [
				'titulo' => 'Atualizar Tipos',
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
					//Custom Theme Scripts
					'build/js/custom.min.js',

				],
				'tipos' => $this->core_model->get_by_id('tipos',['tipo_id' => $tipo_id]),

			];

			// echo '<pre>';
			//print_r($data['cliente']);
			// exit();

			$this->load->view('layout/header', $data);
			$this->load->view('tipos/edit');
			$this->load->view('layout/footer');
		}

	}

	public function del($tipo_id = null)
	{
		if (!$tipo_id || !$this->core_model->get_by_id('tipos', ['tipo_id' => $tipo_id])) {
			$this->session->set_flashdata('error', 'tipos não localizada !!!');
			redirect('tipos');

		} else {

			$this->core_model->delete('tipos', ['tipo_id' => $tipo_id]);
			redirect('tipos');
		}
	}

	public function nome_check($tipo_nome)
	{
		$tipo_id = $this->input->post('tipo_id');

		if ($this->core_model->get_by_id('tipos', ['tipo_nome' => $tipo_nome, 'tipo_id!=' => $tipo_id])) {
			$this->form_validation->set_message('nome_check', 'Essa tipos já existe');

			return false;
		} else {
			return true;
		}
	}
}
