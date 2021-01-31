<?php

defined('BASEPATH') or exit('Caminho inválido');


class Clientes extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		if (!$this->ion_auth->logged_in()) {
			$this->session->set_flashdata('info', 'Sessão encerrada, favor efetuar o login novamente !!!');
			redirect('login');
		}
		$this->load->model('files_model');
	}

	public function index()
	{
		$data = [
            'titulo' => 'Clientes Cadastrados',

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
		$this->load->view('clientes/index');
		$this->load->view('layout/footer');
    }

	public function add()
	{

			//verficação tipos de cliente
			$cliente_tipo = $this->input->post('cliente_tipo');
			if($cliente_tipo == '1'){
				$this->form_validation->set_rules('cliente_nome','','required|min_length[3]|max_length[145]');
				$this->form_validation->set_rules('cliente_sobrenome','','required|min_length[5]|max_length[145]');
				$this->form_validation->set_rules('cliente_cpf','cpf','required|exact_length[14]|is_unique[clientes.cliente_cpf_cnpj]|callback_valida_cpf');
				$this->form_validation->set_rules('cliente_rg','rg','required|exact_length[12]|is_unique[clientes.cliente_rg_ie]');
				$this->form_validation->set_rules('cliente_dn','data nasc.','required');
			}else{
				$this->form_validation->set_rules('cliente_rs','','required|min_length[3]|max_length[145]');
				$this->form_validation->set_rules('cliente_nf','','required|min_length[5]|max_length[145]');
				$this->form_validation->set_rules('cliente_cnpj','cnpj','required|exact_length[18]|callback_valida_cnpj');
				$this->form_validation->set_rules('cliente_ie','Insc. Est','required|max_length[15]|is_unique[clientes.cliente_rg_ie]');
				$this->form_validation->set_rules('cliente_dn_ab','data abertura','required');
			}


			$this->form_validation->set_rules('cliente_telefone','','');
			$this->form_validation->set_rules('cliente_celular','tel. movel','required|exact_length[15]');
			$this->form_validation->set_rules('cliente_email','','required|valid_email|max_length[100]');
			$this->form_validation->set_rules('cliente_cep','','required|exact_length[9]');
			$this->form_validation->set_rules('cliente_endereco','','required|max_length[145]');
			$this->form_validation->set_rules('cliente_bairro','','required|max_length[45]');
			$this->form_validation->set_rules('cliente_num_end','','required|max_length[10]');
			$this->form_validation->set_rules('cliente_cidade','cidade','required|max_length[45]');
			$this->form_validation->set_rules('cliente_estado','','required|max_length[2]');
			$this->form_validation->set_rules('cliente_obs','','max_length[500]');



			if ($this->form_validation->run()){

				//exit('validado');

				//echo'<pre>';
				//print_r($this->input->post());
				//exit();

				$data = elements(
					[
						'cliente_tipo',
						'cliente_dn',
						'cliente_email',
						'cliente_telefone',
						'cliente_celular',
						'cliente_cep',
						'cliente_endereco',
						'cliente_num_end',
						'cliente_bairro',
						'cliente_complemento',
						'cliente_cidade',
						'cliente_ativo',
						'cliente_obs',
					], $this->input->post()
				);



				if($cliente_tipo == 1){
					$data ['cliente_nome'] =$this->input->post('cliente_nome');
					$data ['cliente_sobrenome'] =$this->input->post('cliente_sobrenome');
					$data ['cliente_cpf_cnpj'] =$this->input->post('cliente_cpf');
					$data ['cliente_rg_ie'] =$this->input->post('cliente_rg');
					$data ['cliente_dn'] =$this->input->post('cliente_dn');

					$data ['cliente_nome'] = strtoupper($this->input->post('cliente_nome'));
					$data ['cliente_sobrenome'] = strtoupper($this->input->post('cliente_sobrenome'));

				}else{
					$data ['cliente_nome'] =$this->input->post('cliente_rs');
					$data ['cliente_sobrenome'] =$this->input->post('cliente_nf');
					$data ['cliente_cpf_cnpj'] =$this->input->post('cliente_cnpj');
					$data ['cliente_rg_ie'] =$this->input->post('cliente_ie');
					$data ['cliente_dn'] =$this->input->post('cliente_dn_ab');

					$data ['cliente_nome'] = strtoupper($this->input->post('cliente_rs'));
					$data ['cliente_sobrenome'] = strtoupper($this->input->post('cliente_nf'));
				}


				$data ['cliente_estado'] = strtoupper($this->input->post('cliente_estado'));

				//echo '<pre>';
				//print_r($data);
				//exit();

				$data = html_escape($data);

				$this->core_model->insert('clientes',$data);

				$this->session->set_flashdata('sucesso', 'Cadastro efetuado com sucesso !!!');
				redirect('clientes');


			}else{

				$data = [
					'titulo' => 'Cadastrar Clientes',
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
						//mask
						'vendors/mask/jquery.mask.min.js',
						'vendors/mask/app.js',
						//mesclar tipos de cliente PF & PJ
						'src/js/clientes.js',
					],

				];

				// echo '<pre>';
				//print_r($data['cliente']);
				// exit();

				$this->load->view('layout/header', $data);
				$this->load->view('clientes/add');
				$this->load->view('layout/footer');
			}
		}

    public function edit($cliente_id = null)
    {
        if(!$cliente_id || !$this->core_model->get_by_id('clientes', ['cliente_id' => $cliente_id])){

            $this->session->set_flashdata('info','Cliente não localizado !!!');
            redirect('clientes');

        }else{
        

            $this->form_validation->set_rules('cliente_nome','','required|min_length[3]|max_length[145]');
            $this->form_validation->set_rules('cliente_sobrenome','','required|min_length[5]|max_length[145]');
            $this->form_validation->set_rules('cliente_dn','data nasc.','required');

            //verficação tipos de cliente
			$cliente_tipo = $this->input->post('cliente_tipo');
			if($cliente_tipo == '1'){
				$this->form_validation->set_rules('cliente_cpf','cpf','required|exact_length[14]|callback_valida_cpf');
			}else{
				$this->form_validation->set_rules('cliente_cnpj','cnpj','required|exact_length[18]|callback_valida_cnpj');
			}

            $this->form_validation->set_rules('cliente_rg_ie','Insc. Est.','required|min_length[5]|max_length[25]');
            $this->form_validation->set_rules('cliente_telefone','','');
            $this->form_validation->set_rules('cliente_celular','tel. movel','required|exact_length[15]');
            $this->form_validation->set_rules('cliente_email','','required|valid_email|max_length[100]');
            $this->form_validation->set_rules('cliente_cep','','required|exact_length[9]');
            $this->form_validation->set_rules('cliente_endereco','','required|max_length[145]');
            $this->form_validation->set_rules('cliente_bairro','','required|max_length[45]');
            $this->form_validation->set_rules('cliente_num_end','','required|max_length[10]');
            $this->form_validation->set_rules('cliente_cidade','cidade','required|max_length[45]');
            $this->form_validation->set_rules('cliente_estado','','required|max_length[2]');
            $this->form_validation->set_rules('cliente_obs','','max_length[500]');


        
            if ($this->form_validation->run()){

                //exit('validado');

				//echo'<pre>';
				//print_r($this->input->post());
				//exit();

                $data = elements(
                    [
						'cliente_nome',
						'cliente_sobrenome',
						'cliente_dn',
						'cliente_cpf_cnpj',
						'cliente_rg_ie',
						'cliente_email',
						'cliente_telefone',
						'cliente_celular',
						'cliente_cep',
						'cliente_endereco',
						'cliente_num_end',
						'cliente_bairro',
						'cliente_complemento',
						'cliente_cidade',
						'cliente_ativo',
						'cliente_obs',
                    ], $this->input->post()
                );

                //echo '<pre>';
                //print_r($data);
                //exit();

				if($cliente_tipo == 1){
					$data ['cliente_cpf_cnpj'] =$this->input->post('cliente_cpf');

				}else{
					$data ['cliente_cpf_cnpj'] =$this->input->post('cliente_cnpj');
				}

				$data ['cliente_nome'] = strtoupper($this->input->post('cliente_nome'));
				$data ['cliente_sobrenome'] = strtoupper($this->input->post('cliente_sobrenome'));
				$data ['cliente_estado'] = strtoupper($this->input->post('cliente_estado'));


                $data = html_escape($data);

                $this->core_model->update('clientes',$data, ['cliente_id' => $cliente_id]);

                $this->session->set_flashdata('sucesso', 'Dados atualizados com sucesso !!!');
                redirect('clientes');


            }else{

            $data = [       
                'titulo' => 'Atualizar clientes',    
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
                            //mask
                            'vendors/mask/jquery.mask.min.js',
                            'vendors/mask/app.js',
                            ],                  
                'cliente' => $this->core_model->get_by_id('clientes',['cliente_id' => $cliente_id]),
    
                ];
        
                // echo '<pre>';
                    //print_r($data['cliente']);
                // exit();

                $this->load->view('layout/header', $data);
                $this->load->view('clientes/edit');
                $this->load->view('layout/footer');
            }
        }

    }

	public function del($cliente_id = null)
	{
		if (!$cliente_id || !$this->core_model->get_by_id('clientes', ['cliente_id' => $cliente_id])) {
			$this->session->set_flashdata('error', 'Cliente não localizado');
			redirect('clientes');
		}else{

			$this->core_model->delete('clientes', ['cliente_id' => $cliente_id]);
			redirect('clientes');
		}


		if($this->db->table_exists('contas_receber')){

			if($this->core_model->get_by_id('contas_receber', ['conta_receber_cliente_id' => $cliente_id, 'conta_receber_status' => 0])){

				$this->session->set_flashdata('info', 'Solicitação não atendida, pois existem <i class="fas fa-hand-holding-usd"></i>&nbsp;Contas em aberto para esse cliente !!!');
				redirect('clientes');

			}else {

				$this->core_model->delete('clientes', ['cliente_id' => $cliente_id]);

				$this->core_model->delete('contas_receber', ['conta_receber_cliente_id' => $cliente_id]);

				redirect('clientes');
			}
		}

	}

	public function valida_cnpj($cnpj) {

		// Verifica se um número foi informado
		if (empty($cnpj)) {
			$this->form_validation->set_message('valida_cnpj', 'Por favor digite um CNPJ válido');
			return false;
		}

		if ($this->input->post('cliente_id')) {

			$cliente_id = $this->input->post('cliente_id');

			if ($this->core_model->get_by_id('clientes', array('cliente_id !=' => $cliente_id, 'cliente_cpf_cnpj' => $cnpj))) {
				$this->form_validation->set_message('valida_cnpj', 'Esse CNPJ já existe');
				return FALSE;
			}
		}

		// Elimina possivel mascara
		$cnpj = preg_replace("/[^0-9]/", "", $cnpj);
		$cnpj = str_pad($cnpj, 14, '0', STR_PAD_LEFT);


		// Verifica se o numero de digitos informados é igual a 11
		if (strlen($cnpj) != 14) {
			$this->form_validation->set_message('valida_cnpj', 'Por favor digite um CNPJ válido');
			return false;
		}

		// Verifica se nenhuma das sequências invalidas abaixo
		// foi digitada. Caso afirmativo, retorna falso
		else if ($cnpj == '00000000000000' ||
			$cnpj == '11111111111111' ||
			$cnpj == '22222222222222' ||
			$cnpj == '33333333333333' ||
			$cnpj == '44444444444444' ||
			$cnpj == '55555555555555' ||
			$cnpj == '66666666666666' ||
			$cnpj == '77777777777777' ||
			$cnpj == '88888888888888' ||
			$cnpj == '99999999999999') {
			$this->form_validation->set_message('valida_cnpj', 'Por favor digite um CNPJ válido');
			return false;

			// Calcula os digitos verificadores para verificar se o
			// CPF é válido
		} else {

			$j = 5;
			$k = 6;
			$soma1 = "";
			$soma2 = "";

			for ($i = 0; $i < 13; $i++) {

				$j = $j == 1 ? 9 : $j;
				$k = $k == 1 ? 9 : $k;

				//$soma2 += ($cnpj{$i} * $k);

				//$soma2 = intval($soma2) + ($cnpj{$i} * $k); //Para PHP com versão < 7.4
				$soma2 = intval($soma2) + ($cnpj[$i] * $k); //Para PHP com versão > 7.4

				if ($i < 12) {
					//$soma1 = intval($soma1) + ($cnpj{$i} * $j); //Para PHP com versão < 7.4
					$soma1 = intval($soma1) + ($cnpj[$i] * $j); //Para PHP com versão > 7.4
				}

				$k--;
				$j--;
			}

			$digito1 = $soma1 % 11 < 2 ? 0 : 11 - $soma1 % 11;
			$digito2 = $soma2 % 11 < 2 ? 0 : 11 - $soma2 % 11;

			if (!($cnpj[12] == $digito1) and ( $cnpj[13] == $digito2)) {
				$this->form_validation->set_message('valida_cnpj', 'Por favor digite um CNPJ válido');
				return false;
			} else {
				return true;
			}
		}

	}

	public function valida_cpf($cpf) {

		if ($this->input->post('cliente_id')) {

			$cliente_id = $this->input->post('cliente_id');

			if ($this->core_model->get_by_id('clientes', array('cliente_id !=' => $cliente_id, 'cliente_cpf_cnpj' => $cpf))) {
				$this->form_validation->set_message('valida_cpf', 'Este CPF já existe');
				return FALSE;
			}
		}

		$cpf = str_pad(preg_replace('/[^0-9]/', '', $cpf), 11, '0', STR_PAD_LEFT);
		// Verifica se nenhuma das sequências abaixo foi digitada, caso seja, retorna falso
		if (strlen($cpf) != 11 || $cpf == '00000000000' || $cpf == '11111111111' || $cpf == '22222222222' || $cpf == '33333333333' || $cpf == '44444444444' || $cpf == '55555555555' || $cpf == '66666666666' || $cpf == '77777777777' || $cpf == '88888888888' || $cpf == '99999999999') {

			$this->form_validation->set_message('valida_cpf', 'Por favor digite um CPF válido');
			return FALSE;
		} else {
			// Calcula os números para verificar se o CPF é verdadeiro
			for ($t = 9; $t < 11; $t++) {
				for ($d = 0, $c = 0; $c < $t; $c++) {
					//$d += $cpf{$c} * (($t + 1) - $c); // Para PHP com versão < 7.4
					$d += $cpf[$c] * (($t + 1) - $c); //Para PHP com versão < 7.4
				}
				$d = ((10 * $d) % 11) % 10;
				if ($cpf[$c] != $d) {
					$this->form_validation->set_message('valida_cpf', 'Por favor digite um CPF válido');
					return FALSE;
				}
			}
			return TRUE;
		}
	}

	public function email_check($cliente_email)
	{
		$cliente_id = $this->input->post('cliente_id');

		if ($this->core_model->get_by_id('clientes', ['cliente_email' => $cliente_email, 'cliente_id!=' => $cliente_id])) {
			$this->form_validation->set_message('email_check', 'Esse e-mail já existe');

			return false;
		} else {
			return true;
		}
	}

	public function rg_ie_check($cliente_rg_ie)
	{
		$cliente_id = $this->input->post('cliente_id');

		if ($this->core_model->get_by_id('clientes', ['cliente_rg_ie' => $cliente_rg_ie, 'cliente_id!=' => $cliente_id])) {
			$this->form_validation->set_message('rg_ie_check', 'Esse registro já existe');

			return false;
		} else {
			return true;
		}
	}
}
