@if (isset($produto_detalhe->id))
    <form method="POST" action="{{ route('produto.update', ['produto' => $produto_detalhe->id]) }}">
        @csrf
        @method('PUT')
    @else
        <form method="POST" action="{{ route('produto-detalhe.store') }}">
            @csrf
@endif

<input type="text" name="produto_id" placeholder="ID do Produto"
    value="{{ $produto_detalhe->produto_id ?? old('produto_id') }}" class="borda-preta">
{{ $errors->has('produto_id') ? $errors->first('produto_id') : '' }}
<input type="text" name="comprimento"
    value="{{ $produto_detalhe->comprimento ?? old('comprimento') }} placeholder="Descrição" class="borda-preta">
{{ $errors->has('comprimento') ? $errors->first('comprimento') : '' }}

<input type="text" name="largura" value="{{ $produto_detalhe->largura ?? old('largura') }} placeholder="largura"
    class="borda-preta">

{{ $errors->has('largura') ? $errors->first('largura') : '' }}

<input type="text" name="altura" value="{{ $produto_detalhe->altura ?? old('altura') }} placeholder="altura"
    class="borda-preta">

{{ $errors->has('altura') ? $errors->first('altura') : '' }}

<select name="unidade_id" id="unidade_id">
    <option value="{{ old('peso') }}">-- Seleciona a Unidade de Media --</option>
    @foreach ($unidade as $unidade)
        <option value="{{ $unidade->id }}"
            {{ $produto_detalhe->unidade_id ?? old('unidade_id') == $unidade->id ? 'selected' : '' }}>
            {{ $unidade->descricao }}</option>
    @endforeach
</select>
{{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}

<button type="submit" class="borda-preta">Cadastrar</button>


</form>