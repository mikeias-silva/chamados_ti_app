<?php

namespace App\Services;

use App\Models\Situacoes;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;

class SituacoesService
{
    public function createSituacao(array $data): Situacoes
    {
        try {
            $newSituacao = Situacoes::create($data);
            Log::channel('daily')->info('Cadastrado nova situação: ' . $newSituacao);
            return $newSituacao;
        } catch (Exception $exception) {
            Log::channel('daily')->error('Erro ao cadastrar situação: ' . $exception);
            throw $exception;
        }
    }

    public function editSituacao(array $data, int $situacaoId): Situacoes
    {
        try {
            $situacao = Situacoes::findOrFail($situacaoId);
            Log::channel('daily')->info("Editado situação: $situacao->id");
            return $situacao->update($data);
        } catch (Exception $exception) {
            Log::channel('daily')->error("Erro editar situação: $exception");
            throw $exception;
        }
    }

    public function deleteSituacao(int $id): void
    {
        try {
            $situacao = Situacoes::findOrFail($id);
            $situacao->delete();
            Log::channel('daily')->info("Deletado com sucesso!");
        } catch (ModelNotFoundException $exception) {
            Log::channel('daily')->info("Erro ao deletar situação: $exception");
            throw new Exception($exception->getMessage());
        }
    }
}
