@extends ('layouts.browse')

@section('quizzes-menu')

	

	<li>

		{{ link_to("browse/quizzes/all", 'all' , array('class'=>'link-sub-menu')) }}

	</li>

	<li>

		{{ link_to("browse/quizzes/newest", 'newest' , array('class'=>'link-sub-menu')) }}

	</li>

	
	<li>

		{{ link_to("browse/quizzes/most-dificult", 'most dificult' , array('class'=>'link-sub-menu')) }}

	</li>

	<li>

		{{ link_to("browse/quizzes/easiest", 'easiest' , array('class'=>'link-sub-menu')) }}

	</li>

	



@stop


@section ('main-content')

	<div class="content-header ">

		<span class='title red'>

			congratulations!

		</span>

		<br />

		<span class='sub-title'>

			you have just completed a quiz

		</span>

	</div>

	<div class='content'>


		<div class='share-cont'>

					
			<div class='share-message'>

			it took you <span class='red'>{{$timeTaken}}</span> seconds to score <br /><span class='red big'>{{ $score }}</span> <br />points. well done!

			</div>


				@if (Auth::check())
			<div class='share-btn'>

				<a class='shareFB' href="/shareQuiz/{{$quiz->id}}"><span>share quiz to facebook</span></a>
				

			</div>
				@endif

		</div>
	

	</div>




@stop
