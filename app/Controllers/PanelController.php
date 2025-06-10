<?php

namespace App\Controllers;

use App\Models\reserva_Model;
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

  public function reservas()
  {
    $session = session();
    $id_usuario = $session->get('id_usuario');
    $nombre = $session->get('usuario');
    $apellido = $session->get('apellido');
    $email = $session->get('email');
    $perfil = $session->get('id_perfil');

    $dato['id_perfil'] = $perfil;
    $dato['id_usuario'] = $id_usuario;
    $dato['nombre'] = $nombre;
    $dato['apellido'] = $apellido;
    $dato['email'] = $email;

    $data['titulo'] =  'Reservas';
    echo view('front/head_view', $data);
    echo view('front/navbar_view');
    echo view('back/usuario/reservas', $dato);
    echo view('front/footer_view');

  }
}