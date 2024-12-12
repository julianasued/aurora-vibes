<?php

namespace App\Http\Controllers;

use App\Models\AlunoUso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class RelatorioController extends Controller
{
    public function index()
    {
        return view('relatorios.index');
    }

    public function gerar(Request $request)
    {
        $tipo = $request->input('tipo');
        $data_inicio = $request->input('data_inicio');
        $data_fim = $request->input('data_fim');

        switch ($tipo) {
            case 'uso_tickets':
                $dados = AlunoUso::selectRaw('DATE(data_uso) as dia, COUNT(*) as total_uso')
                    ->where('status', 'validado')
                    ->when($data_inicio && $data_fim, function ($query) use ($data_inicio, $data_fim) {
                        $query->whereBetween('data_uso', [$data_inicio, $data_fim]);
                    })
                    ->groupByRaw('DATE(data_uso)')
                    ->orderBy('total_uso', 'DESC')
                    ->get();

                return response()->json([
                    'success' => true,
                    'tipo' => 'uso_tickets',
                    'nome' =>  'Relatório de uso de tickets',
                    'dados' => $dados,
                ]);

            case 'dinheiro_arrecadado':
                $vendas = DB::table('aluno_tickets as at')
                    ->join('tickets as t', 'at.ticket_id', '=', 't.id')
                    ->when($data_inicio && $data_fim, function ($query) use ($data_inicio, $data_fim) {
                        $query->whereBetween('at.created_at', [$data_inicio, $data_fim]);
                    })
                    ->selectRaw('SUM(at.quantidade_comprada * t.amount) AS total_vendas')
                    ->value('total_vendas');

                $usos = DB::table('aluno_uso as au')
                    ->join('tickets as t', 'au.ticket_id', '=', 't.id')
                    ->where('au.status', 'validado')
                    ->when($data_inicio && $data_fim, function ($query) use ($data_inicio, $data_fim) {
                        $query->whereBetween('au.data_uso', [$data_inicio, $data_fim]);
                    })
                    ->selectRaw('SUM(t.amount) AS total_usos')
                    ->value('total_usos');

                $dados = [
                    'total_vendas' => (float) ($vendas ?? 0),
                    'total_usos' => (float) ($usos ?? 0),
                    'diferenca' => (float) (($vendas ?? 0) - ($usos ?? 0)),
                ];
                return response()->json([
                    'success' => true,
                    'tipo' => 'dinheiro_arrecadado',
                    'nome' =>  'Relatório de dinheiro arrecadado',
                    'dados' => $dados,
                ]);

            default:
                return response()->json([
                    'success' => false,
                    'message' => 'Tipo de relatório inválido.',
                ], 400);
        }

    }
}
