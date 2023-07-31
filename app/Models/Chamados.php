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


    public function categoria()
    {
        return $this->hasOne(Categorias::class, 'id', 'categoria_id');
    }

    public function situacao()
    {
        return $this->hasOne(Situacoes::class, 'id', 'situacao_id');
    }

    public function usuario()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
