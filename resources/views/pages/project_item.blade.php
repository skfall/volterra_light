@extends('layouts.default')

@section('content')
	<nav>
		<div class="nav-wrapper container">
			<div class="col s12">
				<a href="{{ RS.'projects/' }}" class="breadcrumb">Projects</a>
				@if($project)
					<a href="javascript:void(0);" class="breadcrumb">{{ $project->name }}</a>
				@endif
			</div>
		</div>
	</nav>
	<div class="container">
		@if($project)
			<h3 class="header">Project item</h3>
			<div class="row">
				<div class="col s12 m12">
					<div class="card z-depth-3 large">
						<div class="card-image">
							<img src="{{ IMG.'office.jpg' }}" class="responsive-img">
							<span class="card-title">{{ $project->name }}</span>
						</div>
						<div class="card-content">
							<p>{{ $project->details }}</p>
						</div>
						<div class="card-action">
							<a href="{{ RS.'projects/' }}">Go back to list</a>
						</div>
					</div>
				</div>
			</div>
		@else
			<p>Empty</p>
		@endif
	</div>
@endsection