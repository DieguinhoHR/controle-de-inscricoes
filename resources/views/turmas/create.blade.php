@extends('layouts.app')

@section('content')
    <h1>Salvar turma</h1>

    <a href="{{ URL::to('turmas') }}" class="btn btn-primary navbar-right mb-2">
        <span class="glyphicon glyphicon-chevron-left"></span> Voltar
    </a>

    <div class="card">
        <div class="card-header">
            Nova turma
        </div>
        <div class="card-body">
            {!! Form::open(['url' => 'turmas', 'class' => 'form-horizontal row']) !!}
                <div class="col-lg-12 mb-3">
                    {!! Form::label('nome', 'Nome') !!}
                    {!! Form::text('nome', null, ['class' => 'form-control',
                        'placeholder' => 'Digite seu nome']) !!}
                </div>

                <div class="col-lg-12 mb-2">
                    {{ Form::submit('Salvar', ['class' => 'btn btn-primary']) }}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
