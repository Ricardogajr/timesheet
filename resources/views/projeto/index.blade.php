@extends('layouts.app')
@section('content')
            <div class="panel panel-default">
            	<ol class="breadcrumb panel-heading">
                	<li class="active" >Projeto</li>
                </ol>
				<div class="container">					
                    <a href="{{ route('projeto.create')}}" class="btn btn-primary" ><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Novo</a>    				                                  
                </div>	             
                 <br/>
               	 <div class="table-responsive">
	                 <table class="table .table-condensed table-bordered table-hover ">
	                	<thead>
	                		<th>id</th>
	                		<th>Descricao</th>
	                		<th>Cliente</th>
	                		<th>Gerente</th>
	                		<th>Total Horas</th>
							<th>Editar</th>
	                		<th>Deletar</th>	                		
	                	</thead>
	                	<tbody>
	                	@foreach($Projetos as $Projeto)
	                		<tr>
		                		<td hidden>
		                			{{ $Projeto['id']}}
		                		</td>
								<td>
									{{ $Projeto['descricao']}}
	                			</td>
	                			<td>
	                				{{ $Projeto['cliente_id'] }}
	                			</td>
	                			<td>
	                				{{ $Projeto['totalhr'] }}
	                			</td>
	                			<td>
	                			<a href="{{ route('projeto.edit', $Projeto['id'] ) }}" class="btn btn-info"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
	                			</td>
	                			<td>
	                			<a class="btn btn-danger" href="javascript:confirm('Deseja mesmo deletar este registro?') ? window.location.href='{{ route('projeto.destroy', $Projeto['id'])}}' : false;"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>	                			                		
	                			</td>	                			
	                		</tr>
	                	@endforeach
	                	</tbody>
	                	</table>
	                 </div>
	                    <div align="center">
	                    <?php if(!isset($search)){?>
	                		{!! $Projetos->links() !!}
	                	<?php } ?>
	                	              
	                </div>
               	 
                </div>

            </div>
@endsection