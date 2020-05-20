@extends('layouts.app')

@section('content')
    <h1>Atualizar turma</h1>

    <a href="{{ URL::to('turmas') }}" class="btn btn-primary navbar-right mb-2">
        <span class="glyphicon glyphicon-chevron-left"></span> Voltar
    </a>

    <div class="card">
        <div class="card-header">
            Atualizar turma
        </div>
        <div class="card-body">
            {{ Form::open(['method' => 'PUT', 'route' => ['turmas.update', $data->id]]) }}
                <div class="col-lg-12 mb-3">
                    {{ Form::label('nome', 'Nome') }}
                    {{ Form::text('nome', $data->nome, [
                        'class' => 'form-control',
                        'placeholder' => 'Digite seu nome'
                    ]) }}
                </div>

                <div class="col-lg-12 mb-2">
                    {{ Form::submit('Atualizar', ['class' => 'btn btn-primary']) }}
                </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection
