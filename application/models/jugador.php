<?php
class jugador extends CI_Model {

	 public $tabla = 'jugador';

	 		public function buscar_idusuario($id_usuario){
				$this->db->from($this->tabla);
				$this->db->join('usuario', 'usuario.idusuario = jugador.idusuario');
				$consulta = $this->db->get();
				return $consulta->row(0);
			}

     public function guardar($datos) {
     	$this->db->insert($this->tabla, $datos);
			return $this->db->insert_id();
     }

     function buscarxid($id) {
     	$this->db->where('idjugador', $id);
     	$consulta = $this->db->get($this->tabla);
     	return $consulta->row(0);
     }

     function buscar($nom) {
     	$this->db->where('nombre', $nom);
     	$this->db->select('idjugador');
     	$consulta = $this->db->get($this->tabla);
     	return $consulta->row(0);
     }

     function modificar($id, $datos) {
     	$this->db->where('idjugador', $id);
     	$this->db->update($this->tabla, $datos);
     }
}
