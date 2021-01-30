<?php

defined('BASEPATH') or exit('Ação Inválida');

class Especies extends CI_Controller
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
				'titulo' => 'Espécies Cadastradas',

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
				'especies' => $this->core_model->get_all('especies'),
			];

		$this->load->view('layout/header', $data);
		$this->load->view('especies/index');
		$this->load->view('layout/footer');
	}

	public function add()
	{

		$this->form_validation->set_rules('especie_nome', 'nome espécie', 'trim|min_length[2]|max_length[145]|required|is_unique[especies.especie_nome]');

		if($this->form_validation->run()){

			//echo '<pre>';
			//print_r($this->input->post());
			//exit();

			$data = elements(
				[
					'especie_nome',
					'especie_ativo'
				], $this->input->post()
			);

			$data ['especie_nome'] = strtoupper($this->input->post('especie_nome'));

			$data = html_escape($data);

			$this->core_model->insert('especies', $data);
			redirect('especies');
		}else{
			//erro de validação

			$data = [
				'titulo' => 'Cadastrar Espécies',
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
			$this->load->view('especies/add');
			$this->load->view('layout/footer');
		}

	}

	public function edit($especie_id = null)
	{
		if(!$especie_id || !$this->core_model->get_by_id('especies', ['especie_id' => $especie_id])){

			$this->session->set_flashdata('info','Espécie não localizada !!!');
			redirect('especie');
		}else{

			$this->form_validation->set_rules('especie_nome', 'nome especie', 'trim|min_length[2]|max_length[145]|required|callback_nome_check');

		}

		if($this->form_validation->run()){

			//echo '<pre>';
			//print_r($this->input->post());
			//exit();

			$data = elements(
				[
					'especie_nome',
					'especie_ativo'
				], $this->input->post()
			);

			$data ['especie_nome'] = strtoupper($this->input->post('especie_nome'));

			$data = html_escape($data);

			$this->core_model->update('especies', $data, ['especie_id' => $especie_id]);
			redirect('especies');
		}else{
			//erro de validação

			$data = [
				'titulo' => 'Atualizar Espécies',
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
				'especie' => $this->core_model->get_by_id('especies',['especie_id' => $especie_id]),

			];

			// echo '<pre>';
			//print_r($data['cliente']);
			// exit();

			$this->load->view('layout/header', $data);
			$this->load->view('especies/edit');
			$this->load->view('layout/footer');
		}

	}

	public function del($especie_id = null)
	{
		if (!$especie_id || !$this->core_model->get_by_id('especies', ['especie_id' => $especie_id])) {
			$this->session->set_flashdata('error', 'Espécie não localizada !!!');
			redirect('especies');

		} else {

			$this->core_model->delete('especies', ['especie_id' => $especie_id]);
			redirect('especies');
		}
	}

	public function nome_check($especie_nome)
	{
		$especie_id = $this->input->post('especie_id');

		if ($this->core_model->get_by_id('especies', ['especie_nome' => $especie_nome, 'especie_id!=' =>
			$especie_id])) {
			$this->form_validation->set_message('nome_check', 'Essa Espécie já existe');

			return false;
		} else {
			return true;
		}
	}
}
