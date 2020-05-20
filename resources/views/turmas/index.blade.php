@extends('layouts.app')

@section('content')
    <h1>Turmas</h1>

    {!! link_to('turmas/create', 'Criar nova turma', ['class' => 'btn btn-primary navbar-left mb-2']) !!}

    <div class="card">
        <div class="card-header">
            Listagem de turmas
        </div>
        <div class="card-body">
            {!!  Form::open(['url' => 'turmas', 'method' => 'get', 'class' => 'form-inline', 'role' => 'form']) !!}
                <div class='form-group'>
                    {!! Form::input('search', 'nome', null, [
                        'placeholder'    => 'Digite o nome da turma',
                        'size'           => '128px',
                        'class'          => 'form-control col-lg-12 mb-3',
                        'data-toggle'    => 'tooltip',
                        'data-placement' => 'right',
                        'title'          => 'Digite o nome e tecle Enter para realizar uma busca'
                    ]) !!}
                </div>
            {!! Form::close() !!}

            @if(!count($turmas))
                <div class="alert alert-info" role="alert">
                    Nenhum registro encontrado com este nome
                </div>
            @endif

            <table class="table table-hover">
                <thead>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Data criação</th>
                    <th>Ações</th>
                    <th colspan="2"></th>
                </thead>
                <tbody>
                    @foreach($turmas as $turma)
                        <tr>
                            <td>{{ $turma->id }}</td>
                            <td>{{ $turma->nome }}</td>
                            <td>{{ $turma->created_at }}</td>
                            <td style="float: left;">
                                {{ Form::open(['method' => 'GET', 'route' => ['turmas.edit', $turma->id]]) }}
                                    <button type="submit" class="btn btn-success">
                                        Atualizar
                                    </button>
                                {{ Form::close() }}
                            </td>
                            <td style="float: left;">
                                {{ Form::open(['method' => 'DELETE', 'route' => ['turmas.destroy', $turma->id]]) }}
                                    <button type="submit" class="btn btn-danger">
                                        Excluir
                                    </button>
                                {{ Form::close() }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <h3>Total: <span class="badge badge-primary mb-2">{{ $turmas->total() }}</span></h3>

            <div class="pagination justify-content-center">
                {{ $turmas->links() }}
            </div>
        </div>
    </div>


@endsection
