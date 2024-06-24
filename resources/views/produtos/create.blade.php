@extends('layouts/template')
@section('content')
<form method="POST" action="{{route('produtos.store')}}" class="container mt-3">
  @csrf
    <div class="mb-3">
        <label for="Pnome" class="form-label">Nome</label>
        <input type="text" name="nome" class="form-control" id="Pnome">
      </div>
      <div class="mb-4">
        <label for="PPreco" class="form-label">Preço</label>
        <input type="number" name="preco" step="0.01" class="form-control" id="PPreco"">
      </div>
      <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-success">Salvar Produto</button>
      </div>
</div>
@endsection