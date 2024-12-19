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
    
    public function exibirGraficos()
    {
        $questionarios = DB::table('questionario')->pluck('titulo', 'id');

        return view('relatorios.graficos', compact('questionarios'));
    }

    public function filtrarGraficos(Request $request)
    {
        $questionarioId = $request->input('questionario_id');
    
        if (!$questionarioId) {
            return response()->json(['error' => 'ID do questionário não fornecido.'], 400);
        }
    
        $dadosGraficos = DB::select("
            SELECT 
                p.id AS pergunta_id,
                p.texto AS pergunta,
                o.id AS opcao_id,
                o.texto AS opcao_resposta,
                (SELECT COUNT(rq.id) 
                FROM resposta_questionario rq 
                WHERE rq.pergunta_id = p.id AND rq.opcao_id = o.id) AS total_respostas
            FROM pergunta_questionario p
            LEFT JOIN opcao_questionario o ON o.pergunta_id = p.id
            WHERE p.tipo = 'multipla_escolha' AND p.questionario_id = ?
        ", [$questionarioId]);
    
        $respostasTextuais = DB::select("
            SELECT 
                p.texto AS pergunta,
                rq.resposta
            FROM pergunta_questionario p
            INNER JOIN resposta_questionario rq ON rq.pergunta_id = p.id
            WHERE rq.resposta IS NOT NULL 
            AND p.questionario_id = ?
        ", [$questionarioId]);
    
        if (empty($dadosGraficos) && empty($respostasTextuais)) {
            return response()->json(['error' => 'Nenhum dado encontrado para este questionário.'], 404);
        }
    
        $formatado = [
            'graficos' => [],
            'respostas_textuais' => [],
        ];
    
        foreach ($dadosGraficos as $dado) {
            $formatado['graficos'][$dado->pergunta_id]['pergunta'] = $dado->pergunta;
            $formatado['graficos'][$dado->pergunta_id]['opcoes'][] = [
                'opcao_id' => $dado->opcao_id,
                'opcao_resposta' => $dado->opcao_resposta,
                'total_respostas' => $dado->total_respostas,
            ];
        }
    
        foreach ($respostasTextuais as $resposta) {
            $formatado['respostas_textuais'][$resposta->pergunta][] = $resposta->resposta;
        }
    
        return response()->json($formatado);
    }    
}
