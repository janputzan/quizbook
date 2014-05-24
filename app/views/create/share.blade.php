@extends ('layouts.create')

@section ('main-content')

	<div class="content-header ">

		<span class='title green'>

			Share

		</span>

		<br />

		<span class='sub-title'>

			share the quiz with your friends and enemies

		</span>

	</div>

	<div class="content-share">


	You have been awarded {{ $points }} for creating the quiz. Share it now.


	<div class="create-btn">

				

				<span class='back-btn'>

					<input type="submit" name="back" value="Back">

				</span>

				<span class="next-btn">

					

						<input type="submit" name="finish" value="Create Quiz">

					

				</span>

			</div>




	</div>

@stop