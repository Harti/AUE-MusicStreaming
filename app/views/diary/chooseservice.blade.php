@extends('layout.framework-diary')

@section('page-css')
<style>
.bubble {
	cursor: pointer;
	-webkit-transition: all .4s ease; /* Firefox */
	-moz-transition: all .4s ease; /* WebKit */
	-o-transition: all .4s ease; /* Opera */
	transition: all .4s ease; /* Standard */
}	

.bubble.active {
	border: 7px double #FFF;
	box-shadow: 0px 0px 6px 3px rgba(255,255,255,.6);
	-webkit-transition: all .4s ease; /* Firefox */
	-moz-transition: all .4s ease; /* WebKit */
	-o-transition: all .4s ease; /* Opera */
	transition: all .4s ease; /* Standard */
}


.row.dienste {
	margin-top: 40px;
	margin-bottom: 60px;
}	
</style>
@stop

@section('page-content')
<div class="row">
    <div class="medium-8 medium-centered columns">
    	{{ Form::open(array('url' => '/diary/service/')) }}
        <h2>Bitte wähle den Dienst aus, der dir zugeteilt wurde:</h2>
    	<div class="row dienste">
    		<div class="small-12 medium-6 columns">
				<div class="bubble spotify" data-service="1">
				</div>
    		</div>
    		<div class="small-12 medium-6 columns">
				<div class="bubble rdio" data-service="2">
				</div>
    		</div>
    	</div>
    	<div class="question">
    		<h3>Wie gut kennst du den Dienst bereits?</h3>    		
           {{ Form::radio('familiarity', '0', true, array('id' => 'listening-duration0')) }}<label for="listening-duration0">keine Angabe</label><br />
           {{ Form::radio('familiarity', '1', (Input::old('listening-duration') == '1'), array('id' => 'listening-duration1')) }}<label for="listening-duration1">gar nicht / Ich habe ihn nur im Test benutzt</label><br />
           {{ Form::radio('familiarity', '2', (Input::old('listening-duration') == '2'), array('id' => 'listening-duration2')) }}<label for="listening-duration2">Ich habe ihn mal kurz benutzt (1-2 Mal)</label><br />
           {{ Form::radio('familiarity', '3', (Input::old('listening-duration') == '3'), array('id' => 'listening-duration3')) }}<label for="listening-duration3">Ich habe ihn schon oft benutzt (3+ Mal)</label><br />
           {{ Form::radio('familiarity', '4', (Input::old('listening-duration') == '4'), array('id' => 'listening-duration4')) }}<label for="listening-duration4">Ich nutze ihn im Alltag</label><br />
    	</div>
    	{{ Form::hidden('service', '0') }}
    	<hr />
    	<a id="finish" href="javascript:void(0);" class="large button expand disabled">Dienst auswählen</a>
    	{{ Form::close() }}
    </div>
</div>
@stop

@section('page-script')
<script>
$(function()
{
	var	submitForm = function()
	{
		if($("a#finish").hasClass("disabled")) return;
		
		$("form").submit();
	};
	
	$("a#finish").on("click", submitForm);
	
	$(".bubble").on("click", function()
	{
	 	$(".bubble").removeClass("active");
	 	$(this).addClass("active");
	 	$("a#finish").removeClass("disabled");
	 	$("a#finish").html(($(this).data("service") == 2 ? "rdio" : "Spotify") + " auswählen");
	 	$("input[type=hidden]").val($(this).data("service"));
	});
});
</script>
@stop
