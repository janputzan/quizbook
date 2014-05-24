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
			{{ Session::get('questions.question') }}
		</div>

		<div>
			{{ Session::get('tags') }}
		</div>

		{{ Form::open( ['route' => 'quizzes.store'] ) }}
<div class="create-btn">

				

				<div class='back-btn'>

					<input type="submit" name="back" value="Back">

				</div>

				<div class="finish-btn">

					

						<input type="submit" name="finish" value="Create Quiz">

					

				</div>

			</div>


{{ Form::close() }}

	</div>

	

@stop