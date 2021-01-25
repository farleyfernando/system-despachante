<?php

defined('BASEPATH') or exit('Ação Inválida');

class Categorias extends CI_Controller
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
				'titulo' => 'Categorias Cadastradas',

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
				'categorias' => $this->core_model->get_all('categorias'),
			];

		$this->load->view('layout/header', $data);
		$this->load->view('categorias/index');
		$this->load->view('layout/footer');
	}

	public function add()
	{

			$this->form_validation->set_rules('categoria_nome', 'nome da categoria', 'trim|min_length[2]|max_length[145]|required|is_unique[categorias.categoria_nome]');

		if($this->form_validation->run()){

			//echo '<pre>';
			//print_r($this->input->post());
			//exit();

			$data = elements(
				[
					'categoria_nome',
					'categoria_ativa'
				], $this->input->post()
			);

			$data ['categoria_nome'] = strtoupper($this->input->post('categoria_nome'));

			$data = html_escape($data);

			$this->core_model->insert('categorias', $data);
			redirect('categorias');
		}else{
			//erro de validação

			$data = [
				'titulo' => 'Cadastrar Categorias',
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
			$this->load->view('categorias/add');
			$this->load->view('layout/footer');
		}

	}

	public function edit($categoria_id = null)
	{
		if(!$categoria_id || !$this->core_model->get_by_id('categorias', ['categoria_id' => $categoria_id])){

			$this->session->set_flashdata('info','Serviço não localizado !!!');
			redirect('categorias');
		}else{

			$this->form_validation->set_rules('categoria_nome', 'nome da categoria', 'trim|min_length[2]|max_length[145]|required|callback_nome_check');

		}

		if($this->form_validation->run()){

			//echo '<pre>';
			//print_r($this->input->post());
			//exit();

			$data = elements(
				[
					'categoria_nome',
					'categoria_ativa'
				], $this->input->post()
			);

			$data ['categoria_nome'] = strtoupper($this->input->post('categoria_nome'));

			$data = html_escape($data);

			$this->core_model->update('categorias', $data, ['categoria_id' => $categoria_id]);
			redirect('categorias');
		}else{
			//erro de validação

			$data = [
				'titulo' => 'Atualizar categoria',
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
				'categoria' => $this->core_model->get_by_id('categorias',['categoria_id' => $categoria_id]),

			];

			// echo '<pre>';
			//print_r($data['cliente']);
			// exit();

			$this->load->view('layout/header', $data);
			$this->load->view('categorias/edit');
			$this->load->view('layout/footer');
		}

	}

	public function del($categoria_id = null)
	{
		if (!$categoria_id || !$this->core_model->get_by_id('categorias', ['categoria_id' => $categoria_id])) {
			$this->session->set_flashdata('error', 'categoria não localizada !!!');
			redirect('categorias');

		} else {

			$this->core_model->delete('categorias', ['categoria_id' => $categoria_id]);
			redirect('categorias');
		}
	}

	public function nome_check($categoria_nome)
	{
		$categoria_id = $this->input->post('categoria_id');

		if ($this->core_model->get_by_id('categorias', ['categoria_nome' => $categoria_nome, 'categoria_id!=' => $categoria_id])) {
			$this->form_validation->set_message('nome_check', 'Essa categoria já existe');

			return false;
		} else {
			return true;
		}
	}
}
