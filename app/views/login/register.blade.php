@extends('layout.framework')

@section('page-title'){{ "Diary Study - Registrierung" }}@stop

@section('page-navigation')
<div id="screenerHeadUnit">
	<div class="row">
		<div class="small-12 medium-4 columns" id="logo"></div>
		<div class="small-12 medium-8 columns text-right">
			<h1>Diary Study - Registrierung</h1>
		</div>
	</div>
</div>
@stop

@section('page-content')
<div class="row" data-equalizer>
	<div class="small-12 columns">
		<div class="small-12 medium-6 columns">
			<div class="question" data-equalizer-watch>
				{{ Form::open() }}
				{{ Form::label('email', 'E-Mail-Adresse') }}
				<p class="error">{{ $errors->first('email') }}</p>
				{{ Form::text('email') }}
				{{ Form::label('password', 'Passwort') }}
				<p class="error">{{ $errors->first('password') }}</p>
				{{ Form::password('password') }}
				<hr />
				<p class="large"><i class="fa fa-pencil-square-o"></i> Bitte die Login-Daten <em>unbedingt</em> merken! </p>
				<p>Durch die Datenverschlüsselung ist es uns leider nicht möglich, "Passwort vergessen"-Emails zuzusenden.</p>
				{{ Form::submit('Registrieren', array('class' => 'large button expand bottomButton')) }}
				{{ Form::close() }}
			</div>
		</div>
		<div class="small-12 medium-6 columns">
			<div class="question" data-equalizer-watch>
				<h2>Datenschutz</h2>
				<p class="large">Deine E-Mail-Adresse wird verschlüsselt in unserer Datenbank gespeichert und weder an Dritte weitergegeben noch zur Auswertung verwendet.</p>
				<div class="text-center">
					<i class="fa fa-lock fa-5x"></i>
				</div>
			</div>
		</div>
	</div>
</div>
@stop

@section('page-script')
@stop