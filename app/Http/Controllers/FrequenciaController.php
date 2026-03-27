<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrequenciaController extends Controller
{
    public function store(Request $request, $id)
    {
        $aula = Aula::findOrFail($id);

        // Validar IP (Simples auditoria)
        $ip = $request->ip();

        // Validar Distância (Haversine)
        $distancia = $this->haversine(
            $request->lat,
            $request->lng,
            $aula->latitude,
            $aula->longitude
        );

        if ($distancia > 0.05) { // Mais de 50 metros
            return back()->with('error', 'Você está longe demais da sala!');
        }

        Frequencia::create([
            'user_id' => auth()->id(),
            'aula_id' => $id,
            'ip_address' => $ip,
            'latitude_aluno' => $request->lat,
            'longitude_aluno' => $request->lng,
            'face_verified' => true // Validado pelo JS no cliente
        ]);

        return redirect()->route('dashboard')->with('success', 'Presença Confirmada!');
    }

    private function haversine($lat1, $lon1, $lat2, $lon2)
    {
        $earthRadius = 6371; // km
        $dLat = deg2rad($lat2 - $lat1);
        $dLon = deg2rad($lon2 - $lon1);
        $a = sin($dLat / 2) * sin($dLat / 2) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * sin($dLon / 2) * sin($dLon / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        return $earthRadius * $c;
    }
}
