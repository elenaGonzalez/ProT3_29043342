<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data['titulo']='Pagina principal';
        echo view('front/head_view', $data);
        echo view('front/navbar_view');
        echo view('front/principal_view');
        echo view('front/comentarios_index_view');
        echo view('front/footer_view');
    }
     public function comentarios()
    {
        $data['titulo']='Comentarios';
        echo view('front/head_view', $data);
        echo view('front/navbar_view');
        echo view('front/comentarios_view');
        echo view('front/footer_view');
    }
    public function quienes_somos()
    {
        $data['titulo']='Quienes somos';
        echo view('front/head_view', $data);
        echo view('front/navbar_view');
        echo view('front/quienes_somos_view');
        echo view('front/footer_view');
    }
    public function acerca_de()
    {
        $data['titulo']='Acerca de';
        echo view('front/head_view', $data);
        echo view('front/navbar_view');
        echo view('front/acerca_de_view');
        echo view('front/footer_view');
    }
    public function registro()
    {
        $data['titulo']='Registro';
        echo view('front/head_view', $data);
        echo view('front/navbar_view');
        echo view('back/usuario/registro');
        echo view('front/footer_view');
    }
    public function login()
    {
        $data['titulo']='Login';
        echo view('front/head_view', $data);
        echo view('front/navbar_view');
        echo view('back/usuario/login');
        echo view('front/footer_view');
    }
    public function servicios()
    {
        $data['titulo']='Servicios';
        echo view('front/head_view', $data);
        echo view('front/navbar_view');
        echo view('front/servicios_view');
        echo view('front/footer_view');
    }
    public function contactos()
    {
        $data['titulo']='Contactos';
        echo view('front/head_view', $data);
        echo view('front/navbar_view');
        echo view('back/usuario/contactos');
        echo view('front/footer_view');
    }

     public function formValidation(){
          // Obtén los datos del formulario
        $data = $this->request->getPost();

        // Guarda los datos en la sesión (para pre-rellenar)
        $session = session();
        foreach ($data as $key => $value) {
            $session->setFlashdata($key, $value);
        }
         $input = $this->validate([
          'nombre' => 'required|min_length[3]',
          'apellido' => 'required|min_length[3]|max_length[25]',
          'email' => 'required|min_length[4]|max_length[100]',
          'celular' => 'required|numeric|min_length[10]|max_length[12]',
          'consulta' => 'required|max_length[600]',
         ]
        );
        
        if(!$input){
            $data['titulo'] = 'Contactos';
            echo view('front/head_view', $data);
            echo view('front/navbar_view');
            echo view('back/usuario/contactos');
            echo view('front/footer_view', ['validation' => $this->validator]);
      }else{
       /* A DESARROLLAR
       send_mail([
            'nombre' => $this->request->getVar('nombre'),
            'apellido' => $this->request->getVar('apellido'),
            'usuario' => $this->request->getVar('usuario'),
            'servicio' => $this->request->getVar('servicio'),
            'email' => $this->request->getVar('email'),
            'pass' => password_hash($this->request->getVar('pass'), PASSWORD_DEFAULT),
            
        ]);*/
        session()->setFlashdata('msg', 'Gracias por tu mensaje. En breve te estaremos contactando!!');
        return $this->response->redirect('./');
      }
    }
}
