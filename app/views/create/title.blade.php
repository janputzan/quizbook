@extends ('layouts.create')

@section ('main-content')

	<div class="content-header">

		<span class='title green'>

			title

		</span>

		<br />

		<span class='sub-title'>

			enter a title for your quiz

		</span>

	</div>

	<div class='content'>

		<div class="create-form">

			{{ Form::open() }}

			<div class="create-field">

				{{ Form::text('quiz-title', Session::get('quiz-title')) }}

				{{ $errors->first('quiz-title', '<div class=error>:message</div>') }}

			</div>

			

				<div class="create-btn">

					{{ Form::submit('next') }}

				</div>

			

			{{ Form::close() }}

		</div>
	</div>



@stop