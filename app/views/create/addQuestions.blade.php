@extends ('layouts.create')

@section ('main-content')

	<div class="content-header ">

		<span class='title green'>

			Add Questions

		</span>

		<br />

		<span class='sub-title'>

			add questions to your quiz

		</span>

	</div>

	<div class='content'>

		<div class="create-form">

			{{ Form::open() }}

			<div class="create-field">

				{{ Form::input('text', 'question') }}

				{{ $errors->first('question', '<div class=error>:message</div>') }}

			</div>

				<div class="create-btn">

					<span class='back-btn'>

						{{ Form::submit('Back') }}

					</span>

					

					<span class="next-btn">

						{{ Form::submit('Next') }}

					</span>

				</div>

			

			{{ Form::close() }}

		</div>
	</div>


@stop