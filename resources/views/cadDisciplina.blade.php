@extends('layouts.app')

@section('content')
<form action="{{ Route('cadDisciplinaR') }}" method="post">
        {{ csrf_field() }} 

        <div class="form-group">
                <label for="nome"><b>Nome</b></label>
                <input type="text" class="form-control" name="nome">
         </div>     
         <div class="form-group">
                <label for="creditos"><b>Créditos</b></label>
                <input type="number" class="form-control" name="creditos" min="2" max="4" step="2">
         </div>          
         <div class="form-group">
                <label for="horario"><b>Horário</b></label>
                <input type="text" class="form-control" name="horario">
         </div>         
        <button type="submit" class="btn btn-default">Cadastrar</button>	
</form>

@endsection