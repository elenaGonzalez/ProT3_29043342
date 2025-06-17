<?php

namespace App\Controllers;

use App\Models\usuario_Model;
use CodeIgniter\Controller;

class LoginController extends Controller
{
    public function index()
    {
        helper(['form', 'url']);
        $data['titulo'] = 'Login';
        echo view('front/head_view', $data);
        echo view('front/navbar_view');
        echo view('back/usuario/login');
        echo view('front/footer_view');
    }

    public function auth()
    {
        $session = session();
        $model = new usuario_Model();

        $email = $this->request->getVar('email');
        $password = $this->request->getPost('pass');

        $data = $model->where('email', $email)->first();
        if ($data) {
            $pass = $data['pass'];
            $ba = $data['baja'];
            
            if ($ba == "SI") {
                $session->setFlashdata('msg', 'Usuario dado de baja');
                return redirect()->to('/login');
            }
            $verfy_pass = password_verify($password, $pass);


            
            if ($verfy_pass) {
                $ses_data = [
                    'id_usuario' => $data['id_usuario'],
                    'nombre' => $data['nombre'],
                    'apellido' => $data['apellido'],
                    'email' => $data['email'],
                    'usuario' => $data['usuario'],
                    'pass' => $data['pass'],
                    'id_perfil' => $data['id_perfil'],
                    'logged_in' => TRUE
                ];
                $session->set($ses_data);
                $session->set('id_usuario', $ses_data['id_usuario'] ) ;

                $session->setFlashdata('msg', 'Bienvenido');
                return redirect()->to('/panel');
            } else {
                $session->setFlashdata('msg', 'Password Incorrecto');
                 $session->setFlashdata('msg', $pass);
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('msg', 'No existe el Email o es Incorrecto');
            return redirect()->to('/login');
        }
    }

    public function logout() {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
}