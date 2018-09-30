@extends('layouts.app')

@section('content')
<h1>Professor</h1>

<div>
    <a href="{{ URL::route('cadDisciplina') }}" class="btn btn-default"> Abrir Turma </a>
</div>

<div>
    <a href="{{ URL::route('abrirTurma') }}" class="btn btn-default"> Cadastrar Aluno Na Turma </a>
</div>

@endsection