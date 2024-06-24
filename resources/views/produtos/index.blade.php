@extends('layouts/template')
@section('content')
<div class="container mt-3">
  <a href="{{route('produtos.create')}}" class="btn btn-outline-success">Cadastrar Produto</a>
<table class="table mt-2">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Nome</th>
        <th scope="col">Preço</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($produtos as $produto)
      <tr>
        <th scope="row">{{$produto->id}}</th>
        <td>{{$produto->nome}}</td>
        <td>{{$produto->preco}}</td>
        <td>
            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                <a href="{{route('produtos.edit', ['produto' => $produto->id])}}" class="btn btn-primary btn-sm"
                style="--bs-btn-padding-y: .15rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">Editar</a>
                <div class="btn btn-danger btn-sm"
                style="--bs-btn-padding-y: .15rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem; border:none;">
                <form action="{{ route('produtos.destroy', ['produto' => $produto->id]) }}" method="POST">
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