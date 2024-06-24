@extends('layouts/template')
@section('content')
<form method="POST" action="{{route('clientes.update', ['cliente' => $cliente->id])}}" class="container mt-3">
  @csrf
  @method('PUT')
    <div class="mb-3">
        <label for="Cnome" class="form-label">Nome</label>
        <input type="text" name="nome" class="form-control" id="Cnome" value="{{$cliente->nome}}">
      </div>
      <div class="mb-4">
        <label for="Ccpf" class="form-label">CPF</label>
        <input type="text" name="cpf" class="form-control" id="Ccpf" placeholder="000.000.000-00" value="{{$cliente->cpf}}">
      </div>
      <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-success">Salvar Cliente</button>
      </div>
</form>
@endsection