@extends('layouts.default')

@section('content')
	<div class="container">
		<h3 class="header">Projects list</h3>

		<div class="row">
			@forelse($projects as $key => $p)
				<div class="col xl3 l4 m6 s12" data-aos="flip-left" data-aos-delay="<?= $key * 100; ?>">
					<div class="card z-depth-2 hoverable">
						<div class="card-image waves-effect waves-block waves-light">
							<img class="activator" src="{{ IMG.'office.jpg' }}">
						</div>
						<div class="card-content">
							<span class="card-title activator grey-text text-darken-4">{{ $p->name }}<i class="material-icons right">more_vert</i></span>
							<p><a href="{{ RS.LANG.'projects/'.$p->id }}">View</a></p>
						</div>
						<div class="card-reveal">
							<span class="card-title grey-text text-darken-4">{{ $p->name }}<i class="material-icons right">close</i></span>
							<blockquote>{{ $p->details }}</blockquote>
						</div>
					</div>
				</div>
			@empty
			    <p>No projects</p>
			@endforelse
		</div>

		<div class="clear row tac">
			<ul class="pagination">
				<?php 
					function paginate($i, $cur_page){
						if($i == $cur_page){
							return "javascript:void(0);";
						}elseif($i == 1){
							return RS."projects/";
						}
						return "?page=$i";
					}
				?>

				@if($num_pages > 1)
					@if($num_pages <= 6)
						@for($i=1; $i < $num_pages+1; $i++)
							<li class="<?= $cur_page == $i ? 'active' : ''; ?> waves-effect"><a href="<?= paginate($i,$cur_page); ?>"><?= $i; ?></a></li>
						@endfor
					@elseif($cur_page <= 3)
						<li class="<?= $cur_page == 1 ? 'active' : ''; ?> waves-effect"><a href="<?= paginate(1,$cur_page); ?>">1</a></li>
						<li class="<?= $cur_page == 2 ? 'active' : ''; ?> waves-effect"><a href="<?= paginate(2,$cur_page); ?>">2</a></li>
						<li class="<?= $cur_page == 3 ? 'active' : ''; ?> waves-effect"><a href="<?= paginate(3,$cur_page); ?>">3</a></li>
						<li class="waves-effect"><a href="<?= paginate(4,$cur_page); ?>">4</a></li>
						<li>...</li>
						<li class="waves-effect"><a href="<?= paginate($num_pages,$cur_page); ?>"><?= $num_pages; ?></a></li>
					@elseif($cur_page <= ($num_pages-3))
						<li class="waves-effect"><a href="<?= paginate(1,$cur_page); ?>">1</a></li>
						<li>...</li>
						<li class="waves-effect"><a href="<?= paginate($cur_page-1,$cur_page); ?>"><?= ($cur_page-1) ?></a></li>
						<li class="active waves-effect"><a href="<?= paginate($cur_page,$cur_page); ?>"><?= $cur_page; ?></a></li>
						<li class="waves-effect"><a href="<?= paginate($cur_page+1,$cur_page); ?>"><?= ($cur_page+1) ?></a></li>
						<li>...</li>
						<li class="waves-effect"><a href="<?= paginate($num_pages,$cur_page); ?>"><?= $num_pages; ?></a></li>
					@else
						<li class="waves-effect"><a href="<?= paginate(1,$cur_page); ?>">1</a></li>
						<li>...</li>
						<li class="waves-effect"><a href="<?= paginate($num_pages-3,$cur_page); ?>"><?= ($num_pages-3) ?></a></li>
						<li class="<?= $cur_page == ($num_pages-2) ? 'active' : ''; ?> waves-effect"><a href="<?= paginate($num_pages-2,$cur_page); ?>"><?= ($num_pages-2) ?></a></li>
						<li class="<?= $cur_page == ($num_pages-1) ? 'active' : ''; ?> waves-effect"><a href="<?= paginate($num_pages-1,$cur_page); ?>"><?= ($num_pages-1) ?></a></li>
						<li class="<?= $cur_page == $num_pages ? 'active' : ''; ?> waves-effect"><a href="<?= paginate($num_pages,$cur_page); ?>"><?= $num_pages; ?></a></li>
					@endif
				@endif
			</ul>
		</div>
	</div>
@endsection
