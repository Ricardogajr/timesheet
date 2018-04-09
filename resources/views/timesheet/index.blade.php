@extends('layouts.app')
@section('content')
            <div class="panel panel-default">
            	<ol class="breadcrumb panel-heading">
                	<li class="active" >Ordem de Serviço</li>
                </ol>
				<div class="container">					
                    <a href="{{ route('timesheet.create')}}" class="btn btn-primary" ><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Novo</a>    				                                  
                </div>
	             <div class="panel-body">
               	 <div class="row">
               	 	<form action="{{ route('timesheet.search') }}" method="POST">
                   	 	{{ csrf_field() }}
                    	<div class="col-sm-3">  
                    		<input type="text" class="form-control" name="filter" autocomplete="off" placeholder="Filtrar...." >          		          	                              	                		
                    	</div>
                    	<button type="submit" class="btn btn-primary" name='pesquisa' ><span class="glyphicon  glyphicon-search" aria-hidden="true"></span></button>
						<a href="{{ route('timesheet.excel', 'xls')}}" class="btn btn-success"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Excel</a>
                	</form>
                 </div>
                 <br/>
               	 <div class="table-responsive">
	                 <table class="table .table-condensed table-bordered table-hover ">
	                	<thead>
	                		<th>Data</th>
	                		<th>Cliente</th>
	                		<th>Início</th>
	                		<th>Fim</th>
	                		<th>Desconto</th>
	                		<th>Translado</th>
	                		<th>Total</th>
	                		<th>Editar</th>
	                		<th>Deletar</th>
	                		<th>E-mail</th>
	                	</thead>
	                	<tbody>
	                	@foreach($TimeSheets as $TimeSheet)
	                		<tr>
		                		<td hidden>
		                			{{ $TimeSheet['id']}}
		                		</td>
								<td>
	                				<a href="{{ route('timesheet.show',$TimeSheet['id']) }}" >{{ date_format(new DateTime($TimeSheet['data']), 'd/m/Y')  }}</a>
	                			</td>
	                			<td>
	                			{{ $TimeSheet['nome']}}
	                			</td>
	                			<td>
	                			{{ $TimeSheet['horaini'] }}
	                			</td>
	                			<td>
	                			{{ $TimeSheet['horafim'] }}
	                			</td>
	                			<td>
	                			{{ $TimeSheet['desconto'] }}
	                			</td>
	                			<td>
	                			{{ $TimeSheet['translado'] }}
	                			</td>
	                			<td>
	                			{{ $TimeSheet['total'] }}
	                			</td>
	                			<td>
	                			<a href="{{ route('timesheet.edit', $TimeSheet['id'] ) }}" class="btn btn-info"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
	                			</td>
	                			<td>
	                			<a class="btn btn-danger" href="javascript:confirm('Deseja mesmo deletar este registro?') ? window.location.href='{{ route('timesheet.destroy', $TimeSheet['id'])}}' : false;"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>	                			                		
	                			</td>
	                			<td>	                			
	                			<a class="{{ ($TimeSheet['email'] ? 'btn btn-success' : 'btn btn-warning') }}" href="javascript:confirm('Deseja enviar o email?') ? window.location.href='{{ route('timesheet.email', $TimeSheet['id']) }}' : false;"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></a>
	                			</td>
	                		</tr>
	                	@endforeach
	                	</tbody>
	                	</table>
	                 </div>
	                    <div align="center">
	                    <?php if(!isset($search)){?>
	                		{!! $TimeSheets->links() !!}
	                	<?php } ?>
	                	              
	                </div>
               	 
                </div>

            </div>
@endsection