<?php

defined('BASEPATH') OR exit('Ação Inválido');

class Veiculos_model extends CI_Model{

    public function get_all(){

        $this->db->select([

             'veiculos.*',
             'categorias.categoria_id',
             'categorias.categoria_nome as veiculo_categoria',
             'tipos.tipo_id',
             'tipos.tipo_nome as veiculo_tipo',
			 'cores.cor_id',
			 'cores.cor_nome as veiculo_cor',
             'clientes.cliente_id',
             'CONCAT(clientes.cliente_nome, " ", cliente_sobrenome) as veiculo_cliente',
        ]);

        $this->db->join('categorias', 'categoria_id = veiculo_categoria_id','LEFT');
        $this->db->join('tipos', 'tipo_id = veiculo_tipo_id','LEFT');
        $this->db->join('clientes', 'cliente_id = veiculo_prop_id','LEFT');
        $this->db->join('cores', 'cor_id = veiculo_cor_id','LEFT');

        return $this->db->get('veiculos')->result();

    }

}
