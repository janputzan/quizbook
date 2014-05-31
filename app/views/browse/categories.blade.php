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

			categories

		</span>

		<br />

		<span class='sub-title'>

			browse quizzes by categories

		</span>

	</div>

	<div class='content'>


		<div class='list'>

			@foreach ($categories as $category)


				<div class='item'>

				{{ link_to("browse/categories/$category->name", $category->name, array('class'=>'list-item'))  }}

				

				</div>


			@endforeach

		</div>

	</div>




@stop

