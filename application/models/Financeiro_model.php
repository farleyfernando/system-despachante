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

	//inicio funcões utilizadas no relatorio
	public function get_contas_receber_relatorio($conta_receber_status = null, $data_vecimento = null){

		$this->db->select([
			'contas_receber.*',
			'cliente_id',
			'CONCAT(clientes.cliente_nome, " ", cliente_sobrenome) as  cliente_nome_completo',
			'cliente_tipo',

		]);

		$this->db->where('conta_receber_status', $conta_receber_status);
		$this->db->join('clientes', 'cliente_id = conta_receber_cliente_id', 'LEFT');

		if($data_vecimento){

			date_default_timezone_set('America/Sao_Paulo');

			$this->db->where('conta_receber_data_venc <', date('Y-m-d'));
		}
		return $this->db->get('contas_receber')->result();

	}

	public function get_sum_contas_receber_relatorio($conta_receber_status = null, $data_vecimento = null){

		$this->db->select([

			'FORMAT(SUM(REPLACE(conta_receber_valor, ",","")), 2) as conta_receber_valor_total',
		]);

		$this->db->where('conta_receber_status', $conta_receber_status);


		if($data_vecimento){

			date_default_timezone_set('America/Sao_Paulo');

			$this->db->where('conta_receber_data_venc <', date('Y-m-d'));
		}
		return $this->db->get('contas_receber')->row();

	}

	public function get_contas_pagar_relatorio($conta_pagar_status = NULL, $data_vencimento = NULL) {

		$this->db->select([
			'contas_pagar.*',
			'fornecedor_id',
			'CONCAT (fornecedores.fornecedor_nome, " ", fornecedores.fornecedor_sobrenome) as  fornecedor_nome_completo',
			'fornecedor_cpf_cnpj',
			'fornecedor_tipo'
		]);

		$this->db->where('conta_pagar_status', $conta_pagar_status);
		$this->db->join('fornecedores', 'fornecedor_id = conta_pagar_fornecedor_id', 'LEFT');

		if ($data_vencimento) {

			date_default_timezone_set('America/Sao_Paulo');

			$this->db->where('conta_pagar_data_venc <', date('Y-m-d'));
		}
		return $this->db->get('contas_pagar')->result();
	}

	public function get_sum_contas_pagar_relatorio($conta_pagar_status = NULL, $data_vencimento = NULL) {

		$this->db->select([
			'FORMAT(SUM(REPLACE(conta_pagar_valor, ",", "")), 2) as conta_pagar_valor_total',
		]);

		$this->db->where('conta_pagar_status', $conta_pagar_status);

		if ($data_vencimento) {

			date_default_timezone_set('America/Sao_Paulo');

			$this->db->where('conta_pagar_data_venc <', date('Y-m-d'));
		}
		return $this->db->get('contas_pagar')->row();
	}

	//fim
}
