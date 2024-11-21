<?php

namespace App\Http\Controllers;

use App\Models\AlunoUso;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class RelatorioController extends Controller
{
    public function gerarRelatorio() {
        $dados = AlunoUso::selectRaw('DATE(data_uso) as dia, COUNT(*) as total_uso')
            ->where('status', 'validado')
            ->groupByRaw('DATE(data_uso)')
            ->orderBy('total_uso', 'DESC')
            ->get();
        
        $pdf = PDF::loadView('relatorios.relatorio_dias_mais_usados', compact('dados'));

        return $pdf->download('relatorio_dias_mais_usados.pdf');
        // return $pdf->stream('relatorio_dias_mais_usados.pdf');
    }
}
