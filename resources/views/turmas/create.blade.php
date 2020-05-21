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
                <div class="col-lg-12 mb-4">
                    {!! Form::label('nome', 'Nome') !!}
                    {!! Form::text('nome', null, ['class' => 'form-control',
                        'placeholder' => 'Digite seu nome']) !!}
                    <div class="mt-2">
                        @include('errors.errors')
                    </div>
                </div>

                <div class="col-lg-4 mb-3">
                    {!! Form::label('aluno_id', 'Alunos') !!}<br />
                    <select id="example-dropUp" multiple name="aluno_id[]">
                        @foreach($alunos as $aluno)
                            <option value="{{ $aluno->id }}">{{ $aluno->nome }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-lg-12 mb-2">
                    {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example-dropUp').multiselect({
                enableFiltering: true,
                includeSelectAllOption: true,
                maxHeight: 400,
                dropUp: true
            });
        });
    </script>
@endsection
