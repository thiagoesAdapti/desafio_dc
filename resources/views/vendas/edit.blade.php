@extends('layouts/template')
@section('content')
<form method="POST" action="{{route('vendas.store')}}" class="container mt-3">
    @csrf
    <div class="mb-3 d-flex align-items-end gap-2">
        <div class="mb-3">
            <label for="Vcliente" class="form-label">Cliente</label>
            <select class="form-select" name="cliente_id" aria-label="Default select example">
                <option selected>Não cadastrado</option>
                @foreach ($clientes as $cliente)
                <option value="{{$cliente->id}}"
                @if ($cliente->id == $venda->cliente_id)
                    selected
                @endif
                >{{$cliente->nome}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="Vproduto" class="form-label">Produto</label>
            <select id="select-produto" class="form-select" name="produto_id" aria-label="Default select example" onclick="descobrirProduto({{$produtos}})">
                <option selected disabled>Selecionar</option>
                @foreach ($produtos as $produto)
                <option value="{{$produto->id}}">{{$produto->nome}}  -  R${{$produto->preco}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="mb-3 d-flex align-items-end gap-2">
        <div>
            <label for="Vquantidade" class="form-label">Quantidade</label>
            <input type="number" name="quantidade" class="form-control" id="Vquantidade">
        </div>
        {{-- <input class="form-control" type="text" placeholder="Disabled input" aria-label="Disabled input example" disabled> --}}
        <div>
            <label for="Vtotal" class="form-label">Total</label>
            <input id="Vtotal" class="form-control" name="valor" type="number" step="0.01" aria-label="Disabled input example" disabled>
        </div>
    </div>
    <div class="mb-3">
        <div id="parcelas">
            <input type="number" step="0.01" class="form-control parcela mb-2" placeholder="Valor da parcela">
        </div>
        <button type="button" class="btn btn-outline-secondary" onclick="adicionarParcela()">Adicionar parcela</button>
        <button type="button" class="btn btn-outline-secondary" onclick="removerParcela()">Remover parcela</button>
    </div>
    <div class="d-flex justify-content-end mb-3">
        <button type="submit" class="btn btn-success right" onclick="conferirPagamento()">Salvar Venda</button>
    </div>
</form>

<script>

    const inputQuantidade = document.getElementById('Vquantidade');
    const inputTotal = document.getElementById('Vtotal');
    const areaParcelas = document.getElementById('parcelas');

    let quantidade = 0;
    let preco = 0;
    let total = 0;
    let totalParcelado = 0;

    inputQuantidade.addEventListener('input', (event) => {
        quantidade = event.target.value;
        total = quantidade * preco;
        inputTotal.value = total;
    });

    function descobrirProduto(produtos) {
        let produto = produtos.find(elemento => elemento.id == document.getElementById('select-produto').value);

        if (produto) {
            preco = parseFloat(produto.preco);
            total = quantidade * preco;
            inputTotal.value = total;
        }
    }

    function adicionarParcela() {
        areaParcelas.insertAdjacentHTML('beforeend', `
            <input type="number" step="0.01" class="form-control parcela mb-2" placeholder="Valor da parcela">
        `);
    }

    function removerParcela() {
        if (areaParcelas.children.length > 1) {
            areaParcelas.removeChild(areaParcelas.lastElementChild);
        }
    }

    function conferirPagamento() {
        let parcelas = document.querySelectorAll('.parcela');

        parcelas.forEach(function(parcela) {
            let valor = parseFloat(parcela.value);
            totalParcelado += valor;
        });

        if(totalParcelado === total) {
            console.log('deu certo');
            inputTotal.disabled = false;
            return true;
        }

        console.log('deu errado');
        totalParcelado = 0;
        return false;
    }

    // console.log(produto.preco);
    

</script>
@endsection