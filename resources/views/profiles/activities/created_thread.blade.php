@component('profiles.activities.activity')
    @slot('heading')

    {{--
    	{{ $profileUser->name }} published
        <a href="{{ $activity->subject->path() }}">{{ $activity->subject->title }}</a>
    --}}

    	<p style="font-weight: bold">Објави 
        	<a href="{{ $activity->subject->path() }}">{{ $activity->subject->title }}</a>
        </p>
    @endslot

    @slot('body')
        {{ $activity->subject->body }}
    @endslot
@endcomponent