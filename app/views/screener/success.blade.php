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

		{{ Form::open(array('url' => '/giveaway/')) }}
		<div class="row">
			<div class="small-12 medium-8 medium-centered columns">
				<div class="question">
					<p>Unter allen Teilnehmenden verlosen wir zwei Amazon-Gutscheine im Wert von jeweils 5€.</p>
					<p>Damit wir dir diesen zusenden können, benötigen wir deine E-Mail-Adresse. Diese werden unter keinen Umständen an Dritte weitergegeben.</p>
					<p>Wenn du nicht an der Verlosung teilnehmen möchtest, kannst du diese Seite einfach schließen.</p>
						{{ Form::label('email', 'E-Mail-Adresse') }}
						<p class="error">{{ $errors->first('email') }}</p>
						{{ Form::text('email') }}
						<input type="hidden" name="attempt" value="{{ $attempt->id }}" />
				</div>
			</div>
		</div>
		<hr />
		{{ Form::submit('Ich möchte einen Amazon-Gutschein gewinnen!', array('class' => 'large radius button expand'))}}
		{{ Form::close() }}
	</div>
</div>
@stop