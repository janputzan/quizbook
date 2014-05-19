@extends ('layouts.master')

@section ('content')



	@if (!Auth::check())

		<div class="panel">

			<div class="big-logo">

				<img src="images/logo6_600x222.png" class="bg-logo" />

			</div>

			<div class="social">

				<a id="myLink" title="Click to log in to fb" href="#" onclick="checkLoginState();return false;"><img src="images/facebook_458x85.png" class="social-img" /></a>

				<img src="images/google_458x85.png" class="social-img" />

			</div>

		</div>
		
	@endif

	<div class="tile-menu">

		<ul class="wrapper">

			<a href="create/title"><li class="box"><img src="../images/create_100.png" class="tile-icons" /><span class="text-content">Create</span></li></a>

			<a href="browse"><li class="box"><img src="../images/take_100.png" class="tile-icons" /><span class="text-content">Browse</span></li></a>

			<a href="leaderboards"><li class="box"><img src="../images/leaderboards_100.png" class="tile-icons" /><span class="text-content">Leaderboards</span></li></a>

			<a href="search"><li class="box"><img src="../images/search_100.png" class="tile-icons" /><span class="text-content">Search</span></li></a>

		</ul>

	</div>

	<div id="status">

	</div>

	{{ HTML::script('js/facebook-login.js'); }}

@stop