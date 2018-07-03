<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class curso_model extends CI_Model {

    public function cadastraCurso($dados){
        $this->db->insert('curso',$dados);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function listar_curso($filtro = 'id'){
		$this->db->order_by($filtro,'DESC');
		return $this->db->get('curso')->result();
	}

	public function curso_campus($id_campus){
		$this->db->Select('*');
		$this->db->From('curso');
		if(!empty($id_campus)){
			$this->db->where('curso.id_campus', $id_campus);
		}
		$query = $this->db->get()->result();
		$result = json_decode(json_encode($query), True);
		return $result;
	}

	public function retornaCurso($id){
		$this->db->where('id',$id);
		$curso = $this->db->get('curso')->result();
		return $curso;
	}

	public function update_curso($id, $data){
  		$this->db->where('id', $id);  
		return $this->db->update('curso', $data);
  	}

  	public function lista_cursos_inativos(){
  		$reprovado = 0;
  		$this->db->Select('*');
		$this->db->From('curso');
		$this->db->where('curso.aprovado', $reprovado);

		$result = $this->db->get()->result();
		return $result;
  	}

  	public function lista_cursos_ativos(){
  		$this->db->where('curso.aprovado', 1);
  		$this->db->join('campus', 'campus.id = curso.id_campus');
    	$this->db->select('curso.*, campus.nome as nome');
		
		$cursos =  $this->db->get('curso')->result();
		return $cursos;
  // 		$aprovado = 1;
  // 		$this->db->Select('*');
		// $this->db->From('curso');
		// $this->db->where('curso.aprovado', $aprovado);

		// $result = $this->db->get()->result();
		// return $result;
  	}

  	public function deleta_curso($id){
		$this->db->where('id', $id);
		return $this->db->delete('curso');
	}

	public function quant_cursos_inativos(){
		$reprovado = 0;
  		$this->db->Select('*');
		$this->db->From('curso');
		$this->db->where('curso.aprovado', $reprovado);

		$result = $this->db->get();
		$row_count = $result->num_rows();
		return $row_count;
	}


}
