<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;
    protected $table = "reservas";
    protected $fillable = ['id','numero_poltrona','preco_total','client_id','viagem_id','nome_passageiro','idade_passageiro','status'];
}
