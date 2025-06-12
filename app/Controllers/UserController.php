<?php

namespace App\Controllers;

use App\Models\usuario_Model;

class UserController extends BaseController
{
    public function __construct()
    {
        helper(['form', 'url']);
    }

    public function create()
    {
        $data['titulo'] = 'Registro';
        echo view('front/head_view', $data);
        echo view('front/navbar_view');
        echo view('back/usuario/registro');
        echo view('front/footer_view');
    }

    public function formValidation()
    {
        $input = $this->validate(
            [
                'nombre' => 'required|min_length[3]',
                'apellido' => 'required|min_length[3]|max_length[25]',
                'usuario' => 'required|min_length[3]',
                'email' => 'required|min_length[4]|max_length[100]|valid_email|is_unique[usuarios.email,id,{id}]',
                'pass' => 'required|min_length[3]|max_length[10]',
                'pass_confirm' => 'required|max_length[255]|matches[pass]',
            ]
        );
        $formModel = new usuario_Model();

        if (!$input) {

            $data['titulo'] = 'Registro';
            echo view('front/head_view', $data);
            echo view('front/navbar_view');
            echo view('back/usuario/registro');
            echo view('front/footer_view', ['validation' => $this->validator]);
        } else {
            $formModel->save([
                'nombre' => $this->request->getVar('nombre'),
                'apellido' => $this->request->getVar('apellido'),
                'usuario' => $this->request->getVar('usuario'),
                'email' => $this->request->getVar('email'),
                'pass' => password_hash($this->request->getVar('pass'), PASSWORD_DEFAULT),

            ]);
            session()->setFlashdata('msg', 'Usuario registrado con exito');
            return $this->response->redirect('login');
        }
    }

    public function perfil()
    {
        $data['titulo'] = 'Perfil';
        echo view('front/head_view', $data);
        echo view('front/navbar_view');
        echo view('front/perfil');
        echo view('front/footer_view');
    }
    public function reservas()
    {
        $data['titulo'] = 'Reservas';
        echo view('front/head_view', $data);
        echo view('front/navbar_view');
        echo view('back/usuario/reservas');
        echo view('front/footer_view');
    }
}
