<?php

namespace App\Controllers;

class User extends BaseController
{
    public function perfil()
    {
        echo view('front/head_view');
        echo view('front/navbar_view');
        echo view('front/perfil_view');
        echo view('front/footer_view');
    }
     public function reservas()
    {
        echo view('front/head_view');
        echo view('front/navbar_view');
        echo view('front/reservas_view');
        echo view('front/footer_view');
    }
}