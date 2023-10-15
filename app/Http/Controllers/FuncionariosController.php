<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Funcionario;

class FuncionariosController extends Controller
{
    public function index(){
        return view('app.funcionario.index');
    }
    public function listar(Request $request) {

        $funcionarios = Funcionario::where('nome', 'like', '%' . $request->input('nome') . '%')
        ->where('email', 'like', '%' . $request->input('email') . '%')
        ->paginate(5);
        
        return view('app.funcionario.listar', ['funcionarios' => $funcionarios, 'request' => $request->all() ]);
    }

    public function adicionar(Request $request) {

        $msg = '';
        
        //inclusão
        if($request->input('_token') != '' && $request->input('id') == '') {
            //validacao
            $regras = [
                'nome' => 'required|min:3|max:40',
                'email' => 'email'
            ];

            $feedback = [
                'required' => 'O campo :attribute deve ser preenchido',
                'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres',
                'nome.max' => 'O campo nome deve ter no máximo 40 caracteres',
                'email.email' => 'O campo e-mail não foi preenchido corretamente'
            ];

            $request->validate($regras, $feedback);

            $funcionario = new Funcionario();
            $funcionario->create($request->all());

            //redirect

            //dados view
            $msg = 'Cadastro realizado com sucesso';
        }

        //edição
        if($request->input('_token') != '' && $request->input('id') != '') {
            $funcionario = Funcionario::find($request->input('id'));
            $update = $funcionario->update($request->all());

            if($update) {
                $msg = 'Atualização realizada com sucesso';
            } else {
                $msg = 'Erro ao tentar atualizar o registro';
            }

            return redirect()->route('app.funcionario.editar', ['id' => $request->input('id'), 'msg' => $msg]);
        }

        return view('app.funcionario.adicionar', ['msg' => $msg]);
    }

    public function editar($id, $msg = '') {
        
        $funcionario = Funcionario::find($id);

        return view('app.funcionario.adicionar', ['funcionario' => $funcionario, 'msg' => $msg]);
    }

    public function excluir($id) {
        Funcionario::find($id)->delete();
        return redirect()->route('app.funcionario');
    }


}
