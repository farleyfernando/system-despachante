<?php

defined('BASEPATH') OR exit('Caminho Inválido');

class Ordem_servicos_model extends CI_Model{

    public function get_all(){

        $this->db->select([
           
            'ordens_servicos.*',
            'clientes.cliente_id',
			'CONCAT(clientes.cliente_nome, " ", cliente_sobrenome) as recibo_nome_cliente',
            'formas_pagamentos.forma_pagamento_id',
            'formas_pagamentos.forma_pagamento_nome as forma_pagamento',
			'veiculos.veiculo_id',
			'veiculos.veiculo_placa as ordem_placa',

        ]);

		$this->db->join('veiculos', 'veiculo_id = ordem_servico_veiculo_id', 'left');
        $this->db->join('clientes', 'cliente_id = ordem_servico_cliente_id', 'left');
        $this->db->join('formas_pagamentos', 'forma_pagamento_id = ordem_servico_forma_pagamento_id', 'left');

        return $this->db->get('ordens_servicos')->result();


    }

    public function get_by_id($ordem_servico_id = null){

        $this->db->select([
           
            'ordens_servicos.*',
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


        $this->db->join('clientes', 'cliente_id = ordem_servico_cliente_id', 'left');
        $this->db->join('formas_pagamentos', 'forma_pagamento_id = ordem_servico_forma_pagamento_id', 'left');
        $this->db->join('veiculos', 'veiculo_id = ordem_servico_veiculo_id', 'left');
        $this->db->join('cores', 'cor_id = veiculo_cor_id', 'left');
        $this->db->join('tipos', 'tipo_id = veiculo_tipo_id', 'left');
        $this->db->where('ordem_servico_id', $ordem_servico_id);

        return $this->db->get('ordens_servicos')->row();


    }

    public function get_all_servicos_by_ordem($ordem_servico_id = null){

        if($ordem_servico_id){

            $this->db->select([
                'ordem_tem_servicos.*',
                'servicos.servico_descricao',
        
            ]);

            $this->db->join('servicos', 'servico_id = ordem_ts_id_servico', 'left');
            $this->db->where('ordem_ts_id_ordem_servico', $ordem_servico_id);
            return $this->db->get('ordem_tem_servicos')->result();

        }
    }

    public function delete_old_services($ordem_servico_id){

        if($ordem_servico_id){
            
            $this->db->delete('ordem_tem_servicos', ['ordem_ts_id_ordem_servico' => $ordem_servico_id]);    
        }
    }

    public function get_all_servicos($ordem_servico_id = null) {

        if($ordem_servico_id){
            $this->db->select([

                'ordem_tem_servicos.*',
                'FORMAT(SUM(REPLACE(ordem_ts_valor_unitario, ",","")), 2) as ordem_ts_valor_unitario',
                'FORMAT(SUM(REPLACE(ordem_ts_valor_total, ",","")), 2) as ordem_ts_valor_total',

                'servicos.servico_id',
                'servicos.servico_nome',
                'servicos.servico_descricao',

            ]);

            $this->db->join('servicos', 'servico_id = ordem_ts_id_servico', 'left');
            $this->db->where('ordem_ts_id_ordem_servico', $ordem_servico_id);

            $this->db->group_by('ordem_ts_id_servico');

            return $this->db->get('ordem_tem_servicos')->result();
        }

    }

    public function get_valor_final_os($ordem_servico_id = null){

        if($ordem_servico_id){

            $this->db->select([
                
                'FORMAT(SUM(REPLACE(ordem_ts_valor_total, ",","")), 2) as os_valor_total',
            ]);

            $this->db->join('servicos', 'servico_id = ordem_ts_id_servico', 'left');
            $this->db->where('ordem_ts_id_ordem_servico', $ordem_servico_id);

        }
        return $this->db->get('ordem_tem_servicos')->row();

    }

        //utilizados no relatório de os 
    // inicio
    public function gerar_relatorio_os($data_inicial = null, $data_final = null){

        $this->db->select([
           
            'ordens_servicos.*',
            'clientes.cliente_id',
            'CONCAT(clientes.cliente_nome, " ", cliente_sobrenome) as  cliente_nome_completo',
            'formas_pagamentos.forma_pagamento_id',
            'formas_pagamentos.forma_pagamento_nome as forma_pagamento',
        ]);

        $this->db->join('clientes', 'cliente_id = ordem_servico_cliente_id', 'left');
        $this->db->join('formas_pagamentos', 'forma_pagamento_id = ordem_servico_forma_pagamento_id', 'left');

        if($data_inicial && $data_final){

            $this->db->where("SUBSTR(ordem_servico_data_emissao, 1, 10) >='$data_inicial' AND SUBSTR(ordem_servico_data_emissao, 1, 10) <= '$data_final'");

        }else{

            $this->db->where("SUBSTR(ordem_servico_data_emissao, 1, 10) >='$data_inicial'");

        }

        return $this->db->get('ordens_servicos')->result();
    }

    public function get_valor_final_relatorio_os($data_inicial = null, $data_final = null){
       
        $this->db->select([
            'FORMAT(SUM(REPLACE(ordem_servico_valor_total, ",","")), 2) as ordem_servico_valor_total',
        ]);

        if($data_inicial && $data_final){

            $this->db->where("SUBSTR(ordem_servico_data_emissao, 1, 10) >='$data_inicial' AND SUBSTR(ordem_servico_data_emissao, 1, 10) <= '$data_final'");

        }else{

            $this->db->where("SUBSTR(ordem_servico_data_emissao, 1, 10) >='$data_inicial'");

        }

        return $this->db->get('ordens_servicos')->row();

    }//fim
      
}
