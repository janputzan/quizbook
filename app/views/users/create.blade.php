@extends ('layouts.master')

@section ('content')

	<div class="title-wrapper">
		
		<span class="title">
		
			register <br />

		</span>

		<span class="sub-title">

			please fill out the fields below to register with quizbook. all fields are required.

		</span>

	</div>
	

	<div class="form-wrapper">

	{{ Form::open( ['route' => 'users.store'] ) }}

		<div class="form-field">

			{{ Form::label('username', 'username: ') }}

			{{ Form::input('text', 'username') }}

			{{ $errors->first('username', '<span class=error>:message</span>') }}

		</div>

		<div class="form-field">

			{{ Form::label('email', 'email: ') }}

			{{ Form::input('text', 'email') }}

			{{ $errors->first('email', '<span class=error>:message</span>') }}

		</div>

		<div class="form-field">

			{{ Form::label('password', 'password: ') }}

			{{ Form::input('password', 'password') }}

			{{ $errors->first('password', '<span class=error>:message</span>') }}

		</div>

		<div class="form-field">

			{{ Form::label('confirm-password', 'confirm password: ') }}

			{{ Form::input('password', 'confirm-password') }}

			{{ $errors->first('confirm-password', '<span class=error>:message</span>') }}

		</div>

		<div class="form-field">

			

			<span class="check-box">

				{{ Form::label('terms-conditions', ' ') }}

				{{ Form::input('checkbox', 'terms-conditions') }}

				{{ $errors->first('terms-conditions', '<span class=error-checkbox>:message</span>') }}

			</span>

			<span class="link-to-terms">

				I accept quizbook.io <a href="terms-conditions">terms and conditions</a>.

			</span>

		</div>

		<div class="form-field">

			<span class="submit-btn">

				{{ Form::submit('register with quizbook') }}

			</span>

		</div>

	{{ Form::close() }}

	</div>



@stop