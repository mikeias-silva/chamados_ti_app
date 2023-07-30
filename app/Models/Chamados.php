<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chamados extends Model
{
    use HasFactory;

    protected $connection = 'mysql';

    protected $table = 'chamados';
    protected $fillable = ['titulo', 'descricao', 'prazo_solucao', 'data_criacao', 'data_solucao', 'categoria_id',
        'situacao_id', 'user_id'];


    public function categorias()
    {
        return $this->hasMany(Categorias::class, 'categoria_id', 'id');
    }

    public function situacoes()
    {
        return $this->hasMany(Situacoes::class, 'situacao_id', 'id');
    }
}
