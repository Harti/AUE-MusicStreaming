@extends('layout.framework')

@section('page-title'){{ "Vielen Dank für deine Teilnahme!" }}@stop

@section('page-navigation')
<div id="screenerHeadUnit">
	<div class="row">
		<div class="small-12 medium-4 columns" id="logo"></div>
		<div class="small-12 medium-8 columns text-right">
			<h1>Erfolgreich angemeldet</h1>
		</div>
	</div>
</div>
@stop

@section('page-content')
<div class="row">
	<div class="small-12 columns">
		<div class="text-center">
			<h2>Vielen Dank für deine Anmeldung!<br /><i class="fa fa-smile-o fa-3x"></i></h2>
			<p>Wir werden uns in den nächsten Tagen über die von dir angegebenen Kontaktdaten bei dir melden.</p>
		</div>
	</div>
</div>
@stop