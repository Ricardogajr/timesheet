<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projeto extends Model
{
    protected $fillable = ['descricao','cliente_id', 'consultor_id', 'tipoHora','totalHr','totalHrConsumida'];
}
