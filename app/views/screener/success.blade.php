@extends('layout.framework')

@section('page-title'){{ "Vielen Dank für deine Teilnahme!" }}@stop

@section('page-navigation')
<div id="screenerHeadUnit">
	<div class="row">
		<div class="small-12 medium-4 columns" id="logo"></div>
		<div class="small-12 medium-8 columns text-right">
			<h1>Übertragung erfolgreich</h1>
		</div>
	</div>
</div>
@stop

@section('page-content')
<div class="row">
	<div class="small-12 columns">
		<div class="text-center">
			<h2>Vielen Dank für deine Teilnahme!<br /><i class="fa fa-smile-o fa-3x"></i></h2>
			<p>Wie versprochen gibt es jetzt noch die Möglichkeit für dich, einen Amazon-Gutschein abzustauben:</p>
		</div>
		
		<div class="row">
			<div class="small-12 medium-8 medium-centered columns">
				<div class="question">
					<p>Wir benötigen Freiwillige, die an einer "Tagebuch-Studie" <strong>(5 Tage)</strong> teilnehmen.</p>
					<p>Das sähe so aus, dass du einen der vier Streaming-Dienste <strong>über einen Zeitraum von fünf Tagen</strong> benutzen sollst &ndash; und uns jeden Abend eine kurze Umfrage (wieder ca. 10-15 Minuten) ausfüllen müsstest.</p>
					<p>Die Studie findet in einem von dir zu wählenden Zeitraum zwischen dem 20.08.2014 und 10.09.2014 statt.</p>
					<p>Unter allen 20 Teilnehmern werden 5 Amazon-Gutscheine im Wert von jeweils 10 Euro verlost.</p>
					<h3>Wenn du dies nicht möchtest, kannst du diese Seite einfach schließen. <i class="fa fa-smile-o fa-lg"></i></h3>
				</div>
			</div>
		</div>
		<hr />
		{{ Form::open(array('url' => '/volunteer/')) }}
		<div class="row">
			<div class="small-12 medium-8 medium-centered columns">
				<div class="question">
					<p>Damit wir dich zur Besprechung von Details erreichen können, benötigen wir deine Kontaktdaten. Diese werden unter keinen Umständen an Dritte weitergegeben.</p>
						{{ Form::label('email', 'E-Mail-Adresse') }}
						<p class="error">{{ $errors->first('email') }}</p>
						{{ Form::text('email') }}
						<hr />
						<small>oder</small>
						{{ Form::label('skype', 'Skype-Benutzername') }}
						<p class="error">{{ $errors->first('skype') }}</p>
						{{ Form::text('skype') }}
						<hr />
						<small>oder</small>
						{{ Form::label('facebook', 'Facebook-Benutzername (am besten Link zum Profil einfügen)') }}
						<p class="error">{{ $errors->first('facebook') }}</p>
						{{ Form::text('facebook') }}
						<input type="hidden" name="attempt" value="{{ $attempt->id }}" />
				</div>
			</div>
		</div>
		<hr />
		{{ Form::submit('Ich möchte an der Studie teilnehmen!', array('class' => 'large radius button expand'))}}
		{{ Form::close() }}
	</div>
</div>
@stop