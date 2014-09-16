@extends('layout.framework-admin')

@section('page-script')
<script type="text/javascript" src="{{ URL::asset('js/amcharts.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('ja/serial.js') }}"></script>
@stop

@section('page-content')
	<div class="row">
		<div class="columns medium-8 medium-centered">
			<h3>Chartadocious</h3>
			<p>Momentan ist dies das Testgebiet für verschiedene Charts. Expect things to brake.</p>
		</div>
	</div>
@stop