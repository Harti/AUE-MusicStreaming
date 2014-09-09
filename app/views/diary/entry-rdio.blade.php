@extends('layout.framework-diary')

@section('page-title'){{ "Tagebuch-Eintrag" }}@stop

@section('page-css')
<link rel="stylesheet" href="{{ URL::asset('css/jquery.buttonGroupInput.css') }}" />
<link rel="stylesheet" href="{{ URL::asset('css/foundation-datepicker.css') }}" />
@stop

@section('page-script')
<script>
var mostRecentEntryDate = 1410127200000;
@if($user->mostRecentEntryBefore($entry))
mostRecentEntryDate = "{{ ($user->mostRecentEntryBefore($entry)->day->addDay()->timestamp * 1000) }}"; // JS time (ms)
@endif
</script>
<script type="text/javascript" src="{{ URL::asset('js/jquery.buttonGroupInput.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/foundation-datepicker.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/foundation/foundation.slider.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/diaryEntry.js') }}"></script>
@stop

@section('page-content')
<div class="row">
    <div class="small-12 columns">
        <div class="row">
            <div class="small-12 medium-8 medium-centered columns">
                <h2><i class="fa fa-pencil fa-lg"></i> Tagebuch-Eintrag</h2>
            </div>
        </div>
        
        {{ Form::model($entry) }}
        <div class="row">
            <div class="small-12 medium-8 medium-centered columns">
                <div class="question">
                   <h4>Dieser Tagebuch-Eintrag betrifft <em>folgendes Datum</em>:</h4>
                   <div class="row collapse prefix">
			        <div class="small-2 medium-1 columns">
			          <a href="javascript:void(0);" id="pickDate" class="button prefix" title="Datum wählen"><i class="fa fa-calendar"></i></a>
			        </div>
			        <div class="small-10 medium-11 columns">
	                   {{ Form::text('day', ($entry->day ? $entry->day->format("d.m.Y") : date("d.m.Y")), array('class' => 'f-datepicker', 'readonly' => 'true')) }}
			        </div>
			      </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="small-12 medium-8 medium-centered columns">
                <div class="question">
                   <h3><em>Wie lange</em> hast du heute gehört?</h3>
                   {{ Form::radio('listening_duration', '1', (Input::old('listening_duration') == '1'), array('id' => 'listening-duration1')) }}<label for="listening-duration1">1 Stunde oder weniger</label><br />
                   {{ Form::radio('listening_duration', '2', (Input::old('listening_duration') == '2'), array('id' => 'listening-duration2')) }}<label for="listening-duration2">1 bis 2 Stunden</label><br />
                   {{ Form::radio('listening_duration', '3', (Input::old('listening_duration') == '3'), array('id' => 'listening-duration3')) }}<label for="listening-duration3">2 bis 4 Stunden</label><br />
                   {{ Form::radio('listening_duration', '4', (Input::old('listening_duration') == '4'), array('id' => 'listening-duration4')) }}<label for="listening-duration4">4 Stunden oder länger</label><br />
                </div>
            </div>
        </div>
        <div class="row">
            <div class="small-12 medium-8 medium-centered columns">
                <div class="question">
                    <h3><em>Auf welche Arten</em> hast du heute am meisten gehört? <small>(Gib ungefähre Einschätzungen an.)</small></h3>
                    <div class="slider-group">
                        <div class="slider-container row">
                            <span class="small-12 columns">Trends</span>
                            <div class="small-9 medium-10 columns">
                                <div class="jquery-slider">
                                    
                                </div>
                            </div>
                            <div class="small-3 medium-2 columns">
                                <input type="text" class="slider-input" name="listened_to_trends" id="listened_to_trends">
                            </div>
                        </div>
                        <div class="slider-container row">
                            <span class="small-12 columns">Neuerscheinungen</span>
                            <div class="small-9 medium-10 columns">
                                <div class="jquery-slider">
                                    
                                </div>
                            </div>
                            <div class="small-3 medium-2 columns">
                                <input type="text" class="slider-input" name="listened_to_news" id="listened_to_news">
                            </div>
                        </div>
                        <div class="slider-container row">
                            <span class="small-12 columns">Durchsuchen</span>
                            <div class="small-9 medium-10 columns">
                                <div class="jquery-slider">
                                    
                                </div>
                            </div>
                            <div class="small-3 medium-2 columns">
                                <input type="text" class="slider-input" name="listened_to_browse" id="listened_to_browse">
                            </div>
                        </div>
                        <div class="slider-container row">
                            <span class="small-12 columns">Empfehlungen</span>
                            <div class="small-9 medium-10 columns">
                                <div class="jquery-slider">
                                    
                                </div>
                            </div>
                            <div class="small-3 medium-2 columns">
                                <input type="text" class="slider-input" name="listened_to_recommendations" id="listened_to_recommendations">
                            </div>
                        </div>
                        <div class="slider-container row">
                            <span class="small-12 columns">Eigene Playlisten</span>
                            <div class="small-9 medium-10 columns">
                                <div class="jquery-slider">
                                    
                                </div>
                            </div>
                            <div class="small-3 medium-2 columns">
                                <input type="text" class="slider-input" name="listened_to_own_playlist" id="listened_to_own_playlist">
                            </div>
                        </div>
                        <div class="slider-container row">
                            <span class="small-12 columns">Favorisierte Playlisten anderer Nutzer</span>
                            <div class="small-9 medium-10 columns">
                                <div class="jquery-slider">
                                    
                                </div>
                            </div>
                            <div class="small-3 medium-2 columns">
                                <input type="text" class="slider-input" name="listened_to_favorite_playlist" id="listened_to_favorite_playlist">
                            </div>
                        </div>
                        <div class="slider-container row">
                            <span class="small-12 columns">Gesuchte Titel, Interpreten oder Alben</span>
                            <div class="small-9 medium-10 columns">
                                <div class="jquery-slider">
                                    
                                </div>
                            </div>
                            <div class="small-3 medium-2 columns">
                                <input type="text" class="slider-input" name="listened_to_searched_songs" id="listened_to_searched_songs">
                            </div>
                        </div>
                        <div class="slider-container row">
                            <span class="small-12 columns">Kanal zu Interpret, Titel, Album oder Genre</span>
                            <div class="small-9 medium-10 columns">
                                <div class="jquery-slider">
                                    
                                </div>
                            </div>
                            <div class="small-3 medium-2 columns">
                                <input type="text" class="slider-input" name="listened_to_channel" id="listened_to_channel">
                            </div>
                        </div>
                        <div class="slider-container row">
                            <span class="small-12 columns">Eigener Kanal</span>
                            <div class="small-9 medium-10 columns">
                                <div class="jquery-slider">
                                    
                                </div>
                            </div>
                            <div class="small-3 medium-2 columns">
                                <input type="text" class="slider-input" name="listened_to_custom_channel" id="listened_to_custom_channel">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="small-12 medium-8 medium-centered columns">
                <div class="question">
                    <h3><em>Wie gut</em> hat der Streaming-Dienst dir Musik vorgeschlagen? <small>(1 = sehr schlecht, 7 = sehr gut)</small></h3>
                    <div class="input-group" data-name="recommendations_quality" data-value="{{ $entry->recommendations_quality }}"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="small-12 medium-8 medium-centered columns">
                <div class="question">
                    <h3>Waren die Vorschläge <em>besser als gestern</em>?</h3>
                    {{ Form::radio('recommendations_comparison', '1', (Input::old('recommendations_comparison') == '1'), array('id' => 'recommendations-comparison1')) }}<label for="recommendations-comparison1">besser</label><br />
                    {{ Form::radio('recommendations_comparison', '2', (Input::old('recommendations_comparison') == '2'), array('id' => 'recommendations-comparison2')) }}<label for="recommendations-comparison2">gleich gut</label><br />
                    {{ Form::radio('recommendations_comparison', '3', (Input::old('recommendations_comparison') == '3'), array('id' => 'recommendations-comparison3')) }}<label for="recommendations-comparison3">schlechter</label><br />
                    {{ Form::radio('recommendations_comparison', '4', (Input::old('recommendations_comparison') == '4'), array('id' => 'recommendations-comparison4')) }}<label for="recommendations-comparison4">kann ich nicht beurteilen</label><br />
                </div>
            </div>
        </div>
        <div class="row">
            <div class="small-12 medium-8 medium-centered columns">
                <div class="question">
                    <h3>Welches Genre hast du dir heute am meisten angehört?</h3>
                    {{ Form::radio('most_listened', '1', (Input::old('most_listened') == '1'), array('id' => 'most-listened1')) }}<label for="most-listened1">Pop / Charts</label><br />
                    {{ Form::radio('most_listened', '2', (Input::old('most_listened') == '2'), array('id' => 'most-listened2')) }}<label for="most-listened2">Rock / Punk</label><br />
                    {{ Form::radio('most_listened', '3', (Input::old('most_listened') == '3'), array('id' => 'most-listened3')) }}<label for="most-listened3">Metal</label><br />
                    {{ Form::radio('most_listened', '4', (Input::old('most_listened') == '4'), array('id' => 'most-listened4')) }}<label for="most-listened4">Hip Hop / Rap</label><br />
                    {{ Form::radio('most_listened', '5', (Input::old('most_listened') == '5'), array('id' => 'most-listened5')) }}<label for="most-listened5">Schlager / Volksmusik</label><br />
                    {{ Form::radio('most_listened', '6', (Input::old('most_listened') == '6'), array('id' => 'most-listened6')) }}<label for="most-listened6">Indie / Alternative</label><br />
                    {{ Form::radio('most_listened', '7', (Input::old('most_listened') == '7'), array('id' => 'most-listened7')) }}<label for="most-listened7">Electro</label><br />
                    {{ Form::radio('most_listened', '8', (Input::old('most_listened') == '8'), array('id' => 'most-listened8')) }}<label for="most-listened8">Dubstep</label><br />
                    {{ Form::radio('most_listened', '9', (Input::old('most_listened') == '9'), array('id' => 'most-listened9')) }}<label for="most-listened9">Dance / Club / Party</label><br />
                    {{ Form::radio('most_listened', '10', (Input::old('most_listened') == '10'), array('id' => 'most-listened10')) }}<label for="most-listened10">Jazz / Soul</label><br />
                    {{ Form::radio('most_listened', '11', (Input::old('most_listened') == '11'), array('id' => 'most-listened11')) }}<label for="most-listened11">Klassik</label><br />
                    {{ Form::radio('most_listened', '12', (!is_numeric(Input::old('most_listened'))), array('id' => 'most-listened12')) }}<label for="most-listened12">anderes Genre:</label><input type="text" name="most-listened-other-input" class="inline" />
                </div>
            </div>
        </div>
        <div class="row">
            <div class="small-12 medium-8 medium-centered columns">
                <div class="question">
                    <h3>Hast du irgendwelche Anmerkungen oder Fragen?</h3>
                    <textarea name="free_notes"></textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="columns small-12 medium-8 medium-centered">
                <div class="row">
                    <div class="small-12 medium-6 columns">
                        <a href="{{ URL::to('/diary') }}" class="large secondary radius button expand" id="cancel"><i class="fa fa-times"></i> Abbrechen</a>
                    </div>
                    <div class="small-12 medium-6 columns">
                        <a href="javascript:void(0)" class="large radius button expand" id="finish"><i class="fa fa-check-circle"></i> Eintrag speichern</a>
                    </div>
                </div>
            </div>
        </div>
        {{ Form::close() }}
    </div>
</div>
@stop