<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        echo view('front/head_view');
        echo view('front/navbar_view');
        echo view('front/principal_view');
        echo view('front/comentarios_index_view');
        echo view('front/footer_view');
    }
     public function comentarios()
    {
        echo view('front/head_view');
        echo view('front/navbar_view');
        echo view('front/comentarios_view');
        echo view('front/footer_view');
    }
    public function quienes_somos()
    {
        echo view('front/head_view');
        echo view('front/navbar_view');
        echo view('front/quienes_somos_view');
        echo view('front/footer_view');
    }
    public function acerca_de()
    {
        echo view('front/head_view');
        echo view('front/navbar_view');
        echo view('front/acerca_de_view');
        echo view('front/footer_view');
    }
    public function registro()
    {
        echo view('front/head_view');
        echo view('front/navbar_view');
        echo view('front/registro_view');
        echo view('front/footer_view');
    }
    public function login()
    {
        echo view('front/head_view');
        echo view('front/navbar_view');
        echo view('front/login_view');
        echo view('front/footer_view');
    }
    public function servicios()
    {
        echo view('front/head_view');
        echo view('front/navbar_view');
        echo view('front/servicios_view');
        echo view('front/footer_view');
    }
    public function contactos()
    {
        echo view('front/head_view');
        echo view('front/navbar_view');
        echo view('front/contactos_view');
        echo view('front/footer_view');
    }
}
