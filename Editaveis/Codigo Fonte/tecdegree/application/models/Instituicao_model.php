<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class instituicao_model extends CI_Model {

    public function cadastraInstituicao($dados){
        $this->db->insert('instituicao',$dados);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function listar_instituicoes($filtro = 'id'){
		$this->db->order_by($filtro,'DESC');
		return $this->db->get('instituicao')->result();
	}

	public function retornaInstituicao($id){
		$this->db->where('id',$id);
		$instituicao = $this->db->get('instituicao')->result();
		return $instituicao;
	}

	public function update_instituicao($id, $data){
  		$this->db->where('id', $id);  
		return $this->db->update('instituicao', $data);
  	}

  	public function lista_instituicoes_inativas(){
  		$reprovado = 0;
  		$this->db->Select('*');
		$this->db->From('instituicao');
		$this->db->where('instituicao.aprovado', $reprovado);

		$result = $this->db->get()->result();
		return $result;
  	}

  	public function deleta_instituicao($id){
		$this->db->where('id', $id);
		return $this->db->delete('instituicao');
	}

	public function quant_instituicao_inativos(){
		$reprovado = 0;
  		$this->db->Select('*');
		$this->db->From('instituicao');
		$this->db->where('instituicao.aprovado', $reprovado);

		$result = $this->db->get();
		$row_count = $result->num_rows();
		return $row_count;
	}

	public function lista_instituicoes_ativas(){
  		$aprovado = 1;
  		$this->db->Select('*');
		$this->db->From('instituicao');
		$this->db->where('instituicao.aprovado', $aprovado);

		$result = $this->db->get()->result();
		return $result;
  	}


}
