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


<a id="imprint" href="javascript:void(0);" data-reveal-id="imprintModal">Impressum</a>
<div id="imprintModal" class="reveal-modal" data-reveal>
	<h2>Impressum</h2>
	<p class="lead">Dieses Projekt wird im Rahmen des Kurses "Advanced Usability Engineering" am Lehrstuhl für Medieninformatik der Universität Regensburg durchgeführt.</p>
	<p>Hauptverantwortlicher für das Projekt:</p>
	<p>
		H. Glücker<br />
		Brandenburger Str. 7<br />
		93057 Regensburg<br />
		<br />
		hartgluecker@gmx.net
	</p>
	<h2>Datenschutz</h2>
	<p>Die E-Mail-Adressen werden nicht an Dritte weitergegeben und dienen - soweit sie nicht verschlüsselt in unserer Datenbank gespeichert werden - ausschließlich der Kontaktaufnahme im Falle eines Gewinns.</p>
	<a class="close-reveal-modal">&#215;</a>
</div>
@include('layout.scriptinclude')	
</body>
</html>