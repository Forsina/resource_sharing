@extends('layouts.app')

@section('head')
    <link rel="stylesheet" href="/css/vendor/jquery.atwho.css">
@endsection

@section('content')

<!-- <thread-view :initial-replies-count="{{ $thread->replies_count }}" inline-template> -->
    <thread-view :thread="{{ $thread }}" inline-template>

    <div class="container">
        <div class="row">
            <div class="col-md-9" v-cloak>
                @include ('threads.question')
                <replies @added="repliesCount++" @remove="repliesCount--"></replies>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <p>
                            Постот е објавен пред {{ $thread->created_at->diffForHumans() }} од
                            <a href="#">{{ $thread->creator->name }}</a>, и моментално има
                                <span v-text="repliesCount"></span> {{ Str::plural('comment', $thread->replies_count) }}.
                        </p>

                        <p>
                            <subscribe-button :active="{{ json_encode($thread->isSubscribedTo) }}" v-if="signedIn"></subscribe-button>

                                <button class="btn btn-default"
                                        v-if="authorize('isAdmin')"
                                        @click="toggleLock"
                                        v-text="locked ? 'Unlock' : 'Lock'"></button>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</thread-view>
@endsection