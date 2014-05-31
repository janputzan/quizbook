@extends ('layouts.sideMenu')
	

<?php 
/*

// it takes variable $class as argument for switch - creates class = active
	$class1 = " ";
	$class2 = " ";
	$class3 = " ";
	$class4 = " ";

	switch($class)
	{
		case 1:
			$class1 = ' active';
			break;
		case 2: 
			$class2 = ' active';
			break;
		case 3:
			$class3 = ' active';
			break;
		case 4: 
			$class4 = ' active';
			break;
		default:
			break;
	}

*/
?>



@section ('side-menu')
<div class='side-menu-wrapper browse'>

		<div class='side-menu-items'>

			<ul class='side-nav'>

				<li class='side-nav-item'>

				{{ link_to('browse', 'CATEGORIES', array('class'=>'link-side-menu'))}}	

				</li>

				@yield('categories-menu')

				<li class='side-nav-item'>

					
				{{ link_to("browse/quizzes/all",'QUIZZES', array('class'=>'link-side-menu'))}}


				</li>

				@yield('quizzes-menu')

				<li class='side-nav-item'>

				{{ link_to("browse",'TAGS', array('class'=>'link-side-menu'))}}

				</li>

				@yield('tags-menu')

				<li class='side-nav-item'>

				{{ link_to("browse",'USERS', array('class'=>'link-side-menu'))}}

				</li>

				@yield('users-menu')

				

			</ul>

		</div>

	</div>

	@stop