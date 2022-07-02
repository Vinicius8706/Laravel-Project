@extends('app.layouts.basico')

@section('titulo', 'Detalhes do Produto')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Adicionar Detalhes do Produto</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="#">Voltar</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            {{ $msg ?? '' }}
            <div style="width:30%;margin-left:auto;margin-right:auto;">
                @componet('app.produto_detalhe._components.form_create_edit',['unidades' => $unidades])
            @endcomponent
        </div>
    </div>
</div>
{{-- o yield envia blocos para outras views --}}
@endsection
