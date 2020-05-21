@extends('layouts.app')

@section('content')
    <h1>Salvar aluno</h1>

    <a href="{{ URL::to('alunos') }}" class="btn btn-primary navbar-right mb-2">
        <span class="glyphicon glyphicon-chevron-left"></span> Voltar
    </a>

    <div class="card">
        <div class="card-header">
            Novo aluno
        </div>

        <div class="card-body">
            {{ Form::open(['url' => 'alunos', 'class' => 'form-horizontal row']) }}
                <div class="col-lg-12 mb-4">
                    {{ Form::label('nome', 'Nome') }}
                    {{ Form::text('nome', null, ['class' => 'form-control',
                        'placeholder' => 'Digite seu nome']) }}
                    <div class="mt-2">
                        @include('errors.errors')
                    </div>
                </div>

                <div class="col-lg-12 mb-4">
                    {!! Form::label('data_nascimento', 'Data nascimento') !!}
                    {!! Form::date('data_nascimento', null, ['class' => 'form-control',
                        'placeholder' => 'Digite sua data de nascimento']) !!}
                    <div class="mt-2">
                        @include('errors.errors')
                    </div>
                </div>

                <div class="col-lg-12 mb-4">
                    {{ Form::label('sexo', 'Sexo') }}
                    {{ Form::select('sexo', ['M' => 'Masculino', 'F' => 'Feminino'], 'M', ['class' => 'form-control']) }}
                    <div class="mt-2">
                        @include('errors.errors')
                    </div>
                </div>

                <div class="col-lg-12 mb-2">
                    {{ Form::submit('Salvar', ['class' => 'btn btn-primary']) }}
                </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection
