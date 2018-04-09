    <div class="row profile">
			<input type='text' value="{{ $cPerfUsu = Auth::user()->administrator }}" hidden/>
			<div class="profile-sidebar">
				<!-- SIDEBAR USERPIC -->
				<div class="profile-userpic">
					<img src="\img\logo.png" class="img-responsive" alt="">
				</div>
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">	
						Bem vindo, {{ Auth::user()->name }}.
					</div>
							
				</div>										
				<!-- END SIDEBAR USER TITLE -->
				<!-- SIDEBAR BUTTONS -->
				<div class="profile-userbuttons">
				   <p class="text-primary"> Hoje é dia: <?php echo date("d/m/Y") ?>     </p>
				</div>
				<!-- END SIDEBAR BUTTONS -->
				<!-- SIDEBAR MENU -->
				<div class="profile-usermenu">
					<ul class="nav">
						<li class="">
							<a href="{{ route('timesheet.index')}}">
							<i class="glyphicon glyphicon-menu-right"></i>
							Ordem de Serviço </a>
						</li>
						@if( $cPerfUsu == 1)
						<li class="">
							<a href="{{ route('auth.index') }}">
							<i class="glyphicon glyphicon-menu-right"></i>
							Novo Usuário</a>
						</li>
						@endif
						<li class="">
							<a href="#">
							<i class="glyphicon glyphicon-menu-right"></i>
							Relatório </a>
						</li>
						<li class="">
							<a href="{{ route('cliente.index')}}">
							<i class="glyphicon glyphicon-menu-right"></i>
							Cliente </a>
						</li>
						<li class="">
							<a href="{{ route('projeto.index') }}">
							<i class="glyphicon glyphicon-menu-right"></i>
							Projetos </a>
						</li>						
            <li class="">
              <a href="{{ route('auth.reset.index') }}">
              <i class="glyphicon glyphicon-menu-right"></i>
              Resetar Senha </a>
            </li>
            <li>
                <a href="{{ url('/logout') }}" 
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="glyphicon glyphicon-menu-right"></i>
                                                     <b>Deslogar</b>
                                                     </a>
          <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
             {{ csrf_field() }}
          </form>
            </li>
					</ul>
				</div>
			</div>
		</div>
<br/>		