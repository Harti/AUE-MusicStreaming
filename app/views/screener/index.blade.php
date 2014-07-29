@extends('layout.framework')

@section('page-title'){{ "Screener" }}@stop

@section('page-navigation')
<div id="screenerHeadUnit">
	<div class="row">
		<div class="small-12 medium-4 columns" id="logo"></div>
		<div class="small-12 medium-8 columns text-right">
			<h1>Meinungsumfrage zu Musik-Streamingdiensten</h1>
		</div>
	</div>
</div>
@stop

@section('page-content')
<div class="row">
	<div class="small-12 columns">
		<h2>Du &hearts; Musik?</h2>
		<p>Sehr gut! Wir untersuchen im Rahmen eines Kurses der Universität Regensburg die Vor- und Nachteile von Musik-Streamingdiensten und benötigen hierzu <strong>deine Einschätzung</strong>.</p>   
		<p>Es geht um folgende Dienste &ndash; du musst sie jedoch nicht kennen, um uns helfen zu können:</p>
		<div class="row" id="dienste">
			<div class="small-12 medium-6 large-3 columns">
				<div class="bubble" id="spotify">
				</div>
			</div>
			<div class="small-12 medium-6 large-3 columns">
				<div class="bubble">
				</div>
			</div>
			<div class="small-12 medium-6 large-3 columns">
				<div class="bubble">
				</div>
			</div>
			<div class="small-12 medium-6 large-3 columns">
				<div class="bubble">
				</div>
			</div>
		</div>
		<h3>Die Umfrage dauert nur ungefähr <strong>10-15 Minuten</strong> und sollte sehr entspannt sein.</h3>
		<p>Wenn du fertig bist, hast du die Chance auf einen Gutschein von Amazon.</p>
		<hr />
		<a class="radius large button expand" href="#"><i class="fa fa-arrow-circle-right"></i> Umfrage starten</a>
	</div>
</div>
@stop

@section('page-script')
<script src="{{ URL::asset('js/screener.js') }}" type="text/javascript"></script>
@stop