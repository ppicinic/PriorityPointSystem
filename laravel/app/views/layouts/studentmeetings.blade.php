@extends('layouts.master')

{{-- Main Student Page --}}

	@section('content')
	<p>Name: {{{$user->fname}}} {{{$user->lname}}} 
	Campus Wide ID: {{{$user->cwid}}}
	<br/>
	<h1> Meetings </h1>
	
	<h2>{{ $club->name }}</h2>
		@foreach($semesters as $semester)
			<h3>Semester: {{$semester->name}}</h3>
			<h4>Meetings</h4>
			@foreach($user->meetings()->where('club_id', $club->id)->where('semester_id', $semester->id)->where('type', 'M')->get() as $meeting)
				Meeting: {{$meeting->name}}
				Type: {{$meeting->typename}}
				Date: {{ (new DateTime($meeting->date))->format('n/j/Y') }}<br />
			@endforeach
			<h4>Events</h4>
			@foreach($user->meetings()->where('club_id', $club->id)->where('semester_id', $semester->id)->where('type', 'E')->get() as $meeting)
				Meeting: {{$meeting->name}}
				Type: {{$meeting->typename}}
				Date: {{ (new DateTime($meeting->date))->format('n/j/Y') }}<br />
			@endforeach
		<a href='/students/clubs/{{$club->id}}'>View Meetings</a>
	@endforeach
	</p>
	<form action='../logout' method='POST'>
		<input type='submit' name='submit' value='Log Out'>
	</form>
	@stop
	
