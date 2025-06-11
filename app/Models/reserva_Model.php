<?php
namespace App\Models;
use CodeIgniter\Model;

class reserva_Model extends Model 
{
    protected $table = 'reservas';
    protected $primaryKey = 'id_reserva';
    protected $allowedFields = ['id_servicio','id_usuario','fecha', 'origen', 'comentario', 'calificacion',
    'cantidad_asientos', 'total', 'created_at'];


 public function getReservas()
  {
    return $this->findAll();
  }

  public function getReservasUsuario($id_usuario)
  {
     return $this->where('id_usuario' , $id_usuario)->findAll();
  }
  }