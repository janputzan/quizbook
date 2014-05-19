@extends ('layouts.master')

@section ('content')

	<div class='container-wrapper'>
		<div class='side-menu'>

			@yield('side-menu')

		</div>

		<div class='main-content'>

			@yield('main-content')

		</div>
	</div>

@stop