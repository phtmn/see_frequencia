<?php

namespace App\Http\Controllers\UserAI;

use App\Http\Controllers\Controller;
use App\Models\UserAI\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::User();
        $product = Product::where('user_id', $user->id)->get();
        return view('auth.userAI.product.index', compact('user', 'product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::User();
        $product = Product::all()->where('user_id', $user->id);
        return view('auth.userAI.product.create', compact('user', 'product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'product' => 'required|string',
            'quantity' => 'required|integer|min:0',
            'unit' => 'required|string|max:10',
            'type' => 'required|string|max:50',
            'availability' => 'required|string|max:50',
        ]);

        // Criação do registro na tabela products
        $product = Product::create([
            'user_id' => $request->user_id,
            'product' => $request->product,
            'quantity' => $request->quantity,           
            'unit' => $request->unit,
            'type' => $request->type,
            'availability' => $request->availability,
        ]);

        return redirect()->route('product.index')->with('success', 'Produto criado com sucesso!');
    }

    public function destroy(string $id)
    {
        Product::findOrFail($id)->delete();

        return redirect()->route('product.index')->with('error', 'Produto removido');;;
    }
}
