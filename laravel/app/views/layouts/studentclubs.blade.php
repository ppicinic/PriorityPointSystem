@extends('layouts.master')

{{-- Main Student Page --}}

	@section('content')
	<p>Name: {{{$user->fname}}} {{{$user->lname}}} 
	Campus Wide ID: {{{$user->cwid}}}
	<br/>
	<h1>Clubs</h1>
	@foreach($user->clubs as $club)
		<h2>{{ $club->name }}</h2>
		@foreach($semesters as $semester)
			<?php $goneToM = $user->meetings()->where('club_id', $club->id)->where('semester_id', $semester->id)->where('type', 'M')->get()->count(); 
				$totalM = $club->meetings()->where('semester_id', $semester->id)->where('type', 'M')->get()->count(); 
				$goneToE = $user->meetings()->where('club_id', $club->id)->where('semester_id', $semester->id)->where('type', 'E')->get()->count(); 
				$totalE = $club->meetings()->where('semester_id', $semester->id)->where('type', 'E')->get()->count();?>
			<h3>Semester: {{$semester->name}}</h3>
			Meetings: {{$goneToM}} / 
			{{ $totalM }}
			({{$goneToM / $totalM * 100}}%)<br/>
			Events: {{$goneToE}} / {{$totalE}} ({{$goneToE / $totalE * 100}}%)<br/>
			<?php $points = 0;
				if($goneToE / $totalE >= .5 && $goneToM / $totalM >= .5){
					$points++;
					if($goneToM / $totalM >= .75){
						$points++;
					}
				}
			?>
			Total Points: {{$points}}<br />
		@endforeach
		<a href='/student/clubs/{{$club->id}}'>View Meetings</a>
		
	@endforeach
	</p>
	<form action='../logout' method='POST'>
		<input type='submit' name='submit' value='Log Out'>
	</form>
	@stop
	
