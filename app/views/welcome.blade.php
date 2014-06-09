@extends ('layouts.master')

@section ('content')



	@if (!Auth::check())

		<div class="panel">

			<div class="big-logo">

				<img src="images/logo6_600x222.png" class="bg-logo" />

			</div>

			<div class="social">

			<!-- disable facebook for the server copy -->

				<a class='shareFB' href="social/facebook" ><span>log in with facebook</span></a>

				<!-- ******************* -->

				

			</div>

		</div>
		
	@endif

	<div class="tile-menu">

		<ul class="wrapper">

			<a href="create/title"><li class="box"><img src="../images/create_100.png" class="tile-icons" /><span class="text-content">create</span></li></a>

			<a href="browse"><li class="box"><img src="../images/take_100.png" class="tile-icons" /><span class="text-content">browse</span></li></a>

			<a href="leaderboards"><li class="box"><img src="../images/leaderboards_100.png" class="tile-icons" /><span class="text-content">leaderboards</span></li></a>

			<a href="search"><li class="box"><img src="../images/search_100.png" class="tile-icons" /><span class="text-content">search</span></li></a>

		</ul>

		@if(Auth::check())

		<div class='share-btn'>

			<a class='shareFB' href="/share"><span>share us on facebook</span></a>

		</div>

		@endif

	</div>

	

	

	

@stop