@extends('layouts.app')

@section('content')
    <h1>Atualizar aluno</h1>

    <a href="{{ URL::to('alunos') }}" class="btn btn-primary navbar-right mb-2">
        <span class="glyphicon glyphicon-chevron-left"></span> Voltar
    </a>

    <div class="card">
        <div class="card-header">
            Atualizar aluno
        </div>
        <div class="card-body">
            {{ Form::open(['method' => 'PUT', 'route' => ['alunos.update', $data->id]]) }}
                <div class="col-lg-12 mb-4">
                    {!! Form::label('nome', 'Nome') !!}
                    {!! Form::text('nome', $data->nome, ['class' => 'form-control',
                        'placeholder' => 'Digite seu nome']) !!}
                    <div class="mt-2">
                        @include('errors.errors')
                    </div>
                </div>

                <div class="col-lg-12 mb-4">
                    {!! Form::label('data_nascimento', 'Data nascimento') !!}
                    {!! Form::text('data_nascimento', $data->data_nascimento, ['class' => 'form-control',
                        'placeholder' => 'Digite sua data de nascimento']) !!}
                    <div class="mt-2">
                        @include('errors.errors')
                    </div>
                </div>

                <div class="col-lg-12 mb-4">
                    {!! Form::label('sexo', 'Sexo') !!}
                    {!! Form::text('sexo', $data->sexo, ['class' => 'form-control',
                        'placeholder' => 'Digite seu sexo']) !!}
                    <div class="mt-2">
                        @include('errors.errors')
                    </div>
                </div>

                <div class="col-lg-12 mb-2">
                    {{ Form::submit('Atualizar', ['class' => 'btn btn-primary']) }}
                </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection
