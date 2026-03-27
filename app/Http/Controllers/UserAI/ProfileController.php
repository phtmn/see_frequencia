<?php

namespace App\Http\Controllers\UserAI;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\UserAI\Profile;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function edit(Request $request): View
    {
        $profile = Profile::firstOrCreate(['user_id' => Auth::user()->id]);

        return view('auth.userAI.profile.edit', [
            'profile' => $profile
        ]);
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {

        $data = $request->except(['image', 'email', 'name', 'caf_file', 'car_file']);

        $user = Auth::user();

        // 2. Atualiza o modelo User
        $user->name = $request->name;
        // Opcional: Atualizar outros campos do User se necessário (ex: email)
        $user->save();

        // 3. Recupera o registro do Profile (ou cria se não existir)
        $profile = Profile::firstOrCreate(['user_id' => $user->id]);

        // 4. Lógica de Upload e Salvamento do CAF
        if ($request->hasFile('caf_file')) {
            // Exemplo: Salva o arquivo no disco 'public' (dentro de storage/app/public)
            // e retorna o caminho (ex: user_files/nomedoarquivo.pdf)
            $path = $request->file('caf_file')->store('CAF', 'public');

            // Se já existia um arquivo antigo, você deve excluí-lo aqui
            // Exemplo: Storage::disk('public')->delete($profile->caf_file);

            $data['caf_file'] = $path; // Adiciona o caminho do arquivo aos dados a serem salvos
        }

        // 5. Lógica de Upload e Salvamento do CAR
        if ($request->hasFile('car_file')) {
            // Salva o arquivo no disco 'public'
            $path = $request->file('car_file')->store('CAR', 'public');

            // Se já existia um arquivo antigo, você deve excluí-lo aqui
            // Exemplo: Storage::disk('public')->delete($profile->car_file);

            $data['car_file'] = $path; // Adiciona o caminho do arquivo aos dados a serem salvos
        }

        // 6. Atualiza ou Cria o modelo Profile com os dados e os caminhos dos arquivos
        $profile->fill($data)->save(); // Usa fill() e save() no objeto $profile já criado

        /*
    Alternativamente, você poderia manter a sua sintaxe original:
    Profile::updateOrCreate([
        'user_id' => $user->id
    ], $data);
    */

        return Redirect::route('profile.edit')->with('success', 'Perfil Atualizado!');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
