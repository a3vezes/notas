@extends('layouts.app')

@section('content')
<h1>Abrir Turma</h1>
<form action="{{ Route('abrirTurmaR') }}" method="post">
    {{ csrf_field() }} 
       <div class="form-group">
        <label>Aluno</label>
        <select name="aluno" id="alunos" class="form-control">
            @foreach($alunos as $aluno){
                <option value="{{$aluno->id}}">{{$aluno->name}}</option>
            }
            @endforeach
          </select>
    </div>
    <div class="form-group">
        <label>Disciplina</label>
        <select name="disciplina" id="disciplinas" class="form-control">
            @foreach($disciplinas as $disciplina){
                <option value="{{$disciplina->id}}">{{$disciplina->nome}}</option>
            }
            @endforeach
          </select>
    </div>
    <div class="form-group">
      <label for="faltas"><b>Faltas</b></label>
      <input type="number" class="form-control" name="faltas" min="0" >
    </div>

    <div class="form-group">
      <label for="Nota1"><b>Nota 1:</b></label>
      <input type="number" class="form-control" name="nota1" step="0.5" min="0" max="10">
    </div>
    <div class="form-group">
        <label for="Nota2"><b>Nota 2:</b></label>
        <input type="number" class="form-control" name="nota2" step="0.5" min="0" max="10">
      </div>
      <div class="form-group">
          <label for="Nota3"><b>Nota 3:</b></label>
          <input type="number" class="form-control" name="nota3" step="0.5" min="0" max="10">
        </div>                      
    <button type="submit" class="btn btn-default">Enviar!	</button>	                        	
</form>

@endsection