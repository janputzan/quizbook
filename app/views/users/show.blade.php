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

	<div class="quizzes-list">

				<table>
					
					

					<tr>

		@if($quizzesCreated->count() > 0)

			<td>

			<span>quizzes created:</span> <br />

			@foreach($quizzesCreated as $quiz)

				{{ link_to("browse/quizzes/$quiz->id", $quiz->title, array('class'=>'red')) }} <br />

			@endforeach

			</td>

		@endif

		@if($quizzesTaken->count() > 0)

			<td>

			<span>quizzes taken:</span> <br />

			@foreach($quizzesTaken as $quiz)


<!-- fix for taken quizzes title not displaying properly -->


				<?php $taken = Quiz::whereId($quiz->quiz_id)->get(); $title = $taken[0]['title']; ?>


<!-- 		 -->


				{{ link_to("browse/quizzes/$quiz->quiz_id", "$title", array('class'=>'red')) }} <br />

			@endforeach

			</td>

		@endif

		</tr>

		</table>

		</div>




@stop

