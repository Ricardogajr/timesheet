<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use Notifiable;
    
	protected $fillable = [
        'nome', 'email', 'endereco','cnpj','telefone',
    ];

    public function getCreatedAtAttribute($value) {
        $date = new \Carbon\Carbon($value);
        return $date->toIso8601String();
    }

    public function getNomeCliente($id) {
        $nome = $this::find($id);
        return compact('nome');
    }
}
