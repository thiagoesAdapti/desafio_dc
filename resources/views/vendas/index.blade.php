@extends('layouts/template')
@section('content')
<div class="container mt-3">
    <a href="{{route('vendas.create')}}" class="btn btn-outline-success">Cadastrar Venda</a>
<table class="table mt-2">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Cliente</th>
        <th scope="col">Valor</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($vendas as $venda)
      <tr>
        <th scope="row">{{$venda->id}}</th>
        <td>{{$venda->cliente->nome}}</td>
        <td>{{$venda->valor}}</td>
        <td>
            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                <a href="{{route('vendas.edit', ['venda' => $venda->id])}}" class="btn btn-primary btn-sm"
                style="--bs-btn-padding-y: .15rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">Editar</a>
                <div class="btn btn-danger btn-sm"
                style="--bs-btn-padding-y: .15rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem; border:none;">
                <form action="{{ route('vendas.destroy', ['venda' => $venda->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="border: none; padding: 0; background:none; color: white;">Remover</button>
                </form>
              </div>
              </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection