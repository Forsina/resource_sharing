@component('profiles.activities.activity')

    @slot('heading')

    {{--
        <a href="{{ $activity->subject->favorited->path() }}">
            {{ $profileUser->name }} favorited a reply.
        </a>
    --}}
	    <p style="font-weight: bold">Фаворизира 
	    	<a href="{{ $activity->subject->favorited->path() }}">
	            одговор.
	        </a>
	    </p>
    @endslot

    @slot('body')
        {{ $activity->subject->favorited->body }}
    @endslot

@endcomponent