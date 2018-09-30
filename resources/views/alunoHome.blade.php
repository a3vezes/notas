@extends('layouts.app')

@section('content')
<h1>Aluno</h1>
<div>
    <a href="{{ URL::route('verNotas') }}" class="btn btn-default"> Ver Notas e Faltas </a>
</div>
@endsection