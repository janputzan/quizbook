<!doctype html>
<html lang="en">

	{{ HTML::style('css/styles.css'); }}
	{{ HTML::style('css/normalize.css'); }}

	{{ HTML::style('css/green.css'); }}

	{{ HTML::script('js/jquery-1.11.1.min.js'); }}
	{{ HTML::script('js/icheck.js'); }}


	<script type="text/javascript">

    function validate() {
       
            document.getElementById("next").disabled = false;
            document.getElementById("skip").disabled = true;
       
       }

    </script>


	

<head>
	<title>quizbook.io</title>



</head>

<body>
	<header>

		

			<div class="top-menu">
				
				<div class="menu-block logo">
				
					<a href="/"><img src="/images/logo_mini_100.png" class="logo-png" /></a>
					
				</div>


				<div class="menu-block inline-menu">

					<span class="menu-item red"> 

						{{ Session::get('quiz')['quizTitle'] }}


					</span>

					<span class="menu-item">

						

					</span>

					<span class="menu-item">

						number of questions left: <span class="red bigger">{{ Session::get('numberQuestions') -1 }}</span>

					</span>

					@if (($errors->has('notification')))

						<span class="notifications">

							{{ $errors->first('notification', '<span class=notify>:message</span>') }}

						</span>

					@endif

					

						<span class='user-data'>

							

							<span class="link-username">

							
							</span>

							<span class="score">

								{{ Session::get('score') }}

							</span>

						</span>

					


				</div>

				<span class='menu-right'>

				

				</span>

			</div>

		

	</header>

	<div class="container play">

		<div class="content-header ">

			<span class='title smaller'>

			{{$question['question']}}

			</span>

			<br />

			<span class='sub-title'>

				question {{$count + 1}}

			</span>

		</div>

		
		{{ Form::open() }}

		<div class="answers-list">


			<ul>

				<li><span>{{$question['answer1']['answer']}}</span> <input type='radio' value='{{$question["answer1"]["id"]}}' name='answer' onclick="validate();"></li>

				<li><span>{{$question['answer2']['answer']}}</span> <input type='radio' value='{{$question["answer2"]["id"]}}' name='answer' onclick="validate();"></li>

				<li><span>{{$question['answer3']['answer']}}</span> <input type='radio' value='{{$question["answer3"]["id"]}}' name='answer' onclick="validate();"></li>

				<li><span>{{$question['answer4']['answer']}}</span> <input type='radio' value='{{$question["answer4"]["id"]}}' name='answer' onclick="validate();"></li>

			</ul>

		</div>

		<div class="form-play">

				@if (Session::get('numberQuestions')>1)


					<span class="play-btn">

						<input id='skip' type='submit' value='skip' name='skip' />

					</span>


					<span class="playNext-btn">

						<input id='next' type='submit' value='next' name='next' disabled />

					</span>

					@else

						<span class="play-btn">

							<input id='skip' type='submit' value='skip' name='skip' disabled />

						</span>

						<span class="playNext-btn">

							<input id='next' type='submit' value='finish' name='finish' disabled />

						</span>

				@endif



		</div>

		{{ Form::close() }}

	</div>



	<footer>

	</footer>
	
</body>
</html>