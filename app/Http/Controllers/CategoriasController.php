<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoriasRequest;
use App\Models\Categorias;
use App\Services\CategoriasService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use function PHPUnit\Framework\exactly;

class CategoriasController extends Controller
{

    private $categoriasService;

    public function __construct(CategoriasService $categoriasService)
    {
        $this->categoriasService = $categoriasService;
    }

    public function index()
    {
        $categorias = Categorias::all();
        return view('categorias.index', compact($categorias));
    }
    public function create()
    {
        return view('categorias.create');
    }
    public function store(CategoriasRequest $request)
    {
        try {
            $newCategoria = $this->categoriasService->createCategoria($request->all());
            Log::channel('daily')->info("Nova categoria cadastrado com sucesso: " . $newCategoria);
            return redirect()->route('categorias.index')->with(['success' => 'Cadastrado com sucesso!']);
        } catch (Exception $exception) {
            Log::channel('daily')->error("Erro ao cadastraro nova categoria: " . $exception->getMessage());
            return redirect()->route('categorias.index')->withErrors([$exception->getMessage()]);
        }
    }
    public function show(Categorias $categorias)
    {
        return view('categorias.show', $categorias);
    }

    public function edit(Categorias $categorias)
    {
        return view('categorias.edit', compact('categorias'));
    }

    public function update(CategoriasRequest $request, Categorias $categorias)
    {
        try {
            $this->categoriasService->editCategoria($request->all(), $categorias->id);
            Log::channel('daily')->info("Categoria id: $categorias->id editado com sucesso");
            return redirect()->route('categorias.index')->with(['success' => 'Alterado com sucesso!']);
        } catch (Exception $exception) {
            Log::channel('daily')->error("Erro no update " . $exception->getMessage());
            return redirect()->route('categorias.index')->withErrors([$exception->getMessage()]);
        }
    }

    public function delete(Categorias $categorias)
    {
        return view('categorias.delete', compact('categorias'));
    }

    public function destroy(Categorias $categorias)
    {
        try {
            $this->categoriasService->deleteCategoria($categorias->id);
            Log::channel('daily')->info("Categoria id: $categorias->id Deletado com sucesso");
            return redirect()->route('categorias.index')->with(['success' => 'Deletado com sucesso!']);
        } catch (Exception $exception) {
            Log::channel('daily')->error('Erro ao deletar: ' . $exception->getMessage());
            return redirect()->route('categorias.index')->withErrors([$exception->getMessage()]);
        }
    }
}
