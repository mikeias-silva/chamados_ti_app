<?php

namespace App\Services;

use App\Models\Situacoes;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SituacoesService
{
    public function createSituacao(array $data): Situacoes
    {
        return Situacoes::create($data);
    }

    public function editSituacao(array $data, int $situacaoId): Situacoes
    {
        $situacao = Situacoes::findOrFail($situacaoId);
        return $situacao->update($data);
    }

    public function deleteSituacao(int $id): void
    {
        try {
            $situacao = Situacoes::findOrFail($id);
            $situacao->delete();
        } catch (ModelNotFoundException $exception) {
            throw new Exception($exception->getMessage());

        }

    }
}
