@extends('layout.framework-diary')

@section('page-content')
<div class="row">
    <div class="small-12 columns">
        <h2>Tagebuch</h2>
        <div class="row">
        	<div class="small-12 columns" id="diaryOverview">
        	<?php $day = 0; ?>
            @foreach ($user->diaryEntries()->orderBy('created_at')->get() as $entry)
            	<div class="day">
                    @if(!$entry->finished())
	                    <a class="unfinished button radius" href="{{ URL::to('diary/entry/' . $entry->id) }}">
		                	<i class="fa fa-edit fa-3x"></i>
	                    	<span class="dayNumber">{{ ++$day }}</span>
	                    </a>
	                @else
	                	<div class="finished">
		                	<i class="fa fa-check fa-4x"></i>
	                    	<span class="dayNumber">{{ ++$day }}</span>
	                    	<small>{{ $entry->day->formatLocalized('%a, %d.%m.%y') }}</small>		                		
	                	</div>
                    @endif
                </div>
            @endforeach
            
            @if(count($user->diaryEntries) < 5)				
            	<div class="day">
                    @if($user->hasUnfinishedEntries())
	                    <a class="button secondary radius disabled" title="Schließe zunächst den vorherigen Eintrag ab!">
	                    	<span>Neuer Eintrag</span>
		                	<i class="fa fa-plus-square fa-5x"></i>
	                    </a>
	                @else
	                    <a class="button success radius" href="{{ URL::to('diary/entry/') }}">
	                    	<span>Neuer Eintrag</span>
		                	<i class="fa fa-plus-square fa-5x"></i>
	                    </a>
                    @endif
                </div>
            @endif
            </div>
        </div>
    </div>
</div>
@stop
