<?php
class Rol extends CI_Model {
	private $tabla = 'rol';


	
	function buscar($rol) {
		$this->db->where('rol', $rol);
		$consulta = $this->db->get($this->tabla);
		return $consulta->row(0);
	}

	function listar() {
		$query = $this->db->get($this->tabla);
		return $query->result();
	}
}
?>
