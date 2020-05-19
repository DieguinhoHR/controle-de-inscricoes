@extends('layouts.app')

@section('content')
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Data criação</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($turmas as $turma)
                <tr>
                    <th scope="row">{{ $turma->id }}</th>
                    <td>{{ $turma->nome }}</td>
                    <td>{{ $turma->created_at }}</td>
                    <th scope="col">Ações</th>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
