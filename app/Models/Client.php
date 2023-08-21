<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

class Client extends Model implements Authenticatable
{
    use HasFactory;
    protected $guard = "client";
    protected $table = "clients";
    protected $fillable = ['id','nome','email','telefone','senha'];

    public function getAuthIdentifierName(){
        return $this->getKeyName();
    }
    public function getAuthIdentifier(){
        return $this->{$this->getAuthIdentifierName()};
    }
    public function getAuthPassword(){
        return $this->senha;
    }
    public function getRememberToken(){

    }
    public function setRememberToken($value){

    }
    public function getRememberTokenName(){

    }

}
