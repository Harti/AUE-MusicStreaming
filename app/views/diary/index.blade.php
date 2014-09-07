@extends('layout.framework-diary')

@section('page-content')
<div class="row">
    <div class="small-12 columns">
        <h2>Tagebuch</h2>
        <div class="row">
        	<?php $day = 0; ?>
            @foreach ($user->diaryEntries as $entry)
                <div class="small-6 medium-4 columns">
                	<div class="day">
	                    @if(!$entry->finished())
		                    <a class="unfinished" href="{{ URL::to('diary/entry/' . $entry->id) }}">
		                    	Tag <span>{{ ++$day }}</span>
		                    </a>
		                @else
		                	<div class="finished">
		                    	Tag <span>{{ ++$day }}</span>		                		
		                	</div>
	                    @endif
                    </div>
                </div>
            @endforeach
            
            @if(count($user->diaryEntries) < 5)
				<div class="small-6 medium-4 columns">					
                	<div class="day">
	                    @if($user->hasUnfinishedEntries())
		                	<div class="unfinished">
		                    	Tag <span>{{ ++$day }}</span>		                		
		                	</div>
		                @else
		                    <a href="{{ URL::to('diary/entry/') }}">
		                    	Tag <span>{{ ++$day }}</span>
		                    </a>
	                    @endif
                    </div>
				</div>
            @endif
        </div>
    </div>
</div>
@stop
