<?php

defined('BASEPATH') or exit('Ação Inválida');

class Servicos extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		if(!$this->ion_auth->logged_in()){
			$this->session->set_flashdata('info','Sessão encerrada, favor efetuar o login novamente !!!');
			redirect('login');

		}
	}

	public function index()
	{
		$data =
			[
				'titulo' => 'Serviços Cadastrados',

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
				'servicos' => $this->core_model->get_all('servicos'),
			];

			$this->load->view('layout/header', $data);
			$this->load->view('servicos/index');
			$this->load->view('layout/footer');
	}

	public function add()
	{


			$this->form_validation->set_rules('servico_nome', 'nome do serviço', 'trim|min_length[3]|max_length[145]|required|callback_nome_check');
			$this->form_validation->set_rules('servico_preco', 'preço', 'trim|required');
			$this->form_validation->set_rules('servico_descricao', 'descrição do serviço', 'trim|max_length[700]');


		if($this->form_validation->run()){

			//echo '<pre>';
			//print_r($this->input->post());
			//exit();

			$data = elements(
				[
					'servico_nome',
					'servico_preco',
					'servico_descricao',
					'servico_ativo'
				], $this->input->post()
			);

			$data = html_escape($data);

			$this->core_model->insert('servicos', $data);
			redirect('servicos');
		}else{
			//erro de validação

			$data = [
				'titulo' => 'Cadastrar Serviço',
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
					//mask
					'vendors/mask/jquery.mask.min.js',
					'vendors/mask/app.js',
				],


			];

			// echo '<pre>';
			//print_r($data['cliente']);
			// exit();

			$this->load->view('layout/header', $data);
			$this->load->view('servicos/add');
			$this->load->view('layout/footer');
		}

	}

	public function edit($servico_id = null)
	{
		if(!$servico_id || !$this->core_model->get_by_id('servicos', ['servico_id' => $servico_id])){

			$this->session->set_flashdata('info','Serviço não localizado !!!');
			redirect('servicos');
		}else{

			$this->form_validation->set_rules('servico_nome', 'nome do serviço', 'trim|min_length[10]|max_length[145]|required|callback_nome_check');
			$this->form_validation->set_rules('servico_preco', 'preço', 'trim|required');
			$this->form_validation->set_rules('servico_descricao', 'descrição do serviço', 'trim|max_length[700]');
		}

		if($this->form_validation->run()){

			//echo '<pre>';
			//print_r($this->input->post());
			//exit();

			$data = elements(
				[
					'servico_nome',
					'servico_preco',
					'servico_descricao',
					'servico_ativo'
				], $this->input->post()
			);

			$data = html_escape($data);

			$this->core_model->update('servicos', $data, ['servico_id' => $servico_id]);
			redirect('servicos');
		}else{
			//erro de validação

			$data = [
				'titulo' => 'Atualizar Serviços',
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
					//mask
					'vendors/mask/jquery.mask.min.js',
					'vendors/mask/app.js',
				],
				'servico' => $this->core_model->get_by_id('servicos',['servico_id' => $servico_id]),

			];

			// echo '<pre>';
			//print_r($data['cliente']);
			// exit();

			$this->load->view('layout/header', $data);
			$this->load->view('servicos/edit');
			$this->load->view('layout/footer');
		}

	}
	public function nome_check($servico_nome)
	{
		$servico_id = $this->input->post('servico_id');

		if ($this->core_model->get_by_id('servicos', ['servico_nome' => $servico_nome, 'servico_id!=' => $servico_id])) {
			$this->form_validation->set_message('nome_check', 'Esse nome de serviço já existe');

			return false;
		} else {
			return true;
		}
	}
}
