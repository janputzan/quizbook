@extends ('layouts.master')

@section ('content')

	<div class="title-wrapper">
		
		<span class="title">
		
			log in <br />

		</span>

		<span class="sub-title">

			please fill out the fields below to log in to quizbook. all fields are required.

		</span>

	</div>
	

	<div class="form-wrapper">

	{{ Form::open( ['route' => 'sessions.store'] ) }}

		<div class="form-field">

			{{ Form::label('username', 'username: ') }}

			{{ Form::input('text', 'username') }}

			{{ $errors->first('username', '<span class=error>:message</span>') }}

		</div>

		<div class="form-field">

			{{ Form::label('password', 'password: ') }}

			{{ Form::input('password', 'password') }}

			{{ $errors->first('password', '<span class=error>:message</span>') }}

		</div>

		<div class="form-field">

			<span class="check-box">

				{{ Form::label('remember', ' ') }}

				{{ Form::input('checkbox', 'remember') }}

			</span>

			<span class="remember-me">

				keep me logged in

			</span>

		</div>

		<div class="form-field">

			<span class="submit-btn">

				{{ Form::submit('log in to quizbook') }}

			</span>

		</div>

	{{ Form::close() }}

		

			

				

		

		

	</div>



@stop