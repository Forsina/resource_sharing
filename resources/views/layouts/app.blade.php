<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('', 'Resource Sharing') }}</title>

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/0.11.1/trix.css">

    <!-- Scripts -->
    <script>
        window.App = {!! json_encode([
            'csrfToken' => csrf_token(),
            'user' => Auth::user(),
            'signedIn' => Auth::check()
        ]) !!};
    </script>
    <style>
        body { 
            padding-bottom: 100px; 
            background-color: #F7F8FC;
        }

        #card { padding: 0 0 0 20px; }
        
        .lCard { background: #ffff;
                  border: none; }
        .lCard:hover { background: #F6F6F6; }

        #gradient {background-image: linear-gradient(25deg, #2e6090 0%, #322783 100%);}

        #trending {
          /*background-color: #737373;*/
          background-image: linear-gradient(25deg, #2e6090 0%, #322783 100%);
          color: #ffff;
          text-align: right;
          border-radius: 25px;
          opacity: 0.9;

        }

        ul.noDecor {
          list-style-type: none;
          margin: 2em 0 0 0;
          padding: 0;

        }
        a.noDecorL{
          color: white;
          font-size: 15px;
          text-decoration-line: underline;
          line-height: 2px;
          

        }
        a.noDecorL:hover,
        a.noDecorL:active,
        a.noDecorL:visited {
          color: white;
          font-size: 16.5px;
        }


        
        #col { padding: 0; }
        .level { display: flex; align-items: center; }
        .level-item { margin-right: 1em; }
        .flex { flex: 1; }
        .mr-1 { margin-right: 1em; }
        .ml-a { margin-left: auto; }
        .ml { margin-left: -1em; }
        .mr-1 { margin-right: 1em; }
        [v-cloak] { display: none; }
        .avatar {
            padding:10px;
            vertical-align: middle;
            width: 175px;
            height: 175px;
            border-radius: 50%;
            border:5px solid #ffff;
            /*margin-right: 100px;*/
        }
        .bg-custom { 
            background-image: linear-gradient(25deg, #2e6090 0%, #322783 100%);
                                                    /*(10deg, #4b95db 0%, #322783 60%); */
            min-height: 70px;
        }

        #btn { background-color: #737373;
                color: #ffffff;
                border: none; }

        .jumbo { 
            background-image: linear-gradient(25deg, #2e6090 0%, #322783 100%);
                                                    /*(10deg, #4b95db 0%, #322783 60%); */
            color: white;
            margin-top: -6em;
            height: 25em; 
            padding-top: 8em;         
        }
        .ais-highlight/* > em*/ { background: yellow; font-style: normal; }

        .pill { width: 83px !important;
                padding: 0;
                 }
        .pill:hover{
          color: #ffffff;
        }

        a.title {
          color: #22292f;
          font-weight: bold;
        }
        a.title:hover {
          color: #22292f;
        }


/*------------------------------------*/
/*------ Basic Underline Styles ------*/
/*------------------------------------*/
.box-c { text-align: center; }
.box-c p { line-height:45px; }

.normal-underline,
.custom-underline {
  position: relative;
  display: inline-block;
  font-size: 24px;
  font-weight: 400;
  text-align: center;
}

.normal-underline,
.normal-underline:hover {
  color: #444;
  text-decoration: underline;
}

.custom-underline,
.custom-underline:hover,
.custom-underline:focus,
.custom-underline:active {
  color: #000;
  text-decoration: none;

}

.custom-underline::after {
  content: "";
  position: absolute;
}


/*--- Green Box (box-c) ---*/
.box-c .custom-underline::after {
  top: 100%;
  height: 3px !important;
  width: 40%;
  left: 35%;
  background-color: rgb(71, 138, 241);
    transition: 0.4s ease-out all .1s;
}

.box-c:hover .custom-underline::after {
  width: 120%;
  left: -10%;
    transition: 0.5s ease all;
}

.has-search .form-control {
    padding-left: 2.375rem;
}

.has-search .form-control-feedback {
    position: absolute;
    z-index: 2;
    display: block;
    width: 2.375rem;
    height: 2.375rem;
    line-height: 2.375rem;
    text-align: center;
    pointer-events: none;
    color: #aaa;
}

    </style>
    @yield('head')
</head>
<body>
    <div id="app">
        @include('layouts.nav')
        <main class="py-4"><!--  class="py-4" -->
            @yield('content')
            <flash message="{{ session('flash') }}"></flash>
        </main>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')
</body>
</html>
