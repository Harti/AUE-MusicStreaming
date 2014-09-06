@extends('layout.framework')

@section('page-title'){{ "Diary Study - Login" }}@stop

@section('page-navigation')
<div id="screenerHeadUnit">
	<div class="row">
		<div class="small-12 medium-4 columns" id="logo"></div>
		<div class="small-12 medium-8 columns text-right">
			<h1>Diary Study - Login</h1>
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
					{{ Form::text('email') }}
					{{ Form::label('password', 'Passwort') }}
					{{ Form::password('password') }}
					{{ Form::submit('Login', array('class' => 'large button expand bottomButton')) }}
				{{ Form::close() }}
			</div>
		</div>
		<div class="small-12 medium-6 columns">
			<div class="question" data-equalizer-watch>
				<h2>Noch nicht registriert?</h2>
				<p class="large">Zur Teilnahme an der Diary Study ist ein Account notwendig, da wir andernfalls die Daten nicht sichern und zuordnen können.</p>
				<a class="secondary large button expand" href="{{ URL::to('/register') }}"><i class="fa fa-arrow-circle-right fa-lg"></i> zur Registrierung</a>
			</div>
		</div>
	</div>
</div>
@stop

@section('page-script')
@stop