<?php

namespace App\Controllers;

use App\Models\reserva_Model;
use App\Models\servicio_Model;
use App\Models\usuario_Model;
use CodeIgniter\Controller;

class PanelController extends Controller
{
  public function index()
  {
    $session = session();
    $nombre = $session->get('usuario');
    $perfil = $session->get('id_perfil');
    $id_usuario = $session->get('id_usuario');

    $dato['id_perfil'] = $perfil;
    $dato['nombre'] = $nombre;

    $data['titulo'] = 'Panel de Usuario';
    echo view('front/head_view', $data);
    echo view('front/navbar_view');
    echo view('back/usuario/perfil', $dato);
    echo view('front/footer_view');
  }

  public function reservas($id)
  {
    $id_usuario = ['id_usuario' => $id];
    $reservaModel = new reserva_Model();

    $data = [
      'titulo' => 'Reservas de Usuario',
      'reservas' => $reservaModel->getReservasConServicio($id_usuario)
    ];

    echo view('front/head_view', $data);
    echo view('front/navbar_view');
    echo view('back/usuario/reservas');
    echo view('front/footer_view');
  }

  public function form_editar($id)
  {
    $id_usuario = ['id_usuario' => $id];
    $id_sesion = session()->get('id_usuario');
    log_message('info', 'ID USUARIO URI   ' . $id_usuario['id_usuario']);
    if ((string)$id_usuario['id_usuario'] ==  $id_sesion) {
      $usuarioModel = new usuario_Model();
      $data = [
        'titulo' => 'Editar Usuario',
        'usuario' =>  $usuarioModel->find($id_usuario)
      ];
      echo view('front/head_view', $data);
      echo view('front/navbar_view');
      echo view('back/usuario/editar_usuario', $id_usuario);
      echo view('front/footer_view');
    } else {
      return $this->response->redirect(base_url('/panel'));
    }
  }

  public function formValidation($id)
  {
    $id_usuario = ['id_usuario' => $id];
    $input = $this->validate(
      [
        'nombre' => 'required|min_length[3]',
        'apellido' => 'required|min_length[3]|max_length[25]',
        'email' => 'required|min_length[4]|max_length[100]|valid_email'
      ]
    );

    $formModel = new usuario_Model();
    if (!$input) {
      $data = [
        'titulo' => 'Editar Usuario',
        'usuario' =>  $formModel->find($id_usuario)
      ];

      echo view('front/head_view', $data);
      echo view('front/navbar_view');
      echo view('back/usuario/editar_usuario', $id_usuario);
      echo view('front/footer_view', ['validation' => $this->validator]);
    } else {

      $usuario = [
        'id_usuario' => $id_usuario,
        'nombre' => $this->request->getVar('nombre'),
        'apellido' => $this->request->getVar('apellido'),
        'usuario' => $this->request->getVar('usuario'),
        'email' => $this->request->getVar('email')
      ];

      $formModel->save($usuario);
      session()->set('nombre', $usuario['nombre']);
      session()->set('apellido', $usuario['apellido']);
      session()->set('email', $usuario['email']);
      session()->setFlashdata('msg', 'Usuario actualizado con exito');
      return $this->response->redirect('./');
    }
  }

  public function success()
  {

    $data['titulo'] =  'Panel de usuario';
    echo view('front/head_view', $data);
    echo view('front/navbar_view');
    echo view('back/usuario/perfil');
    echo view('front/footer_view');
  }
}
