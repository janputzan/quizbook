@extends ('layouts.profile')




@section ('main-content')

	<div class='profile-info'>

		<div class='profile-photo'>

			{{ Gravatar::image($user->email) }}

		</div>

		<div class='profile-data'>

			<span class='username'>

				{{ $user->username }}

			</span>

			<br />

			<span class='score'>


			{{ $user->total_score }}

			</span>


		</div>

	</div>


@stop

