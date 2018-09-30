@extends('layouts.app')

@section('content')
    <h1>Notas e Faltas</h1>
    <table class="table table-bordered">
            <tr>        
                <th>Disciplina</th>
                <th>Faltas</th>     
                <th>Nota 1</th>
                <th>Nota 2</th>
                <th>Nota 3</th>      
                <th>Status</th>   
            </tr>
            <tr>
                @foreach($disciplinas as $disciplina)
                <td>{{ $disciplina->nome}}</td>
                <td>{{ $disciplina->faltas }}</td> 
                <td>{{ $disciplina->nota1 }}</td> 
                <td>{{ $disciplina->nota2 }}</td>
                <td>{{ $disciplina->nota3 }}</td> 
                <td>{{ $disciplina->aprovado }}</td>           
                </tr>  
                @endforeach  
            </table>
@endsection