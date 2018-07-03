<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class campus_model extends CI_Model {

    public function cadastraCampus($dados){
        $this->db->insert('instituicao',$dados);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function listar_campus($filtro = 'id'){
		$this->db->order_by($filtro,'DESC');
		return $this->db->get('campus')->result();
	}

	public function campus_instituicao($id_instituicao){
		$this->db->Select('*');
		$this->db->From('campus');
		if(!empty($id_instituicao)){
			$this->db->where('campus.id_instituicao', $id_instituicao);
		}
		$query = $this->db->get()->result();
		$result = json_decode(json_encode($query), True);
		return $result;
	}

	public function retornaCampus($id){
		$this->db->where('id',$id);
		$instituicao = $this->db->get('campus')->result();
		return $instituicao;
	}

	public function update_campus($id, $data){
  		$this->db->where('id', $id);  
		return $this->db->update('campus', $data);
  	}

  	public function lista_campus_inativos(){
  		$reprovado = 0;
  		$this->db->Select('*');
		$this->db->From('campus');
		$this->db->where('campus.aprovado', $reprovado);

		$result = $this->db->get()->result();
		return $result;
  	}

  	public function deleta_campus($id){
		$this->db->where('id', $id);
		return $this->db->delete('campus');
	}

	public function quant_campus_inativos(){
		$reprovado = 0;
  		$this->db->Select('*');
		$this->db->From('campus');
		$this->db->where('campus.aprovado', $reprovado);

		$result = $this->db->get();
		$row_count = $result->num_rows();
		return $row_count;
	}

	public function lista_campus_ativos(){
  		$aprovado = 1;
  		$this->db->Select('*');
		$this->db->From('campus');
		$this->db->where('campus.aprovado', $aprovado);

		$result = $this->db->get()->result();
		return $result;
  	}


}
