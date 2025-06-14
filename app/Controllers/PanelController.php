<?php

namespace App\Controllers;

use App\Models\reserva_Model;
use App\Models\usuario_Model;
use CodeIgniter\Controller;

class PanelController extends Controller
{
  public function index()
  {
    $session = session();
    $nombre = $session->get('usuario');
    $perfil = $session->get('id_perfil');


    $dato['id_perfil'] = $perfil;
    $dato['nombre'] = $nombre;

    $data['titulo']= 'Panel de Usuario';
    echo view('front/head_view', $data);
    echo view('front/navbar_view');
    echo view('back/usuario/perfil', $dato);
    echo view('front/footer_view');

  }

  public function reservas($id)
  {
    $id_usuario = ['id_usuario' => $id];
    $usuarioModel = new usuario_Model();
    $reservaModel = new reserva_Model();

    $data = [
      'titulo' => 'Reservas de Usuario',
      'reservas' =>  $reservaModel-> where($id_usuario)->find()
    ];

    echo view('front/head_view', $data);
    echo view('front/navbar_view');
    echo view('back/usuario/reservas');
    echo view('front/footer_view');

  }
}