@extends('app.layouts.basico')

@section('titulo', 'Funcionario')

@section('conteudo')
    <br />
    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Fornecedor - Adicionar</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('app.funcionario.adicionar') }}">Novo</a></li>
                <li><a href="{{ route('app.funcionario') }}">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            {{ $msg ?? '' }}
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                <form method="post" action="{{ route('app.funcionario.adicionar') }}">
                    <input type="hidden" name="id" value="{{ $funcionario->id ?? '' }}" >
                    @csrf
                    <input type="text" name="nome" value="{{ $funcionario->nome ?? old('nome') }}" placeholder="Nome" class="borda-preta">
                    {{ $errors->has('nome') ? $errors->first('nome') : '' }}
                    
                    <input type="text" name="setor" value="{{ $funcionario->setor ?? old('setor') }}" placeholder="Setor" class="borda-preta">
                    {{ $errors->has('setor') ? $errors->first('setor') : '' }}

                    <input type="text" name="cargo" value="{{ $funcionario->cargo ?? old('cargo') }}"  placeholder="Cargo" class="borda-preta">
                    {{ $errors->has('cargo') ? $errors->first('cargo') : '' }}

                    <input type="text" name="email" value="{{ $funcionario->email ?? old('email') }}" placeholder="E-mail" class="borda-preta">
                    {{ $errors->has('email') ? $errors->first('email') : '' }}

                    <button type="submit" class="borda-preta">Cadastrar</button>
                <form>
            </div>
        </div>

    </div>

@endsection
