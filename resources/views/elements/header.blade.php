<header class="animated">
	<div class="container desktop_header">
		<div class="row">
			<div class="col xl4 l4 m3 s3">
				<a href="{{ PAGE == 'home' ? '#start' : RS.LANG }}" class="logo">
					<img src="{{ IMG.'logo_white.svg' }}" alt="Logo" class="responsive-img" />
				</a>
			</div>

			<div class="col xl8 l8 m9 s9 tar">
				<ul class="top_nav">
					<li class="waves-effect waves-nav"><a href="{{ PAGE == 'home' ? '#about' : RS.LANG.'#about' }}" class="valign-wrapper">О компании</a></li>
					<li class="waves-effect waves-nav"><a href="{{ PAGE == 'home' ? '#services' : RS.LANG.'#services' }}" class="valign-wrapper">Услуги</a></li>
					<li class="waves-effect waves-nav"><a href="{{ PAGE == 'home' ? '#projects' : RS.LANG.'#projects' }}" class="valign-wrapper">Проекты</a></li>
					@foreach($top_nav as $nav_item)
						@if($nav_item->alias != 'home')
							<?php 
								$path = RS.LANG.$nav_item->alias.'/';
								$active = $nav_item->alias == FA ? 'active' : '';
							?>
							<li class="{{ $active }} waves-effect waves-nav not_anchor"><a href="{{ $path }}" class="valign-wrapper">{{$nav_item->name}}</a></li>
						@endif						
					@endforeach
					<li class="recall_btn not_anchor"><a href="javascript:void(0);"><img src="{{ IMG.'phone_icon.svg' }}" alt="Recall"></a></li>	
				</ul>
			</div>
		</div>
	</div>

	<div class="container mobile_header">
		<div class="row">
			<div class="col m6 s6">
				<a href="{{ PAGE == 'home' ? '#start' : RS.LANG }}" class="logo">
					<img src="{{ IMG.'logo.svg' }}" alt="Logo" class="responsive-img" />
				</a>
			</div>
			<div class="col m6 s6 tar">
				
			</div>
		</div>
	</div>
</header>

<div class="recall_btn mob_recall_btn"><a href="javascript:void(0);"><img src="{{ IMG.'phone_icon.svg' }}" alt="Recall"></a></div>	
<div class="mob_menu_btn">
	<div id="menu_toogle_btn" onclick="app.open_mobile_nav(this);">
		<span></span>
		<span></span>
		<span></span>
	</div>
</div>

<ul id="slide-out" class="sidenav z-depth-4">
	<li class="first"></li>

	<li class="waves-effect waves-nav"><a href="{{ PAGE == 'home' ? '#about' : RS.LANG.'#about' }}">О компании</a></li>
	<li class="waves-effect waves-nav"><a href="{{ PAGE == 'home' ? '#services' : RS.LANG.'#services' }}">Услуги</a></li>
	<li class="waves-effect waves-nav"><a href="{{ PAGE == 'home' ? '#projects' : RS.LANG.'#projects' }}">Проекты</a></li>
	@foreach($top_nav as $nav_item)
		@if($nav_item->alias != 'home')
			<?php 
				$path = RS.LANG.$nav_item->alias.'/';
				$active = $nav_item->alias == FA ? 'active' : '';
			?>
			<li class="{{ $active }} waves-effect waves-nav not_anchor"><a href="{{ $path }}">{{$nav_item->name}}</a></li>
		@endif						
	@endforeach
</ul>
