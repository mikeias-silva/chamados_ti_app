<?php

namespace App\Services;

use App\Models\Categorias;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;

class CategoriasService
{

    public function createCategoria(array $data): Categorias
    {
        try {
            $newCategoria = Categorias::create($data);
            Log::channel('daily')->info("Nova categoria cadastrado com sucesso: $newCategoria");
            return $newCategoria;
        } catch (Exception $exception) {
            Log::channel('daily')->error("Erro ao cadastrar categoria: $exception");
            throw $exception;
        }
    }

    public function editCategoria(array $data, $id): Categorias
    {
        try {
            $categoria = Categorias::find($id);
            $categoria->update($data);
            Log::channel('daily')->info("Categoria editada com sucesso!: $categoria->id");
            return $categoria;
        } catch (ModelNotFoundException $exception) {
            Log::channel('daily')->error("Erro ao editar categoria!: $categoria->id");
            throw $exception;
        }
    }

    public function deleteCategoria($id): void
    {
        try {
            $categoria = Categorias::findOrFail($id);
            $categoria->delete();
            Log::channel('daily')->info("Categoria deletada com sucesso!: $categoria->id");
        } catch (ModelNotFoundException $exception) {
            Log::channel('daily')->error("Erro ao excluir categoria: $categoria->id");
            throw new Exception($exception);
        }
    }
}
