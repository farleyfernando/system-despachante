<?php

defined('BASEPATH') or exit ('Ação Inválida');


class Financeiro_model extends CI_Model
{
	public function get_all_pagar()
	{
		$this->db->select([
			'contas_pagar.*',
			'fornecedor_id',
			'CONCAT(fornecedores.fornecedor_nome, " ", fornecedor_sobrenome) as pagar_nome_fornecedor',
		]);

		$this->db->join('fornecedores', 'fornecedor_id = conta_pagar_fornecedor_id', 'LEFT');
		return $this->db->get('contas_pagar')->result();
	}
	public function get_all_receber(){

		$this->db->select([
			'contas_receber.*',
			'cliente_id',
			'CONCAT(clientes.cliente_nome, " ", cliente_sobrenome) as receber_nome_cliente',
		]);

		$this->db->join('clientes', 'cliente_id = conta_receber_cliente_id', 'LEFT');
		return $this->db->get('contas_receber')->result();


	}
}
