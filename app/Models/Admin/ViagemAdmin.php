<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViagemAdmin extends Model
{
    use HasFactory;
    protected $table = "travels";
    protected $fillable = ['id','rota','preco_bilhete','data_partida','hora_partida','hora_chegada','agencia_id','terminal_partida','terminal_chegada'];
}




























