@extends ('layouts.sideMenu')

@section ('main-content')

	

		<div class="content-header">

		<span class='title'>

					search

				</span>

				<br />

				<span class='sub-title'>

					please enter a search query below

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

							{{ Form::label('users', 'users') }}

							{{ Form::checkbox('users', 'yes') }}

						</span>

						<span class="check-box">

							{{ Form::label('quizzes', 'quizzes') }}

							{{ Form::checkbox('quizzes', 'yes') }}

						</span>

						<span class="check-box">

							{{ Form::label('tags', 'tags') }}

							{{ Form::checkbox('tags', 'yes') }}

						</span>

					</div>

					<div class="form-field">

						<span class="search-btn">

							{{ Form::submit('search quizbook') }}

						</span>

					</div>

				{{ Form::close() }}

			</div>

			<div class="search-results-main">

				<table>
					
					

					<tr>

							@if(!empty($users))

								<td>

									<span>users</span> <br />

									@foreach($users as $user)

									{{ link_to("users/$user->username", $user->username, array('class'=>'list-item'))  }}<br />

									@endforeach


								</td>

							@endif

							@if(!empty($quizzes))

						<td>
						
							<span>quizzes</span> <br />

							@foreach($quizzes as $quiz)

							{{ link_to("browse/quizzes/$quiz->id", $quiz->title, array('class'=>'list-item')) }}<br />

							@endforeach

						</td>

							@endif

							@if(!empty($tags))

						<td>
						
							<span>tags</span> <br />

							@foreach($tags as $tag)

							{{ link_to("browse/quizzes/tags/$tag->name", $tag->name, array('class'=>'list-item')) }}<br />

							@endforeach

						</td>

							@endif

					</tr>

				</table>

			
			</div>

		</div>
	

@stop