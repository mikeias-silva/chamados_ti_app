<?php

namespace App\Presenters;

class SituacaoPresenter
{
    public function nome($value)
    {
        return ucwords($value);
    }
}
