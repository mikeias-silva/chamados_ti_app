<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Situacoes extends Model
{
    use HasFactory;

    protected $connection = 'mysql';

    protected $table = 'situacoes';
    protected $fillable = ['nome'];

    public function chamados()
    {
        return $this->belongsTo(Chamados::class, 'situacao_id', 'id');
    }
}
