@extends('layouts.app')

@section('content')
  <div class="panel panel-default">              
                <ol class="breadcrumb panel-heading">
                	<li><a href="{{ route('cliente.index') }}">Clientes</a></li>
                	<li class="active" >Visualizar</li>
                </ol>
                <div class="panel-body">
               	<form class="form-horizontal" role="form" action="{{ route('cliente.update', $cliente->id)}}" method="POST">
                <input type="hidden" name="_method" value="put">
               	<div class="form-group{{ $errors->has('nome') ? ' has-error' : '' }}">
                            <label for="nome" class="col-md-4 control-label">Nome:</label>
                            <div class="col-md-6">
                                <input id="nome" type="text" class="form-control" name="nome" disabled value="{{$cliente->nome}}">
                            
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail:</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{$cliente->email}}" disabled>
                	        </div>
                        </div>

                        <div class="form-group{{ $errors->has('endereco') ? ' has-error' : '' }}">
                            <label for="endereco" class="col-md-4 control-label">Endereço:</label>
                            <div class="col-md-6">
                                <input id="endereco" type="text" class="form-control" name="endereco" value="{{$cliente->endereco}}" disabled>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('cnpj') ? ' has-error' : '' }}">
                            <label for="cnpj" class="col-md-4 control-label">CNPJ:</label>
                            <div class="col-md-6">
                                <input id="cnpj" type="text" class="form-control" name="cnpj"  value="{{$cliente->cnpj}}" disabled>
                            </div>
                        </div>
                       
                        <div class="form-group{{ $errors->has('telefone') ? ' has-error' : '' }}">
                            <label for="telefone" class="col-md-4 control-label">Telefone:</label>
                            <div class="col-md-6">
                                <input id="telefone" type="text" class="form-control" name="telefone"  value="{{$cliente->telefone}}" disabled>
                            </div>
                        </div>
                       

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <a type="submit" class="btn btn-primary" href="{{ route('cliente.index')}}">
                                    Voltar
                                </a>
                            </div>
                        </div>
                </div>
  </div>
@endsection