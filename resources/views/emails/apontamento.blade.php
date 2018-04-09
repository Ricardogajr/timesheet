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
	                	</thead>
	                	<tbody>
							@foreach($TimeSheets as $TimeSheet)		            		
	                		<tr>
								<td>
	                		        {{ date_format(new DateTime($TimeSheet['data']), 'd/m/Y')  }}
	                			</td>
	                			<td>
	                			{{ $cliente['nome']}}
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
	                		</tr>
							@endforeach
	                	</tbody>
	                	</table>