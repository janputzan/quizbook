@extends ('layouts.sideMenu')

<?php 

// it takes variable $class as argument for switch - creates class = active

	$class1 = " ";
	$class2 = " ";
	

	switch($class)
	{
		case 1:
			$class1 = ' active';
			break;
		case 2: 
			$class2 = ' active';
			break;
		default:
			break;
	}

?>

@if (Auth::check())

@section ('side-menu')
	
	
	<div class='side-menu-wrapper profile'>

		<div class='side-menu-items'>

			<ul class='side-nav'>

				<li class='side-nav-item'>

					{{ link_to("users/$currentUser->username",'PROFILE', array('class'=>'link-side-menu')) }}

				</li>

				<li class='side-nav-item'>

					{{ link_to("users/$currentUser->username/edit",'change password', array('class'=>'link-sub-menu'.$class1.' ')) }}



				</li>

				<li class='side-nav-item'>

					{{ link_to('settings','settings', array('class'=>'link-sub-menu'.$class2.' ')) }}

				</li>

			</ul>

		</div>

	</div>


@stop

@else



@endif

