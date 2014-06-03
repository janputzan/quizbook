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


		<div class='list'>

			

		your score: {{ $score }}

		time taken: {{ $timeTaken }}
				
					

			

		</div>
	

	</div>




@stop
