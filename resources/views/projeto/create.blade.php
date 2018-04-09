@extends('layouts.app')
@section('content')
  <div class="panel panel-default">              
                <ol class="breadcrumb panel-heading">
                	<li><a href="{{ route('projeto.index') }}">Projetos</a></li>
                	<li class="active" >Novo</li>
                </ol>
                <div class="panel-body">
               	<form class="form-horizontal" action="{{ route('projeto.store')}}" role="form"  method="POST">
                {{ csrf_field() }}
               			<div class="form-group{{ $errors->has('nome') ? ' has-error' : '' }}">
                            <label for="nome" class="col-md-4 control-label">Descricao:</label>
                            <div class="col-md-6">
                                <input id="descricao" type="text" class="form-control" name="descricao">                               
                                @if ($errors->has('descricao'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('descricao') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('cliente_id') ? ' has-error' : '' }}">
                            <label for="tipoHora" class="col-md-4 control-label">Cliente:</label>
                            <div class="col-md-6">
                                <select class="form-control" name="tipoHora">
									 <option name="tipoHora" value="1">Suporte</option>									 
                                     <option name="tipoHora" value="2">Projeto</option>									 
								</select>
                                @if ($errors->has('tipoHora'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tipoHora') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						<div class="form-group{{ $errors->has('cliente_id') ? ' has-error' : '' }}">
                            <label for="cliente_id" class="col-md-4 control-label">Cliente:</label>
                            <div class="col-md-6">
                                <select class="form-control" name="cliente_id">
									 @foreach($Clientes as $cliente)
									 <option name="cliente_id" value="{{ $cliente['id'] }}">{{ $cliente['nome'] }}</option>
									 @endforeach
								</select>
                                @if ($errors->has('cliente_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cliente_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('consultor_id') ? ' has-error' : '' }}">
                            <label for="cliente_id" class="col-md-4 control-label">Gerente:</label>
                            <div class="col-md-6">
                                <select class="form-control" name="consultor_id">
									 @foreach($Consultores as $Consultor)
									 <option name="consultor_id" value="{{ $Consultor['id'] }}">{{ $Consultor['name'] }}</option>
									 @endforeach
								</select>
                                @if ($errors->has('consultor_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('consultor_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>                
                        <div class="form-group{{ $errors->has('totalHr') ? ' has-error' : '' }}">
                            <label for="horaini" class="col-md-4 control-label">Total Horas:</label>
                            <div class="col-md-3">
                                <input id="totalHr" type="text" class="form-control" name="totalHr" placeholder="Digite a total de horas..." required >
                                @if ($errors->has('totalHr'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('totalHr') }}</strong>
                                    </span>
                                @endif
                            </div>
                             <div class="col-md-3">
                                <input id="totalHrConsumida" type="text" class="form-control" name="totalHrConsumida" required readonly="readonly" >
                                @if ($errors->has('totalHrConsumida'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('totalHrConsumida') }}</strong>
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
                <input type="hidden" name="email" value="0">                                
                </form>
  </div>  
@endsection

@section('javascript')
@endsection