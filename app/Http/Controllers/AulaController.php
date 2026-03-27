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
        ]);

        Aula::create([
            'titulo' => $request->titulo,
            'professor_id' => auth()->id(),
            'is_ativa' => false,
        ]);

        return redirect()->route('aula.index')->with('success', 'Aula criada com sucesso!');
    }
}



