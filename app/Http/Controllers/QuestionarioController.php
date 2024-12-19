<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Questionario;
use App\Models\PerguntaQuestionario;
use App\Models\RespostaQuestionario;
use App\Models\OpcaoQuestionario;

class QuestionarioController extends Controller
{
    public function index()
    {
        $questionarios = Questionario::all();
        return view('questionario.index', compact('questionarios'));
    }

    public function create()
    {
        return view('questionario.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'perguntas' => 'required|array',
            'perguntas.*.texto' => 'required|string',
            'perguntas.*.tipo' => 'required|in:texto,multipla_escolha',
            'perguntas.*.opcoes' => 'array',
            'perguntas.*.valores' => 'array',
        ]);

        $questionario = Questionario::create([
            'titulo' => $data['titulo'],
            'descricao' => $data['descricao'],
        ]);

        foreach ($data['perguntas'] as $pergunta) {
            $novaPergunta = PerguntaQuestionario::create([
                'questionario_id' => $questionario->id,
                'texto' => $pergunta['texto'],
                'tipo' => $pergunta['tipo'],
            ]);

            if ($pergunta['tipo'] === 'multipla_escolha' && isset($pergunta['opcoes'])) {
                foreach ($pergunta['opcoes'] as $index => $opcao) {
                    OpcaoQuestionario::create([
                        'pergunta_id' => $novaPergunta->id,
                        'texto' => $opcao,
                        'valor' => $pergunta['valores'][$index] ?? null,
                    ]);
                }
            }
        }

        return redirect()->route('questionario.index')->with('success', 'Questionário criado com sucesso!');
    }


    public function show($id)
    {
        $questionario = Questionario::findOrFail($id);
        $perguntas = PerguntaQuestionario::where('questionario_id', $id)
            ->with('opcoes') // Relacionamento com opções
            ->get();

        return view('questionario.show', compact('questionario', 'perguntas'));
    }

    public function responder(Request $request, $id)
    {
        $questionario = Questionario::findOrFail($id);

        foreach ($request->input('respostas', []) as $pergunta_id => $resposta) {
            RespostaQuestionario::create([
                'users_id' => auth()->id(),
                'questionario_id' => $questionario->id,
                'pergunta_id' => $pergunta_id,
                'resposta' => is_numeric($resposta) ? null : $resposta,
                'opcao_id' => is_numeric($resposta) ? $resposta : null,
            ]);
        }

        return redirect()->route('questionarios.show', $id)->with('success', 'Respostas salvas com sucesso!');
    }

    public function listarPesquisas()
    {
        $userId = auth()->id();
        $questionarios = Questionario::with(['respostas' => function ($query) use ($userId) {
            $query->where('users_id', $userId);
        }])->get();
        
        return view('questionario.responder', compact('questionarios'));
    }

    
}
