<?php

namespace App\Controllers;

use App\Models\reserva_Model;
use App\Models\usuario_Model;
use CodeIgniter\Controller;

class AdminController extends Controller
{
  public function index()
  {
    $session = session();
    $nombre = $session->get('usuario');
    $perfil = $session->get('id_perfil');


    $dato['id_perfil'] = $perfil;
    $dato['nombre'] = $nombre;

    $data['titulo']= 'Panel de Admin';
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
            'reservas' => $reservaModel->getReservas()
          ];
    echo view('front/head_view', $data);
    echo view('front/navbar_view');
    echo view('back/usuario/gestionar_reservas');
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
  
}