@component('profiles.activities.activity')
    @slot('heading')

    {{-- 
        <a href="{{ $activity->subject->favorited }}">
            {{ $profileUser->name }}</a> replied to <a href="{{ $activity->subject->thread->path()}}">{{ $activity->subject->thread->title }}
        </a> 
    --}}

        <p style="font-weight: bold">Одговори на 
        	<a href="{{ $activity->subject->thread->path()}}">{{ $activity->subject->thread->title }}</a>
    	</p>

    @endslot

    @slot('body')
       {{ $activity->subject->body }}
    @endslot
@endcomponent