<?php

namespace App\Models;

use App\Presenters\CategoriasPresenter;
use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    protected $connection = 'mysql';

    protected $table = 'categorias';
    protected $fillable = ['nome'];

    public function presenter()
    {
        return new CategoriasPresenter($this);
    }
    public function chamados()
    {
        return $this->belongsTo(Chamados::class, 'categoria_id', 'id');
    }
}
