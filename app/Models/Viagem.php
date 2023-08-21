<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Viagem extends Model
{
    use HasFactory;
    protected $table = "viagens";
    protected $fillable = ['id','ponto_partida','destino','data_partida','hora_partida','agencia_id'];
}
