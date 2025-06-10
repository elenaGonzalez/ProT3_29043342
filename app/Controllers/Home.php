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
        echo view('front/contactos_view');
        echo view('front/footer_view');
    }
}
