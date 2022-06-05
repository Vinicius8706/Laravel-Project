{{ $slot }}
<form action={{ route('site.contato') }} method="post">
    @csrf
    <input name="nome" value="{{ old('nome') }}" type="text" placeholder="Nome" class="{{ $classe }}">
    @if ($errors->has('nome'))
        {{ $errors->first('nome') }}

    @endif
    <br>
    <input name="telefone" value="{{ old('telefone') }}" type="text" placeholder="Telefone"
        class="{{ $classe }}">
    <br>
    {{$errors->has('telefone') ? $errors->first('telefone') : ''}}
    <input name="email" type="text" value="{{ old('email') }}" placeholder="E-mail" class="{{ $classe }}">
    {{$errors->has('email') ? $errors->first('email') : ''}}

    <br>
    <select name="motivo_contatos_id" class="{{ $classe }}">
        <option value="">Qual o motivo do contato?</option>
        @foreach ($motivo_contatos as $key => $motivo_contato)
            <option value="{{ $motivo_contato->id }}"
                {{ old('motivo_contatos_id') == $motivo_contato->id ? 'selected' : '' }}>
                {{ $motivo_contato->motivo_contatos }}</option>
        @endforeach
        
    </select>
    {{$errors->has('motivo_contatos_id') ? $errors->first('motivo_contatos_id') : ''}}
    <br>
    <textarea name="mensagem" class="{{ $classe }}">
         {{ old('mensagem') != '' ? old('mensagem') : 'Preencha aqui sua mensagem' }}  
    </textarea>
    {{$errors->has('mensagem') ? $errors->first('mensagem') : ''}}
    
    <br>
    <button type="submit" class="{{ $classe }}">ENVIAR</button>
</form>
@if ($errors->any())
    <pre style="position: absolute; top: 0; left: 0;width: 100%; background-color: red;">
    @foreach ($errors->all() as $erro)
{{ $erro }}
@endforeach
    </pre>
@endif
