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

			edit questions

		</span>

		<br />

		<span class='sub-title'>

			edit the question and save it

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

			<span class="create-title">question {{ $id+1 }} </span>

			{{ Form::open() }}

			<div class="create-field question">

				{{ Form::textarea('question', $cont[$id]['question'], ['size' => '37x5']) }}

				{{ $errors->first('question', '<div class=error>:message</div>') }}

			</div>

			<div class="answers">

				<span class="create-title">answers:</span>
				{{ $errors->first('rightAnswer', '<div class="error radio-btn">:message</div>') }}

				<div class="create-field">

					{{ Form::input('text', 'answer-1',$cont[$id]['answer1']) }}

					{{ $errors->first('answer-1', '<div class=error>:message</div>') }}

					<input type="radio" name="rightAnswer" value="1" id="1">
					<label class='hidden' for='1'> right answer </label>
					

				</div>

				<div class="create-field">

					{{ Form::input('text', 'answer-2',$cont[$id]['answer2']) }}

					{{ $errors->first('answer-2', '<div class=error>:message</div>') }}

					<input type="radio" name="rightAnswer" value="2" id="2">
					<label class='hidden' for='2'> right answer </label>

					

				</div>

				<div class="create-field">

					{{ Form::input('text', 'answer-3',$cont[$id]['answer3']) }}

					{{ $errors->first('answer-3', '<div class=error>:message</div>') }}

					<input type="radio" name="rightAnswer" value="3" id="3">
					<label class='hidden' for='3'> right answer </label>
					

				</div>

				<div class="create-field">

					{{ Form::input('text', 'answer-4',$cont[$id]['answer4']) }}

					{{ $errors->first('answer-4', '<div class=error>:message</div>') }}

					<input type="radio" name="rightAnswer" value="4" id="4">
					<label class='hidden' for='4'> right answer </label>
					

				</div>

			</div>


			<div class="create-btn">

				
				<span class='back-btn'>

					<input type="submit" name="cancel" value="cancel">

				</span>

				<span class="next-btn">

					

						<input type="submit" name="save" value="save">


				</span>

			</div>

			

			{{ Form::close() }}

		</div>
	</div>

	

@stop