<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Retiro2025 extends Model
{
    use HasFactory;

    protected $table = 'retiro2025';

    protected $fillable = [
        'user_id',
        'nome_completo',
        'telefone',
        'birthday',
        'cpf',
        'rg',
        'forma_pagamento',
        'pagamento_realizado',
        'adventista',
        'bairro_igreja',
        'outra_denominação',
        'vegetariano',
        'expectativa_retiro'
    ];

    /**
     * Relacionamento com o usuário.
     * Cada registro de inscrição está associado a um usuário.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
