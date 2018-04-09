@extends('layouts.app')

@section('content')
  <div class="panel panel-default">              
                <ol class="breadcrumb panel-heading">
                	<li><a href="{{ route('cliente.index') }}">Clientes</a></li>
                	<li class="active" >Editar</li>
                </ol>
                <div class="panel-body">
               	<form class="form-horizontal" role="form" action="{{ route('cliente.update', $cliente->id)}}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="put">
               	<div class="form-group{{ $errors->has('nome') ? ' has-error' : '' }}">
                            <label for="nome" class="col-md-4 control-label">Nome:</label>
                            <div class="col-md-6">
                                <input id="nome" type="text" class="form-control" name="nome" placeholder="Digite o nome..." required autofocus value="{{$cliente->nome}}">
                                @if ($errors->has('nome'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nome') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail:</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" placeholder="Digite o Email..." value="{{$cliente->email}}" required>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('endereco') ? ' has-error' : '' }}">
                            <label for="endereco" class="col-md-4 control-label">Endereço:</label>
                            <div class="col-md-6">
                                <input id="endereco" type="text" class="form-control" name="endereco" placeholder="Digite o Endereço..." value="{{$cliente->endereco}}" required>
                                @if ($errors->has('endereco'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('endereco') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('cnpj') ? ' has-error' : '' }}">
                            <label for="cnpj" class="col-md-4 control-label">CNPJ:</label>
                            <div class="col-md-6">
                                <input id="cnpj" type="text" class="form-control" name="cnpj" placeholder="Digite o CNPJ..." value="{{$cliente->cnpj}}" required>
                                @if ($errors->has('cnpj'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cnpj') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                       
                        <div class="form-group{{ $errors->has('telefone') ? ' has-error' : '' }}">
                            <label for="telefone" class="col-md-4 control-label">Telefone:</label>
                            <div class="col-md-6">
                                <input id="telefone" type="text" class="form-control" name="telefone" placeholder="Digite o Telefone..." value="{{$cliente->telefone}}" required>
                                @if ($errors->has('telefone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('telefone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                       

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Confirmar
                                </button>
                            </div>
                        </div>
                </div>
  </div>
@endsection