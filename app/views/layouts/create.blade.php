@extends ('layouts.sideMenu')

<?php 
	

// it takes variable $class as argument for switch - creates class = active

	$class1 = " ";
	$class2 = " ";
	$class3 = " ";
	$class4 = " ";
	$class5 = " ";
	$class6 = " ";
	

	switch($class)
	{
		case 1:
			$class1 = ' active';
			$class2 = " hidden";
			$class3 = " hidden";
			$class4 = " hidden";
			$class5 = " hidden";
			$class6 = " hidden";
			break;
		case 2: 
			$class2 = ' active';
			$class3 = " hidden";
			$class4 = " hidden";
			$class5 = " hidden";
			$class6 = " hidden";
			break;
		case 3:
			$class3 = ' active';
			$class4 = " hidden";
			$class5 = " hidden";
			$class6 = " hidden";
			break;
		case 4: 
			$class4 = ' active';
			$class5 = " hidden";
			$class6 = " hidden";
			break;
		case 5: 
			$class5 = ' active';
			$class6 = " hidden";
			break;
		case 6: 
			$class6 = ' active';
			break;
		default:
			break;
	}

?>


@section ('side-menu')
<div class='side-menu-wrapper create'>

		<div class='side-menu-items'>

			<ul class='side-nav'>

				<li class='side-nav-item'>

				{{ link_to('create/title', 'CREATE', array('class'=>'link-side-menu'))}}	

				</li>

				<li class='side-nav-item'>

					
				{{ link_to("create/title",'title', array('class'=>'link-sub-menu '.$class1.' ')) }}


				</li>

				<li class='side-nav-item'>

				{{ link_to("create/category",'category', array('class'=>'link-sub-menu'.$class2.' ')) }}

				</li>

				<li class='side-nav-item'>

				{{ link_to("create/add-questions",'add questions', array('class'=>'link-sub-menu'.$class3.' ')) }}

				</li>

				<li class='side-nav-item'>

				{{ link_to("create/add-tags",'add tags', array('class'=>'link-sub-menu'.$class4.' ')) }}

				</li>

				<li class='side-nav-item'>

				{{ link_to("create/preview",'preview', array('class'=>'link-sub-menu'.$class5.' ')) }}

				</li>

				<li class='side-nav-item'>

				{{ link_to("create/share",'share', array('class'=>'link-sub-menu'.$class6.' ')) }}

				</li>

			</ul>

		</div>

	</div>

	@stop