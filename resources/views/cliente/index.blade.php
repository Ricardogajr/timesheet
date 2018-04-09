@extends('layouts.app')

@section('content')
            <div class="panel panel-default">
            	<ol class="breadcrumb panel-heading">
                	<li class="active" >Clientes</li>
                </ol>
                 <div class="container">
                  <a href="{{ route('cliente.create')}}" class="btn btn-primary" ><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Novo</a>
                </div>
                  <div align="center">
                    {!! $clientes->links() !!}
                  </div>

               	 <div class="panel-body">
               	 <div class="table-responsive">
	                 <table class="table table-bordered table-hover ">
	                	<thead>
	                		<th>#</th>	
	                		<th>Nome</th>
	                		<th>Email</th>
	                		<th>Telefone</th>
	                		<th>Editar</th>
	                		<th>Deletar</th>
	                	</thead>
	                	<tbody>
	                	@foreach($clientes as $cliente)
	                		<tr id="cliente_id">
	                			<td>
	                			{{ $cliente['id'] }}
	                			</td>
	                			<td>
                        <!-- href="{{ route('cliente.show', $cliente['id'] )}}-->
	                			<a id="cliente">{{ $cliente['nome'] }}</a>
	                			</td>
	                			<td>
	                			{{ $cliente['email'] }}
	                			</td>
	                			<td>
	                			{{ $cliente['telefone'] }}
	                			</td>
	                			<td>
	                				<a class="btn btn-info" href="{{ route('cliente.edit', $cliente->id) }}" ><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button>
	                			</td>
	                			<td>
	                			<a class="btn btn-danger" href="javascript:confirm('Deseja mesmo deletar este registro?') ? window.location.href='{{ route('cliente.destroy', $cliente->id)}}' : false;"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>                			
	                			</td>
	                		</tr>
	                	@endforeach
	                	</tbody>
	                	</table>
	                 </div>
                </div>
            </div>

            <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="gridSystemModalLabel">Título do modal</h4>
                </div>
                <div class="modal-body">
                  <div class="row">
                     <form>
                      <div class="form-group">
                        <label for="recipient-name" class="control-label">Recipient:</label>
                        <input type="text" class="form-control" id="cli_name">
                      </div>
                      </form>
                    </div>
                  </div>
                </div>
                </div>
              </div>
            </div>
@endsection

@section('javascript')
  <script type="text/javascript">
    $('#cliente').on('click', function(){
      row = $(this).parents('tr');
      value = row.data('cliente_id');
      $.get('/cliente/visualizar/' + value, function(e){
        
      })
    });
  </script>
@endsection