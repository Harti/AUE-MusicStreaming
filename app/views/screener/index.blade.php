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
			<p>Sehr gut! Wir untersuchen im Rahmen eines Kurses der Universität Regensburg die Vor- und Nachteile von Musik-Streamingdiensten und benötigen hierzu <strong>deine Einschätzung</strong>.</p>   
			<p>Es geht um folgende Dienste &ndash; du musst sie jedoch nicht kennen, um uns helfen zu können:</p>
			<div class="row dienste">
				<div class="small-12 medium-6 large-3 columns">
					<div class="bubble deezer">
					</div>
				</div>
				<div class="small-12 medium-6 large-3 columns">
					<div class="bubble xboxmusic">
					</div>
				</div>
				<div class="small-12 medium-6 large-3 columns">
					<div class="bubble spotify">
					</div>
				</div>
				<div class="small-12 medium-6 large-3 columns">
					<div class="bubble rdio">
					</div>
				</div>
			</div>
			<h3>Die Umfrage dauert nur ungefähr <strong>10-15 Minuten</strong> und sollte sehr entspannt sein.</h3>
			<p class="show-for-small-only">Wenn du diese Seite mit deinem Smartphone besuchst, ist die Umfrage vermutlich geringfügig aufwändiger, da du deinen Browser mehrmals benötigst.</p>
			<p>Wenn du fertig bist, kannst du dir einen Gutschein von Amazon verdienen.</p>
			<hr />
			<a class="radius large button expand forward"><i class="fa fa-arrow-circle-right"></i> Umfrage starten</a>
		</div>
	</div>
</section>
<section id="step2" data-id="2">
	<div class="row">
		<h4>Schritt 1 von 1</h4>
		<h2>Sieh dir die Webseiten der vier Streamingdienste an und erkundige nach ihrem Leistungsumfang:</h2>
		<p>(Klicke auf einen Dienst, um zur dazugehörigen Webseite zu springen.)</p>
		<div class="row dienste">
			<div class="small-12 medium-6 large-3 columns">
				<div class="bubble deezer">
					<a href="http://www.deezer.com/features/" target="_blank"></a>
				</div>
			</div>
			<div class="small-12 medium-6 large-3 columns">
				<div class="bubble xboxmusic">
					<a href="http://music.xbox.com/de/" target="_blank"></a>
				</div>
			</div>
			<div class="small-12 medium-6 large-3 columns">
				<div class="bubble spotify">
					<a href="http://www.spotify.com/de/" target="_blank"></a>
				</div>
			</div>
			<div class="small-12 medium-6 large-3 columns">
				<div class="bubble rdio">
					<a href="http://www.rdio.com/" target="_blank"></a>
				</div>
			</div>
		</div>
		{{ Form::open() }}
		<div class="row">
			<div class="small-12 medium-8 medium-centered columns">
				<div class="question">
					<h3>Bei welchem der Dienste würdest du dich <em>am ehesten</em> registrieren?</h3>
					<input type="radio" name="preferred-service" id="preferred1" value="1" /><label for="preferred1">Deezer</label><br />
					<input type="radio" name="preferred-service" id="preferred2" value="2" /><label for="preferred2">Xbox Music</label><br />
					<input type="radio" name="preferred-service" id="preferred3" value="3" /><label for="preferred3">Spotify</label><br />
					<input type="radio" name="preferred-service" id="preferred4" value="4" /><label for="preferred4">Rdio</label>
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
			<hr />
			<div class="small-12 medium-8 medium-centered columns">
				<div class="question">
					<h3>Bei welchem der Dienste würdest du dich <em>am unwahrscheinlichsten</em> registrieren?</h3>
					<input type="radio" name="disliked-service" id="disliked1" value="1" /><label for="disliked1">Deezer</label><br />
					<input type="radio" name="disliked-service" id="disliked2" value="2" /><label for="disliked2">Xbox Music</label><br />
					<input type="radio" name="disliked-service" id="disliked3" value="3" /><label for="disliked3">Spotify</label><br />
					<input type="radio" name="disliked-service" id="disliked4" value="4" /><label for="disliked4">Rdio</label>
				</div>
			</div>
			<div class="small-12 medium-8 medium-centered columns">
				<div class="question">
					<h3>Weshalb? <small>(mindestens 1 Grund angeben)</small></h3>
					<input type="checkbox" name="disliked-known" id="disliked-reason1" value="1" /><label for="disliked-reason1">Ich habe schlechte Erfahrungen damit gemacht.</label><br />
					<input type="checkbox" name="disliked-look" id="disliked-reason2" value="1" /><label for="disliked-reason2">Mir gefällt die optische Aufmachung nicht.</label><br />
					<input type="checkbox" name="disliked-features" id="disliked-reason3" value="1" /><label for="disliked-reason3">Der Produktumfang ist ungenügend.</label><br />
					<input type="checkbox" name="disliked-other" id="disliked-reason4" value="1" /><label for="disliked-reason4">anderer Grund:</label><input type="text" name="disliked-other-input" class="inline" />
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