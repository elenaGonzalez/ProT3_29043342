<?php

namespace App\Controllers;

use App\Models\reserva_Model;
use App\Models\servicio_Model;
use App\Models\usuario_Model;
use CodeIgniter\Controller;

class ReservaController extends Controller
{
  public function __construct()
  {
    helper(['form', 'url']);
  }

  public function form_reservar($id)
  {
    $id_usuario = ['id_usuario' => $id];
    $servicios = new servicio_Model();


    $data = [
      'titulo' => 'Nueva Reserva',
      'servicios' => $servicios->findAll()
    ];
    echo view('front/head_view', $data);
    echo view('front/navbar_view');
    echo view('back/usuario/nueva_reserva', $id_usuario);
    echo view('front/footer_view');
  }

  public function formValidationReserva($id)
  {
    $id_usuario = ['id_usuario' => $id];
    // Obtén los datos del formulario
    $data = $this->request->getPost();

    // Guarda los datos en la sesión (para pre-rellenar)
    $session = session();
    foreach ($data as $key => $value) {
      $session->setFlashdata($key, $value);
    }

    $input = $this->validate(
      [
        'id_servicio' => 'required|min_length[1]|max_length[2]',
        'fecha' => 'required|max_length[10]',
        'cantidad_asientos' => 'required|min_length[1]|max_length[2]',
        'origen' => 'required|min_length[4]|max_length[50]'
      ]
    );
    $formReserva = new reserva_Model();
    $valorSeleccionado = $data["id_servicio"];

    $servicios = new servicio_Model();
    $input = true;
    if (!$input) {
      $data = [
        'titulo' => 'Nueva Reserva',
        'servicios' => $servicios->findAll()
      ];
      echo view('front/head_view', $data);
      echo view('front/navbar_view');
      echo view('back/usuario/nueva_reserva');
      echo view('front/footer_view', ['validation' => $this->validator]);
    } else {

      $servicio = $servicios->find($data['id_servicio']);
      $total = (float)$servicio['precio'] * (float)$data['cantidad_asientos'];

      $formReserva->save([
        'id_servicio' =>  $valorSeleccionado,
        'id_usuario' => $id_usuario,
        'fecha' => $this->request->getVar('fecha'),
        'origen' => $this->request->getVar('origen'),
        'cantidad_asientos' => $this->request->getVar('cantidad_asientos'),
        'total' => $total
      ]);

      session()->setFlashdata('msg', 'Reserva registrada con exito');
      return $this->response->redirect(base_url('/panel'));
    }
  }

  public function form_editar_reserva($id_r, $id_s)
  {
    $id_servicio = ['id_servicio' => $id_s];
    $id_reserva = ['id_reserva' => $id_r];
    $servicio = new servicio_Model();
    $servicio_a_editar = $servicio->find($id_servicio);

    $reservaModel = new reserva_Model();
    $reservaEdit = $reservaModel->find($id_reserva);
    $usuario = new usuario_Model();
    $usuarioReserva = $usuario->find($reservaEdit[0]['id_usuario']);


    $data = [
      'titulo' => 'Editar reserva',
      'reserva' =>  $reservaEdit,
      'id_servicio' => $id_servicio,
      'servicio_nombre' => $servicio_a_editar[0]['titulo'],
      'nombre_usuario' => $usuarioReserva['nombre'],
      'apellido_usuario' => $usuarioReserva['apellido']
    ];

    echo view('front/head_view', $data);
    echo view('front/navbar_view');
    echo view('back/usuario/editar_reserva', $id_reserva);
    echo view('front/footer_view');
  }

