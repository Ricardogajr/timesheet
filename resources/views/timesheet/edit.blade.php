@extends('layouts.app')
@section('content')
  <div class="panel panel-default">              
                <ol class="breadcrumb panel-heading">
                	<li><a href="{{ route('timesheet.index') }}">Ordens de Serviço</a></li>
                	<li class="active" >Novo</li>
                </ol>
                <div class="panel-body">
               	<form class="form-horizontal" action="{{ route('timesheet.update', $timeSheet['id'])}}" role="form"  method="POST">
                {{ csrf_field() }}               	
                		<div class="form-group{{ $errors->has('nome') ? ' has-error' : '' }}">
                            <label for="nome" class="col-md-4 control-label">Data:</label>
                            <div class="col-md-6">
                                <input id="data" type="date" class="form-control" name="data" value="{{ $timeSheet['data'] }}" autofocus>
                                @if ($errors->has('data'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('data') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						<div class="form-group{{ $errors->has('cliente_id') ? ' has-error' : '' }}">
                            <label for="cliente_id" class="col-md-4 control-label">Cliente:</label>
                            <div class="col-md-6">
                                <select class="form-control" name="cliente_id">
									 <option name="cliente_id" value="{{ $cliente['id'] }}">{{ $cliente['nome'] }}</option>									 
								</select>
                                @if ($errors->has('cliente_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cliente_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('horaini') ? ' has-error' : '' }}">
                            <label for="horaini" class="col-md-4 control-label">Entrada / Saída:</label>
                            <div class="col-md-3">
                                <input id="horaini" type="time" class="form-control" name="horaini" value="{{ $timeSheet['horaini'] }}" placeholder="Digite a Hora de entrada..." required >                                
                            </div>
                             <div class="col-md-3">
                                <input id="horafim" type="time" class="form-control" name="horafim" value="{{ $timeSheet['horafim'] }}" placeholder="Digite a Hora de saída..." required >                                                                   
                            </div>
                        </div>
            
            			<div class="form-group{{ $errors->has('desconto') ? ' has-error' : '' }}">
                            <label for="desconto" class="col-md-4 control-label">Desconto / Translado:</label>
                            <div class="col-md-3">
                                <input id="desconto" type="time" class="form-control" name="desconto" value="{{ $timeSheet['desconto'] }}" placeholder="Digite Desconto..." required >                              
                            </div>
                             <div class="col-md-3">
                                <input id="translado" type="time" class="form-control" name="translado" value="{{ $timeSheet['translado'] }}" placeholder="Digite a Translado..." required >                               
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('total') ? ' has-error' : '' }}">
                         <label for="total" class="col-md-4 control-label">Total:</label>
                         <div class="col-md-3">
                                <input id="total" type="time" class="form-control" name="total" value="{{$timeSheet['total']}}" >                                
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('descricao') ? ' has-error' : '' }}">
                            <label for="descricao" class="col-md-4 control-label">Descrição:</label>
                            <div class="col-md-6">
                                <textarea id="descricao" type="text" class="form-control" name="descricao" placeholder="Digite o descrição..." required >
                                </textarea>
                                @if ($errors->has('descricao'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('descricao') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit"  id="confirma" class="btn btn-primary">
                                    Confirmar
                                </button>
                            </div>
                        </div>
                </div>
  </div>  
@endsection