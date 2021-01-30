<?php

defined('BASEPATH') or exit('Ação Inválida');

class Combustivel extends CI_Controller
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
				'titulo' => 'Combustiveis Cadastrados',

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
				'combustivel' => $this->core_model->get_all('combustivel'),
			];

		$this->load->view('layout/header', $data);
		$this->load->view('combustivel/index');
		$this->load->view('layout/footer');
	}

	public function add()
	{

		$this->form_validation->set_rules('combustivel_nome', 'nome combustível', 'trim|min_length[2]|max_length[145]|required|is_unique[combustivel.combustivel_nome]');

		if($this->form_validation->run()){

			//echo '<pre>';
			//print_r($this->input->post());
			//exit();

			$data = elements(
				[
					'combustivel_nome',
					'combustivel_ativo'
				], $this->input->post()
			);

			$data ['combustivel_nome'] = strtoupper($this->input->post('combustivel_nome'));

			$data = html_escape($data);

			$this->core_model->insert('combustivel', $data);
			redirect('combustivel');
		}else{
			//erro de validação

			$data = [
				'titulo' => 'Cadastrar Combustivel',
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
			$this->load->view('combustivel/add');
			$this->load->view('layout/footer');
		}

	}

	public function edit($combustivel_id = null)
	{
		if(!$combustivel_id || !$this->core_model->get_by_id('combustivel', ['combustivel_id' => $combustivel_id])){

			$this->session->set_flashdata('info','Combustível não localizado !!!');
			redirect('combustivel');
		}else{

			$this->form_validation->set_rules('combustivel_nome', 'nome combustivel', 'trim|min_length[2]|max_length[145]|required|callback_nome_check');

		}

		if($this->form_validation->run()){

			//echo '<pre>';
			//print_r($this->input->post());
			//exit();

			$data = elements(
				[
					'combustivel_nome',
					'combustivel_ativo'
				], $this->input->post()
			);

			$data ['combustivel_nome'] = strtoupper($this->input->post('combustivel_nome'));

			$data = html_escape($data);

			$this->core_model->update('combustivel', $data, ['combustivel_id' => $combustivel_id]);
			redirect('combustivel');
		}else{
			//erro de validação

			$data = [
				'titulo' => 'Atualizar combustível',
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
				'combustivel' => $this->core_model->get_by_id('combustivel',['combustivel_id' => $combustivel_id]),

			];

			// echo '<pre>';
			//print_r($data['cliente']);
			// exit();

			$this->load->view('layout/header', $data);
			$this->load->view('combustivel/edit');
			$this->load->view('layout/footer');
		}

	}

	public function del($combustivel_id = null)
	{
		if (!$combustivel_id || !$this->core_model->get_by_id('combustivel', ['combustivel_id' => $combustivel_id])) {
			$this->session->set_flashdata('error', 'combustível não localizado !!!');
			redirect('combustivel');

		} else {

			$this->core_model->delete('combustivel', ['combustivel_id' => $combustivel_id]);
			redirect('combustivel');
		}
	}

	public function nome_check($combustivel_nome)
	{
		$combustivel_id = $this->input->post('combustivel_id');

		if ($this->core_model->get_by_id('combustivel', ['combustivel_nome' => $combustivel_nome, 'combustivel_id!=' => $combustivel_id])) {
			$this->form_validation->set_message('nome_check', 'Esse combustível já existe');

			return false;
		} else {
			return true;
		}
	}
}
