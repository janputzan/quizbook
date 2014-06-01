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

			{{ $quiz->title }}

		</span>

		<br />

		<span class='sub-title'>

			category: {{$name}}

		</span>

	</div>

	<div class='content'>


		<div class='list'>

			<table>

				<tr>

			    	<td class='right'><span class='username'> created by: </span></td>

			    	<td class='left'><span> {{ link_to("users/$owner", $owner, array('class'=>'red')) }}</span></td>

				</tr>

				<tr>

			    	<td class='right'><span class='username'>date created: </span></td>

			    	<td class='left'><span> {{ date("d F Y",strtotime($quiz->created_at)) }} </span></td>
			    	
				</tr>

				<tr>

			    	<td class='right'><span class='username'>dificulty level: </span></td>

			    	<td class='left'><span> {{ $quiz->dificulty }} </span></td>
			    	
				</tr>

				<tr>

			    	<td class='right'><span class='username'>number of questions: </span></td>

			    	<td class='left'><span> {{ $count }} </span></td>
			    	
				</tr>

				<tr>

			    	<td class='right'><span class='username'>number of takes: </span></td>

			    	<td class='left'><span> {{ $taken}} </span></td>
			    	
				</tr>

				<tr>

			    	<td class='right'><span class='username'>highest score: </span></td>

			    	<td class='left'><span> {{ $bestScore }} </span></td>
			    	
				</tr>

			</table>


				
					{{ Form::open() }}

					<div class="form-take">

						<span class="take-btn">

							{{ Form::submit('take quiz') }}

						</span>

					</div>

					{{ Form::close() }}

			

		</div>

	</div>




@stop
