<?php

namespace system_register;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class servicio extends Model
{
    use Notifiable;

    protected $table='alumnos_servicio';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'foto','num_control', 'nombre', 'ape_p', 'ape_m', 'carrera', 'area','estatus', 'inicio_serv', 'id'
    ];

    public $timestamps = false;
}
