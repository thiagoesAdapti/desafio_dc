<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{

    public function index(Request $request)
    {
        $produtos = Produto::all();
        return view('produtos.index', ['produtos' => $produtos]);
    }

    public function create()
    {
        return view('produtos.create');
    }

    public function store(Request $request)
    {
        $data = $request->except('_token');
        $produto = Produto::create($data);
        return redirect(route('produtos.index'));
    }

    public function edit(string $id)
    {
        $produto = Produto::find($id);
        if ($produto) {
            return view('produtos.edit', ['produto' => $produto]);
        }

        return redirect(route('produtos.index'));
    }

    public function update(Request $request, string $id)
    {
        $produto = Produto::find($id);
        if ($produto) {
            $data = $request->except(['_token', '_method']);
            $produto->update($data);
        }

        return redirect(route('produtos.index'));
    }

    public function destroy(string $id)
    {
        $produto = Produto::find($id);
        if ($produto) {
            $produto->delete();
        }

        return redirect(route('produtos.index'));
    }

    public function show()
    {
    }
}
