<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgenciaAdmin extends Model
{
    use HasFactory;
    protected $table = 'agencias';
    protected $fillable = ['id','nome','logo','endereco','email','telefone','descricao'];
}
