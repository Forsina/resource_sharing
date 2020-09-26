@forelse ($threads as $thread)
<!-- <div class="col-md-8 col-md-offset-2"> -->

<div class="card p-3 lCard rounded" >
    <div class="row justify-content-center">
        <div id="col" class="col-md-1">
            <div id="card" class="card-body">
                <img src="{{ $thread->creator->avatar_path }}"
                     alt="{{ $thread->creator->name }}"
                     width="50"
                     height="50"
                     class="mr-1"
                     style="
                        border-radius: 50%;
                        border:1px solid #2C3687;">
            </div>
        </div>
        <div id="col" class="col-md-8">           
            <div id="card" class="card-body">
                <h5 class="card-title">
                    <a  class="title" href="{{ $thread->path() }}">
                        @if (auth()->check() && $thread->hasUpdatesFor(auth()->user()))
                                {{ $thread->title }}
                        @else
                            {{ $thread->title }}
                        @endif
                    </a>
                </h5>
                <h6 class="card-subtitle mb-3 text-muted">
                    Postet by: <a href="{{ route('profile', $thread->creator) }}">{{ $thread->creator->name }}</a>
                </h6>
                    <!-- <p class="card-text">{{ $thread->body }}</p> -->
                    <div class="body">{!! $thread->body !!}</div>
            </div>
        </div>
        <div id="col" class="col-md-3 text-right">
            <i class="fas fa-eye fa-sm mr-1" title="Прегледи"></i>{{ $thread->visits }}
            <i class="far fa-comment fa-sm mr-1 ml-2" title="Одговори"></i>{{ $thread->replies_count }}
            <a href="/threads/{{ $thread->channel_slug->name }}" type="button pill" class="btn btn-outline-info ml-2 mr-4 pill">{{ $thread->channel_slug->name }}</a>
        </div>
    </div>
</div>
@empty
    <p>There are no relevant results at this time.</p>
@endforelse