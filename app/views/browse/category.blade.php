@extends ('layouts.browse')

@section('categories-menu')

	@foreach ($categories as $category)

	<li>

		{{ link_to("browse/categories/$category->name", $category->name, array('class'=>'link-sub-menu')) }}

	</li>

	@endforeach



@stop


@section ('main-content')

	<div class="content-header ">

		<span class='title red'>

			{{ link_to("browse/categories/$name", $name, array('class'=>'red'))  }} 

		</span>

		<br />

		<span class='sub-title'>

			browse quizzes by categories

		</span>

	</div>

	<div class='content'>


	<div class='list'>

		@if (sizeof($quizzes) > 0)

			@foreach ($quizzes as $quiz)


				<div class='item'>

				{{ link_to("browse/quizzes/$quiz->id", $quiz->title, array('class'=>'red')) }}

				</div>


			@endforeach

		@else

			

				There are no quizzes in this category yet. Why don't you {{ link_to('create/title', 'create', array('class' => 'red')) }} one?

			

		@endif

	</div>




@stop

