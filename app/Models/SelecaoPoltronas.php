<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SelecaoPoltronas extends Model
{
    use HasFactory;
    protected $table = "viagem_poltronas";
    protected $fillable = ['viagem_id','numero_poltrona'];
}
