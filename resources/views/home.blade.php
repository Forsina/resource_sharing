@extends('layouts.app')

@section('content')

<script>
//Using setTimeout to execute a function after 5 seconds.
setTimeout(function () {
   //Redirect with JavaScript
   window.location.href= '/';
}, 1000);
</script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" id="gradient" style="color: #ffffff; font-size: 15px; ">Добро дојдовте!</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Вие сте најавени!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
