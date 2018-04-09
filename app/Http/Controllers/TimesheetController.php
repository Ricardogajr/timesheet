<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\TimesheetController;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use App\Mail\envMail;
use App\Http\Requests;
use Excel;

class TimesheetController extends Controller
{
    public $user = "";
     public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {      
        
        $user = \Auth::user()->id;       
        $TimeSheets = \App\TimeSheet::select('time_sheets.*', 'clientes.nome')->join('clientes', 'clientes.id', '=', 'time_sheets.cliente_id')->where('time_sheets.consultor_id', $user)->orderBy('data', 'desc')->paginate(5);
       
        return view('timesheet.index', compact('TimeSheets') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $Clientes = \App\Cliente::All();
        return view('timesheet.create', compact('Clientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $criar = \App\TimeSheet::create($request->all());
        \Session::flash('flash_msg', [
            'msg' => 'Ordem de Serviço criada com sucesso!',
            'class' => 'alert-success',
            ]);
        $Clientes = \App\Cliente::All();
        return view('timesheet.create', compact('Clientes'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $timeSheet = \App\TimeSheet::find($id);
        $cliente = \App\Cliente::find($timeSheet['cliente_id']);
        return view('timesheet.show', compact('timeSheet','cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $timeSheet = \App\TimeSheet::find($id);
        $cliente = \App\Cliente::find($timeSheet['cliente_id']);
        return view('timesheet.edit', compact("timeSheet","cliente"));
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
         $time = \App\TimeSheet::find($id)->update($request->all());        
        \Session::flash('flash_msg', [
            'msg' => 'TimeSheet atualizado com sucesso!',
            'class' => 'alert-success',
        ]);
        return redirect()->route('timesheet.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $timesheet = \App\TimeSheet::find($id);
        $timesheet->delete();        
        \Session::flash('flash_msg', [
            'msg' => 'Apontamento deletado com sucesso!',
            'class' => 'alert-success',
        ]);
        return redirect()->route('timesheet.index');
        
    }
    
    public function search(Request $request){
        $user = \Auth::user()->id;    
        /*
        $TimeSheets = \App\TimeSheet::select('time_sheets.*', 'clientes.nome')
                        ->join('clientes', 'clientes.id', '=', 'time_sheets.cliente_id')
                        ->Where('time_sheets.consultor_id', $user)
                        ->Where(function($query){
                            $data = Input::get('date-filter');
                            $cliente = Input::get('client-filter');
                            if($cliente != "" && $data == ""){
                                    $query->where('time_sheets.data', $data)
                                    ->orwhere('clientes.nome', 'LIKE', '%'.$cliente.'%');
                            }else if(($cliente != "" && $data != "") || ($cliente == "" && $data != "")){
                                    $query->where('time_sheets.data',$data)
                                    ->where('clientes.nome', 'LIKE', '%'.$cliente.'%');
                            }
                        })                                    
                        ->orderBy('data', 'desc')->get();        
                        */
                        $filter = Input::get('filter');
                        $TimeSheets = \App\TimeSheet::select('time_sheets.*', 'clientes.nome')
                        ->join('clientes', 'clientes.id', '=', 'time_sheets.cliente_id')
                        ->Where('time_sheets.consultor_id', $user)
                        ->where('time_sheets.data', 'LIKE', '%'. $filter .'%' )
                        ->orwhere('clientes.nome', 'LIKE', '%'.$filter.'%')                           
                        ->orwhere('time_sheets.descricao', 'LIKE', '%'.$filter.'%')                        
                        ->orderBy('data', 'desc')->get();      
        return view('timesheet.index', ['TimeSheets' => $TimeSheets ,'search' => 1 ]);
    }
    
    public function emailApontamento(Request $request, $id){    
        try {
            Mail::to('ricardogajr@gmail.com')->send(new envMail($id)); 
        }catch(Exception $e){
            \Session::flash('flash_msg', [
                'msg' => 'Erro no envio do email!' . $e,
                'class' => 'alert-danger',
            ]);
        }
        
        $time = \App\TimeSheet::find($id);
        $time->email = 1;
        $time->update($request->all());     

        \Session::flash('flash_msg', [
            'msg' => 'Email enviado com sucesso!',
            'class' => 'alert-success',
        ]);              
        /*
        $user = \Auth::user()->id;       
        $TimeSheets = \App\TimeSheet::select('time_sheets.*', 'clientes.nome')->join('clientes', 'clientes.id', '=', 'time_sheets.cliente_id')->where('time_sheets.consultor_id', $user)->orderBy('data', 'desc')->paginate(5);       
        return view('timesheet.index', compact('TimeSheets') );*/
        return redirect()->route('timesheet.index');
    }

    public function getXls(Request $request, $type)
    {          
        $user = \Auth::user()->id;    
        
        $filter = Input::get('filter');
        $TimeSheets = \App\TimeSheet::select('time_sheets.*', 'clientes.nome')
        ->join('clientes', 'clientes.id', '=', 'time_sheets.cliente_id')
        ->Where('time_sheets.consultor_id', $user)
        ->where('time_sheets.data', 'LIKE', '%'. $filter .'%' )
        ->orwhere('clientes.nome', 'LIKE', '%'.$filter.'%')                           
        ->orwhere('time_sheets.descricao', 'LIKE', '%'.$filter.'%')                        
        ->orderBy('data', 'desc')->get();      

        //return \Excel::loadView('timesheet.email', compact('TimeSheets'))->export('xls');                  
        return Excel::download($TimeSheets, 'invoices.xlsx');
    }
  
}
