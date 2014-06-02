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
			
			<?php 
				$cont = Session::get('questions');

				$tick = '<span id="checkmark">
							<div id="circle"></div>
							<div id="stem"></div>
							<div id="kick"></div>
						</span>';


			 ?> 

				
			<table class='questions-list'>

			<tr>

				@for ($i = 0; $i < ceil(count($cont) / 2) ; $i++)
				
				<td>
					

					<br /><span class='green'>question 

					@if (strlen($cont[$i]['question']) > 15)

							{{ ($i+1).":</span><br />".substr($cont[$i]['question'], 0, 15) }}... 

						@else

							{{ ($i+1).":</span><br />".$cont[$i]['question'] }}

					@endif
						


					<br />

					<span class='green'>answers: </span><br />

					1. {{ (strlen($cont[$i]['answer1']) >15) ?  substr($cont[$i]['answer1'] , 0, 12)."..." : $cont[$i]['answer1'] }} {{ ( $cont[$i]['rightAnswer'] == 1) ? $tick : ''}} <br />

					2. {{ (strlen($cont[$i]['answer2']) >15) ?  substr($cont[$i]['answer2'] , 0, 12)."..." : $cont[$i]['answer2'] }} {{ ( $cont[$i]['rightAnswer'] == 2) ? $tick : ''}}<br />

					3. {{ (strlen($cont[$i]['answer3']) >15) ?  substr($cont[$i]['answer3'] , 0, 12)."..." : $cont[$i]['answer3'] }} {{ ( $cont[$i]['rightAnswer'] == 3) ? $tick : ''}}<br />

					4. {{ (strlen($cont[$i]['answer4']) >15) ?  substr($cont[$i]['answer4'] , 0, 12)."..." : $cont[$i]['answer4'] }} {{ ( $cont[$i]['rightAnswer'] == 4) ? $tick : ''}}<br />

					

				</td>

				@endfor

			</tr>

			<tr>

				@for ($i = ceil(count($cont) / 2); $i < count($cont); $i++)
				
				<td>
					

					<br /><span class='green'>question {{ ($i+1).":</span><br />".$cont[$i]['question'] }} <br />

					<span class='green'>answers: </span><br />

					1. {{ (strlen($cont[$i]['answer1']) >15) ?  substr($cont[$i]['answer1'] , 0, 12)."..." : $cont[$i]['answer1'] }} {{ ( $cont[$i]['rightAnswer'] == 1) ? $tick : ''}} <br />

					2. {{ (strlen($cont[$i]['answer2']) >15) ?  substr($cont[$i]['answer2'] , 0, 12)."..." : $cont[$i]['answer2'] }} {{ ( $cont[$i]['rightAnswer'] == 2) ? $tick : ''}}<br />

					3. {{ (strlen($cont[$i]['answer3']) >15) ?  substr($cont[$i]['answer3'] , 0, 12)."..." : $cont[$i]['answer3'] }} {{ ( $cont[$i]['rightAnswer'] == 3) ? $tick : ''}}<br />

					4. {{ (strlen($cont[$i]['answer4']) >15) ?  substr($cont[$i]['answer4'] , 0, 12)."..." : $cont[$i]['answer4'] }} {{ ( $cont[$i]['rightAnswer'] == 4) ? $tick : ''}}<br />

					

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