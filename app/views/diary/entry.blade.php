@extends('layout.framework-diary')

@section('page-css')
<link rel="stylesheet" href="{{ URL::asset('css/jquery.buttonGroupInput.css') }}" />
@stop

@section('page-script')
<script type="text/javascript" src="{{ URL::asset('js/jquery.buttonGroupInput.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/diaryEntry.js') }}"></script>
@stop

@section('page-content')
<div class="row">
    <div class="small-12 columns">
        <div class="row">
            <div class="medium-8 medium-centered columns">
                <h2>Tagebucheintrag</h2>
            </div>
        </div>
        
        {{ Form::model($entry) }}
        <div class="row">
            <div class="medium-8 medium-centered columns">
                <div class="question">
                   <h3><em>Wie lange</em> hast du heute gehört?</h3>
                   {{ Form::radio('listening-duration', '1', (Input::old('listening-duration') == '1'), array('id' => 'listening-duration1')) }}<label for="listening-duration1">1 Stunde oder weniger</label><br />
                   {{ Form::radio('listening-duration', '2', (Input::old('listening-duration') == '2'), array('id' => 'listening-duration2')) }}<label for="listening-duration2">1 bis 2 Stunden</label><br />
                   {{ Form::radio('listening-duration', '3', (Input::old('listening-duration') == '3'), array('id' => 'listening-duration3')) }}<label for="listening-duration3">2 bis 4 Stunden</label><br />
                   {{ Form::radio('listening-duration', '4', (Input::old('listening-duration') == '4'), array('id' => 'listening-duration4')) }}<label for="listening-duration4">4 Stunden oder länger</label><br />
                </div>
            </div>
        </div>
        <div class="row">
            <div class="medium-8 medium-centered columns">
                <div class="question">
                    <h3><em>Auf welche Art</em> hast du heute am meisten gehört?</h3>
                   {{ Form::checkbox('listening-type', '1', (Input::old('listening-type') == '1'), array('id' => 'listening-type1')) }}<label for="listening-type1">a</label><br />
                   {{ Form::checkbox('listening-type', '2', (Input::old('listening-type') == '2'), array('id' => 'listening-type2')) }}<label for="listening-type2">b</label><br />
                   {{ Form::checkbox('listening-type', '3', (Input::old('listening-type') == '3'), array('id' => 'listening-type3')) }}<label for="listening-type3">c</label><br />
                   {{ Form::checkbox('listening-type', '4', (Input::old('listening-type') == '4'), array('id' => 'listening-type4')) }}<label for="listening-type4">d</label><br />
                </div>
            </div>
        </div>
        <div class="row">
            <div class="medium-8 medium-centered columns">
                <div class="question">
                    <h3><em>Wie gut</em> hat der Streaming-Dienst dir Musik vorgeschlagen?</h3>
                    <div class="input-group" data-name="recommendations-quality" data-value="{{ $entry->recommendations_quality }}"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="medium-8 medium-centered columns">
                <div class="question">
                    <h3>Waren die Vorschläge <em>besser als gestern</em>?</h3>
                    {{ Form::radio('recommendations-comparison', '1', (Input::old('recommendations-comparison') == '1'), array('id' => 'recommendations-comparison1')) }}<label for="recommendations-comparison1">besser</label><br />
                    {{ Form::radio('recommendations-comparison', '2', (Input::old('recommendations-comparison') == '2'), array('id' => 'recommendations-comparison2')) }}<label for="recommendations-comparison2">gleich gut</label><br />
                    {{ Form::radio('recommendations-comparison', '3', (Input::old('recommendations-comparison') == '3'), array('id' => 'recommendations-comparison3')) }}<label for="recommendations-comparison3">schlechter</label><br />
                    {{ Form::radio('recommendations-comparison', '4', (Input::old('recommendations-comparison') == '4'), array('id' => 'recommendations-comparison4')) }}<label for="recommendations-comparison4">kann ich nicht beurteilen</label><br />
                </div>
            </div>
        </div>
        <div class="row">
            <div class="medium-8 medium-centered columns">
                <div class="question">
                    <h3>Welches Genre hast du dir heute am meisten angehört?</h3>
                    {{ Form::radio('most-listened', '1', (Input::old('most-listened') == '1'), array('id' => 'most-listened1')) }}<label for="most-listened1">Pop / Charts</label><br />
                    {{ Form::radio('most-listened', '2', (Input::old('most-listened') == '2'), array('id' => 'most-listened2')) }}<label for="most-listened2">Rock / Punk</label><br />
                    {{ Form::radio('most-listened', '3', (Input::old('most-listened') == '3'), array('id' => 'most-listened3')) }}<label for="most-listened3">Metal</label><br />
                    {{ Form::radio('most-listened', '4', (Input::old('most-listened') == '4'), array('id' => 'most-listened4')) }}<label for="most-listened4">Hip Hop / Rap</label><br />
                    {{ Form::radio('most-listened', '5', (Input::old('most-listened') == '5'), array('id' => 'most-listened5')) }}<label for="most-listened5">Schlager / Volksmusik</label><br />
                    {{ Form::radio('most-listened', '6', (Input::old('most-listened') == '6'), array('id' => 'most-listened6')) }}<label for="most-listened6">Indie / Alternative</label><br />
                    {{ Form::radio('most-listened', '7', (Input::old('most-listened') == '7'), array('id' => 'most-listened7')) }}<label for="most-listened7">Electro</label><br />
                    {{ Form::radio('most-listened', '8', (Input::old('most-listened') == '8'), array('id' => 'most-listened8')) }}<label for="most-listened8">Dubstep</label><br />
                    {{ Form::radio('most-listened', '9', (Input::old('most-listened') == '9'), array('id' => 'most-listened9')) }}<label for="most-listened11">Dance / Club / Party</label><br />
                    {{ Form::radio('most-listened', '10', (Input::old('most-listened') == '10'), array('id' => 'most-listened10')) }}<label for="most-listened11">Jazz / Soul</label><br />
                    {{ Form::radio('most-listened', '11', (Input::old('most-listened') == '11'), array('id' => 'most-listened11')) }}<label for="most-listened11">Klassik</label><br />
                    {{ Form::radio('most-listened', 'other', (!is_numeric(Input::old('most-listened'))), array('id' => 'most-listened12')) }}<label for="most-listened-12">anderes Genre:</label><input type="text" name="most-listened-other-input" class="inline" />
                </div>
            </div>
        </div>
        <div class="row">
            <div class="columns small-12 medium-8 medium-centered">
                <div class="row">
                    <div class="small-12 medium-6 columns">
                        <a class="large radius button expand default" id="cancel"><i class="fa fa-times"></i> Abbrechen</a>
                    </div>
                    <div class="small-12 medium-6 columns">
                        <a class="large radius button expand disabled" id="finish"><i class="fa fa-check-circle"></i> Eintrag speichern</a>
                    </div>
                </div>
            </div>
        </div>
        {{ Form::close() }}
    </div>
</div>
@stop