<?php

namespace App\Controllers;

use App\Models\reserva_Model;
use App\Models\servicio_Model;
use App\Models\usuario_Model;
use CodeIgniter\Controller;

class AdminController extends Controller
{
  public function __construct()
  {
    helper(['form', 'url']);
  }

  public function index()
  {
    $session = session();
    $nombre = $session->get('usuario');
    $perfil = $session->get('id_perfil');


    $dato['id_perfil'] = $perfil;
    $dato['nombre'] = $nombre;

    $data['titulo'] = 'Panel de Admin';
    echo view('front/head_view', $data);
    echo view('front/navbar_view');
    echo view('back/usuario/perfil', $dato);
    echo view('front/footer_view');
  }

  public function gestionar_reservas()
  {
    $reservaModel = new reserva_Model();

    $data = [
      'titulo' => 'Gestionar Reservas',
      'reservas'   => $reservaModel->getReservasConServicios()
    ];
    echo view('front/head_view', $data);
    echo view('front/navbar_view');
    echo view('back/usuario/gestionar_reservas');
    echo view('front/footer_view');
  }

  public function gestionar_servicios()
  {
    $servicioModel = new servicio_Model();

    $data = [
      'titulo' => 'Gestionar Servicios',
      'servicios'   => $servicioModel->findAll()
    ];
    echo view('front/head_view', $data);
    echo view('front/navbar_view');
    echo view('back/usuario/gestionar_servicios');
    echo view('front/footer_view');
  }

  public function gestionar_usuarios()
  {
    $usuariosModel = new usuario_Model();

    $data = [
      'titulo' => 'Usuarios',
      'usuarios' => $usuariosModel->getUsuarios()
    ];

    $data['titulo'] =  'Gestionar Usuarios';
    echo view('front/head_view', $data);
    echo view('front/navbar_view');
    echo view('back/usuario/gestionar_usuarios');
    echo view('front/footer_view');
  }

  public function form_editar($id)
  {
    $id_usuario = ['id_usuario' => $id];
    $usuarioModel = new usuario_Model();
    $data = [
      'titulo' => 'Editar Usuario',
      'usuario' =>  $usuarioModel->find($id_usuario)
    ];
    echo view('front/head_view', $data);
    echo view('front/navbar_view');
    echo view('back/usuario/editar_usuario', $id_usuario);
    echo view('front/footer_view');
  }

  public function success()
  {
    $usuariosModel = new usuario_Model();

    $data = [
      'titulo' => 'Usuarios',
      'usuarios' => $usuariosModel->getUsuarios()
    ];

    $data['titulo'] =  'Gestionar Usuarios';
    echo view('front/head_view', $data);
    echo view('front/navbar_view');
    echo view('back/usuario/gestionar_usuarios');
    echo view('front/footer_view');
  }

  public function baja_usuario($id)
  {
    $id_usuario = ['id_usuario' => $id];
    $usuarioModel = new usuario_Model();

    $usuario = [
      'usuario' =>  $usuarioModel->find($id_usuario)
    ];

    $usuario = [
      'id_usuario' => $id_usuario,
      'baja' => 'SI'
    ];
    $usuarioModel->save($usuario);
    session()->setFlashdata('msg', 'Usuario dado de Baja con éxito');
    return $this->response->redirect('../');
  }

  public function reactivar_usuario($id)
  {
    $id_usuario = ['id_usuario' => $id];
    $usuarioModel = new usuario_Model();

    $usuario = [
      'usuario' =>  $usuarioModel->find($id_usuario)
    ];

    $usuario = [
      'id_usuario' => $id_usuario,
      'baja' => 'NO'
    ];
    $usuarioModel->save($usuario);
    session()->setFlashdata('msg', 'Usuario Reactivado con éxito');
    return $this->response->redirect('../');
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

  public function buscar_reservas()
  {
    $data = $this->request->getPost();
    $reservas = new reserva_Model();
    $busqueda = $this->request->getVar('buscar');
    $buscar_por_fecha = $reservas->getReservasBuscadas($busqueda);

    $data = [
      'titulo' => 'Reservas para el dia : ' . $busqueda,
      'reservas' => $buscar_por_fecha
    ];

    echo view('front/head_view', $data);
    echo view('front/navbar_view');
    echo view('back/usuario/gestionar_reservas');
    echo view('front/footer_view');
  }
}
