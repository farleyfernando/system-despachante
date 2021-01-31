<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if(!$this->ion_auth->logged_in()){
			//$this->session->set_flashdata('info', 'Sessão encerrada, favor efetuar o login novamente !!!');
			redirect('login');
		}

		$this->load->model('home_model');
	}


	public function index()
	{

		$data = [
			'titulo' => 'Home',

			'styles' => [
				//Bootstrap
				'vendors/bootstrap/dist/css/bootstrap.min.css',
				//fontwasome
				'vendors/font-awesome/css/font-awesome.min.css',
				//BProgress
				'vendors/nprogress/nprogress.css',
				//jQuery custom content scroller
				'vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css',
				//bootstrap-daterangepicker
				'vendors/bootstrap-daterangepicker/daterangepicker.css',
				//Cuaton theme style
				'build/css/custom.min.css'],

			'scripts' => [
				//jQuery -->
				'vendors/jquery/dist/jquery.min.js',
				//Bootstrap
				'vendors/bootstrap/dist/js/bootstrap.bundle.min.js',
				//FastClick
				'vendors/fastclick/lib/fastclick.js',
				//jQuery Sparklines
				'vendors/jquery-sparkline/dist/jquery.sparkline.min.js',
				//BProgress
				'vendors/nprogress/nprogress.js',
				//jQuery custom content scroller
				'vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js',
				//Custom Theme Scripts
				'build/js/custom.min.js'
			],

			//home card vendas
			'soma_ordem_servicos' => $this->home_model->get_sum_ordem_servicos(),
			'veiculos_dut' => $this->home_model->get_veiculos_dut_vencendo(),
			'veiculos_dut_vencido' => $this->home_model->get_veiculos_dut_vencido(),
			'total_pagar' => $this->home_model->get_sum_pagar(),
			'total_receber' => $this->home_model->get_sum_receber(),
			'servicos_mais_vendidos' => $this->home_model->get_servicos_mais_vendidos(),
		];

		//Notificações
		$contador_notificacoes = 0;

		if ($this->home_model->get_contas_receber_vencidas()) {
			$data['contas_receber_vencidas'] = true;
			++$contador_notificacoes;
		} else {
			$data['contas_receber_vencidas'] = false;
		}

		if ($this->home_model->get_contas_pagar_vencidas()) {
			$data['contas_pagar_vencidas'] = true;
			++$contador_notificacoes;
		} else {
			$data['contas_pagar_vencidas'] = false;
		}

		if ($this->home_model->get_contas_pagar_vencem_hoje()) {
			$data['contas_pagar_vencem_hoje'] = true;
			++$contador_notificacoes;
		} else {
			$data['contas_pagar_vencem_hoje'] = false;
		}

		if ($this->home_model->get_contas_receber_vencem_hoje()) {
			$data['contas_receber_vencem_hoje'] = true;
			++$contador_notificacoes;
		} else {
			$data['contas_receber_vencem_hoje'] = false;
		}

		if ($this->home_model->get_usuarios_desativados()) {
			$data['usuarios_desativados'] = true;
			++$contador_notificacoes;
		} else {
			$data['usuarios_desativados'] = false;
		}

		$data['contador_notificacoes'] = $contador_notificacoes;


		//echo '<pre>';
		//print_r($data['veiculos_dut']);
		//exit();

		$this->load->view('layout/header', $data);
		$this->load->view('home/index');
		$this->load->view('layout/footer');
	}
}


