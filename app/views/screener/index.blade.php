@extends('layout.framework')

@section('page-title'){{ "Meinungsumfrage zu Musik-Streamingdiensten" }}@stop

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
<section id="step1" data-id="1">
	<div class="row">
		<div class="small-12 columns text-center">
			<h2 id="love">Du <i class="fa fa-heart"></i> Musik?</h2>
			<p class="large">Sehr gut! Wir untersuchen im Rahmen eines Kurses der Universität Regensburg die Vor- und Nachteile von Musik-Streamingdiensten und benötigen hierzu <strong>deine Einschätzung</strong>.</p>   
			<p class="large">Es geht um folgende Dienste &ndash; du musst sie jedoch nicht kennen, um uns helfen zu können:</p>
			<div class="row dienste">
				<div class="small-12 medium-8 large-6 medium-centered columns">
					<div class="row">
						<div class="small-12 medium-6 columns">
							<div class="bubble spotify">
							</div>
						</div>
						<div class="small-12 medium-6 columns">
							<div class="bubble rdio">
							</div>
						</div>
					</div>
				</div>
			</div>
			<h3>Die Umfrage dauert nur ungefähr <strong>5-8 Minuten</strong> und sollte sehr entspannt sein.</h3>
			<p class="show-for-small-only">Wenn du diese Seite mit deinem Smartphone besuchst, ist die Umfrage vermutlich geringfügig aufwändiger, da du deinen Browser benötigst.</p>
			<hr />
			<a class="radius large button expand forward"><i class="fa fa-arrow-circle-right"></i> Umfrage starten</a>
		</div>
	</div>
</section>
<section id="step2" data-id="2">
	<div class="row">
		<h4>Schritt 1 von 1</h4>
		<h2>Sieh dir die Webseiten dieser beiden Streamingdienste an und erkundige nach ihrem Leistungsumfang:</h2>
		<p class="large">(Klicke auf einen Dienst, um zur dazugehörigen Webseite zu springen.)</p>
		<div class="row dienste">
			<div class="small-12 medium-8 large-6 medium-centered columns">
				<div class="row">
					<div class="small-12 medium-6 columns">
						<div class="bubble spotify">
							<a href="http://www.spotify.com/de/" target="_blank"></a>
						</div>
					</div>
					<div class="small-12 medium-6 columns">
						<div class="bubble rdio">
							<a href="http://www.rdio.com/" target="_blank"></a>
						</div>
					</div>
				</div>
			</div>
		</div>
		{{ Form::open() }}
		<div class="row">
			<div class="small-12 medium-8 medium-centered columns">
				<div class="question">
					<h3>Bei welchem der Dienste würdest du dich <em>am ehesten</em> registrieren?</h3>
					<input type="radio" name="preferred-service" id="preferred1" value="1" /><label for="preferred1">Spotify</label><br />
					<input type="radio" name="preferred-service" id="preferred2" value="2" /><label for="preferred2">Rdio</label>
				</div>
			</div>
			<div class="small-12 medium-8 medium-centered columns">
				<div class="question">
					<h3>Weshalb? <small>(mindestens 1 Grund angeben)</small></h3>
					<input type="checkbox" name="preferred-known" id="preferred-reason1" value="1" /><label for="preferred-reason1">Ich kenne/nutze den Dienst bereits.</label><br />
					<input type="checkbox" name="preferred-look" id="preferred-reason2" value="1" /><label for="preferred-reason2">Mir gefällt die optische Aufmachung.</label><br />
					<input type="checkbox" name="preferred-features" id="preferred-reason3" value="1" /><label for="preferred-reason3">Der Produktumfang ist überzeugend.</label><br />
					<input type="checkbox" name="preferred-other" id="preferred-reason4" value="1" /><label for="preferred-reason4">anderer Grund:</label><input type="text" name="preferred-other-input" class="inline" />
				</div>
			</div>
		</div>
		<hr />
		<input type="hidden" name="attempt" value="{{ $attempt->id }}" />
		<a class="large radius button expand disabled" id="finish"><i class="fa fa-check-circle"></i> Umfrage fertigstellen</a>
		{{ Form::close() }}
	</div>
</section>
@stop

@section('page-script')
<script src="{{ URL::asset('js/screener.js') }}" type="text/javascript"></script>
@stop