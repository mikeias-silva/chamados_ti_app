<?php

namespace App\Services;

use App\Models\Chamados;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;

class ChamadosService
{
    public function createChamado(array $data): Chamados
    {
        try {
            return Chamados::create($data);
        } catch (Exception $exception) {
            Log::channel('daily')->error("Erro ao criar novo chamado: $exception");
            throw $exception;
        }
    }

    public function editChamados(array $data, $id)
    {
        try {
            $chamados = Chamados::findOrFail($id);
            Log::channel('daily')->info("Chamado id $chamados->id atualizado com sucesso!");
            return $chamados->update($data);
        } catch (ModelNotFoundException $exception) {
            Log::channel('daily')->error("Erro ao editar chamado: $exception");
            throw new Exception($exception);
        }
    }

    public function deleteChamados($id)
    {
        try {
            $chamados = Chamados::find($id);
            Log::channel('daily')->info("Chamado id $chamados->id deletado com sucesso!");
            return $chamados->delete();
        } catch (Exception $exception) {
            Log::channel('daily')->error("Erro ao deletar chamado: $exception");
            throw new Exception($exception);
        }
    }

}
