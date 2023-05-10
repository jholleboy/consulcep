<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Cidade extends Model
{
   protected $primaryKey = 'id';
   protected $table = 'cidade';
   protected $fillable = ['cep','logradouro','complemento','localidade','uf','ibge','gia','ddd','siafi'];
    public  $timestamps   = false;
}
