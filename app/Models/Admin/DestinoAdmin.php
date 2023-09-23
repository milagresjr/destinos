<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DestinoAdmin extends Model
{
    use HasFactory;
    protected $table = "destinos";
    protected $fillable = ['id','nome','descricao','foto'];
}
