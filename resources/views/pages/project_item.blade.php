@extends('layouts.default')

@section('content')
	<div class="project_item_wrapper">
		<?php 
			$card_bg = $project->card_image;	
		?>
		<div class="project_card" style="background-image: url('<?= ($card_bg ? UPLOAD.'projects/'.$card_bg : ''); ?>');">
			<div class="container">
				<div class="row">
					<div class="col xl8 l8 m10 s10 project_description z-depth-1">
						<div class="back_link">
							<a href="{{ RS.'#projects' }}">back to projects list</a>
						</div>
					<div class="project_name">{{ $project->name }}</div>
						<div class="proj_sep"></div>
						<div class="clear"></div>
						<div class="sub_title">About project</div>
						<ul class="features">
							<li style="background-image: url('{{ IMG.'loc_ico.png' }}');">{{ $project->location }}</li>
							<li style="background-image: url('{{ IMG.'area_ico.png' }}');">{{ $project->area }}</li>
							<li style="background-image: url('{{ IMG.'capacity_ico.png' }}');">{{ $project->capacity }}</li>
							@if ($project->type()->first() && $project->type()->first()->icon && $project->type()->first()->name)
								<li style="background-image: url('{{ IMG.$project->type()->first()->icon }}');">{{ $project->type()->first()->name }}</li>
							@endif
						</ul>

						<div class="short_info">
						<p>{{ $project->details }}</p>
						</div>

						<div class="footer_desc">
							{{-- <p><span class="author">Author</span> <span class="name">A. Lytvynchuk</span> <span class="date">29 January 2018</span></p> --}}
							<div class="clear"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="clear"></div>
		</div>

		<div class="container details">
			{{-- <div class="detaild_caption">Detailed information</div> --}}
			<div class="content_target">
				{!! $project->content !!}
			</div>
		</div>
	</div>

	<div id="project_map"></div>
@endsection