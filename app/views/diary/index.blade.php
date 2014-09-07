@extends('layout.framework-diary')

@section('page-content')
<div class="row">
    <div class="medium-8 medium-centered columns">
        <h2>Tagebuch</h2>
        <div class="row">
            @if (count($diaryPages) == 0)
                <div class="columns">
                    <p>Noch keine Einträge vorhanden</p>
                </div>
            @else
                @foreach ($diaryPages as $page)
                    <div class="columns small-12 medium-6 large-4">
                        Tag #{{ $page->getDates()->day }};
                    </div>
                @endforeach

            @endif

        </div>
    </div>
</div>
@stop
