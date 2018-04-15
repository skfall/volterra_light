@extends('layouts.default')

@section('content')
	<div class="project_item_wrapper">
		<div class="project_card">
			<div class="container">
				<div class="row">
					<div class="col xl8 l8 m10 s10 project_description z-depth-1">
						<div class="back_link">
							<a href="{{ RS.'#projects' }}">back to projects list</a>
						</div>
						<div class="project_name">FES Vilshanka</div>
						<div class="proj_sep"></div>
						<div class="clear"></div>
						<div class="sub_title">About project</div>
						<ul class="features">
							<li style="background-image: url('{{ IMG.'loc_ico.png' }}');">Kirovograd region</li>
							<li style="background-image: url('{{ IMG.'area_ico.png' }}');">21 ha</li>
							<li style="background-image: url('{{ IMG.'capacity_ico.png' }}');">12.8 MW</li>
							<li style="background-image: url('{{ IMG.'wind_ico.png' }}');">Wind</li>
						</ul>

						<div class="short_info">
							<p>Vilshanka is located in Kirovograd area on the right bank of the river Sinyuha. The distance to the area’s central city is 125 kilometers. The city was founded in year 1750 with the current population of 4680 residents. The railway station is 18 kilometers away.</p>
						</div>

						<div class="footer_desc">
							<p><span class="author">Author</span> <span class="name">A. Lytvynchuk</span> <span class="date">29 January 2018</span></p>
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
				<h3 style="color: #565656; font-size: 30px;">History</h3>

				<p>In the period from 1754 to 1764, Vilshanka was part of the Novoslobodska Kozak establishment. In years later, the Bulgarian immigrants flooded the settlement. During the war of 1768-1774, Vilshanka was officially protected by the Moldavian troops.  In 19th century, Vilshanka had the status of military village and used to serve the role as one of the control points between Poland and Turkey. </p>

				<img src="{{ IMG.'proj_det_img.jpg' }}" alt="Volterra" style="float: left; width: 50%; height: auto;" />

				<h3 style="color: #565656; font-size: 30px;">FES Vilshanka</h3>
				{{-- <ul style="">
					<li>Throughout the last two decades </li>
					<li>However, ice hockey is played competitively in every continent in the world throughout the last two decades </li>
					<li>However, ice hockey is played competitively </li>
					<li>Throughout the last two decades </li>
					<li>However, ice hockey is played competitively in every continent in the world throughout the last two decades </li>
					<li>However, ice hockey is played competitively </li>
					<li>Throughout the last two decades </li>
					<li>However, ice hockey is played competitively in every continent in the world throughout the last two decades </li>
					<li>However, ice hockey is played competitively </li>
				</ul> --}}

				<p>In the middle of the 19th century, the settlement lost it military status. The civilian population was estimated at 2,543 residents. As no other military intervention affected the lives of people, the population was steadily increasing. The settlement grew in size and infrastructure. </p>

				<p>By 1886, Vilshanka already had a Catholic Church, Jewish Praying House, school, wine warehouse, 8 stores, and regular weekly bazars.  During the Soviet times, in 20th century, Vilshanka has a number of large manufacturing facilities, three libraries, hospital, and other important infrastructure. However, in 1990s, the population dropped by more than 20% due to migration, leaving the extensive infrastructure unattended.</p>

			</div>
		</div>
	</div>

	<div id="project_map"></div>
@endsection