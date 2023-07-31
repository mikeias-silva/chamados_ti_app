<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChamadosRequest;
use App\Models\Categorias;
use App\Models\Chamados;
use App\Models\Situacoes;
use App\Services\ChamadosService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ChamadosController extends Controller
{
    private $chamadosService;

    public function __construct(ChamadosService $chamadosService)
    {
        $this->chamadosService = $chamadosService;
    }

    public function index()
    {
        $chamados = Chamados::with('usuario', 'situacao', 'categoria')->get();
        return view('chamados.index', compact('chamados'));
    }

    public function create()
    {
        $categorias = Categorias::all();
        $situacoes = Situacoes::all();
        return view('chamados.create', compact('categorias', 'situacoes'));
    }

    public function store(ChamadosRequest $request)
    {

        try {
            $newChamado = $this->chamadosService->createChamado($request->all());
            return redirect()->route('chamados.index')->with(['success' => "Chamado $newChamado->id criado com sucesso!"]);
        } catch (Exception $exception) {
            return redirect()->route('chamados.index')->withErrors([$exception->getMessage()]);
        }
    }

    public function show(Chamados $chamado)
    {
        $chamado->load('usuario', 'categoria', 'situacao');
        return view('chamados.show', compact('chamado'));
    }

    public function edit(Chamados $chamado)
    {
        $chamado->load( 'categoria', 'situacao');
        $categorias = Categorias::all();
        return view('chamados.edit', compact('chamado', 'categorias'));
    }

    public function update(ChamadosRequest $request, Chamados $chamado)
    {
        try {
            $this->chamadosService->editChamados($request->all(), $chamado->id);
            return redirect()->route('chamados.index')->with(['success' => 'Chamado atualizado com sucesso']);
        } catch (Exception $exception) {
            return redirect()->route('chamados.index')->withErrors([$exception->getMessage()]);
        }
    }

    public function delete(Chamados $chamado)
    {
        return view('chamados.delete', compact('chamado'));
    }

    public function destroy(Chamados $chamado)
    {
        try {
            $this->chamadosService->deleteChamados($chamado->id);
            return redirect()->route('chamados.index')->with(['success' => "Chamado $chamado->id deletado com sucesso"]);
        } catch (Exception $exception) {
            return redirect()->route('chamados.index')->withErrors([$exception->getMessage()]);
        }
    }
}
