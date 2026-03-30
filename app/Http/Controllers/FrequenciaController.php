<?php

namespace App\Http\Controllers;

use App\Models\Aula;
use App\Models\Frequencia;
use Illuminate\Http\Request;

class FrequenciaController extends Controller
{
    public function index()
    {
        // Mostra apenas aulas que o professor ATIVOU agora
        $aulasAbertas = Aula::where('is_ativa', true)->orderBy('created_at', 'desc')->get();
        return view('aluno.presenca', compact('aulasAbertas'));
    }

    public function store(Request $request)
    {
        $aula = Aula::findOrFail($request->aula_id);

        // 1. Verificar se o aluno já assinou
        $jaAssinou = Frequencia::where('aula_id', $aula->id)->where('user_id', auth()->id())->exists();
        if ($jaAssinou)
            return back()->with('error', 'Sua presença já foi registrada nesta aula.');

        // 2. Calcular Distância (Haversine)
        $distanciaKm = $this->haversine($request->lat, $request->lng, $aula->latitude, $aula->longitude);
        $distanciaMetros = $distanciaKm * 1000;

        // 3. Validar Raio de 50 metros (Ajuste se necessário)
        if ($distanciaMetros > 50) {
            return back()->with('error', "Você está fora do raio da sala (Distância: " . round($distanciaMetros) . "m).");
        }

        Frequencia::create([
            'aula_id' => $aula->id,
            'user_id' => auth()->id(),
            'latitude_aluno' => $request->lat,
            'longitude_aluno' => $request->lng,
            'distancia_metros' => $distanciaMetros,
            'ip_address' => $request->ip(),
        ]);

        return back()->with('success', 'Presença confirmada com sucesso! ✅');
    }

    private function haversine($lat1, $lon1, $lat2, $lon2)
    {
        $earthRadius = 6371;
        $dLat = deg2rad($lat2 - $lat1);
        $dLon = deg2rad($lon2 - $lon1);
        $a = sin($dLat / 2) * sin($dLat / 2) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * sin($dLon / 2) * sin($dLon / 2);
        return $earthRadius * (2 * atan2(sqrt($a), sqrt(1 - $a)));
    }
}
