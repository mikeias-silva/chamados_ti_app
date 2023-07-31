<?php

namespace App\Services;

use App\Models\Categorias;
use App\Models\Chamados;
use App\Models\Situacoes;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ChamadosService
{
    public function prazoSolucao($categoria): Carbon
    {
        $categoria = Categorias::find($categoria);
        if ($categoria->nome === 'outro' || $categoria->nome === 'sugestão') {
            $prazo = Carbon::now()->addDays(30);
        } elseif ($categoria->nome === 'nova funcionalidade') {
            $prazo = Carbon::now()->addDays(2);
        } elseif ($categoria->nome === 'problema') {
            $prazo = Carbon::now()->addDay();
        } else {
            $prazo = Carbon::now()->addDays(7);
        }
        return $prazo;
    }

    public function createChamado(array $data): Chamados
    {
        try {
            $situacao = Situacoes::where('nome', 'novo')->first();
            $prazoSolucao = $this->prazoSolucao($data['categoria_id']);
            $data = array_merge($data, [
                'user_id' => Auth::id() ?? 1,
                'situacao_id' => $situacao->id,
                'prazo_solucao' => $prazoSolucao,
            ]);
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
