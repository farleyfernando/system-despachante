<?php

defined('BASEPATH') OR exit('Caminho Inválido');

class Files_model extends CI_Model{

	public function get_all($arquivo_id){

		$this->db->select([

			'arquivos.*',
			'clientes.cliente_id',
			'CONCAT(clientes.cliente_nome, " ", cliente_sobrenome) as arquivo_cliente',
		]);

		$this->db->join('clientes', 'cliente_id = arquivo_cliente_id','LEFT');
		return $this->db->get('arquivos')->result();

	}

}
