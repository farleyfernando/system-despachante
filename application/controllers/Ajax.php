<?php

defined('BASEPATH') or exit('Caminho inválido');

class Ajax extends CI_Controller
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
        redirect('/');
    }

    public function servicos()
    {
        if(!$this->input->is_ajax_request()){

            exit('Ação não permitida');
        }else{

            $busca = $this->input->post('term');
            $data['response'] = 'false';

            $query = $this->core_model->auto_complete_servicos($busca);

            if($query){

                $data['response'] = 'true';
                $data['message'] = [];

                foreach($query as $row){

                    $data['message'] [] = [

                        'id' => $row->servico_id,
                        'value' => $row->servico_nome,
                        'servico_preco' => $row->servico_preco,
                        
                    ];

                }

                echo json_encode($data);
            }else{
                echo json_encode($data);
            }
        }
    }

    
}
