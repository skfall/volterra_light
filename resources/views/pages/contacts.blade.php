@extends('layouts.default')

@section('content')
<div class="contacts_wrapper c_first">
	<div class="container">
		<div class="row">
			<div class="col xl6 l6 m6 s9 push-xl6 push-l6 push-m6 push-s3 right_contacts_part">
				<div class="contacts_header">
					Our contacts
				</div>
				<div class="cont_sep"></div>
				<div class="clear"></div>
				<ul class="constacts_list">
					<li class="address">Ukraine, Kiev <br>Str. Bolshaya Vasilkovskaya, 100 <br>BC Toronto</li>
					<li class="phones">
						<span>+38 / 044 /78...</span>
						<span>+38 / 044 /78...</span>
					</li>
					<li class="email"><a href="#">info@volterra.energy</a></li>
				</ul>
				<div class="clear"></div>
				<div class="contacts_header">
					Write to us
				</div>
				<div class="cont_sep"></div>
				<div class="clear"></div>

				<form action="#" id="contact_form" class="volterra_form" method="POST">
					<input type="hidden" name="action" value="contact_form">
					<div class="input-field col s12">
						<input id="c_name" type="text" name="name">
						<label for="c_name" class="">Your name</label>
					</div>

					<div class="input-field col s12">
						<input id="c_email" type="email" name="email">
						<label for="c_email" class="">Email address</label>
					</div>

					<div class="input-field col s12">
						<input id="c_phone" class="mask" type="text" name="phone">
						<label for="c_phone" class="">Phone number</label>
					</div>

					<div class="input-field col s12">
						<textarea id="c_message" class="materialize-textarea" name="message"></textarea>
          				<label for="c_message">Message</label>
					</div>
					
					<div class="input-field col s12">
						<a href="javascript:void(0);" onclick="network.contactForm();" class="hoverable waves-effect waves-light prog_link valign-wrapper waves-nav">Send</a>
					</div>

					<p class="contact_response tac"></p>
					
				</form>
			</div>
		</div>
	</div>
	<img src="{{IMG.'c_lines.png'}}" alt="Lines" class="contact_lines" />
</div>
<div id="contacts_map"></div>
@endsection