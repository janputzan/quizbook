@extends ('layouts.sideMenu')
	

<?php 

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

?>


@section ('side-menu')
<div class='side-menu-wrapper leaderboards'>

		<div class='side-menu-items'>

			<ul class='side-nav'>

				<li class='side-nav-item'>

				{{ link_to('leaderboards', 'LEADERBOARDS', array('class'=>'link-side-menu'))}}	

				</li>

				<li class='side-nav-item'>

					
				{{ link_to("leaderboards",'this week', array('class'=>'link-sub-menu '.$class1.' ')) }}


				</li>

				<li class='side-nav-item'>

				{{ link_to("leaderboards/this-month",'this month', array('class'=>'link-sub-menu'.$class2.' ')) }}

				</li>

				<li class='side-nav-item'>

				{{ link_to("leaderboards/this-year",'this year', array('class'=>'link-sub-menu'.$class3.' ')) }}

				</li>

				<li class='side-nav-item'>

				{{ link_to("leaderboards/all-times",'all times', array('class'=>'link-sub-menu'.$class4.' ')) }}

				</li>

			</ul>

		</div>

	</div>

	@stop