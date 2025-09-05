<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Proyecto extends Model
{
    use HasFactory;

    protected $table = 'proyectos';
    protected $fillable = [
        'nombre',
        'fecha_inicio',
        'estado',
        'responsable',
        'monto',
        'created_by'
    ];

    public function creadopor()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'proyectos_user', 'proyecto_id', 'user_id')
            ->withTimestamps();
    }
}