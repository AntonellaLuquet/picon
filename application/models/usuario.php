<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class usuario extends CI_Model {

    public $tabla = 'usuario';

    //valido nombre de usuario y pass con la base
    //devuelve el id, username y tipo (admin o jugador)
    function validar_login($user, $pas) {
			$this->db->from($this->tabla);
			$this->db->where('usuario', $user);
			$this->db->where('pass', $pas);
			$consulta = $this->db->get();
			if ($consulta->num_rows() == 0) {
				//usuario no existe
				return false;
			} else {
				//usuario existe
				return $consulta->row(0, 'usuario');
			}
		}

    //valida que el usuario no exista
		function validar_usuario($user) {
			$this->db->from($this->tabla);
			$this->db->where('usuario', $user);
			$consulta = $this->db->get();
			if ($consulta->num_rows() == 0) {
				//usuario no existe
				return false;
			} else {
				//usuario existe
				return true;
			}
		}

    //obtiene mensajes del usuario
		function get_mensajes($all = false) {
			if ($all) {
				//return todos los mensajes
			} else {
				//return mensajes nuevos
			}
		}

     function guardar($datos) {
     	$this->db->insert($this->tabla, $datos);
      return $this->db->insert_id();
     }

     function buscar($id) {
     	$this->db->where('idUsuario', $id);
     	$consulta = $this->db->get($this->tabla);
     	return $consulta->row(0);
     }

     function modificar($id, $datos) {
     	$this->db->where('idUsuario', $id);
     	$this->db->update($this->tabla, $datos);
     }



	function listar() {
		$sql = 'select usu.idUsuario, usu.username, usu.pass, usu.mail, usu.Jugador_idJugador, r.descripcion
				from usuario as usu
				left join role as r ON (usu.Role_idRole = r.id_Role)';

		$consulta = $this->db->query($sql);

		return $consulta->result();
	}


	function eliminar($id) {
		$this->db->delete($this->tabla, array('idUsuario' => $id));
	}

}
