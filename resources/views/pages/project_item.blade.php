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



		{{-- IF STAGES --}}
		@if(isset($stages) && $stages)
			<div class="project_stages_head">
				<div class="container">
					<div class="row stages_tabs_head_row">
						<ul class="tabs">
							@foreach($stages as $key => $stage)
								<li class="tab col s4"><a href="#stage_{{ $key }}" class="active">Stage {{ $key + 1 }}</a></li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>

			<div class="project_stages_body">
				<div class="container">
					<div class="row">
						@foreach($stages as $key => $stage)
							<div id="stage_{{ $key }}" class="stage_tab">
								{{-- START --}}
								<div class="stage_header">{{ $stage->caption }}</div>
								<div class="stage_desc col l9 m8 s12">
									<div class="content-target">{!! $stage->details !!}</div>
								</div>
								<div class="col l3 m4 s12 tar protocol_wrapper">
									@if($stage->protocol_link)
										<a class="protocol_link" target="_blank" href="{{ UPLOAD.'projects/'.$stage->protocol_link }}">Copy of the protocol</a>
									@endif
								</div>
								
								<div class="clear"></div>

								<?php
									$stage_tabs = [
										'photos' => $stage->photos()->get() ?: [],
										'map' => [
											'lat' => $stage->lat ?: 0,
											'lng' => $stage->lng ?: 0,
										],
										'video' => $stage->video ?: false,
										'panorama' => $stage->panorama ?: false,										
									];

								?>
								<div class="inner">
									<?php
										$inner_tabs = "";
										if($stage_tabs['photos']->toArray() || $stage_tabs['video'] || $stage_tabs['panorama'] || ($stage_tabs['map'] && $stage_tabs['map']['lat'] && $stage_tabs['map']['lng'])){
											$inner_tabs = "tabs";
										}
									?>
									<ul id="stage_1_inner_tabs" class="{{$inner_tabs}}">
										@if($stage_tabs['photos']->toArray())
											<li class="tab col s3">
												<a href="#stage_{{ $key }}_inner_tab_1"><div class="inner_tab_icon photo"></div></a>
											</li>
										@endif
										@if($stage_tabs['map'] && $stage_tabs['map']['lat'] && $stage_tabs['map']['lng'])
											<li class="tab col s3">
												<a href="#stage_{{ $key }}_inner_tab_2"><div class="inner_tab_icon map"></div></a>
											</li>
										@endif
										@if($stage_tabs['video'])
											<li class="tab col s3">
												<a href="#stage_{{ $key }}_inner_tab_3"><div class="inner_tab_icon video"></div></a>
											</li>
										@endif
										@if($stage_tabs['panorama'])
											<li class="tab col s3">
												<a href="#stage_{{ $key }}_inner_tab_4"><div class="inner_tab_icon panorama"></div></a>
											</li>
										@endif
									</ul>
									
									@if($stage_tabs['photos']->toArray())
										<div id="stage_{{ $key }}_inner_tab_1" class="stage_inner_tab">
											<div class="owl-carousel stage_photos">
												<?php
													$photos = $stage_tabs['photos'];	
												?>
												@foreach($photos as $pkey => $photo)
													<img src="{{ UPLOAD.'projects/'.$photo->filename }}" alt="Volterra slide" />
												@endforeach
											</div>
										</div>
									@endif

									@if ($stage_tabs['map'] && $stage_tabs['map']['lat'] && $stage_tabs['map']['lng'])
										<?php 
											$curr_lat = $stage_tabs['map']['lat']; 
											$curr_lng = $stage_tabs['map']['lng'];
										?>

										<div id="stage_{{ $key }}_inner_tab_2" class="stage_inner_tab">
											<div class="project_map" data-lat="{{ $curr_lat }}" data-lng="{{ $curr_lng }}"></div>
										</div>
									@endif
									
									@if($stage_tabs['video'])
										<div id="stage_{{ $key }}_inner_tab_3" class="stage_inner_tab">
											{!! $stage->video !!}
										</div>
									@endif

									@if($stage_tabs['panorama'])
										<div id="stage_{{ $key }}_inner_tab_4" class="stage_inner_tab">
												{!! $stage->panorama !!}
										</div>
									@endif
									
									
								</div>

								<div class="clear"></div>
								<div class="stage_header">{{ $stage->docs_caption }}</div>
								<div class="stage_desc col s12">
										{!! $stage->docs_details !!}
								</div>

								<div class="clear"></div>
								<?php
									$stage_docs = $stage->docs()->get() ?: [];
								?>
								@if ($stage_docs)
									<div class="owl-carousel stage_docs">
										@foreach ($stage_docs as $doc)	
											<a data-fancybox="gallery" href="{{ UPLOAD.'projects/'.$doc->filename }}">
												<div class="hover"></div>
												<img src="{{ UPLOAD.'projects/crop/170x240_'.$doc->filename }}">
											</a>
										@endforeach
									</div>
								@endif
								
								<?php
									$comments = $stage->comments()->get() ?: [];
									$comments_count_show = count($comments) <= 0 ? "dn" : "";
								?>
								
								<div class="stage_comments">
									<div class="caption">Comments <sup class="comments_count {{ $comments_count_show }}">{{ count($comments) }}</sup></div>
									<a href="javascript:void(0);" class="leave_comment">leave a comment</a>

									<div class="clear"></div>

									@forelse ($comments as $comment)
										<?php
											$fake_comment = $comment->is_fake == 1 ? true : false;
											
											$avatar = "";
											if($fake_comment){
												$avatar = $comment->author_avatar;
												$name = $comment->author_name;
											}else {
												if($comment->user()->first() && $comment->user()->first()->avatar){
													$avatar = $comment->user()->first()->avatar;
												}
												if($comment->user()->first() && ($comment->user()->first()->first_name || $comment->user()->first()->last_name)){
													$name = $comment->user()->first()->first_name.' '.$comment->user()->first()->last_name;
												}
											}
											$avatar_path = $fake_comment ? UPLOAD.'projects/' : UPLOAD."users/";
											if($avatar == "") {
												$avatar = IMG.'avatar.png';
												$avatar_path = "";
											}
											if($name == "") $name = "Anonymous";

										?>
										{{-- COMMENT --}}
										<div class="card-panel comment_item">
											<div class="row">
												<div class="col l1 m2 s3">
													<img src="{{ $avatar_path.$avatar }}" alt="" class="circle responsive-img">
												</div>
												<div class="col l11 m10 s9">
													<div class="name">{{ $name }}</div>
													<div class="comment">{{ $comment->content }}</div>
													<p class="date">{{ date('d F Y', strtotime($comment->created)) }}</p>
													<div class="border"></div>
												</div>
											</div>
										</div>
									@empty
										<div class="card-panel comment_item">
											<div class="row">
												<div class="col 12">
													<div class="name">No comments yet</div>
													<div class="border"></div>
												</div>
											</div>
										</div>
									@endforelse
								</div>
								{{-- END --}}
							</div>
						@endforeach
					</div>
				</div>
			</div>
		@endif
		
		<div class="same_projects_wrapper container">
			<div class="row">
				<div class="caption">Other projects</div>
				<div class="owl-carousel same_projects">
					<div class="project_item">
						<div class="card z-depth-2 hoverable">
							<div class="card-image waves-effect">
								<a href="#"><img src="{{ IMG.'project3.jpg' }}" alt="Project"></a>
							</div>
							<div class="card-content">
								<div class="project_card_name">FES Vilshanka</div>
								<div class="project_desc">{{ implode(array_slice(explode('<br>',wordwrap(strip_tags("Vilshanka is located in Kirovograd area on the right bank of the river Sinyuha. The distance to the area’s central city is 125 kilometers. The city was founded in year 1750 with the current population of 4680 residents. The railway station is 18 kilometers away."), 143,'<br>',false)),0,1)) }}{{ mb_strlen("Vilshanka is located in Kirovograd area on the right bank of the river Sinyuha. The distance to the area’s central city is 125 kilometers. The city was founded in year 1750 with the current population of 4680 residents. The railway station is 18 kilometers away.") > 143 ? '...' : "" }}</div>
								<ul>
									<li style="background-image: url('{{ IMG.'loc_ico.png' }}');">Kirovohrad reg.</li>
									<li style="background-image: url('{{ IMG.'area_ico.png' }}');">21 Ha</li>
									<li style="background-image: url('{{ IMG.'capacity_ico.png' }}');">12.8 MW</li>
									<li style="background-image: url('{{ IMG."solar_ico.png" }}');">Solar</li>
								</ul>
								<a href="#" class="waves-effect waves-light prog_link valign-wrapper waves-nav">Details</a>
							</div>
						</div>
					</div>
					<div class="project_item">
							<div class="card z-depth-2 hoverable">
								<div class="card-image waves-effect">
									<a href="#"><img src="{{ IMG.'project3.jpg' }}" alt="Project"></a>
								</div>
								<div class="card-content">
									<div class="project_card_name">FES Vilshanka</div>
									<div class="project_desc">{{ implode(array_slice(explode('<br>',wordwrap(strip_tags("Vilshanka is located in Kirovograd area on the right bank of the river Sinyuha. The distance to the area’s central city is 125 kilometers. The city was founded in year 1750 with the current population of 4680 residents. The railway station is 18 kilometers away."), 143,'<br>',false)),0,1)) }}{{ mb_strlen("Vilshanka is located in Kirovograd area on the right bank of the river Sinyuha. The distance to the area’s central city is 125 kilometers. The city was founded in year 1750 with the current population of 4680 residents. The railway station is 18 kilometers away.") > 143 ? '...' : "" }}</div>
									<ul>
										<li style="background-image: url('{{ IMG.'loc_ico.png' }}');">Kirovohrad reg.</li>
										<li style="background-image: url('{{ IMG.'area_ico.png' }}');">21 Ha</li>
										<li style="background-image: url('{{ IMG.'capacity_ico.png' }}');">12.8 MW</li>
										<li style="background-image: url('{{ IMG."solar_ico.png" }}');">Solar</li>
									</ul>
									<a href="#" class="waves-effect waves-light prog_link valign-wrapper waves-nav">Details</a>
								</div>
							</div>
						</div>
						<div class="project_item">
								<div class="card z-depth-2 hoverable">
									<div class="card-image waves-effect">
										<a href="#"><img src="{{ IMG.'project3.jpg' }}" alt="Project"></a>
									</div>
									<div class="card-content">
										<div class="project_card_name">FES Vilshanka</div>
										<div class="project_desc">{{ implode(array_slice(explode('<br>',wordwrap(strip_tags("Vilshanka is located in Kirovograd area on the right bank of the river Sinyuha. The distance to the area’s central city is 125 kilometers. The city was founded in year 1750 with the current population of 4680 residents. The railway station is 18 kilometers away."), 143,'<br>',false)),0,1)) }}{{ mb_strlen("Vilshanka is located in Kirovograd area on the right bank of the river Sinyuha. The distance to the area’s central city is 125 kilometers. The city was founded in year 1750 with the current population of 4680 residents. The railway station is 18 kilometers away.") > 143 ? '...' : "" }}</div>
										<ul>
											<li style="background-image: url('{{ IMG.'loc_ico.png' }}');">Kirovohrad reg.</li>
											<li style="background-image: url('{{ IMG.'area_ico.png' }}');">21 Ha</li>
											<li style="background-image: url('{{ IMG.'capacity_ico.png' }}');">12.8 MW</li>
											<li style="background-image: url('{{ IMG."solar_ico.png" }}');">Solar</li>
										</ul>
										<a href="#" class="waves-effect waves-light prog_link valign-wrapper waves-nav">Details</a>
									</div>
								</div>
							</div>
							<div class="project_item">
									<div class="card z-depth-2 hoverable">
										<div class="card-image waves-effect">
											<a href="#"><img src="{{ IMG.'project3.jpg' }}" alt="Project"></a>
										</div>
										<div class="card-content">
											<div class="project_card_name">FES Vilshanka</div>
											<div class="project_desc">{{ implode(array_slice(explode('<br>',wordwrap(strip_tags("Vilshanka is located in Kirovograd area on the right bank of the river Sinyuha. The distance to the area’s central city is 125 kilometers. The city was founded in year 1750 with the current population of 4680 residents. The railway station is 18 kilometers away."), 143,'<br>',false)),0,1)) }}{{ mb_strlen("Vilshanka is located in Kirovograd area on the right bank of the river Sinyuha. The distance to the area’s central city is 125 kilometers. The city was founded in year 1750 with the current population of 4680 residents. The railway station is 18 kilometers away.") > 143 ? '...' : "" }}</div>
											<ul>
												<li style="background-image: url('{{ IMG.'loc_ico.png' }}');">Kirovohrad reg.</li>
												<li style="background-image: url('{{ IMG.'area_ico.png' }}');">21 Ha</li>
												<li style="background-image: url('{{ IMG.'capacity_ico.png' }}');">12.8 MW</li>
												<li style="background-image: url('{{ IMG."solar_ico.png" }}');">Solar</li>
											</ul>
											<a href="#" class="waves-effect waves-light prog_link valign-wrapper waves-nav">Details</a>
										</div>
									</div>
								</div>
				</div>
			</div>
		</div>
	</div>

@endsection