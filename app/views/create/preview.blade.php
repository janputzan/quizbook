@extends ('layouts.create')

@section ('main-content')

	<div class="content-header">

		<span class='title green'>

			Preview

		</span>

		<br />

		<span class='sub-title'>

			this is what your quiz looks like

		</span>

	</div>

	<div class='content preview'>

		<div>
			<span class='green'>title: </span>{{ Session::get('quiz-title') }} <br />
			<span class='green'>category: </span>{{ Category::whereId(Session::get('category'))->first()->name }}
		</div>

		<div>

		<span class='green'>tags:</span>

		@foreach (Session::get('tags') as $tag)


			 {{ $tag.", " }}

		@endforeach
		</div>
				
		<div>
			
			<?php $cont = Session::get('questions'); ?> 

				
			<table class='questions-list'>

			<tr>

				@for ($i = 0; $i < 5; $i++)
				
				<td>
					

					<br /><span class='green'>question {{ ($i+1).":</span><br />".$cont[$i]['question'] }} <br />

					<span class='green'>answers: </span><br />

					1. {{ $cont[$i]['answer1'] }} <br />

					2. {{ $cont[$i]['answer2'] }} <br />

					3. {{ $cont[$i]['answer3'] }} <br />

					4. {{ $cont[$i]['answer4'] }} <br />

					<span class='green'>right answer: </span>{{ $cont[$i]['rightAnswer'] }} <br />

				</td>

				@endfor

			</tr>

			<tr>

				@for ($i = 5; $i < sizeof($cont); $i++)
				
				<td>
					

					<br /><span class='green'>question {{ ($i+1).":</span><br />".$cont[$i]['question'] }} <br />

					<span class='green'>answers: </span><br />

					1. {{ $cont[$i]['answer1'] }} <br />

					2. {{ $cont[$i]['answer2'] }} <br />

					3. {{ $cont[$i]['answer3'] }} <br />

					4. {{ $cont[$i]['answer4'] }} <br />

					<span class='green'>right answer: </span>{{ $cont[$i]['rightAnswer'] }} <br />

				</td>

				@endfor

			</tr>

				</table>

		</div>	


					



			
		

		

		{{ Form::open( ['route' => 'quizzes.store'] ) }}
		<div class="create-btn">

				

				<div class='back-btn'>

					<input type="submit" name="back" value="Back">

				</div>

				<div class="finish-btn">

					

						<input type="submit" name="finish" value="Create Quiz">

					

				</div>

			</div>


{{ Form::close() }}

	</div>

	

@stop