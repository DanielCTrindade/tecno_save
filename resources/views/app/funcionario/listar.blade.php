@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')
    
    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Funcionários - Listar</p>
        </div>
        <br/>
        <br/>
        <br />
        <div class="menu">
            <ul>
                <li><a href="{{ route('app.funcionario.adicionar') }}">Novo</a></li>
                <li><a href="{{ route('app.funcionario') }}">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 90%; margin-left: auto; margin-right: auto;">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Setor</th>
                            <th>Cargo</th>
                            <th>E-mail</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </head>

                    <tbody>
                        @foreach($funcionarios as $funcionario)
                            <tr>
                                <td>{{ $funcionario->nome }}</td>
                                <td>{{ $funcionario->setor }}</td>
                                <td>{{ $funcionario->cargo }}</td>
                                <td>{{ $funcionario->email }}</td>
                                <td><a href="{{ route('app.funcionario.excluir', $funcionario->id) }}">Excluir</a></td>
                                <td><a href="{{ route('app.funcionario.editar', $funcionario->id) }}">Editar</a></td>
                            </tr>
                            <tr>
                           
                            <tr>
                        @endforeach
                    </tbody>
                </table>

                
                {{ $funcionarios->appends($request)->links() }}

                <!--
                <br>
                {{ $funcionarios->count() }} - Total de registros por página
                <br>
                {{ $funcionarios->total() }} - Total de registros da consulta
                <br>
                {{ $funcionarios->firstItem() }} - Número do primeiro registro da página
                <br>
                {{ $funcionarios->lastItem() }} - Número do último registro da página

                -->
                <br>
                Exibindo {{ $funcionarios->count() }} funcionários de {{ $funcionarios->total() }} (de {{ $funcionarios->firstItem() }} a {{ $funcionarios->lastItem() }})
            </div>
        </div>

    </div>

@endsection
