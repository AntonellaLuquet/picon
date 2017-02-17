<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CInicio extends cGeneral {

    public function __construct()
    {
        parent::__construct ();
        $this->load->model ('usuario');
        $this->load->model ('rol');
        $this->load->model ('jugador');
  	}

    public function index()
    {
        $this->load->view ('template/header');
        $this->load->view ('template/menu');
        $this->load->view ('template/menu-modal');
        $this->load->view ('template/footer');
    }

    public function ajax_login()
    {

      if(!empty ($_POST))
      {
        $username = $this->input->post('username');
		    $password = $this->input->post('password');

        $logged_user = $this->usuario->validar_login($username,$password);
        if ($logged_user) {
          if ($logged_user->idrol == 1) {
      				$data = array (
      						'id' => $logged_user->idusuario,
      						'username' => $logged_user->usuario,
      						'idrol' => $logged_user->idrol
      				);
      			} else {

              $jugador = $this->jugador->buscar_idusuario($logged_user->idusuario);

      				$data = array (
      						'id' => $logged_user->idusuario,
      						'username' => $logged_user->usuario,
                  'nombre' => $jugador->nombre,
                  'apellido' => $jugador->apellido,
      						'idrol' => $logged_user->idrol,
      						'idjugador' => $jugador->idjugador
      				);
      			}
            $this->session->set_userdata ('logged_user',$data );
            $response['login'] = $data;
        } else {
          $response['login'] = 'datos ingresados no validos';
        }
      } else {
          $response['error'] = 'error al recibir los datos';
      }
      header("content-type:application/json");
      echo json_encode($response);
      exit;
    }

    public function registrar() {
      if(!empty ($_POST))
      {
        $username = $this->input->post('username');
    		$apellido = $this->input->post('apellido');
    		$fecha_nacimiento = $this->input->post('fecha_nacimiento');
    		$usuario = $this->input->post('usuario');
    		$password = $this->input->post('password');
    		$mail = $this->input->post('mail');
        $direccion = $this->input->post('direccion');
        $response['username'] = $username;
        $response['apellido'] = $apellido;
        $response['fecha_nacimiento'] = $fecha_nacimiento;
        $response['usuario'] = $usuario;
        $response['password'] = $password;
        $response['mail'] = $mail;
        $response['direccion'] = $direccion;

        $datos_usuario = array (
          'usuario' => $this->input->post('usuario'),
          'pass' => $this->input->post('password'),
          'mail' => $this->input->post('mail'),
          'urlfoto' => 'assets/images/user.png',
          'idrol' => $this->rol->buscar('jugador')->idrol
        );

        $id_usuario = $this->usuario->guardar($datos_usuario);

        $datos_jugador = array (
          'nombre' => $this->input->post('username'),
          'apellido' => $this->input->post('apellido'),
          'fecha_nacimiento' => $this->input->post('fecha_nacimiento'),
          'direccion' => $this->input->post('direccion'),
          'idusuario' => $id_usuario
        );

        $id_jugador = $this->jugador->guardar($datos_jugador);
        $login = array (
            'id' => $id_usuario,
            'username' => $this->input->post('usuario'),
            'idRol' => $this->rol->buscar('jugador')->idrol,
            'idJugador' => $id_jugador
        );

        $this->session->set_userdata ('logged_user',$login );


        header("content-type:application/json");
        echo json_encode();
        exit;
      }
    }

    public function ajax_comprobar_usuario()
    {
      if(!empty ($_POST))
      {
        $username = $this->input->post('username');
        $existe = $this->usuario->validar_usuario($username);
        if ($existe) {
          //EXISTE
          $response['existe'] = true;
        } else {
          $response['username'] = $username;
          $response['existe'] = false;
        }

      }else {
        $response['error'] = 'error al recibir los datos';
      }
      header("content-type:application/json");
      echo json_encode($response);
      exit;
    }

    public function logout() {
      $this->session->unset_userdata ('logged_user');
      redirect('http://www.picon.com/', 'refresh');
    }
}
