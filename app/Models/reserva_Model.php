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

   //Para traer el nombre de servicio para las reservas de todos los usuarios
  public function getReservasConServicios()
    {
        $builder = $this->db->table('reservas');
        $builder->select('reservas.*, servicios.titulo as servicio_nombre, usuarios.nombre as usuario_nombre, usuarios.apellido as usuario_apellido');
        $builder->join('servicios', 'servicios.id_servicio = reservas.id_servicio');
        $builder->join('usuarios', 'usuarios.id_usuario = reservas.id_usuario');
        $query = $builder->get();
        return $query->getResultArray();
    }

   //Para traer el nombre de servicio para las reservas de todos los usuarios
  public function getComentariosBuscados($busqueda)
    {
        $builder = $this->db->table('reservas');
        $builder->select('reservas.*, servicios.titulo as servicio_nombre, usuarios.nombre as usuario_nombre, usuarios.apellido as usuario_apellido');
        $builder->join('servicios', 'servicios.id_servicio = reservas.id_servicio');
        $builder->join('usuarios', 'usuarios.id_usuario = reservas.id_usuario');
        $builder->where('reservas.calificacion > 0');
        $builder->like('reservas.comentario', $busqueda);
        $builder->orLike('servicios.titulo', $busqueda);
        $query = $builder->get();
        return $query->getResultArray();
    }  

  //Para traer comentarios según la cantidad del limit
  public function getlimitReservasConServicios($limit=null, $start=null)
    {
        $builder = $this->db->table('reservas');
        $builder->select('reservas.*, servicios.titulo as servicio_nombre, usuarios.nombre as usuario_nombre, usuarios.apellido as usuario_apellido');
        $builder->join('servicios', 'servicios.id_servicio = reservas.id_servicio');
        $builder->join('usuarios', 'usuarios.id_usuario = reservas.id_usuario');
        $builder->where('reservas.calificacion > 0');
        $builder->limit($limit, $start);
        $query = $builder->get();
        return $query->getResultArray();
    }
  
  // Para el search del admin
  public function getReservasBuscadas($busqueda)
    {
        $builder = $this->db->table('reservas');
        $builder->select('reservas.*, servicios.titulo as servicio_nombre, usuarios.nombre as usuario_nombre, usuarios.apellido as usuario_apellido');
        $builder->join('servicios', 'servicios.id_servicio = reservas.id_servicio');
        $builder->join('usuarios', 'usuarios.id_usuario = reservas.id_usuario');
        $builder->where('reservas.calificacion > 0');
        $builder->where('reservas.fecha', $busqueda);
        $query = $builder->get();
        return $query->getResultArray();
    }


  //Para traer el nombre de servicio para las reservas de un usuario
  public function getReservasConServicio($id_usuario)
    {
        $builder = $this->db->table('reservas');
        $builder->select('reservas.*, servicios.titulo as servicio_nombre');
        $builder->join('servicios', 'servicios.id_servicio = reservas.id_servicio');
        $builder->where('id_usuario' , $id_usuario);
        $query = $builder->get();
        return $query->getResultArray();
    }
   
    //Para traer los datos de una reserva, asociados con el nombre del servicio
    public function getReservaConServicio($id_reserva)
    {
        $builder = $this->db->table('reservas');
        $builder->select('reservas.*, servicios.titulo as servicio_nombre');
        $builder->join('servicios', 'servicios.id_servicio = reservas.id_servicio');
        $builder->where('reservas.id_reserva' , $id_reserva);
        $query = $builder->get();
        return $query->getResultArray();
    }
  }