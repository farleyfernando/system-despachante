<?php

defined('BASEPATH') OR exit('Caminho Inválido');

class Recibo_servicos_model extends CI_Model{

    public function get_all(){

        $this->db->select([
           
            'recibos_servicos.*',
            'clientes.cliente_id',
			'CONCAT(clientes.cliente_nome, " ", cliente_sobrenome) as recibo_nome_cliente',
            'formas_pagamentos.forma_pagamento_id',
            'formas_pagamentos.forma_pagamento_nome as forma_pagamento',
			'veiculos.veiculo_id',
			'veiculos.veiculo_placa as recibo_placa',

        ]);

		$this->db->join('veiculos', 'veiculo_id = recibo_servico_veiculo_id', 'left');
        $this->db->join('clientes', 'cliente_id = recibo_servico_cliente_id', 'left');
        $this->db->join('formas_pagamentos', 'forma_pagamento_id = recibo_servico_forma_pagamento_id', 'left');

        return $this->db->get('recibos_servicos')->result();


    }

    public function get_by_id($recibo_servico_id = null){

        $this->db->select([
           
            'recibos_servicos.*',
            'clientes.cliente_id',
            'clientes.cliente_cpf_cnpj',
            'clientes.cliente_celular',
            'CONCAT (clientes.cliente_nome, " ", clientes.cliente_sobrenome) as  cliente_nome_completo',
            'CONCAT (clientes.cliente_cidade, "/", clientes.cliente_estado, " - CEP: ", clientes.cliente_cep) as cliente_cidade',
            'CONCAT (clientes.cliente_endereco, ", ", clientes.cliente_num_end, " - ", clientes.cliente_bairro) as cliente_endereco_completo',
            'formas_pagamentos.forma_pagamento_id',
            'formas_pagamentos.forma_pagamento_nome as forma_pagamento',
			'veiculos.veiculo_id',
			'veiculos.veiculo_placa as placa',
			'veiculos.veiculo_renavam as renavam',
			'veiculos.veiculo_marca_modelo as marca_modelo',
			'cores.cor_id',
			'cores.cor_nome as cor',
			'tipos.tipo_id',
			'tipos.tipo_nome as tipo',

		]);


        $this->db->join('clientes', 'cliente_id = recibo_servico_cliente_id', 'left');
        $this->db->join('formas_pagamentos', 'forma_pagamento_id = recibo_servico_forma_pagamento_id', 'left');
        $this->db->join('veiculos', 'veiculo_id = recibo_servico_veiculo_id', 'left');
        $this->db->join('cores', 'cor_id = veiculo_cor_id', 'left');
        $this->db->join('tipos', 'tipo_id = veiculo_tipo_id', 'left');
        $this->db->where('recibo_servico_id', $recibo_servico_id);

        return $this->db->get('recibos_servicos')->row();


    }

    public function get_all_recibos_by_recibo($recibo_servico_id = null){

        if($recibo_servico_id){

            $this->db->select([
                'recibo_tem_servicos.*',
                'servicos.servico_descricao',
        
            ]);

            $this->db->join('servicos', 'servico_id = recibo_ts_id_servico', 'left');
            $this->db->where('recibo_ts_id_recibo_servico', $recibo_servico_id);
            return $this->db->get('recibo_tem_servicos')->result();

        }
    }

    public function delete_old_services($recibo_servico_id){

        if($recibo_servico_id){
            
            $this->db->delete('recibo_tem_servicos', ['recibo_ts_id_recibo_servico' => $recibo_servico_id]);    
        }
    }

    public function get_all_recibos($recibo_servico_id = null) {

        if($recibo_servico_id){
            $this->db->select([

                'recibo_tem_servicos.*',
                'FORMAT(SUM(REPLACE(recibo_ts_valor_unitario, ",","")), 2) as recibo_ts_valor_unitario',
                'FORMAT(SUM(REPLACE(recibo_ts_valor_total, ",","")), 2) as recibo_ts_valor_total',

                'servicos.servico_id',
                'servicos.servico_nome',
                'servicos.servico_descricao',

            ]);

            $this->db->join('servicos', 'servico_id = recibo_ts_id_servico', 'left');
            $this->db->where('recibo_ts_id_recibo_servico', $recibo_servico_id);

            $this->db->group_by('recibo_ts_id_servico');

            return $this->db->get('recibo_tem_servicos')->result();
        }

    }

    public function get_valor_final_recibo($recibo_servico_id = null){

        if($recibo_servico_id){

            $this->db->select([
                
                'FORMAT(SUM(REPLACE(recibo_ts_valor_total, ",","")), 2) as os_valor_total',
            ]);

            $this->db->join('servicos', 'servico_id = recibo_ts_id_servico', 'left');
            $this->db->where('recibo_ts_id_recibo_servico', $recibo_servico_id);

        }
        return $this->db->get('recibo_tem_servicos')->row();

    }

        /*/utilizados no relatório de os
    // inicio
    public function gerar_relatorio_recibo($data_inicial = null, $data_final = null){

        $this->db->select([
           
            'recibos_servicos.*',
            'clientes.cliente_id',
            'CONCAT(clientes.cliente_nome, " ", cliente_sobrenome) as  cliente_nome_completo',
            'formas_pagamentos.forma_pagamento_id',
            'formas_pagamentos.forma_pagamento_nome as forma_pagamento',
        ]);

        $this->db->join('clientes', 'cliente_id = recibo_servico_cliente_id', 'left');
        $this->db->join('formas_pagamentos', 'forma_pagamento_id = recibo_servico_forma_pagamento_id', 'left');

        if($data_inicial && $data_final){

            $this->db->where("SUBSTR(recibo_servico_data_emissao, 1, 10) >='$data_inicial' AND SUBSTR(recibo_servico_data_emissao, 1, 10) <= '$data_final'");

        }else{

            $this->db->where("SUBSTR(recibo_servico_data_emissao, 1, 10) >='$data_inicial'");

        }

        return $this->db->get('recibos_servicos')->result();
    }

    public function get_valor_final_relatorio_os($data_inicial = null, $data_final = null){
       
        $this->db->select([
            'FORMAT(SUM(REPLACE(recibo_servico_valor_total, ",","")), 2) as recibo_servico_valor_total',
        ]);

        if($data_inicial && $data_final){

            $this->db->where("SUBSTR(recibo_servico_data_emissao, 1, 10) >='$data_inicial' AND SUBSTR(recibo_servico_data_emissao, 1, 10) <= '$data_final'");

        }else{

            $this->db->where("SUBSTR(recibo_servico_data_emissao, 1, 10) >='$data_inicial'");

        }

        return $this->db->get('recibos_servicos')->row();

    }fim/*/
      
}
