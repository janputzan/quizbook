@extends ('layouts.profile')




@section ('main-content')

	<div class="content-header">

		<span class='title'>

					{{ Auth::user()->username }}

				</span>

				<br />

				<span class='sub-title'>

					you can change your password here:

				</span>

			
	</div>
				
	<div class='content'>
		

		

		<div class="form-wrapper">

			{{ 
			
				Form::open(array('route' => array('users.update', $currentUser->username))) 

			}}

				<div class="form-field">

					{{ Form::label('current-password', 'current password: ') }}

					{{ Form::input('password', 'current-password') }}

					{{ $errors->first('current-password', '<span class=error>:message</span>') }}

				</div>

				<div class="form-field">

					{{ Form::label('new-password', 'new password: ') }}

					{{ Form::input('password', 'new-password') }}

					{{ $errors->first('new-password', '<span class=error>:message</span>') }}

				</div>

				<div class="form-field">

					{{ Form::label('confirm-new-password', 'confirm new password: ') }}

					{{ Form::input('password', 'confirm-new-password') }}

					{{ $errors->first('confirm-new-password', '<span class=error>:message</span>') }}

				</div>

				
				<div class="form-field">

					<span class="">

						{{ Form::label('submit', '->') }}

						{{ Form::submit('change password') }}

					</span>

				</div>

			{{ Form::close() }}

		</div>


	</div>

@stop