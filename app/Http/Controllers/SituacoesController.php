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

    public function show(Situacoes $situacoes)
    {
        return view('situacoes.show', compact('situacoes'));
    }

    public function edit(Situacoes $situacoes)
    {
        return view('situacoes.edit', compact('situacoes'));
    }

    public function update(SituacoesRequest $request, Situacoes $situacoes)
    {
        try {
            $this->situacoesService->editSituacao($request->validated(), $situacoes->id);
            return redirect()->route('situacoes.index')->with(['success' => 'Editado com sucesso!']);
        } catch (Exception $exception) {
            return redirect()->route('situacoes.index')->withErrors($exception->getMessage());
        }
    }

    public function delete(Situacoes $situacoes)
    {
        try {
            return view('situacoes.delete', compact('situacoes'));
        } catch (ModelNotFoundException $exception) {
            return redirect()->route('situacoes.index')->withErrors([$exception->getMessage()]);
        }
    }

    public function destroy($situacoes)
    {
        try {
            $this->situacoesService->deleteSituacao($situacoes);
            return view('situacoes.index')->with(['success' => 'Deletdo com sucesso']);
        } catch (Exception $exception) {
            return redirect()->route('situacoes.index')->withErrors([$exception->getMessage()]);
        }
    }
}
