@extends ('layouts.create')

@section ('main-content')

	<div class="content-header ">

		<span class='title green'>

			share to facebook

		</span>

		<br />

		<span class='sub-title'>

			share the quiz with your friends and enemies

		</span>

	</div>

	<div class="content-share">

		<div class='share-message'>
	you have been awarded <br /><span class='red'>{{ $points }}</span> <br />points for creating a quiz. <br />share it now.

	</div>
	<div class='share-btn'>

			<a class='shareFB' href="/shareQuiz/{{$quiz->id}}"><span>share quiz to facebook</span></a>

	</div>




	</div>

@stop