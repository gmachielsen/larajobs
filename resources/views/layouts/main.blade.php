<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title></title>
	    <script defer src="{{ asset('js/app.js') }}"  ></script>

	@include('../partials.head')
</head>
<body>
	@include('../partials.nav')

<br><br>
<br><br><br>
@yield('content')
<br><br>
<br><br><br>
	@include('../partials.footer')
 
</body>
</html>