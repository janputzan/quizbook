@extends ('layouts.create')

@section ('main-content')

<script>
$(document).ready(function(){
  $('input').iCheck({
    checkboxClass: 'icheckbox_flat-green',
    radioClass: 'iradio_flat-green',
    labelHover: true,
    labelHoverClass: 'visible',
    activeClass: 'active-check'
  });
});
</script>

	<div class="content-header ">

		<span class='title green'>

			Add Questions

		</span>

		<br />

		<span class='sub-title'>

			add questions to your quiz

		</span>

	</div>

	<div class='content'>

		<div class="create-form">

			<span class="create-title">Question 1</span>

			{{ Form::open() }}

			<div class="create-field question">

				{{ Form::textarea('question', null, ['size' => '37x5']) }}

				{{ $errors->first('question', '<div class=error>:message</div>') }}

			</div>

			<div class="answers">

				<span class="create-title">Answers:</span>
				{{ $errors->first('rightAnswer', '<div class="error radio-btn">:message</div>') }}

				<div class="create-field">

					{{ Form::input('text', 'answer-1') }}

					{{ $errors->first('answer-1', '<div class=error>:message</div>') }}

					<input type="radio" name="rightAnswer" value="1" id="1">
					<label class='hidden' for='1'> Right Answer </label>
					

				</div>

				<div class="create-field">

					{{ Form::input('text', 'answer-2') }}

					{{ $errors->first('answer-2', '<div class=error>:message</div>') }}

					<input type="radio" name="rightAnswer" value="2" id="2">
					<label class='hidden' for='2'> Right Answer </label>

					

				</div>

				<div class="create-field">

					{{ Form::input('text', 'answer-3') }}

					{{ $errors->first('answer-3', '<div class=error>:message</div>') }}

					<input type="radio" name="rightAnswer" value="3" id="3">
					<label class='hidden' for='3'> Right Answer </label>
					

				</div>

				<div class="create-field">

					{{ Form::input('text', 'answer-4') }}

					{{ $errors->first('answer-4', '<div class=error>:message</div>') }}

					<input type="radio" name="rightAnswer" value="4" id="4">
					<label class='hidden' for='4'> Right Answer </label>
					

				</div>

			</div>


			<div class="create-btn">

				<span class='add-more-btn'>

					<input type="submit" name="addQuestion" value="Add Another Question">

				</span>

				<span class='back-btn'>

					<input type="submit" name="back" value="Back">

				</span>

					

				<span class="next-btn">

					<input type="submit" name="next" value="Next">

				</span>

			</div>

			

			{{ Form::close() }}

		</div>
	</div>

	

@stop