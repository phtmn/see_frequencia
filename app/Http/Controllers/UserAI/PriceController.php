<?php

namespace App\Http\Controllers\UserAI;

use App\Http\Controllers\Controller;
use App\Models\UserAI\Price;
use App\Models\UserAI\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PriceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::User();
        $price = Price::where('user_id', $user->id)->with('product')->get();
        $products = Product::where('user_id', $user->id)->get();
        return view('auth.userAI.price.index', compact('user', 'price', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::User();
        $products = Product::where('user_id', $user->id)->get();
        return view('auth.userAI.price.create', compact('user', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $user = Auth::user();

        // 1. Atribui o ID do usuário
        $request['user_id'] = $user->id;

        // 1. Remove os separadores de milhar (ponto)
        $priceValue = str_replace('.', '', $request->price); // Transforma "1.000,00" em "1000,00"

        // 2. Substitui o separador decimal (vírgula) pelo ponto
        $priceValue = str_replace(',', '.', $priceValue); // Transforma "1000,00" em "1000.00"

        // 3. Mescla o valor limpo na requisição antes de validar
        $request->merge(['price' => $priceValue]);       

        
        // 3. Validação - Agora 'price' está no formato numérico correto e passará na regra 'numeric'
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'product_id' => 'required|integer',
            'datetime' => 'required|date',
            'price' => 'required|numeric|min:0', // O valor AGORA é um número limpo (ex: "1234.56")
            'acquisition' => 'required|string',

        ]);

        // 4. Criação do registro no banco de dados
        // Não é mais necessário usar $priceValue, pois $request->price já está limpo.
        $price = Price::create([
            'user_id' => $request->user_id,
            'product_id' => $request->product_id,
            'datetime' => $request->datetime,
            'price'  => $request->price,
            'acquisition' => $request->acquisition, 
        ]);

        // Opcional: Remova o Mutator 'setPriceAttribute' do Model, pois a limpeza já está no Controller.

        // Redirecionar com mensagem de sucesso
        return redirect()->route('price.index')->with('success', 'Cotação cadastrada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Price::findOrFail($id)->delete();

        return redirect()->route('price.index')->with('error', 'Cotação removida');
    }
}
