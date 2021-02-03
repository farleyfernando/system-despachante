<?php

defined('BASEPATH') OR EXIT('Ação Inválida !!!');


class Calendario extends CI_Controller
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
			$data = [
				'titulo' => 'Calendário',

			];

			//echo '<pre>';
			//print_r($data['clientes']);
			//exit();

			//$this->load->view('layout/header', $data);
			$this->load->view('calendario/index', $data);
			//$this->load->view('layout/footer');
	}

	public function add()
	{

		$this->form_validation->set_rules('title', 'nome titulo', 'trim|min_length[2]|max_length[145]');

		if($this->form_validation->run()){

			//echo '<pre>';
			//print_r($this->input->post());
			//exit();

			$data = elements(
				[
					'title',
					'color',
					'start',
					'end',
				], $this->input->post()
			);

			//Converter a data e hora do formato brasileiro para o formato do Banco de Dados
			$data_start = str_replace('/', '-', $data['start']);
			$data_start_conv = date("Y-m-d H:i:s", strtotime($data_start));

			$data_end = str_replace('/', '-', $data['end']);
			$data_end_conv = date("Y-m-d H:i:s", strtotime($data_end));

			$data['start'] = $data_start_conv;
			$data['end'] = $data_end_conv;

			//echo '<pre>';
			//print_r($data);
			//exit();

			$data = html_escape($data);

			$this->core_model->insert('eventos', $data);
			redirect('calendario');
		}else{
			$this->form_validation->set_message('error', 'Erro ao cadastrar evento !!!');
			redirect('calendario');
		}

	}

	public function edit($id = null)
	{

		$id = $this->input->post('id');

		if(!$id || !$this->core_model->get_by_id('eventos', ['id' => $id])){

			$this->session->set_flashdata('info','Evento não localizado !!!');
			redirect('calendario');

		}else{


			$this->form_validation->set_rules('title', 'nome titulo', 'trim|min_length[2]|max_length[145]');

			if($this->form_validation->run()){

				//echo '<pre>';
				//print_r($this->input->post());
				//exit();

				$data = elements(
					[
						'title',
						'color',
						'start',
						'end',
					], $this->input->post()
				);

				//echo '<pre>';
				//print_r($this->input->post());
				//exit();

				//Converter a data e hora do formato brasileiro para o formato do Banco de Dados
				$data_start = str_replace('/', '-', $data['start']);
				$data_start_conv = date("Y-m-d H:i:s", strtotime($data_start));

				$data_end = str_replace('/', '-', $data['end']);
				$data_end_conv = date("Y-m-d H:i:s", strtotime($data_end));

				$data['start'] = $data_start_conv;
				$data['end'] = $data_end_conv;



				$data = html_escape($data);

				//echo '<pre>';
				//print_r($data);
				//exit();

				$this->core_model->update('eventos',$data, ['id' => $id]);

				$this->session->set_flashdata('sucesso', 'Evento atualizado com sucesso !!!');
				redirect('calendario');

			}

			$data = [
				'titulo' => 'Calendário',

				'evento' => $this->core_model->get_by_id('eventos',['id' => $id]),
			];

			//echo '<pre>';
			//print_r($data['clientes']);
			//exit();

			//$this->load->view('layout/header', $data);
			$this->load->view('calendario/index', $data);
			//$this->load->view('layout/footer');
		}

	}

	public function del($id = null)
	{

		$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
		//$id = $this->input->post('id');


		if (!$id || !$this->core_model->get_by_id('eventos', ['id' => $id])) {
			$this->session->set_flashdata('error', 'Evento não localizado');
			redirect('calendario');
		} else {

			$this->core_model->delete('eventos', ['id' => $id]);
			redirect('calendario');
		}

	}
}
