<!doctype html>
<html lang="en">

	{{ HTML::style('css/styles.css'); }}
	{{ HTML::style('css/normalize.css'); }}

	{{ HTML::style('css/green.css'); }}

	{{ HTML::script('js/jquery-1.11.1.min.js'); }}
	{{ HTML::script('js/icheck.js'); }}


	
	

<head>
	<title>quizbook.io</title>



</head>

<body>
	<header>

		@section('header')

			<div class="top-menu">
				
				<div class="menu-block logo">
				
					<a href="/"><img src="/images/logo_mini_100.png" class="logo-png" /></a>
					
				</div>


				<div class="menu-block inline-menu">

					<span class="menu-item"> 

						{{ link_to('create/title', 'create', array('class'=>'link_menu')) }}

					</span>

					<span class="menu-item">

						{{ link_to('browse', 'browse', array('class'=>'link_menu')) }}

					</span>

					<span class="menu-item">

						{{ link_to('leaderboards', 'leaderboards', array('class'=>'link_menu')) }}

					</span>

					@if (($errors->has('notification')))

						<span class="notifications">

							{{ $errors->first('notification', '<span class=notify>:message</span>') }}

						</span>

					@endif

					@if (!Auth::check())

						<span class="signup">

							{{ link_to('register','sign up', array('class'=>'link_menu')) }}

						</span>

					@else

						<span class='user-data'>

							

							<span class="link-username">

								{{ link_to("users/$currentUser->username", "$currentUser->username", array('class'=>'link_menu')) }}

							</span>

							<span class="score">

								{{ Auth::user()->total_score }}

							</span>

						</span>

					@endif


				</div>

				<span class='menu-right'>

				@if (!Auth::check())

					<span class="login">

						{{ link_to('login','log in', array('class'=>'link_menu')) }}

					</span>

				@else

					<span class="login">

						{{ link_to('logout','log out', array('class'=>'link_menu')) }}

					</span>

				@endif

					<span class="search">
				
						<a href="/search"><img src="/images/search_25.png" class="icon" /></a>
					
					</span>

				</span>

			</div>

		@show

	</header>

	<div class="container">

		@yield('content')

	</div>



	<footer>

	</footer>
	
</body>
</html>