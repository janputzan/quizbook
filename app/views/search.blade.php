@extends ('layouts.sideMenu')

@section ('main-content')

	

		<div class="content-header">

		<span class='title'>

					Search

				</span>

				<br />

				<span class='sub-title'>

					Please enter a search query below

				</span>

			
		</div>

		<div class='content'>
		
			<div class="search-form">

				{{ 
				
					Form::open() 

				}}

					<div class="search-field">


						{{ Form::input('text', 'search') }}

						

					</div>

					<div class='check-boxes'>

						<span class="check-box">

							{{ Form::label('users', 'Users') }}

							{{ Form::input('checkbox', 'users') }}

						</span>

						<span class="check-box">

							{{ Form::label('quizzes', 'Quizzes') }}

							{{ Form::input('checkbox', 'quizzes') }}

						</span>

						<span class="check-box">

							{{ Form::label('tags', 'Tags') }}

							{{ Form::input('checkbox', 'tags') }}

						</span>

					</div>

					<div class="form-field">

						<span class="search-btn">

							{{ Form::submit('Search quizbook') }}

						</span>

					</div>

				{{ Form::close() }}

			</div>

			<div class="search-results">


				




			
			</div>

		</div>
	

@stop