<?php

namespace system_register;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use Notifiable;

    protected $table='registros';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'foto','num_control', 'nombre', 'ape_p', 'ape_m', 'carrera', 'hora_ent', 'fecha', 'id'
    ];

    public $timestamps = false;
}
