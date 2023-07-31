<?php

namespace App\Presenters;

use Carbon\Carbon;

class ChamadosPresenter
{
    public function dataCriacao($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

    public function prazoSolucao($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }
}
