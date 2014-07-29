<!DOCTYPE HTML>
<html>
<head>
	<title>Screener</title>
  	<meta name="viewport" content="width=device-width, minimum-scale=1.0, initial-scale=1.0, user-scalable=yes">
  	<script src="{{ URL::asset('js/jquery-2.1.1.min.js') }}"></script>
  	<script src="{{ URL::asset('components/platform/platform.js') }}"></script>

  	<link rel="import" href="{{ URL::asset('components/font-roboto/roboto.html') }}">	
  	<link rel="import" href="{{ URL::asset('components/core-elements/core-elements.html') }}">
	<link rel="import" href="{{ URL::asset('components/paper-elements/paper-elements.html') }}">
	
	<link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" />
	
</head>
<body unresolved touch-action="auto">
	<core-header-panel>
	    <core-toolbar>
	    	<span flex>Screener</span>
	    </core-toolbar>
	    <div id="content" layout vertical>
			<h1>Test</h1>
			<paper-input id="1" floatingLabel="true" label="Your Name"></paper-input>
			<div horizontal layout>
				<paper-checkbox id="participate"></paper-checkbox>
				<div vertical layout>
					<h4>Ich nehme teil</h4>
					<div>Ja, ich möchte teilnehmen und so</div>
				</div>
			</div>
	    </div>
	</core-header-panel>
	
	<script>
	var input = document.getElementById("1");
	input.addEventListener("change", function(event) {
		console.log(event);
	});
	
	
	</script>
</body>
</html>