<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjetoController extends Controller
{
    public function __constructor(){
        $this->middleware('auth');
    }

    public function index(){
        $Projetos = \App\Projeto::Paginate(10);
        return view('projeto.index', compact("Projetos"));
    }


    public function create(){
        $Clientes = \App\Cliente::all();
        $Consultores = \App\User::all();
        return view('projeto.create', compact("Clientes", "Consultores"));
    }

    public function store(Request $request){
        \App\Projeto::create($request->all());
        $Clientes = \App\Cliente::all();
        $Consultores = \App\User::all();
        return view('projeto.create', compact("Clientes", "Consultores"));
    }
}
