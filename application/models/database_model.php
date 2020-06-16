<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Database_model extends CI_Model {
	public function ler($tabela_nome,$tabela_select="*",$tabela_where){
		if($tabela_where !=null){
			$this->db->where($tabela_where);
		}
		$this->db->select($tabela_select);
	    $this->db->from($tabela_nome);
	    $query = $this->db->get();
	    return $query->result_array(); 

	}
	public function inserir($tabela_nome, array $tabela_inserir){
		$this->db->insert($tabela_nome, $tabela_inserir);
		$query = $this->db->insert_id();
		return $query;
	}
	public function editar($tabela_nome, array $tabela_editar,$tabela_where=null){
		if($tabela_where !=null){
			$this->db->where($tabela_where);
		}
		$this->db->from($tabela_nome);
		$this->db->set($tabela_editar);
		if($this->db->trans_status() === true){
			$this->db->trans_commit();
			return true;
		}else{
			$this->db->trans_rollback();
			return false;
		}
		$query = $this->db->update($tabela_editar);

		return $query;
	}
	public function deletar($tabela_nome,$tabela_where){
		if($tabela_where !=null){
			$this->db->where($tabela_where);
		}
		$this->db->from($tabela_nome);
		return $this->db->delete();

	}
	public function procurar($tabela_nome,$tabela_select="*",$tabela_where){
		if($tabela_where !=null){
			$this->db->where($tabela_where);
		}
		$this->db->select($tabela_select);
	    $this->db->from($tabela_nome);
	    $query = $this->db->get();
	    return $query->row_array(); 
	}
}
