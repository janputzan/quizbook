@extends ('layouts.master')

@section ('content')

	<div class="title-wrapper">
		
		<span class="title">
		
			Log In <br />

		</span>

		<span class="sub-title">

			Please fill out the fields below to log in to quizbook. All fields are required.

		</span>

	</div>
	

	<div class="form-wrapper">

	{{ Form::open( ['route' => 'sessions.store'] ) }}

		<div class="form-field">

			{{ Form::label('username', 'Username: ') }}

			{{ Form::input('text', 'username') }}

			{{ $errors->first('username', '<span class=error>:message</span>') }}

		</div>

		<div class="form-field">

			{{ Form::label('password', 'Password: ') }}

			{{ Form::input('password', 'password') }}

			{{ $errors->first('password', '<span class=error>:message</span>') }}

		</div>

		<div class="form-field">

			<span class="check-box">

				{{ Form::label('remember', ' ') }}

				{{ Form::input('checkbox', 'remember') }}

			</span>

			<span class="remember-me">

				Keep me logged in

			</span>

		</div>

		<div class="form-field">

			<span class="submit-btn">

				{{ Form::submit('Log in to quizbook') }}

			</span>

		</div>

	{{ Form::close() }}

	</div>



@stop