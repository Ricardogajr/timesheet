<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class TimeSheet extends Model
{	
	use Notifiable;
	protected $fillable = ['cliente_id', 'consultor_id', 'data','horaini','horafim', 'desconto', 'translado', 'total', 'descricao', 'email'];
}
