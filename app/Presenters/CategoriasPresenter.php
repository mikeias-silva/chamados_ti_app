<?php

namespace App\Presenters;

class CategoriasPresenter
{
    public function nome($value)
    {
        return ucwords($value);
    }
}
