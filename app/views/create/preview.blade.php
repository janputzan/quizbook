@extends ('layouts.create')

@section ('main-content')

	<div class="content-header">

		<span class='title green'>

			Preview

		</span>

		<br />

		<span class='sub-title'>

			this is what your quiz looks like

		</span>

	</div>

	<div class='content'>

		<div>
			{{ Session::get('quiz-title') }}
		</div>

		<div>
			{{ Session::get('category') }}
		</div>

		<div>
			{{ Session::get('question') }}
		</div>

		<div>
			{{ Session::get('tags') }}
		</div>

		
	</div>

@stop