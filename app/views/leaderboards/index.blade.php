@extends ('layouts.leaderboards')


@section ('main-content')

	<div class="content-header">

		<span class='title'>

					{{ $title }}

				</span>

				<br />

				<span class='sub-title'>

					leaderboards

				</span>

			
	</div>

		<div class='content'>
		
		<div class='table'>

			
		<table>
			<tr>
				<th class='right'>username</th>

				<th class='left'>score</th>

			</tr>


				<?php 

				//setting variable $i for the count

				$i = 1;

				?>



			@foreach ($users as $user)
			
				<tr>


			    	<td class='right'><span class='position'>{{ $i++."."}}</span><span class='username'> {{ link_to("users/$user->username", "$user->username") }}</span></td>

			    	<td class='left'><span> {{ $user->total_score }}</span></td>
			    </tr>

			@endforeach
		</table>

		

		</div>

	</div>




@stop
