<?php
namespace App\Models;
use CodeIgniter\Model;

class servicio_Model extends Model 
{
    protected $table = 'servicios';
    protected $primaryKey = 'id_servicio';
    protected $allowedFields = ['titulo','descripcion','precio', 'iframe', 'baja', 'created_at'];


 public function getServicios()
  {
    return $this->findAll();
  }

  }