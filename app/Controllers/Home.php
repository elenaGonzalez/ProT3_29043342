<?php

namespace App\Controllers;

use App\Models\reserva_Model;
use App\Models\servicio_Model;

class Home extends BaseController
{
    public function index()
    {
         $reservaModel = new reserva_Model();
        $data = [
            'titulo' => 'Comentarios',
            'comentarios' => $reservaModel->getlimitReservasConServicios(5)
        ];

        $data['titulo'] = 'Pagina principal';
        echo view('front/head_view', $data);
        echo view('front/navbar_view');
        echo view('front/principal_view');
        echo view('front/comentarios_index_view');
        echo view('front/footer_view');
    }
    public function comentarios()
    {
        $reservaModel = new reserva_Model();
        $data = [
            'titulo' => 'Comentarios',
            'comentarios' => $reservaModel->getReservasConServicios()
        ];
        
        echo view('front/head_view', $data);
        echo view('front/navbar_view');
        echo view('front/comentarios_view');
        echo view('front/footer_view');
    }
    public function quienes_somos()
    {
        $data['titulo'] = 'Quienes somos';
        echo view('front/head_view', $data);
        echo view('front/navbar_view');
        echo view('front/quienes_somos_view');
        echo view('front/footer_view');
    }
    public function acerca_de()
    {
        $data['titulo'] = 'Acerca de';
        echo view('front/head_view', $data);
        echo view('front/navbar_view');
        echo view('front/acerca_de_view');
        echo view('front/footer_view');
    }
    public function registro()
    {
        $data['titulo'] = 'Registro';
        echo view('front/head_view', $data);
        echo view('front/navbar_view');
        echo view('back/usuario/registro');
        echo view('front/footer_view');
    }
    public function login()
    {
        $data['titulo'] = 'Login';
        echo view('front/head_view', $data);
        echo view('front/navbar_view');
        echo view('back/usuario/login');
        echo view('front/footer_view');
    }
    public function servicios()
    {
        $serviciosModel = new servicio_Model();

        $data = [
            'titulo' => 'Servicios',
            'servicios' => $serviciosModel->find()
        ];
        echo view('front/head_view', $data);
        echo view('front/navbar_view');
        echo view('front/servicios_view');
        echo view('front/footer_view');
    }
    public function contactos()
    {
        $serviciosM = new servicio_Model();
        $data =[
            'titulo' => 'Contactos',
             'servicios' => $serviciosM->find()
        ];
    
        echo view('front/head_view', $data);
        echo view('front/navbar_view');
        echo view('back/usuario/contactos');
        echo view('front/footer_view');
    }

    public function formValidation()
    {
        // Obtén los datos del formulario
        $data = $this->request->getPost();

        // Guarda los datos en la sesión (para pre-rellenar)
        $session = session();
        foreach ($data as $key => $value) {
            $session->setFlashdata($key, $value);
        }
        $valorSeleccionado = $data["servicio"];

        $input = $this->validate(
            [
                'nombre' => 'required|min_length[3]',
                'apellido' => 'required|min_length[3]|max_length[25]',
                'email' => 'required|min_length[4]|max_length[100]',
                'celular' => 'required|numeric|min_length[10]|max_length[12]',
                'consulta' => 'required|max_length[600]',
            ]
        );

        if (!$input) {
            $data['titulo'] = 'Contactos';
            echo view('front/head_view', $data);
            echo view('front/navbar_view');
            echo view('back/usuario/contactos');
            echo view('front/footer_view', ['validation' => $this->validator]);
        } else {
            
       $send_mail =[
            'nombre' => $this->request->getVar('nombre'),
            'apellido' => $this->request->getVar('apellido'),
            'email' => $this->request->getVar('email'),
            'servicio' => $valorSeleccionado,
            'celular' => $this->request->getVar('celular'),
            'consulta' => $this->request->getVar('consulta')
        ];
          
        $to = 'turismocorrientes@gmail.com';
        $message = $send_mail['consulta'];

        $email = \Config\Services::email();
        $email->setTo($to); 
        $email->setFrom($send_mail['email'], $send_mail['nombre'].' '. $send_mail['apellido'], null);
        $email->setSubject('Turismo Corrientes. Servicio : '.$send_mail['servicio']);
        $email->setMessage($message.'. Mi celular es :'.$send_mail['celular']);
        
        $email->send();

        session()->setFlashdata('msg', 'Gracias por tu mensaje. En breve te estaremos contactando!!');
            return $this->response->redirect('./');
    }
    }

    public function buscar_comentarios()
    {
         $data = $this->request->getPost();
         $comentarios = new reserva_Model();
         $busqueda = $this->request->getVar('buscar');
         $comentarios_a_buscar= $comentarios->getComentariosBuscados($busqueda);

         $data = [
            'titulo' => 'Comentarios que incluyen: '.$busqueda,
            'comentarios' => $comentarios_a_buscar
         ];
         
            echo view('front/head_view', $data);
            echo view('front/navbar_view');
            echo view('front/comentarios_view');
            echo view('front/footer_view');
    }
}
