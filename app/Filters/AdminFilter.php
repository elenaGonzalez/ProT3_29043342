<?php namespace App\Filters;

use CodeIgniter\Config\Services; // Si estás usando CodeIgniter 4
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AdminFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null) {
        $session = Services::session(); // Si estás usando CodeIgniter 4

        // Verifica si el usuario está logueado y si tiene el rol de administrador
        if (!$session->has('id_usuario') || !$session->has('id_perfil') || $session->get('id_perfil') != 1) {
            // Redirige al usuario a la página de inicio o a una página de acceso no autorizado
            return redirect()->to('/')->with('error', 'No tienes permisos para acceder a esta página');
        }
    }

    public function after(RequestInterface $request, $response, $arguments = null) {
        // No es necesario hacer nada en la función after para este caso
    }
}