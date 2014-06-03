@extends ('layouts.create')

@section ('main-content')

<script>
$(document).ready(function(){
  $('input').iCheck({
    //checkboxClass: 'icheckbox_flat-green',
    radioClass: 'iradio_flat-green',
    labelHover: true,
    labelHoverClass: 'visible',
    activeClass: 'active-check'
  });
});
</script>



<?php

$cont = Session::get('questions');

//dd($cont[0][0]['question']);

?>

	<div class="content-header ">

		<span class='title green'>

			add questions

		</span>

		<br />

		<span class='sub-title'>

			add questions to your quiz

		</span>

	</div>

	<div class='content'>

		<div class='listOfQuestions'>

			<span class='quiz-title'> {{ Session::get('quiz-title') }} </span>

			@for ($i = 0; $i < sizeof(Session::get('questions')); $i++)

				<div class="questions" title="{{ $cont[$i]['question'] }}">

					

						@if (strlen($cont[$i]['question']) > 15)

							{{$i+1}}. {{ substr($cont[$i]['question'], 0, 12) }}... 

						@else

							{{$i+1}}. {{ $cont[$i]['question'] }}

						@endif

						<span class="actions"><span>{{link_to("questions/edit/$i", 'edit')}}</span> | <span>{{link_to("questions/delete/$i", 'delete')}}</span></span>

					
					
				</div>

				

			@endfor

		</div>

		<div class="create-form">

			<span class="create-title">question {{ sizeof(Session::get('questions'))+1 }} </span>

			{{ Form::open() }}

			<div class="create-field question">

				{{ Form::textarea('question', null, ['size' => '37x5']) }} <div id="counter"></div>

				{{ $errors->first('question', '<div class=error>:message</div>') }}

			</div>

			<div class="answers">

				<span class="create-title">answers:</span>
				{{ $errors->first('rightAnswer', '<div class="error radio-btn">:message</div>') }}

				<div class="create-field">

					{{ Form::input('text', 'answer-1') }}

					{{ $errors->first('answer-1', '<div class=error>:message</div>') }}

					<input type="radio" name="rightAnswer" value="1" id="1">
					<label class='hidden' for='1'> right answer </label>
					

				</div>

				<div class="create-field">

					{{ Form::input('text', 'answer-2') }}

					{{ $errors->first('answer-2', '<div class=error>:message</div>') }}

					<input type="radio" name="rightAnswer" value="2" id="2">
					<label class='hidden' for='2'> right answer </label>

					

				</div>

				<div class="create-field">

					{{ Form::input('text', 'answer-3') }}

					{{ $errors->first('answer-3', '<div class=error>:message</div>') }}

					<input type="radio" name="rightAnswer" value="3" id="3">
					<label class='hidden' for='3'> right answer </label>
					

				</div>

				<div class="create-field">

					{{ Form::input('text', 'answer-4') }}

					{{ $errors->first('answer-4', '<div class=error>:message</div>') }}

					<input type="radio" name="rightAnswer" value="4" id="4">
					<label class='hidden' for='4'> right answer </label>
					

				</div>

			</div>


			<div class="create-btn">

				<span class='add-more-btn'>

					<input type="submit" name="addQuestion" value="add another question">

				</span>

				<span class='back-btn'>

					<input type="submit" name="back" value="back">

				</span>

				<span class="next-btn">

					@if (sizeof(Session::get('questions'))<6) 	

						<input type="submit" name="next" value="next" disabled>

					@else

						<input type="submit" name="next" value="next">

					@endif

				</span>

			</div>

			

			{{ Form::close() }}

		</div>
	</div>

	<script>

	// character counter

		function count(){  

			var val   = $.trim($('textarea').val()),  
	
			chars = val.length;
			  
			$('#counter').html(chars);

			//added limit of 250 characters, then it changes colour to red. 

			if (chars>250)
			{
				document.getElementById("counter").className = "counter-error";
			}
			if (chars<=250)
			{
				document.getElementById("counter").className = "";
			}
		}

		count();

		$('textarea').on('input', count);

</script>

@stop