@extends('app.layouts.basico')

@section('titulo', 'Funcionário')

@section('conteudo')
    <br />
    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Fornecedor</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('app.funcionario.adicionar') }}">Novo</a></li>
                <li><a href="{{ route('app.funcionario') }}">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                <form method="post" action="{{ route('app.funcionario.listar') }}">
                    @csrf
                    <input type="text" name="nome" placeholder="Nome" class="borda-preta">
                    <input type="text" name="setor" placeholder="Setor" class="borda-preta">
                    <input type="text" name="cargo" placeholder="Cargo" class="borda-preta">
                    <input type="text" name="email" placeholder="E-mail" class="borda-preta">
                    <button type="submit" class="borda-preta">Pesquisar</button>
                <form>
            </div>
        </div>

    </div>

@endsection
