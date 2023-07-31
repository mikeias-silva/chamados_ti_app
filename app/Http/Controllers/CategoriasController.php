<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoriasRequest;
use App\Models\Categorias;
use App\Services\CategoriasService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use Illuminate\View\View;
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
        return view('categorias.index', compact('categorias'));
    }
    public function create()
    {
        return view('categorias.create');
    }
    public function store(CategoriasRequest $request)
    {
        try {
            $newCategoria = $this->categoriasService->createCategoria($request->all());
            return redirect()->route('categorias.index')->with(['success' => 'Cadastrado com sucesso!']);
        } catch (Exception $exception) {
            return redirect()->route('categorias.index')->withErrors([$exception->getMessage()]);
        }
    }
    public function show(Categorias $categoria)
    {
        return view('categorias.show', $categoria);
    }

    public function edit(Categorias $categoria)
    {
        return view('categorias.edit', compact('categoria'));
    }

    public function update(CategoriasRequest $request, Categorias $categoria)
    {
        try {
            $this->categoriasService->editCategoria($request->all(), $categoria->id);
            return redirect()->route('categorias.index')->with(['success' => 'Alterado com sucesso!']);
        } catch (Exception $exception) {
            return redirect()->route('categorias.index')->withErrors([$exception->getMessage()]);
        }
    }

    public function delete(Categorias $categoria)
    {
        return view('categorias.delete', compact('categoria'));
    }

    public function destroy(Categorias $categoria)
    {
        try {
            $this->categoriasService->deleteCategoria($categoria->id);
            return redirect()->route('categorias.index')->with(['success' => 'Deletado com sucesso!']);
        } catch (Exception $exception) {
            return redirect()->route('categorias.index')->withErrors([$exception->getMessage()]);
        }
    }
}
