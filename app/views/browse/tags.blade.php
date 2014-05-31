@extends ('layouts.browse')

@section ('main-content')

	<div class="content-header ">

		<span class='title red'>

			tags

		</span>

		<br />

		<span class='sub-title'>

			search quizzes by tags

		</span>

	</div>

	<div class='content'>


		<div class="search-form">

				{{ 
				
					Form::open() 

				}}

					<div class="search-users ">


						{{ Form::input('text', 'search') }}

						

					</div>

					

					<div class="form-field">

						<span class="search-btn ">

							{{ Form::submit('search for tags') }}

						</span>

					</div>

				{{ Form::close() }}

			</div>

		<div class='search-results'>

			
		<ul>
			@foreach ($tags as $tag)


				<li >

				{{ link_to("browse/quizzes/tags/$tag->name", $tag->name, array('class'=>'list-item'))  }}

				

				</li>


			@endforeach

		</ul>

		</div>

	</div>




@stop
