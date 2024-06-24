<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Produto;
use App\Models\Venda;
use Illuminate\Http\Request;

class VendaController extends Controller
{
    public function index(Request $request)
    {
        $vendas = Venda::all();

        return view('vendas/index', ['vendas' => $vendas]);
    }

    public function create()
    {
        $clientes = Cliente::all();
        $produtos = Produto::all();
        $data['clientes'] = $clientes;
        $data['produtos'] = $produtos;

        return view('vendas/create', $data);
    }

    public function store(Request $request)
    {
        $data = $request->except('_token');
        $venda = Venda::create($data);
        return redirect(route('vendas.index'));
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        $venda = Venda::find($id);
        if ($venda) {
            $venda->delete();
        }

        return redirect(route('vendas.index'));
    }

    public function show()
    {
    }
}
