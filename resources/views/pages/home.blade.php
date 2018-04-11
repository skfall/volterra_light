@extends('layouts.default')

@section("content")
	<div id="fullpage">
		<div class="section fp_sect parent_home_slider_sect" data-anchor="start">
			{{-- <div class="home_slider_sect"></div> --}}
			<img class="home_slider_sect" src="{{ IMG.'slide_holder.png' }}" id="home_slider_wrap_bg" alt="Volterra">
			<div class="home_slider_holder">
				<div class="home_slider owl-carousel anim800 op0">
					@forelse($page_content->find(1)->slides as $slide)
						<div class="item">
							<div class="image" style="background-image: url('{{ UPLOAD.'home_slides/'.$slide->filename }}');"></div>
						</div>
					@empty
						<div class="item">
							<div class="image" style="background-image: url('{{ IMG.'slide1.jpg' }}');"></div>
							<img src="" alt="1">
						</div>
					@endforelse
				</div>
			</div>

			<div class="start_lines lines anim3000 fadeIn"></div>

			<div class="container por">
				<div class="section_name">
					<div class="caption animated usn" data-a="fade-in">{!! $page_content->find(1)->section_caption !!}</div>
					<div class="sub_caption animated usn" data-a="fade-in">{{ $page_content->find(1)->section_sub_caption }}</div>

					<div class="slider_trigger">
						<ul>
							@forelse($page_content->find(1)->slides as $i => $slide)
								<li class="dot usn active" data-slide="{{$i + 1}}" onclick="app.changeHomeSlide(this)">{{$i + 1}}</li>
								@if($i != count($page_content->find(1)->slides) - 1)
									<li class="separator usn"></li>
								@endif
							@empty
								<li></li>
							@endforelse
						</ul>
					</div>

					<a class="next_home_section" href="#about">
						<p class="rotate">о компании</p>
					</a>
				</div>

				
			</div>
		</div>
		<div class="section fp_sect home_about" data-anchor="about">

			<img class="home_slider_sect2" src="{{ IMG.'slide_holder2.png' }}" id="home_slider_wrap_bg2" alt="Volterra">
			<div class="home_slider_holder2">
				<div class="home_slider2 owl-carousel anim800 op0">
					@forelse($page_content->find(2)->slides as $slide)
						<div class="item">
							<div class="image" style="background-image: url('{{ UPLOAD.'home_slides/'.$slide->filename }}');"></div>
						</div>
					@empty
						<div class="item">
							<div class="image" style="background-image: url('{{ IMG.'slide1.jpg' }}');"></div>
							<img src="" alt="1">
						</div>
					@endforelse
				</div>
			</div>

			<div class="about_start_lines lines anim3000 fadeIn"></div>
			<div class="about_start_circles lines anim3000 fadeIn"></div>

			<div class="container por">
				<div class="section_name">
					<div class="sub_caption animated usn" data-a="fade-in">{{ $page_content->find(2)->section_sub_caption }}</div>
					<div class="caption animated usn" data-a="fade-in">{!! $page_content->find(2)->section_caption !!}</div>

					<a class="next_home_section" href="#services">
						<p class="rotate">услуги компании</p>
					</a>
				</div>

				<div class="container about_inner">
					<div class="row">
						<div class="col xl8 l8 m12 s12 home_sect_2_inner">
							<div class="about_slider_trigger">
								<ul>
									@forelse($page_content->find(2)->slides as $i => $slide)
										<li class="dot usn active" data-slide="{{$i + 1}}" onclick="app.changeHomeSlide2(this)">{{$i + 1}}</li>
										@if($i != count($page_content->find(1)->slides) - 1)
											<li class="separator usn"></li>
										@endif
									@empty
										<li></li>
									@endforelse
								</ul>
							</div>
							
							<div class="content_target">
								{!! $page_content->find(2)->section_content !!}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="section fp_sect home_services" data-anchor="services">

			<div class="container">
				<div class="section_name">
					<div class="caption animated usn" data-a="fade-in">{!! $page_content->find(3)->section_caption !!}</div>

					<a class="next_home_section" href="#projects">
						<p class="rotate">наши проекты</p>
					</a>
				</div>
			</div>

			<div class="container services_inner">
				<div class="row">
					<div class="col xl10 l10 m12 s12 home_sect_3_inner push-xl2 push-l2">
						
						<?php 
							$paired = count($services) % 2 == 0 ? true : false;
							$cnt = 0;
						?>

						@forelse($services as $key => $service)
							@if($cnt == 0)
								<div class="row service_row">
							@endif
							
							<div class="col xl5 l5 m6 s12">
								<div class="serv_ico" style="background-image: url('{{ $service->icon ? UPLOAD.'services/'.$service->icon : IMG.'demo_ico.png' }}');"></div>
								<div class="services_col_header">{{ $service->name }}</div>
								<div class="service_description">{{ $service->description }}</div>
							</div>

							@if($cnt == 0)
								<div class="col xl1 l1 hide-on-med-and-down"></div>
							@endif

							@if($cnt == 1)
								</div>
							@endif

							@if($cnt == 0 && !$paired && $key == (count($services) -1))
								</div>
							@endif

							<?php 
								$cnt++;
								if ($cnt == 2) $cnt = 0;
							?>
						@empty
						@endforelse
						
					</div>
				</div>
			</div>
		</div>

		<div class="section fp_sect home_projects" data-anchor="projects">
			<div class="container proj_main_container">
				<div class="row projects_title">
					<div class="col xl3 l3 m12 s12">
						<div class="section_name_small">
							<div class="caption animated usn" data-a="fade-in">{!! $page_content->find(4)->section_caption !!}</div>
						</div>
					</div>
					<div class="col xl9 l9 m12 s12">
						<div class="details content_target">
							{!! $page_content->find(4)->section_content !!}
						</div>
					</div>
				</div>

				<div class="row projects_wrapper">
					@forelse($projects as $project)
						<div class="col xl4 l4 m12 s12 project_home_item">
							<div class="card z-depth-2 hoverable">
								<div class="card-image waves-effect">
									@if($project->preview)
										<a href="{{ RS.LANG.'projects/'.$project->id.'/' }}"><img src="{{ UPLOAD.'projects/crop/600x308_'.$project->preview }}" alt="Project"></a>
									@endif
								</div>
								<div class="card-content">
									<div class="project_card_name">{{ $project->name }}</div>
									<div class="project_desc">{{ implode(array_slice(explode('<br>',wordwrap(strip_tags($project->details), 143,'<br>',false)),0,1)) }}{{ mb_strlen($project->details) > 143 ? '...' : "" }}</div>
									<ul>
										<li style="background-image: url('{{ IMG.'loc_ico.png' }}');">{{ $project->location }}</li>
										<li style="background-image: url('{{ IMG.'area_ico.png' }}');">{{ $project->area }}</li>
										<li style="background-image: url('{{ IMG.'capacity_ico.png' }}');">{{ $project->capacity }}</li>
									</ul>
									<a href="{{ RS.LANG.'projects/'.$project->id.'/' }}" class="hoverable waves-effect waves-light prog_link valign-wrapper waves-nav">Подробнее</a>
								</div>
							</div>
						</div>
					@empty
					@endforelse
				</div>
			</div>
		</div>

		<div class="section fp_sect fp-auto-height" id="home_footer" data-anchor="end">
			@include('elements.footer')
		</div>
	</div>
@endsection()