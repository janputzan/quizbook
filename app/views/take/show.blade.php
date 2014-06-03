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

		press play when you are ready

		</span>

		<br />

		<span class='sub-title'>

			good luck!

		</span>

	</div>

	<div class='content'>


		


				
					{{ Form::open() }}

					<div class="form-take">

						<span class="play-btn">

							{{ Form::submit('play') }}

						</span>

					</div>

					{{ Form::close() }}

			

		

	</div>




@stop