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
					<li class="waves-effect waves-nav"><a href="{{ PAGE == 'home' ? '#about' : RS.LANG.'#about' }}" class="valign-wrapper">{{ $t->find(1)->text }}</a></li>
					<li class="waves-effect waves-nav"><a href="{{ PAGE == 'home' ? '#services' : RS.LANG.'#services' }}" class="valign-wrapper">{{ $t->find(2)->text }}</a></li>
					<li class="waves-effect waves-nav"><a href="{{ PAGE == 'home' ? '#projects' : RS.LANG.'#projects' }}" class="valign-wrapper">{{ $t->find(3)->text }}</a></li>
					@foreach($top_nav as $nav_item)
						@if($nav_item->alias != 'home')
							<?php 
								$path = RS.LANG.$nav_item->alias.'/';
								$active = $nav_item->alias == FA ? 'active' : '';
							?>
							<li class="{{ $active }} waves-effect waves-nav not_anchor"><a href="{{ $path }}" class="valign-wrapper">{{$nav_item->name}}</a></li>
						@endif						
					@endforeach
					<li class="recall_btn not_anchor"><a href="javascript:void(0);" onclick="app.openRecall()" ><img src="{{ IMG.'phone_icon.svg' }}" alt="Recall" class="recall_white"><img src="{{ IMG.'phone_icon2.svg' }}" alt="Recall" class="recall_dark"></a></li>	
					<li class="language_selector">
						<div class="langs_holder">
							<?php 
								$current_language = ucfirst(LANG);
								if(!$current_language) $current_language = ucfirst(DEF_LANG);	
								$current_language = str_replace("/", '', $current_language);
							?>
							<a href="javascript:void(0);" class="active">{{ $current_language }}</a>
							<div class="available_languages">
								@foreach ($languages as $language)
									<?php 
										if($language['title'] == strtolower($current_language)) continue;
									?>
									<a href="javascript:void(0);" class="{{ $active }}" onclick="network.change_lang('{{ $language['link_alias'] }}', '{{ request()->path() }}');" >{{ ucfirst($language['title']) }}</a>
								@endforeach
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>

	<div class="container mobile_header">
		<div class="row">
			<div class="col m6 s6">
				<a href="{{ PAGE == 'home' ? '#start' : RS.LANG }}" class="logo">
					<img src="{{ IMG.'logo_white.svg' }}" alt="Logo" class="responsive-img" />
				</a>
			</div>
			<div class="col m6 s6 tar">
				
			</div>
		</div>
	</div>
</header>

<div class="recall_btn mob_recall_btn"><a href="javascript:void(0);" onclick="app.openRecall()"><img src="{{ IMG.'phone_icon2.svg' }}" alt="Recall" class="recall_dark_mob"></a></div>	
<div class="mob_langs">
	@foreach ($languages as $language)
		<?php 
			$active = "";
			if($language['title'] == strtolower($current_language)) $active = "active"; 
		?>
		<a href="javascript:void(0);" class="{{ $active }}" onclick="network.change_lang('{{ $language['link_alias'] }}', '{{ request()->path() }}');" >{{ ucfirst($language['title']) }}</a>
	@endforeach
</div>
<div class="mob_menu_btn">
	<div id="menu_toogle_btn" onclick="app.open_mobile_nav(this);">
		<span></span>
		<span></span>
		<span></span>
	</div>
</div>

<ul id="slide-out" class="sidenav z-depth-4">
	<li class="first"></li>

	<li class="waves-effect waves-nav"><a href="{{ PAGE == 'home' ? '#about' : RS.LANG.'#about' }}">{{ $t->find(1)->text }}</a></li>
	<li class="waves-effect waves-nav"><a href="{{ PAGE == 'home' ? '#services' : RS.LANG.'#services' }}">{{ $t->find(2)->text }}</a></li>
	<li class="waves-effect waves-nav"><a href="{{ PAGE == 'home' ? '#projects' : RS.LANG.'#projects' }}">{{ $t->find(3)->text }}</a></li>
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
