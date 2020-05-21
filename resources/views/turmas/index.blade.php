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

            <div class="row">
                @foreach($data as $turma)
                    <div class="col">
                        <div class="card">
                            <h5 class="card-header">{{ $turma->nome }}</h5>
                            <div class="card-body">
                                @foreach($turma->alunos as $aluno)
                                    <ul class="list-group mb-3">
                                        <li class="list-group-item">
                                            <h5 class="card-title">Nome: <span class="badge badge-primary">{{ $aluno->nome }}</span></h5>
                                        </li>
                                        <li class="list-group-item">
                                            <h5 class="card-title">Data nascimento: <span class="badge badge-primary">{{ $aluno->data_nascimento }}</span></p></h5>
                                        </li>
                                        <li class="list-group-item">
                                            <h5 class="card-title">Sexo: <span class="badge badge-primary">{{ $aluno->sexo }}</span></p></h5>
                                        </li>
                                    </ul>
                                @endforeach

                                <div class="row">
                                    <div class="col-sm-2 col-md-2 col-xl-2 col-lg-2">
                                        {{ Form::open(['method' => 'GET', 'route' => ['turmas.edit', $turma->id]]) }}
                                            <button type="submit" class="btn btn-outline-primary mb-3">
                                                Atualizar
                                            </button>
                                        {{ Form::close() }}
                                    </div>

                                    <div class="col">
                                        <a onclick="return confirm('Você realmente deseja excluir este registro')">
                                            {{ Form::open(['method' => 'DELETE', 'route' => ['turmas.destroy', $turma->id]]) }}
                                                <button type="submit" class="btn btn-outline-danger ml-1">
                                                    Excluir
                                                </button>
                                            {{ Form::close() }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-muted">
                            Total de alunos: {{ $turma->alunos->count() }}
                        </div>
                    </div>
                @endforeach
            </div>

            @unless(count($data))
                <p class="text-center">Não existem turmas cadastradas!</p>
            @endunless
        </div>
    </div>
@endsection
