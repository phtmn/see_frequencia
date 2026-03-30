<?php


namespace App\Http\Controllers;

use App\Models\Aula;
use App\Models\Frequencia;
use Illuminate\Http\Request;

class AulaController extends Controller
{

    // 1. LISTAR AULAS
    public function index()
    {
        $aulas = Aula::where('professor_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->get();
        return view('aula.index', compact('aulas'));
    }

    // O método CREATE pode ser removido ou ignorado se você usar apenas o modal.

    // 2. SALVAR AULA (Chamado pelo formulário dentro do modal)
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'data_aula' => 'required|date',
        ]);

        Aula::create([
            'titulo' => $request->titulo,
            'data_aula' => $request->data_aula, // Salvando a data vinda do modal
            'professor_id' => auth()->id(),
            'is_ativa' => false,
        ]);

        return redirect()->route('aula.index')->with('success', 'Aula agendada com sucesso!');
    }

    // Adicione este método dentro da classe AulaController
    public function toggle(Request $request, $id)
    {
        $aula = Aula::findOrFail($id);

        // Se a aula NÃO estiver ativa, vamos ativar e gravar o GPS do professor
        if (!$aula->is_ativa) {
            $aula->update([
                'is_ativa' => true,
                'latitude' => $request->lat,
                'longitude' => $request->lng,
            ]);
            return redirect()->back()->with('success', 'Frequência aberta! Alunos já podem assinar.');
        }

        // Se já estiver ativa, apenas encerramos
        $aula->update(['is_ativa' => false]);
        return redirect()->back()->with('success', 'Frequência encerrada com sucesso.');
    }

    public function destroy($id)
    {
        $aula = Aula::findOrFail($id);

        // Verificação de segurança: apenas o dono da aula pode deletar
        if ($aula->professor_id != auth()->id()) {
            return redirect()->back()->with('error', 'Acesso não autorizado.');
        }

        $aula->delete();

        return redirect()->route('aula.index')->with('success', 'Aula removida com sucesso!');
    }
}



