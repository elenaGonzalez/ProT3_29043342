<?php

namespace App\Controllers;

use App\Models\reserva_Model;
use App\Models\servicio_Model;
use App\Models\usuario_Model;
use CodeIgniter\Controller;

class ServicioController extends Controller
{
    public function __construct()
    {
        helper(['form', 'url']);
    }

    public function form_editar($id_s)
    {
        $id_servicio = ['id_servicio' => $id_s];
        $servicioModel = new servicio_Model();
        $data = [
            'titulo' => 'Editar Servicio',
            'servicio' =>  $servicioModel->find($id_servicio)
        ];
        echo view('front/head_view', $data);
        echo view('front/navbar_view');
        echo view('back/usuario/editar_servicio', $id_servicio);
        echo view('front/footer_view');
    }

    public function formValidation($id_s)
    {
        $id_servicio = ['id_servicio' => $id_s];
        $input = $this->validate(
            [
                'titulo' => 'required|min_length[3]',
                'descripcion' => 'required|min_length[100]|max_length[5000]',
                'precio' => 'required|min_length[4]|max_length[100]',
                'iframe' => 'required|min_length[100]|max_length[500]'
            ]
        );

        $formModel = new servicio_Model();
        if (!$input) {
            $data = [
                'titulo' => 'Editar Servicio',
                'servicio' =>  $formModel->find($id_servicio)
            ];

            echo view('front/head_view', $data);
            echo view('front/navbar_view');
            echo view('back/usuario/editar_servicio', $id_servicio);
            echo view('front/footer_view', ['validation' => $this->validator]);
        } else {

            $servicio = [
                'id_servicio' => $id_servicio,
                'titulo' => $this->request->getVar('titulo'),
                'descripcion' => $this->request->getVar('descripcion'),
                'precio' =>  $this->request->getVar('precio'),
                'iframe' => $this->request->getVar('iframe')
            ];

            $formModel->save($servicio);
            session()->setFlashdata('msg', 'Servicio actualizado con exito');
            return $this->response->redirect(base_url('./panel/admin/servicios'));
        }
    }

    public function form_servicio()
    {
        $data['titulo'] = 'Creaar Servicio';
        echo view('front/head_view', $data);
        echo view('front/navbar_view');
        echo view('back/usuario/crear_servicio');
        echo view('front/footer_view');
    }

    public function formValidationServicio()
    {
        $data = $this->request->getPost();
        $session = session();
        foreach ($data as $key => $value) {
            $session->setFlashdata($key, $value);
        }

        $input = $this->validate(
            [
                'titulo' => 'required|min_length[3]',
                'descripcion' => 'required|min_length[100]|max_length[5000]',
                'precio' => 'required|min_length[4]|max_length[100]',
                'iframe' => 'required|min_length[100]|max_length[500]'
            ]
        );
        $formModel = new servicio_Model();

        if (!$input) {

            $data['titulo'] = 'Crear servicio';
            echo view('front/head_view', $data);
            echo view('front/navbar_view');
            echo view('back/usuario/crear_servicio');
            echo view('front/footer_view', ['validation' => $this->validator]);
        } else {
            $formModel->save([
                'titulo' => $this->request->getVar('titulo'),
                'descripcion' => $this->request->getVar('descripcion'),
                'precio' =>  $this->request->getVar('precio'),
                'iframe' => $this->request->getVar('iframe')
            ]);
            session()->setFlashdata('msg', 'Servicio registrado con exito');
            return $this->response->redirect(base_url('/panel/admin/servicios'));
        }
    }

    public function baja_servicio($id)
  {
    $id_servicio = ['id_servicio' => $id];
    $servicioModel = new servicio_Model();

    $servicio = [
      'servicio' =>  $servicioModel->find($id_servicio)
    ];

    $servicio = [
      'id_servicio' => $id_servicio,
      'baja' => 'SI'
    ];
    $servicioModel->save($servicio);
    session()->setFlashdata('msg', 'Servicio dado de Baja con éxito');
    return $this->response->redirect('../');
  }

  public function reactivar_servicio($id)
  {
    $id_servicio = ['id_servicio' => $id];
    $servicioModel = new servicio_Model();

    $servicio = [
      'servicio' =>  $servicioModel->find($id_servicio)
    ];

    $servicio = [
      'id_servicio' => $id_servicio,
      'baja' => 'NO'
    ];
    $servicioModel->save($servicio);
    session()->setFlashdata('msg', 'Servicio Reactivado con éxito');
    return $this->response->redirect(base_url('/panel/admin/servicios'));
  }
}
