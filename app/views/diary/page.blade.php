@extends('layout.framework-diary')

@section('page-css')
<link rel="stylesheet" href="{{ URL::asset('css/jquery.buttonGroupInput.css') }}" />
@stop

@section('page-script')
<script type="text/javascript" src="{{ URL::asset('js/jquery.buttonGroupInput.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/diaryentry.js') }}"></script>
@stop

@section('page-content')
<div class="row">
    <div class="small-12 columns">
        <div class="row">
            <div class="medium-8 medium-centered columns">
                <h2>Tagebucheintrag</h2>
            </div>
        </div>
        
        {{ Form::open() }}
        <div class="row">
            <div class="medium-8 medium-centered columns">
                <div class="question">
                   <h3>Wie lange hast du heute gehört?</h3>
                   <input type="radio" name="listening-duration" id="listening-duration1" value="1" /><label for="listening-duration1">1 Stunde oder weniger</label><br />
                   <input type="radio" name="listening-duration" id="listening-duration2" value="2" /><label for="listening-duration2">1 bis 2 Stunden</label><br />
                   <input type="radio" name="listening-duration" id="listening-duration3" value="3" /><label for="listening-duration3">2 bis 4 Stunden</label><br />
                   <input type="radio" name="listening-duration" id="listening-duration4" value="4" /><label for="listening-duration4">4 Stunden oder länger</label><br />
                </div>
            </div>
        </div>
        <div class="row">
            <div class="medium-8 medium-centered columns">
                <div class="question">
                    <h3>Wie hast du heute so gehört?</h3>
                    -> Options here
                </div>
            </div>
        </div>
        <div class="row">
            <div class="medium-8 medium-centered columns">
                <div class="question">
                    <h3>Wie gut hat der Streaming-Dienst dir Musik vorgeschlagen?</h3>
                    <div class="input-group" data-name="recommendations-quality"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="medium-8 medium-centered columns">
                <div class="question">
                    <h3>Waren die Vorschläge besser als gestern?</h3>
                    <input type="radio" name="recommendations-comparison" id="recommendations-comparison1" value="1" /><label for="recommendations-comparison1">besser</label><br />
                    <input type="radio" name="recommendations-comparison" id="recommendations-comparison2" value="2" /><label for="recommendations-comparison2">gleich gut</label><br />
                    <input type="radio" name="recommendations-comparison" id="recommendations-comparison3" value="3" /><label for="recommendations-comparison3">schlechter</label><br />
                    <input type="radio" name="recommendations-comparison" id="recommendations-comparison4" value="4" /><label for="recommendations-comparison4">kann ich nicht beurteilen</label><br />
                </div>
            </div>
        </div>
        <div class="row">
            <div class="medium-8 medium-centered columns">
                <div class="question">
                    <h3>Welches Genre hast du dir heute am meisten angehört?</h3>
                    <input type="checkbox" name="most-listened" id="most-listened1"><label for="most-listened1">Pop / Charts</label><br />
                    <input type="checkbox" name="most-listened" id="most-listened2"><label for="most-listened2">Rock / Punk</label><br />
                    <input type="checkbox" name="most-listened" id="most-listened3"><label for="most-listened3">Metal</label><br />
                    <input type="checkbox" name="most-listened" id="most-listened4"><label for="most-listened4">Hip Hop / Rap</label><br />
                    <input type="checkbox" name="most-listened" id="most-listened5"><label for="most-listened5">Schlager / Volksmusik</label><br />
                    <input type="checkbox" name="most-listened" id="most-listened6"><label for="most-listened6">Indie / Alternative</label><br />
                    <input type="checkbox" name="most-listened" id="most-listened7"><label for="most-listened7">Electro</label><br />
                    <input type="checkbox" name="most-listened" id="most-listened8"><label for="most-listened8">Dubstep</label><br />
                    <input type="checkbox" name="most-listened" id="most-listened9"><label for="most-listened11">Dance / Club / Party</label><br />
                    <input type="checkbox" name="most-listened" id="most-listened10"><label for="most-listened11">Jazz / Soul</label><br />
                    <input type="checkbox" name="most-listened" id="most-listened11"><label for="most-listened11">Klassik</label><br />
                    <input type="checkbox" name="" id="most-listened-other"/><label for="most-listened-12">anderer Grund:</label><input type="text" name="most-listened-other-input" class="inline" />
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