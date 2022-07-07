@extends('app.layouts.basico')

@section('titulo', 'Pedido Produto')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Adicionar Produtos ao Pedido</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('pedido.index') }}">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            {{ $msg ?? '' }}
            <h4>Detalhes do Pedido</h4>
            <p>ID do pediddo: {{ $pedido->id }}</p>
            <p>Cliente: {{ $pedido->cliente_id }}</p>
            <div style="width:30%;margin-left:auto;margin-right:auto;">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome do Produto</th>
                            <th>Data de inclusão do pedido</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($pedido->produto as $produto)
                            <tr>
                                <td>{{$produto->id}}</td>
                                <td>{{$produto->nome}}</td>
                                <td>{{$produto->pivot->created_at->format('d/m/Y')}}</td>
                            
                            <td>
                                <form action="" method="post" action="{{route("pedido-produto.destroy",'pedido'=>$pedido->id,'produto'=>$produto->id)}}" id="form_{{$pedido->id}}_{{$produto->id}}">
                                    @method("DELETE")
                                    @csrf
                                    <a href="#" onclick="document.getElementById('form_{{$pedido->id}}_{{$produto->id}}').submit()">Excluir</a>
                            </form>
                            </td></tr>
                        @endforeach
                    </tbody>
                </table>
                @componet('app.pedido_produto._components.form_create', ['pedido' => $pedido, 'produtos' => $produtos])
            @endcomponent
        </div>
    </div>
</div>
{{-- o yield envia blocos para outras views --}}
@endsection
