@extends('layouts.app')

@section('content')
<div style="padding: 40px; background-color: #ffff; margin-top: -2em;"> 
    <div class="row justify-content-center">
        <div class="col-md-8 .offset-md-1">
            @include('threads.list')

            {{ $threads->render() }}
        </div>
        <div class="col-md-3">

            <div class="level">
                <button class="btn btn-xs btn-default ml" aria-controls="multiCollapseExample1" style="color:#737373;"><i class="far fa-plus-square fa-2x"></i></button>
                <button class="btn btn-xs btn-default" aria-controls="multiCollapseExample1" style="color:#737373;"><i class="far fa-minus-square fa-2x"></i></button>

                <form method="GET" action="/threads/search" class="input-group">
                    <input type="text" class="form-control" placeholder="Бараш нешто?" name="q">
                    <div class="input-group-append">
                        <button class="btn btn-secondary" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </form>
                
            </div>

                <div style=" display: flex; align-items: center; justify-content: center;">
                   <!--  <button type="button" class="btn btn-primary mt-2" style="width: 21em;">Врати се назад</button>
                    <span class="badge badge-primary" >Primary</span> -->
                    <!-- <a href="/" id="btn" class="btn btn-primary mt-2" style="width: 18em;">Врати се назад</a> -->
                </div>
           
            {{--
            <div class="card">
                <div class="card-header">
                    Search
                </div>

                <div class="card-body">
                    <form method="GET" action="/threads/search">
                        <div class="form-group">
                            <input type="text" placeholder="Search for something..." name="q" class="form-control">
                        </div>

                        <div class="form-group">
                            <button class="btn btn-secondary" type="submit"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            --}}

            @if (count($trending))
                <div id="trending" class="card mt-3">
                    <div class="card-body">
                    	<h4 class="card-title">
                        	Популарно
                    	</h4>
                        <ul class="noDecor">
                           	@foreach ($trending as $thread)
                                    <li class="list-item" style="margin-bottom: 7px">
                                        <a class=" noDecorL" href="{{ url($thread->path) }}">
                                            {{ $thread->title }}
                                        </a>
                                    </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection