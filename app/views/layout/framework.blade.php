<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>@yield('page-title')</title>
@include('layout.headinclude')
</head>
<body>
@yield('page-navigation')
@include('layout.status')

<div id="content">
@yield('page-content')
</div>

@include('layout.scriptinclude')	
</body>
</html>