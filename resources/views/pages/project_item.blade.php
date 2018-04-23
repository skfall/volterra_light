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
		<div class="clear"></div>
		<div class="project_stages_head">
			<div class="container">
				<div class="row stages_tabs_head_row">
					<ul class="tabs">
						<li class="tab col s4"><a href="#stage1" class="active">Stage 1</a></li>
						<li class="tab col s4"><a href="#stage2">Stage 2</a></li>
						<li class="tab col s4"><a href="#stage3">Stage 3</a></li>
					</ul>
				</div>
			</div>
		</div>

		<div class="project_stages_body">
			<div class="container">
				<div class="row">
					<div id="stage1">
						{{-- START --}}

						<div class="stage_header">Specification</div>
						<div class="stage_desc col s9">
							Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repellat nemo mollitia quam perferendis magnam! Voluptatem enim dolorem labore, et eveniet numquam sequi saepe. Laboriosam nemo totam a pariatur exercitationem nesciunt.
						</div>
						<div class="col s3 tar">
							<a class="protocol_link" href="javascript:void(0);">Copy of the protocol</a>
						</div>
						
						<div class="clear"></div>
						<div class="inner">
							<ul id="tabs-swipe-demo" class="tabs">
								<li class="tab col s3">
									<a href="#test-swipe-1"><div class="inner_tab_icon photo" style="background-image: url(' {{ IMG.'card-foto_icon.svg' }}');"></div></a>
								</li>
								<li class="tab col s3">
									<a href="#test-swipe-2"><div class="inner_tab_icon map" style="background-image: url(' {{ IMG.'card-map_icon.svg' }}');"></div></a>
								</li>
								<li class="tab col s3">
									<a href="#test-swipe-3"><div class="inner_tab_icon video" style="background-image: url(' {{ IMG.'card-video_icon.svg' }}');"></div></a>
								</li>
								<li class="tab col s3">
									<a href="#test-swipe-4"><div class="inner_tab_icon panorama" style="background-image: url(' {{ IMG.'card-360_icon.svg' }}');"></div></a>
								</li>
							</ul>

							<div id="test-swipe-1" class="col s12 blue">Test 1</div>
							<div id="test-swipe-2" class="col s12 red">Test 2</div>
							<div id="test-swipe-3" class="col s12 green">Test 3</div>
							<div id="test-swipe-4" class="col s12 yellow">Test 4</div>
						</div>

						{{-- END --}}
					</div>
					<div id="stage2">Test 2</div>
					<div id="stage3">Test 3</div>
				</div>
			</div>
		</div>
	</div>

	<div id="project_map"></div>
@endsection