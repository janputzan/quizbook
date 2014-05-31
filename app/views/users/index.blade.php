@extends ('layouts.browse')

@section ('main-content')

	<div class="content-header ">

		<span class='title red'>

			users

		</span>

		<br />

		<span class='sub-title'>

			browse our users

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

							{{ Form::submit('search for users') }}

						</span>

					</div>

				{{ Form::close() }}

			</div>

		<div class='search-results'>

			
		<ul>
			@foreach ($users as $user)


				<li >

				{{ link_to("users/$user->username", $user->username, array('class'=>'list-item'))  }}

				

				</li>


			@endforeach

		</ul>

		</div>

	</div>




@stop
