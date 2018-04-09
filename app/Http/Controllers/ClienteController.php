<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\Http\Requests;
use \App\Http\Requests\ClienteRequest;

class ClienteController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $menu = 'active';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    { 
        $clientes = \App\Cliente::paginate(5);
        return view('cliente.index', compact('clientes', 'menu'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClienteRequest $request)
    {
        \App\Cliente::create($request->all());
        \Session::flash('flash_msg',[
            'msg' => 'Cliente incluído com sucesso.',
            'class' => 'alert-success',    
            ]);
        return redirect()->route('cliente.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = \App\Cliente::find($id);
        return view('cliente.show', compact('cliente'));

        return \Response::json($cliente);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = \App\Cliente::find($id);
        if(!$cliente){
            \Session::flash('flash_msg', [
                'msg' => 'Este cliente n�o esta mais cadastrado! Deseja criar outro cliente?',
                'class' => 'alert-danger',
                ]);
            return redirect()->route('cliente.create');

        }
        return view('cliente.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        \App\Cliente::find($id)->update($request->all());
            \Session::flash('flash_msg', [
                'msg' => 'Cliente atualizado com sucesso!',
                'class' => 'alert-success',
                ]);
            return redirect()->route('cliente.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = \App\Cliente::find($id);
       
        $timesheet = \App\TimeSheet::where('cliente_id', '=', $id)->first();
         if($timesheet){
            \Session::flash('flash_msg', [
                'msg' => 'Existe uma Ordem de serviço para este cliente! Não será possivel a exclusão do mesmo.',
                'class' => 'alert-danger',
                ]);
            return redirect()->route('cliente.index');
        }

        $cliente->delete();

          \Session::flash('flash_msg', [
                'msg' => 'Cliente deletado com sucesso!',
                'class' => 'alert-success',
                ]);
            return redirect()->route('cliente.index');
    }
}
