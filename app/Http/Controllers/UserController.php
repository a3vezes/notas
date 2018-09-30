<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //

    public function professorIndex(){
        return view('professorHome');
    }

    public function professorAbrirTurma(){
        $alunos = DB::table('users')
        ->select('id','name')  
        ->where('professor', '=', '0')      
        ->get();

        $disciplinas = DB::table('disciplinas')
        ->select('id','nome')
        ->get();

        return view('abrirTurma',['alunos' => $alunos, 'disciplinas' => $disciplinas]);
    }
    public function professorAbrirTurmaR(Request $request){
        $this->validate($request,[
            'aluno'      => 'required',
            'disciplina' => 'required',
            'faltas' => 'required|integer|min:0',
            'nota1' => 'required',
            'nota2' => 'required',
            'nota3' => 'required'
        ]);
           
        if( (($request->nota1 + $request->nota2 + $request->nota3 )/3 < 6) or ($request->faltas > 20) ){
            $aprovado = 'Reprovado';
        }else{
            $aprovado = "Aprovado";
        }

        DB::table('pad')->insert([
            [
                'id_professor' => Auth::id(),
                'id_aluno' => $request->aluno,
                'id_disciplina' => $request->disciplina,
                'faltas' => $request->faltas,
                'nota1' => $request->nota1,
                'nota2' => $request->nota2,
                'nota3' => $request->nota3,
                'aprovado' => $aprovado                
            ]            
        ]);

        return view('professorHome');
    }
    public function professorCadastrarDisciplina(){
        return view('cadDisciplina');
    }
    public function professorCadastrarDisciplinaR(Request $request)
    {
        $this->validate($request,[
            'nome'      => 'required|string',
            'creditos' => 'required|string',
            'horario' => 'required|string'          
        ]);

        DB::table('disciplinas')->insert([
            [
                'nome' => $request->nome,
                'creditos' => $request->creditos,
                'horario' => $request->horario
            ]
        ]);

        return view('professorHome');
    }

    public function alunoIndex(){
        return view('alunoHome');
    }

    public function alunoNotasFaltas(){
        $disciplinas = DB::table('pad')
                        ->join('disciplinas', 'id_disciplina', '=', 'disciplinas.id')
                        ->join('users', 'id_aluno', '=', 'users.id')                        
                        ->select('disciplinas.nome','pad.faltas', 'pad.nota1', 'pad.nota2', 'pad.nota3', 'pad.aprovado')
                        ->where('pad.id_aluno', '=', Auth::id() )
                        ->get();
        return view('alunoNotasFaltas',['disciplinas' => $disciplinas]);
    }

    public function home(){        
        if (Auth::check()) {       
        $professor = Auth::user()->isProfessor();     
        
        switch ($professor) {
            case '0':
                    return view('alunoHome');
                break;
            case '1':
                    return view('professorHome');
                break;             
        }   
    }
    return view('welcome');   
    }
}
