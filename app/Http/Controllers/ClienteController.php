<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index(Request $request)
    {
        $clientes = Cliente::all();
        return view('clientes.index', ['clientes' => $clientes]);
    }

    public function create(Request $request)
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        $data = $request->except('_token');
        $cliente = Cliente::create($data);
        return redirect(route('clientes.index'));
    }

    public function edit(String $id)
    {
        $cliente = Cliente::find($id);
        if ($cliente) {
            return view('clientes.edit', ['cliente' => $cliente]);
        }

        return redirect(route('clientes.index'));
    }

    public function update(Request $request, string $id)
    {
        $cliente = Cliente::find($id);
        if ($cliente) {
            $data = $request->except(['_token', '_method']);
            $cliente->update($data);
        }

        return redirect(route('clientes.index'));
    }

    public function destroy(string $id)
    {
        $cliente = Cliente::find($id);
        if ($cliente) {
            $cliente->delete();
        }

        return redirect(route('clientes.index'));
    }

    public function show()
    {
    }
}
