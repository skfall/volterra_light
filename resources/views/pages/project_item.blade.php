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
						<div class="stage_desc col l9 m8 s12">
							Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repellat nemo mollitia quam perferendis magnam! Voluptatem enim dolorem labore, et eveniet numquam sequi saepe. Laboriosam nemo totam a pariatur exercitationem nesciunt.
						</div>
						<div class="col l3 m4 s12 tar protocol_wrapper">
							<a class="protocol_link" href="javascript:void(0);">Copy of the protocol</a>
						</div>
						
						<div class="clear"></div>
						<div class="inner">
							<ul id="stage_1_inner_tabs" class="tabs">
								<li class="tab col s3">
									<a href="#stage_1_inner_tab_1"><div class="inner_tab_icon photo"></div></a>
								</li>
								<li class="tab col s3">
									<a href="#stage_1_inner_tab_2"><div class="inner_tab_icon map"></div></a>
								</li>
								<li class="tab col s3">
									<a href="#stage_1_inner_tab_3"><div class="inner_tab_icon video"></div></a>
								</li>
								<li class="tab col s3">
									<a href="#stage_1_inner_tab_4"><div class="inner_tab_icon panorama"></div></a>
								</li>
							</ul>
							
							<div id="stage_1_inner_tab_1" class="stage_inner_tab">
								<div class="owl-carousel stage_photos">
									<img src="{{ IMG.'project_card_bg.jpg' }}" alt="Volterra slide" />
									<img src="{{ IMG.'slide4.jpg' }}" alt="Volterra slide" />
								</div>

							</div>
							<div id="stage_1_inner_tab_2" class="stage_inner_tab">
								<div class="project_map"></div>
							</div>
							<div id="stage_1_inner_tab_3" class="stage_inner_tab">
								<iframe src="https://www.youtube.com/embed/qK_NeRZOdq4" frameborder="0" allow="encrypted-media" allowfullscreen></iframe>
							</div>
							<div id="stage_1_inner_tab_4" class="stage_inner_tab">
								<iframe src="https://360player.io/p/BEGuwg/" frameborder="0" allowfullscreen="" data-token="BEGuwg"></iframe>
							</div>
						</div>

						<div class="clear"></div>
						<div class="stage_header">Permit documentation</div>
						<div class="stage_desc col s12">
							Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repellat nemo mollitia quam perferendis magnam! Voluptatem enim dolorem labore, et eveniet numquam sequi saepe. Laboriosam nemo totam a pariatur exercitationem nesciunt.
						</div>

						<div class="clear"></div>
						<div class="owl-carousel stage_docs">
							<a data-fancybox="gallery" href="{{ IMG.'doc_tmp.jpg '}}">
								<div class="hover"></div>
								<img src="{{ IMG.'doc_tmp.jpg '}}">
							</a>
							<a data-fancybox="gallery" href="{{ IMG.'doc_tmp.jpg '}}">
								<div class="hover"></div>
								<img src="{{ IMG.'doc_tmp.jpg '}}">
							</a>
							<a data-fancybox="gallery" href="{{ IMG.'doc_tmp.jpg '}}">
								<div class="hover"></div>
								<img src="{{ IMG.'doc_tmp.jpg '}}">
							</a>
							
						</div>

						<div class="stage_comments">
							<div class="caption">Comments <sup class="comments_count">3</sup></div>
							<a href="javascript:void(0);" class="leave_comment">leave a comment</a>

							<div class="clear"></div>

							{{-- COMMENT --}}
							<div class="card-panel comment_item">
								<div class="row">
									<div class="col l1 m2 s3">
										<img src="{{ IMG.'avatar.png' }}" alt="" class="circle responsive-img">
									</div>
									<div class="col l11 m10 s9">
										<div class="name">Sergey Kaminskiy</div>
										<div class="comment">Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo, architecto laudantium. Reiciendis veritatis, porro consequuntur exercitationem rem, asperiores excepturi reprehenderit tempora, praesentium in sint necessitatibus illum dignissimos labore magni quod?</div>
										<p class="date">29 January 2018</p>
										<div class="border"></div>
									</div>
								</div>
							</div>

							{{-- COMMENT --}}
							<div class="card-panel comment_item">
								<div class="row">
									<div class="col l1 m2 s3">
										<img src="{{ IMG.'avatar.png' }}" alt="" class="circle responsive-img">
									</div>
									<div class="col l11 m10 s9">
										<div class="name">Sergey Kaminskiy</div>
										<div class="comment">Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo, architecto laudantium. Reiciendis veritatis, porro consequuntur exercitationem rem, asperiores excepturi reprehenderit tempora, praesentium in sint necessitatibus illum dignissimos labore magni quod?</div>
										<p class="date">29 January 2018</p>
										<div class="border"></div>
									</div>
								</div>
							</div>


							{{-- COMMENT --}}
							<div class="card-panel comment_item">
								<div class="row">
									<div class="col l1 m2 s3">
										<img src="{{ IMG.'avatar.png' }}" alt="" class="circle responsive-img">
									</div>
									<div class="col l11 m10 s9">
										<div class="name">Sergey Kaminskiy</div>
										<div class="comment">Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo, architecto laudantium. Reiciendis veritatis, porro consequuntur exercitationem rem, asperiores excepturi reprehenderit tempora, praesentium in sint necessitatibus illum dignissimos labore magni quod?</div>
										<p class="date">29 January 2018</p>
										<div class="border"></div>
									</div>
								</div>
							</div>

							

						</div>
						{{-- END --}}
					</div>
					<div id="stage2">
						{{-- START --}}
						<div class="stage_header">Specification</div>
						<div class="stage_desc col l9 m8 s12">
							Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repellat nemo mollitia quam perferendis magnam! Voluptatem enim dolorem labore, et eveniet numquam sequi saepe. Laboriosam nemo totam a pariatur exercitationem nesciunt.
						</div>
						<div class="col l3 m4 s12 tar protocol_wrapper">
							<a class="protocol_link" href="javascript:void(0);">Copy of the protocol</a>
						</div>
						
						<div class="clear"></div>
						<div class="inner">
							<ul id="stage_2_inner_tabs" class="tabs">
								<li class="tab col s3">
									<a href="#stage_2_inner_tab_1"><div class="inner_tab_icon photo"></div></a>
								</li>
								<li class="tab col s3">
									<a href="#stage_2_inner_tab_2"><div class="inner_tab_icon map"></div></a>
								</li>
								<li class="tab col s3">
									<a href="#stage_2_inner_tab_3"><div class="inner_tab_icon video"></div></a>
								</li>
								<li class="tab col s3">
									<a href="#stage_2_inner_tab_4"><div class="inner_tab_icon panorama"></div></a>
								</li>
							</ul>
							
							<div id="stage_2_inner_tab_1" class="stage_inner_tab">
								<div class="owl-carousel stage_photos">
									<img src="{{ IMG.'slide6.jpg' }}" alt="Volterra slide" />
									<img src="{{ IMG.'slide4.jpg' }}" alt="Volterra slide" />
								</div>

							</div>
							<div id="stage_2_inner_tab_2" class="stage_inner_tab">
								<div class="project_map"></div>
							</div>
							<div id="stage_2_inner_tab_3" class="stage_inner_tab">
								<iframe src="https://www.youtube.com/embed/qK_NeRZOdq4" frameborder="0" allow="encrypted-media" allowfullscreen></iframe>
							</div>
							<div id="stage_2_inner_tab_4" class="stage_inner_tab">
								<iframe src="https://360player.io/p/BEGuwg/" frameborder="0" allowfullscreen="" data-token="BEGuwg"></iframe>
							</div>
						</div>

						<div class="clear"></div>
						<div class="stage_header">Permit documentation</div>
						<div class="stage_desc col s12">
							Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repellat nemo mollitia quam perferendis magnam! Voluptatem enim dolorem labore, et eveniet numquam sequi saepe. Laboriosam nemo totam a pariatur exercitationem nesciunt.
						</div>

						<div class="clear"></div>
						<div class="owl-carousel stage_docs">
							<a data-fancybox="gallery" href="{{ IMG.'doc_tmp.jpg '}}">
								<div class="hover"></div>
								<img src="{{ IMG.'doc_tmp.jpg '}}">
							</a>
							<a data-fancybox="gallery" href="{{ IMG.'doc_tmp.jpg '}}">
								<div class="hover"></div>
								<img src="{{ IMG.'doc_tmp.jpg '}}">
							</a>
							<a data-fancybox="gallery" href="{{ IMG.'doc_tmp.jpg '}}">
								<div class="hover"></div>
								<img src="{{ IMG.'doc_tmp.jpg '}}">
							</a>
							
						</div>

						<div class="stage_comments">
							<div class="caption">Comments <sup class="comments_count">3</sup></div>
							<a href="javascript:void(0);" class="leave_comment">leave a comment</a>

							<div class="clear"></div>

							{{-- COMMENT --}}
							<div class="card-panel comment_item">
								<div class="row">
									<div class="col l1 m2 s3">
										<img src="{{ IMG.'avatar.png' }}" alt="" class="circle responsive-img">
									</div>
									<div class="col l11 m10 s9">
										<div class="name">Sergey Kaminskiy</div>
										<div class="comment">Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo, architecto laudantium. Reiciendis veritatis, porro consequuntur exercitationem rem, asperiores excepturi reprehenderit tempora, praesentium in sint necessitatibus illum dignissimos labore magni quod?</div>
										<p class="date">29 January 2018</p>
										<div class="border"></div>
									</div>
								</div>
							</div>

							

						</div>
						{{-- END --}}
					</div>
					<div id="stage3">Stage 3 content/div>
				</div>
			</div>
		</div>

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