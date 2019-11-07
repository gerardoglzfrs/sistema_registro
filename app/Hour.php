<?php

namespace system_register;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Hour extends Model
{
    use Notifiable;

    protected $table='horas_servicio';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'num_control','fecha', 'hora_ent', 'hora_sal'
    ];

    public $timestamps = false;
}
