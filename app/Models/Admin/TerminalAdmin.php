<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TerminalAdmin extends Model
{
    use HasFactory;
    protected $table = 'terminais';
    protected $fillable = ['id','nome','agencia_id','destino_id'];
}
