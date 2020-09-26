@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 shadow-lg p-3 mt-4 mb-3 bg-white rounded">
            <div class="card" style="border: none;">
                <div class="card-header" id="gradient" style="color: #ffffff; font-size: 15px; font-weight: bold;">Креирај нов пост</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="/threads">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="channel_id">Избери канал:</label>
                            <select name="channel_id" id="channel_id" class="form-control border-primary" required>
                                <option value=''>канал.. .</option>

                                @foreach ($channels as $channel)
                                    <option value="{{ $channel->id }}" {{ old('channel_id') == $channel->id ? 'selected' : '' }}>
                                        {{ $channel->name}}
                                    </option>
                                @endforeach

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="title">Наслов:</label>
                            <input type="text" class="form-control border-primary" id="title" value="{{ old('title') }}" name="title" required>
                        </div>

                        <div class="form-group">
                            <label for="body">Содржина:</label>
                            <!-- <textarea name="body" class="form-control border-primary" id="body" rows="8" required>{{ old('body') }}</textarea> -->
                            <wysiwyg name="body"></wysiwyg>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" id="gradient">Објави</button>
                        </div>

                        @if (count($errors))
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection