@extends('layouts.app')

@section('content')
    <h1>Alunos</h1>

    {!! link_to('alunos/create', 'Criar novo aluno', ['class' => 'btn btn-primary navbar-left mb-2']) !!}

    <div class="card">
        <div class="card-header">
            Listagem de alunos
        </div>
        <div class="card-body">
            {!!  Form::open(['url' => 'alunos', 'method' => 'get', 'class' => 'form-inline', 'role' => 'form']) !!}
            <div class='form-group'>
                {!! Form::input('search', 'nome', null, [
                    'placeholder'    => 'Digite o nome do aluno',
                    'size'           => '128px',
                    'class'          => 'form-control col-lg-12 mb-3',
                    'data-toggle'    => 'tooltip',
                    'data-placement' => 'right',
                    'title'          => 'Digite o nome e tecle Enter para realizar uma busca'
                ]) !!}
            </div>
            {!! Form::close() !!}

            @if ($nome && !$alunos->count())
                <div class="alert alert-info" role="alert">
                    Nenhum registro encontrado com este nome
                </div>
            @endif

            <table class="table table-hover">
                <thead>
                <th>ID</th>
                <th>Nome</th>
                <th>Data criação</th>
                <th>Data nascimento</th>
                <th>Sexo</th>
                <th>Ações</th>
                <th colspan="2"></th>
                </thead>
                <tbody>
                @foreach($alunos as $aluno)
                    <tr>
                        <td>{{ $aluno->id }}</td>
                        <td>{{ $aluno->nome }}</td>
                        <td>{{ $aluno->created_at }}</td>
                        <td>{{ $aluno->data_nascimento }}</td>
                        <td>{{ $aluno->sexo }}</td>
                        <td style="float: left;">
                            {{ Form::open(['method' => 'GET', 'route' => ['alunos.edit', $aluno->id]]) }}
                                <button type="submit" class="btn btn-success">
                                    Atualizar
                                </button>
                            {{ Form::close() }}
                        </td>
                        <td style="float: left;">
                            <a onclick="return confirm('Você realmente deseja excluir este registro')">
                                {{ Form::open(['method' => 'DELETE', 'route' => ['alunos.destroy', $aluno->id]]) }}
                                    <button type="submit" class="btn btn-danger">
                                        Excluir
                                    </button>
                                {{ Form::close() }}
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            @unless(count($alunos))
                <p class="text-center">Não existem alunos cadastrados!</p>
            @endunless

            <h3>Total: <span class="badge badge-primary mb-2">{{ $alunos->total() }}</span></h3>

            <div class="pagination justify-content-center">
                {{ $alunos->links() }}
            </div>
        </div>
    </div>
@endsection