  public function formValidationEditarReserva($id_s, $id_r)
  {
    $id_servicio = ['id_servicio' => $id_s];
    $id_reserva = ['id_reserva' => $id_r];
    $data = $this->request->getPost();

    $input = $this->validate(
      [
        'fecha' => 'required|max_length[10]',
        'cantidad_asientos' => 'required|min_length[1]|max_length[2]',
        'origen' => 'required|min_length[4]|max_length[50]'
      ]
    );

    $formModel = new reserva_Model();
    $reserva_edit = $formModel->find($id_reserva);

    if (!$input) {
      $servicio = new servicio_Model();
      $servicio_a_editar = $servicio->find($id_servicio);
      $reservaModel = new reserva_Model();
      $reservaEdit = $reservaModel->find($id_reserva);
      $usuario = new usuario_Model();
      $usuarioReserva = $usuario->find($reservaEdit[0]['id_usuario']);

      $dato = [
        'titulo' => 'Editar reserva',
        'reserva' =>  $reserva_edit,
        'id_servicio' => $id_servicio,
        'servicio_nombre' => $servicio_a_editar[0]['titulo'],
        'nombre_usuario' => $usuarioReserva['nombre'],
        'apellido_usuario' => $usuarioReserva['apellido']
      ];

      echo view('front/head_view', $dato);
      echo view('front/navbar_view');
      echo view('back/usuario/editar_reserva', $id_reserva);
      echo view('front/footer_view', ['validation' => $this->validator]);
    } else {
      $servicios = new servicio_Model();
      $servicio = $servicios->find($id_servicio);

      $total = $servicio[0]['precio'] * $data['cantidad_asientos'];

      $reserva = [
        'id_reserva' => $id_reserva,
        'fecha' => $this->request->getVar('fecha'),
        'origen' => strtolower($this->request->getVar('origen')),
        'cantidad_asientos' => $this->request->getVar('cantidad_asientos'),
        'total' => $total
      ];

      $formModel->save($reserva);
      session()->setFlashdata('msg', 'Reserva actualizada con exito');
      return $this->response->redirect(base_url('./panel/admin/reservas'));
    }
  }

  public function form_comentario($id_u, $id_r)
  {
    $id_usuario = ['id_usuario' => $id_u];
    $id_reserva = ['id_reserva' => $id_r];
    $id_sesion = session()->get('id_usuario');

    $reservaModel = new reserva_Model();
    $reservaAEditar = $reservaModel->find($id_reserva);
    $servicio = new servicio_Model();
    $servicio_a_editar = $servicio->find($reservaAEditar[0]['id_servicio']);

    if ((string)$id_usuario['id_usuario'] ==  $id_sesion) {

      $data = [
        'titulo' => 'Comentar servicio',
        'reserva' =>  $reservaAEditar,
        'servicio_nombre' => $servicio_a_editar['titulo']
      ];

      echo view('front/head_view', $data);
      echo view('front/navbar_view');
      echo view('back/usuario/comentar_reserva', $id_reserva);
      echo view('front/footer_view');
    } else {
      return $this->response->redirect(base_url('/panel'));
    }
  }

  public function formValidationComentario($id_s, $id_r)
  {
    $id_usuario = ['id_usuario' => $id_s];
    $id_reserva = ['id_reserva' => $id_r];

    $input = $this->validate(
      [
        'comentario' => 'required|min_length[5]|max_length[250]',
        'calificacion' => 'required|numeric|min_length[1]|max_length[1]'
      ]
    );
    $reservaModel = new reserva_Model();
    $reservaAEditar = $reservaModel->find($id_reserva);
    if (!$input) {

      $servicio = new servicio_Model();
      $servicio_a_editar = $servicio->find($reservaAEditar[0]['id_servicio']);

      $data = [
        'titulo' => 'Comentar servicio',
        'reserva' =>  $reservaModel->find($id_reserva),
        'servicio_nombre' => $servicio_a_editar['titulo']
      ];

      echo view('front/head_view', $data);
      echo view('front/navbar_view');
      echo view('back/usuario/comentar_reserva', $id_reserva);
      echo view('front/footer_view', ['validation' => $this->validator]);
    } else {

      $comentario = [
        'id_reserva' => $id_reserva,
        'comentario' => $this->request->getVar('comentario'),
        'calificacion' => $this->request->getVar('calificacion')
      ];
      $reservaModel->save($comentario);
      session()->setFlashdata('msg', 'Comentario agregado con exito');
      return $this->response->redirect(base_url('/panel'));
    }
  }
}
