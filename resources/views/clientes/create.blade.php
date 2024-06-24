@extends('layouts/template')
@section('content')
<form method="POST" action="{{route('clientes.store')}}" class="container mt-3">
  @csrf
    <div class="mb-3">
        <label for="Cnome" class="form-label">Nome</label>
        <input type="text" name="nome" class="form-control" id="Cnome">
      </div>
      <div class="mb-4">
        <label for="Ccpf" class="form-label">CPF</label>
        <input type="text" name="cpf" class="form-control" id="Ccpf" placeholder="000.000.000-00">
      </div>
      <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-success">Salvar Cliente</button>
      </div>
</form>
@endsection