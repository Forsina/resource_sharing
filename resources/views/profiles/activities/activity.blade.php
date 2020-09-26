{{-- 
<div class="card mb-3">
    <div class="card-header">
        <div class="level">
            <span class="flex">
                {{ $heading }}
            </span>
        </div>
    </div>
    <div class="card-body">
        {{ $body }}
    </div>
</div>
--}}

<div class="card mb-3 shadow-lg" style="border: none; border-radius: 15px;">
    <!-- <div class="shadow-lg p-3 mb-3 bg-white rounded"> -->
    <div class="card-body">
        <h5 class="card-title">{{ $heading }}</h5>
        <p class="card-text">{{ $body }}</p>
    </div>
</div>