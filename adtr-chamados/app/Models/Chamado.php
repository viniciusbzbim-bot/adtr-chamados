<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Chamado extends Model
{
    use HasFactory;

    protected $table = 'chamados';

    protected $fillable = [
        'user_id',
        'assunto',
        'descricao',
        'categoria',
        'prioridade',
        'status',
        'data_abertura'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
