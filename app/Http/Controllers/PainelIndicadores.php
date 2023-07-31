<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use App\Models\Chamados;
use App\Services\ChamadosService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PainelIndicadores extends Controller
{
    private $chamadosService;

    public function __construct(ChamadosService $chamadosService)
    {
        $this->chamadosService = $chamadosService;
    }

    public function index()
    {
        $categorias = Categorias::all();
        return view('indicadores.filtro', compact('categorias'));
    }

    public function filtrar(Request $request)
    {
        $inicio = Carbon::create($request->data_chamado)->firstOfMonth()->setTime(0, 0, 0);
        $fim = Carbon::create($request->data_chamado)->lastOfMonth()->setTime(23, 59, 59);

        $chamadosPorCategoria = $this->chamadosService->contarPorCategoriaNoPeriodo($inicio, $fim);
        $totalChamadosResolvidos = $this->chamadosService->contarChamadosResolvidosDentroPrazo($inicio, $fim);
        $totalChamadosAbertos = $this->chamadosService->contarChamadosAbertosNoPeriodo($inicio, $fim);

        $percentualResolvidosDentroPrazo = 0;
        if ($totalChamadosAbertos > 0) {
            $percentualResolvidosDentroPrazo = ($totalChamadosResolvidos / $totalChamadosAbertos) * 100;
        }

        return view('indicadores.painel_indicadores', compact('chamadosPorCategoria', 'totalChamadosAbertos',
            'totalChamadosResolvidos', 'percentualResolvidosDentroPrazo'));
    }
}
