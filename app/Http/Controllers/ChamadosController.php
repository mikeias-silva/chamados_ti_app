<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChamadosRequest;
use App\Models\Chamados;
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
        $chamados = Chamados::all();
        return view('chamados.index', compact('chamados'));
    }

    public function create()
    {
        return view('chamados.create');
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

    public function show(Chamados $chamados)
    {
        return view('chamados.show', compact('chamados'));
    }

    public function edit(Chamados $chamados)
    {
        return view('chamados.edit', compact('chamados'));
    }

    public function update(ChamadosRequest $request, Chamados $chamados)
    {
        try {
            $this->chamadosService->editChamados($request->all(), $chamados->id);
            return redirect()->route('chamados.index')->with(['success' => 'Chamado atualizado com sucesso']);
        } catch (Exception $exception) {
            return redirect()->route('chamados.index')->withErrors([$exception->getMessage()]);
        }
    }

    public function delete(Chamados $chamados)
    {
        return view('chamados.delete', compact('chamados'));
    }

    public function destroy(Chamados $chamados)
    {
        try {
            $this->chamadosService->deleteChamados($chamados->id);
            return redirect()->route('chamados.index')->with(['success' => "Chamado $chamados->id deletado com sucesso"]);
        } catch (Exception $exception) {
            return redirect()->route('chamados.index')->withErrors([$exception->getMessage()]);
        }
    }
}
