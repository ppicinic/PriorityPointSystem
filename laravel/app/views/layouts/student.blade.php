@extends('layouts.master')

{{-- Main Student Page --}}

	@section('content')
	<p>Name: {{{$user->fname}}} {{{$user->lname}}} <br/>
	Campus Wide ID: {{{$user->cwid}}}
	</p>
	<h1>Activities</h1>
	<?php $totalPoints = 0;
	$actPoints = 0; ?>
		<h2>Clubs</h2>
		@foreach($semesters as $semester)
		<h3>{{$semester->name}}</h3>
			@foreach($user->clubs as $club)
			<?php $point = 0;
				$goneToM = $user->meetings()->where('club_id', $club->id)->where('semester_id', $semester->id)->where('type', 'M')->get()->count(); 
				$totalM = $club->meetings()->where('semester_id', $semester->id)->where('type', 'M')->get()->count(); 
				$goneToE = $user->meetings()->where('club_id', $club->id)->where('semester_id', $semester->id)->where('type', 'E')->get()->count(); 
				$totalE = $club->meetings()->where('semester_id', $semester->id)->where('type', 'E')->get()->count();
				if($goneToE / $totalE >= .5 && $goneToM / $totalM >= .5){
					$point++;
					if($goneToM / $totalM >= .75){
						$point++;
					}
				}
				$actPoints += $point;
			?>
			{{$club->name}}: {{$point}}<br/>
			@endforeach
		@endforeach
		<br/>
		<h4>Total Points: {{$actPoints}}</h3>
		<h4>Max Allowed: 8</h3>
		<?php if($actPoints > 8) {$actPoints = 8; } ?>
		<h4>Awarded: {{$actPoints}}</h4>
		<?php $totalPoints += $actPoints; ?>
	<a href='student/clubs/'>View Clubs</a>
	<h1>GPA</h1>
	<?php $gpa = 0.00; ?>
	@foreach($semesters as $semester)
		<h3>{{$semester->name}}</h3>
		GPA: {{$user->gpas()->where('semester_id', $semester->id)->get()[0]->gpa}}<br />
		<?php $gpa += $user->gpas()->where('semester_id', $semester->id)->get()[0]->gpa;?>
	@endforeach
	<?php $gpa /= count($semesters);
	$gpaPoints = 0;
	if($gpa >= 3.85){
		$gpaPoints = 12;
	} elseif($gpa >= 3.60){
		$gpaPoints = 11;
	} elseif($gpa >= 3.25){
		$gpaPoints = 10;
	} elseif($gpa >= 3.00){
		$gpaPoints = 9;
	} elseif($gpa >= 2.75){
		$gpaPoints = 7;
	} elseif($gpa >= 2.50){
		$gpaPoints = 6;
	} elseif($gpa >= 2.25){
		$gpaPoints = 5;
	} elseif($gpa >= 2.00){
		$gpaPoints = 4;
	} elseif($gpa >= .50){
		$gpaPoints = 1;
	}
	?>
	<h4>GPA Points: {{$gpaPoints}}</h4>
	<h1>Room Condition</h1>
	<?php $condition = 0; 
		$damage = 0;
		$discipline = 6; ?>
	@foreach($semesters as $semester)
		<?php $condition += $user->rooms()->where('semester_id', $semester->id)->get()[0]->condition;
				$damage += $user->rooms()->where('semester_id', $semester->id)->get()[0]->damage;?>
	@endforeach
	<?php $condition /= count($semesters); 
			$damage /= count($semesters);?>
	<h4>Room Condition: {{$condition}}</h4>
	<h1>Room Damage</h1>
	<h4>Room Damage: {{$damage}}</h4>
	<h1>Discipline</h1>
	@foreach($semesters as $semester)
		@foreach($user->disciplines()->where('semester_id', $semester->id)->get() as $infractions)
			<?php $discipline -= $infractions->infraction; ?>
		@endforeach
	@endforeach
	<h4>Discipline Points: {{$discipline}}</h4>
	<?php $totalPoints += $gpaPoints + $condition + $damage + $discipline; ?>
	<h3>Total Points: {{$totalPoints}}</h3>
	<form action='../logout' method='POST'>
		<input type='submit' name='submit' value='Log Out'>
	</form>
	@stop
	
