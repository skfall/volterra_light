@extends('layouts.default')

@section("content")

	<div id="fullpage">
		<div class="section fp_sect parent_home_slider_sect" data-anchor="start">
			{{-- <div class="home_slider_sect"></div> --}}
			<img class="home_slider_sect" src="{{ IMG.'slide_holder.png' }}" id="home_slider_wrap_bg" alt="Volterra">
			<div class="home_slider_holder">
				<div class="home_slider owl-carousel anim800 op0">
					@forelse($section_1 as $slide)
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

					<div class="caption animated usn" data-a="fade-in">{!! $section_1[0]->section_caption !!}</div>
					<div class="sub_caption animated usn" data-a="fade-in">{{ $section_1[0]->section_sub_caption }}</div>

					<div class="slider_trigger">
						<ul>
							@forelse($section_1 as $i => $slide)
								<li class="dot usn active" data-slide="{{$i + 1}}" onclick="app.changeHomeSlide(this)">{{$i + 1}}</li>
								@if($i != count($section_1) - 1)
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
					@forelse($section_2 as $slide)
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
					<div class="sub_caption animated usn" data-a="fade-in">{{ $section_2[0]->section_sub_caption }}</div>
					<div class="caption animated usn" data-a="fade-in">{!! $section_2[0]->section_caption !!}</div>

					<a class="next_home_section" href="#services">
						<p class="rotate">услуги компании</p>
					</a>
				</div>

				<div class="container about_inner">
					<div class="row">
						<div class="col xl8 l8 m12 s12 home_sect_2_inner">
							<div class="about_slider_trigger">
								@foreach ($section_2 as  $i => $slide)
									<textarea style="display: none;" id="section_2_slide_{{ $i }}_content">
											{{ $slide->section_content }}
									</textarea>
									<textarea style="display: none;" id="section_2_slide_{{ $i }}_caption">
											{{ $slide->section_caption }}
									</textarea>
									<textarea style="display: none;" id="section_2_slide_{{ $i }}_sub_caption">
											{{ $slide->section_sub_caption }}
									</textarea>
								@endforeach
								<ul>
									@forelse($section_2 as $i => $slide)
									<li class="dot usn active" data-slide="{{$i + 1}}" onclick="app.changeHomeSlide2(this, 'section_2_slide_{{ $i }}_caption', 'section_2_slide_{{ $i }}_sub_caption', 'section_2_slide_{{ $i }}_content')">{{$i + 1}}</li>
										@if($i != count($section_2) - 1)
											<li class="separator usn"></li>
										@endif
									@empty
										<li></li>
									@endforelse
								</ul>
							</div>
							
							<div class="content_target">
								{!! $section_2[0]->section_content !!}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="section fp_sect fp-auto-height" id="home_footer" data-anchor="end">
			@include('elements.footer')
		</div>
	</div>
@endsection()