<?php

namespace App\Http\Controllers;
use Khill\Lavacharts\Lavacharts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

       
        
        $user = \Auth::user()->id;       
        $TimeSheets = \App\TimeSheet::select('time_sheets.*', 'clientes.nome')->join('clientes', 'clientes.id', '=', 'time_sheets.cliente_id')->where('time_sheets.consultor_id', $user)->orderBy('data', 'desc')->whereYear('data','=', date('Y'))->get();
        
        $finances = \Lava::DataTable();
        $finances->addDateColumn('Day of Month');        
        $finances->setDateTimeFormat('m');
        $finances->addNumberColumn('Horas realizadas');
        $finances->addNumberColumn('Horas previstas');
        $finances->addRow(['01', \App\TimeSheet::selectRaw("convert(TIME_FORMAT(Sec_to_Time(Sum(Time_to_Sec(TOTAL))), '%H'), SIGNED) AS TOTAL")->where('consultor_id', '=',  Auth()->id())->whereMonth('data', '=', '01')->whereYear('data', '=', '2018')->get()[0]['TOTAL'], $this->fHorasPrevistas(01, 2018)]);
        
        $finances->addRow(['02', \App\TimeSheet::selectRaw("convert(TIME_FORMAT(Sec_to_Time(Sum(Time_to_Sec(TOTAL))), '%H'), SIGNED) AS TOTAL")->where('consultor_id', '=',  Auth()->id())->whereMonth('data', '=', '02')->whereYear('data', '=', '2018')->get()[0]['TOTAL'], $this->fHorasPrevistas(2, 2018)]);
        $finances->addRow(['03', \App\TimeSheet::selectRaw("convert(TIME_FORMAT(Sec_to_Time(Sum(Time_to_Sec(TOTAL))), '%H'), SIGNED) AS TOTAL")->where('consultor_id', '=',  Auth()->id())->whereMonth('data', '=', '03')->whereYear('data', '=', '2018')->get()[0]['TOTAL'], $this->fHorasPrevistas(3, 2018)]);
        $finances->addRow(['04', \App\TimeSheet::selectRaw("convert(TIME_FORMAT(Sec_to_Time(Sum(Time_to_Sec(TOTAL))), '%H'), SIGNED) AS TOTAL")->where('consultor_id', '=',  Auth()->id())->whereMonth('data', '=', '04')->whereYear('data', '=', '2018')->get()[0]['TOTAL'], $this->fHorasPrevistas(4, 2018)]);
        $finances->addRow(['05', \App\TimeSheet::selectRaw("convert(TIME_FORMAT(Sec_to_Time(Sum(Time_to_Sec(TOTAL))), '%H'), SIGNED) AS TOTAL")->where('consultor_id', '=',  Auth()->id())->whereMonth('data', '=', '05')->whereYear('data', '=', '2018')->get()[0]['TOTAL'], $this->fHorasPrevistas(5, 2018)]);
        $finances->addRow(['06', \App\TimeSheet::selectRaw("convert(TIME_FORMAT(Sec_to_Time(Sum(Time_to_Sec(TOTAL))), '%H'), SIGNED) AS TOTAL")->where('consultor_id', '=',  Auth()->id())->whereMonth('data', '=', '06')->whereYear('data', '=', '2018')->get()[0]['TOTAL'], $this->fHorasPrevistas(6, 2018)]);
        $finances->addRow(['07', \App\TimeSheet::selectRaw("convert(TIME_FORMAT(Sec_to_Time(Sum(Time_to_Sec(TOTAL))), '%H'), SIGNED) AS TOTAL")->where('consultor_id', '=',  Auth()->id())->whereMonth('data', '=', '07')->whereYear('data', '=', '2018')->get()[0]['TOTAL'], $this->fHorasPrevistas(7, 2018)]);
        $finances->addRow(['08', \App\TimeSheet::selectRaw("convert(TIME_FORMAT(Sec_to_Time(Sum(Time_to_Sec(TOTAL))), '%H'), SIGNED) AS TOTAL")->where('consultor_id', '=',  Auth()->id())->whereMonth('data', '=', '08')->whereYear('data', '=', '2018')->get()[0]['TOTAL'], $this->fHorasPrevistas(8, 2018)]);
        $finances->addRow(['09', \App\TimeSheet::selectRaw("convert(TIME_FORMAT(Sec_to_Time(Sum(Time_to_Sec(TOTAL))), '%H'), SIGNED) AS TOTAL")->where('consultor_id', '=',  Auth()->id())->whereMonth('data', '=', '09')->whereYear('data', '=', '2018')->get()[0]['TOTAL'], $this->fHorasPrevistas(9, 2018)]);
        $finances->addRow(['10', \App\TimeSheet::selectRaw("convert(TIME_FORMAT(Sec_to_Time(Sum(Time_to_Sec(TOTAL))), '%H'), SIGNED) AS TOTAL")->where('consultor_id', '=',  Auth()->id())->whereMonth('data', '=', '10')->whereYear('data', '=', '2018')->get()[0]['TOTAL'], $this->fHorasPrevistas(10, 2018)]);
        $finances->addRow(['11', \App\TimeSheet::selectRaw("convert(TIME_FORMAT(Sec_to_Time(Sum(Time_to_Sec(TOTAL))), '%H'), SIGNED) AS TOTAL")->where('consultor_id', '=',  Auth()->id())->whereMonth('data', '=', '11')->whereYear('data', '=', '2018')->get()[0]['TOTAL'], $this->fHorasPrevistas(11, 2018)]);
        $finances->addRow(['12', \App\TimeSheet::selectRaw("convert(TIME_FORMAT(Sec_to_Time(Sum(Time_to_Sec(TOTAL))), '%H'), SIGNED) AS TOTAL")->where('consultor_id', '=',  Auth()->id())->whereMonth('data', '=', '12')->whereYear('data', '=', '2018')->get()[0]['TOTAL'], $this->fHorasPrevistas(12, 2018)]);

        \Lava::ColumnChart('Finances', $finances);
        
        $reasons = \Lava::DataTable();
        $clientes = \App\Cliente::all();
        $reasons->addStringColumn('Clientes')
                ->addNumberColumn('Quantidade');
                foreach($clientes as $cliente){
                    $reasons->addRow([$cliente['nome'], \App\TimeSheet::selectRaw("convert(TIME_FORMAT(Sec_to_Time(Sum(Time_to_Sec(TOTAL))), '%H'), SIGNED) AS TOTAL")->where('consultor_id', '=',  Auth()->id())->where('cliente_id', '=', $cliente['id'])->whereMonth('data', '=', date('m'))->whereYear('data','=', date('Y'))->get()[0]['TOTAL']]);
                }
                
        
        \Lava::DonutChart('IMDB', $reasons, [
            'title' => 'Total horas por cliente',
            'size' => 1000,
            'pieHole' => 100.0
        ]);

       
        $sales = \Lava::DataTable();

        $sales->addDateColumn('Date')
            ->addNumberColumn('Orders');
            
        foreach ($TimeSheets as $time) {
            $sales->addRow([$time['data'], \App\TimeSheet::selectRaw("convert(TIME_FORMAT(Sec_to_Time(Sum(Time_to_Sec(TOTAL))), '%H'), SIGNED) AS TOTAL")->where('consultor_id', '=',  Auth()->id())->where('data', '=', $time['data'])->get()[0]['TOTAL']]);
            
        }

        \Lava::CalendarChart('Sales', $sales, [
            'title' => 'Apontamentos',
            'height'            => 200,         
            'unusedMonthOutlineColor' => [
                'stroke'        => 'black',
                'strokeOpacity' => 0.75,
                'strokeWidth'   => 1
            ],   
            'daysOfWeek'=> 7,
            'dayOfWeekLabel' => [
                'color'    => '#4f5b0d',
                'fontSize' => 26,
                'italic'   => true
            ],
            'noDataPattern' => [
                'color' => '#B0E0E6',
                'backgroundColor' => '#A9A9A9'
            ],
            'colorAxis' => [
                'values' => [8, 24],
                'colors' => ['#A9A9A9', 'red']
            ]
        ]);
        return view('home', compact('TimeSheets'));
    }

    public function fHorasPrevistas($mes, $ano){
    
        // Exemplo: Feriados de Novembro
        //$feriados = array(2 => 'Finados', 15 => 'Proclamação da Republica');

        $feriados = array();

        // Total de dias no mês
        $dias_do_mes = cal_days_in_month(CAL_GREGORIAN, $mes, $ano);
        $dias_letivos = 0;

        for($d=1; $d<=$dias_do_mes; $d++) {
            $dia_da_semana = jddayofweek(cal_to_jd(CAL_GREGORIAN, $mes, $d, $ano) , 0);

            // 0 = domingo e 6 = sábado
            if (!($dia_da_semana == 0 || $dia_da_semana == 6 || in_array($d, $feriados))) {
                $dias_letivos++;
            }
        }
        return $dias_letivos * 8;    
    }
}