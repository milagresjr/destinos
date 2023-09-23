<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RotaAdmin extends Model
{
    use HasFactory; 
    protected $table = "routes";
    protected $fillable = ['id','local_partida','local_destino','agencia_id'];
}
