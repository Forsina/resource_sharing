@extends('layouts.app')

@section('content')

<div class="jumbotron jumbotron-fluid jumbo mt">
  	<div class="container">
    	<avatar-form :user="{{ $profileUser }}"></avatar-form>
  	</div>  		
</div>

	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8 col-md-offset-2">
				<div class="box-c">
        			<p class="custom-underline">Активности</p>
        		</div>
				@forelse ($activities as $date => $activity)
					<div>
						<h4 class="page-header ml">{{ $date }}</h4>
					</div>
					
					@foreach ($activity as $record)
						@if (view()->exists("profiles.activities.{$record->type}"))
							@include ("profiles.activities.{$record->type}", ['activity' => $record])
						@endif
					@endforeach
					@empty
                    	<p class="text-center">Корисникот сеуште не бил активен.</p>
				@endforelse

			</div>
		</div>
	</div>
@endsection