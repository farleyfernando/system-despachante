<?php

defined('BASEPATH') or exit('Ação Inválida');

class Cores extends CI_Controller
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
				'titulo' => 'Cores Cadastrados',

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
				'cores' => $this->core_model->get_all('cores'),
			];

		$this->load->view('layout/header', $data);
		$this->load->view('cores/index');
		$this->load->view('layout/footer');
	}

	public function add()
	{

			$this->form_validation->set_rules('cor_nome', 'nome do cor', 'trim|min_length[2]|max_length[145]|required|is_unique[cores.cor_nome]');

		if($this->form_validation->run()){

			//echo '<pre>';
			//print_r($this->input->post());
			//exit();

			$data = elements(
				[
					'cor_nome',
					'cor_ativo'
				], $this->input->post()
			);

			$data ['cor_nome'] = strtoupper($this->input->post('cor_nome'));

			$data = html_escape($data);

			$this->core_model->insert('cores', $data);
			redirect('cores');
		}else{
			//erro de validação

			$data = [
				'titulo' => 'Cadastrar Cores',
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
			$this->load->view('cores/add');
			$this->load->view('layout/footer');
		}

	}

	public function edit($cor_id = null)
	{
		if(!$cor_id || !$this->core_model->get_by_id('cores', ['cor_id' => $cor_id])){

			$this->session->set_flashdata('info','Serviço não localizado !!!');
			redirect('cores');
		}else{

			$this->form_validation->set_rules('cor_nome', 'nome da cor', 'trim|min_length[2]|max_length[145]|required|callback_nome_check');

		}

		if($this->form_validation->run()){

			//echo '<pre>';
			//print_r($this->input->post());
			//exit();

			$data = elements(
				[
					'cor_nome',
					'cor_ativo'
				], $this->input->post()
			);

			$data ['cor_nome'] = strtoupper($this->input->post('cor_nome'));

			$data = html_escape($data);

			$this->core_model->update('cores', $data, ['cor_id' => $cor_id]);
			redirect('cores');
		}else{
			//erro de validação

			$data = [
				'titulo' => 'Atualizar cor',
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
				'cor' => $this->core_model->get_by_id('cores',['cor_id' => $cor_id]),

			];

			// echo '<pre>';
			//print_r($data['cliente']);
			// exit();

			$this->load->view('layout/header', $data);
			$this->load->view('cores/edit');
			$this->load->view('layout/footer');
		}

	}

	public function del($cor_id = null)
	{
		if (!$cor_id || !$this->core_model->get_by_id('cores', ['cor_id' => $cor_id])) {
			$this->session->set_flashdata('error', 'cor não localizada !!!');
			redirect('cores');

		} else {

			$this->core_model->delete('cores', ['cor_id' => $cor_id]);
			redirect('cores');
		}
	}

	public function nome_check($cor_nome)
	{
		$cor_id = $this->input->post('cor_id');

		if ($this->core_model->get_by_id('cores', ['cor_nome' => $cor_nome, 'cor_id!=' => $cor_id])) {
			$this->form_validation->set_message('nome_check', 'Essa cor já existe');

			return false;
		} else {
			return true;
		}
	}
}
