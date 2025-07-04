<?php
namespace App\Models;
use CodeIgniter\Model;

class usuario_Model extends Model 
{
    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuario';
    protected $allowedFields = ['nombre','apellido','usuario', 'email', 'pass','id_perfil','baja', 'created_at'];

public function getUsuarios()
  {
    return $this->findAll();
  }

 public function __toString()
    {
        return $this->nombre . ' (' . $this->apellido . ')';
    }

}