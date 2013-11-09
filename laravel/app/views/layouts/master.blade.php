{{-- Master Template Layout
	Base for all templates --}}
	
<!doctype html>
<html>
	
	<head>
		<title>
		@section('title')
		Priority Point System - Marist College
		@show
		</title>
	</head>
	
	<body>
	
	@section('body')
		<nav>
			@section('nav')
			@show
		</nav>
		<div class="content">
			@section('content')
			@show
		</div>
		<footer>
			@section('footer')
			@show
		</footer>
	@show

	</body>

</html>