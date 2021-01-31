<?php

defined('BASEPATH') OR EXIT('Ação Inválida !!!');


class Arquivos extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		if (!$this->ion_auth->logged_in()) {
			$this->session->set_flashdata('info', 'Sessão encerrada, favor efetuar o login novamente !!!');
			redirect('login');
		}
		$this->load->model('files_model');
		require __DIR__ ."../../../vendor/autoload.php";
	}
	public function index()
	{
		$data = [
			'titulo' => 'Central de Arquivos',

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


			'clientes' => $this->core_model->get_all('clientes'),
			'files' => $this->files_model->get_all(''),

		];

		//echo '<pre>';
		//print_r($data['clientes']);
		//exit();

		$this->load->view('layout/header', $data);
		$this->load->view('arquivos/index');
		$this->load->view('layout/footer');
	}

	public function add()
	{

		$upload = new \CoffeeCode\Uploader\File("storage", "files");
		$files = $_FILES;

		//var_dump($files);

		if(!empty($files["arquivo_files"])){
			$file = $files["arquivo_files"];
			if(empty($file["type"]) || !in_array($file["type"], $upload::isAllowed())){

				$this->session->set_flashdata('info', 'Selecione um Arquivo válido !!!');
				redirect('arquivos');
			}else{
				$uploaded = $upload->upload($file, pathinfo($file["name"], PATHINFO_FILENAME));

				$data = elements(
					[
						'arquivo_cliente_id',
					], $this->input->post()

				);

				$data['arquivo_files'] = $uploaded;

				//echo '<pre>';
				//print_r($data);
				//exit();

				$data = html_escape($data);

				$this->core_model->insert('arquivos',$data);

				$this->session->set_flashdata('sucesso', 'Arquivo carregado com sucesso !!!');
				redirect('arquivos');
			}

		}
	}

	public function del($arquivo_id = null)
	{
		if (!$arquivo_id || !$this->core_model->get_by_id('arquivos', ['arquivo_id' => $arquivo_id])) {
			$this->session->set_flashdata('error', 'Arquivo não localizado');
			redirect('arquivos');
		}else{

			$this->core_model->delete('arquivos', ['arquivo_id' => $arquivo_id]);

			redirect('arquivos');
		}


	}
}
