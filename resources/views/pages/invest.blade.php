@extends('layouts.default')

@section('content')
<div class="invest_relations i_first">
	<div class="container">
		<div class="row">
			<div class="col s12">
				<div class="col xl6 l8 m12 s12 push-xl3 push-l2">
					<div class="invest_header">
						{{ $t->find(7)->text }}
					</div>
					<div class="cont_sep"></div>
					<div class="clear space15"></div>

					<form action="#" id="ir_log_form" class="volterra_form" method="POST">

						<p class="ir_desc">{{ $t->find(8)->text }}</p>

						<div class="input-field col s12">
							<input id="ir_login" type="text">
							<label for="ir_login" class="">Login</label>
						</div>

						<div class="input-field col s12">
							<input id="ir_pass" type="password">
							<label for="ir_pass" class="">Password</label>
						</div>

					
						<div class="input-field col s12">
							<a href="javascript:void(0);" class="hoverable waves-effect waves-light prog_link valign-wrapper waves-nav" onclick="app.fake_login('{{ $t->find(28)->text }}');">{{ $t->find(9)->text }}</a>
						</div>

						<p class="ir_response"></p>
						
					</form>
				</div>
			</div>
		</div>
	</div>

	<img src="{{IMG.'c_lines.png'}}" alt="Lines" class="ir_lines" />
</div>
@endsection