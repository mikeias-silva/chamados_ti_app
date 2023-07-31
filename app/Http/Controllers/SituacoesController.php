<?php

namespace App\Http\Controllers;

use App\Http\Requests\SituacoesRequest;
use App\Models\Situacoes;
use App\Services\SituacoesService;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SituacoesController extends Controller
{

    private $situacoesService;

    public function __construct(SituacoesService $situacoesService)
    {
        $this->situacoesService = $situacoesService;
    }

    public function index()
    {
        $situacoes = Situacoes::all();
        return view('situacoes.index', compact('situacoes'));
    }

    public function create()
    {
        return view('situacoes.create');
    }

    public function store(SituacoesRequest $request)
    {
        try {
             $this->situacoesService->createSituacao($request->validated());
            return redirect()->route('situacoes.index')->with(['success' => 'Cadastrado com sucesso!']);
        } catch (Exception $exception) {
            return redirect()->route('situacoes.index')->withErrors($exception->getMessage());
        }
    }

    public function show(Situacoes $situacao)
    {
        return view('situacoes.show', compact('situacao'));
    }

    public function edit(Situacoes $situacao)
    {
        return view('situacoes.edit', compact('situacao'));
    }

    public function update(SituacoesRequest $request, Situacoes $situacao)
    {
        try {
            $this->situacoesService->editSituacao($request->validated(), $situacao->id);
            return redirect()->route('situacoes.index')->with(['success' => 'Editado com sucesso!']);
        } catch (Exception $exception) {
            return redirect()->route('situacoes.index')->withErrors($exception->getMessage());
        }
    }

    public function delete(Situacoes $situacao)
    {
        try {
            return view('situacoes.delete', compact('situacao'));
        } catch (ModelNotFoundException $exception) {
            return redirect()->route('situacoes.index')->withErrors([$exception->getMessage()]);
        }
    }

    public function destroy($situacao)
    {
        try {
            $this->situacoesService->deleteSituacao($situacao);
            return redirect()->route('situacoes.index')->with(['success' => 'Deletado com sucesso']);
        } catch (Exception $exception) {
            return redirect()->route('situacoes.index')->withErrors([$exception->getMessage()]);
        }
    }
}
