<?php

namespace App\Models;

use App\Presenters\SituacaoPresenter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Situacoes extends Model
{
    use HasFactory;

    protected $connection = 'mysql';

    protected $table = 'situacoes';
    protected $fillable = ['nome'];

    public function presenter()
    {
        return new SituacaoPresenter($this);
    }
    public function chamados()
    {
        return $this->belongsTo(Chamados::class, 'situacao_id', 'id');
    }
}
