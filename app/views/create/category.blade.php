@extends ('layouts.create')

@section ('main-content')

	<div class="content-header">

		<span class='title green'>

			Category

		</span>

		<br />

		<span class='sub-title'>

			choose a category for your quiz

		</span>

	</div>

	<div class='content'>

		<div class="create-form">

			{{ Form::open() }}

			<div class="create-field">

				{{ Form::input('text', 'category') }}

				{{ $errors->first('category', '<div class=error>:message</div>') }}

			</div>

				<div class="create-btn">

					<span class='back-btn'>

						<input type="submit" name="back" value="Back">

					</span>

					

					<span class="next-btn">

						{{ Form::submit('Next') }}

					</span>

				</div>

			

			{{ Form::close() }}

		</div>
	</div>

@stop