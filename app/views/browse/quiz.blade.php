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

		</div>

	</div>




@stop
