<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

</head>

<body>
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
        <div class="top-right links">
            @auth
            <a href="{{ url('/home') }}">Home</a> @else
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a> @endauth
        </div>
        @endif

        <div class="content">
            <div class="title m-b-md">
                Laravel
            </div>

            <div class="links">
                <a href="https://laravel.com/docs">Documentation</a>
                <a href="https://laracasts.com">Laracasts</a>
                <a href="https://laravel-news.com">News</a>
                <a href="https://nova.laravel.com">Nova</a>
                <a href="https://forge.laravel.com">Forge</a>
                <a href="https://github.com/laravel/laravel">GitHub</a>
            </div>
        </div>
    </div>




    <div class="container">
        <h1> Dyanmic Accordion </h1>
        <div class="accordion" id="accordionExample">
            @php $status = true; 
@endphp @foreach ($contents as $count => $item) @php $dunamic_id = rand(555,369); if ($status == true)
            { $area_markup = "true"; $in_markup = "in" ; $status = false;}else{ $area_markup = "false"; $in_markup = "";
            } 
@endphp
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne_{{$dunamic_id}}" aria-expanded="{{$area_markup}}"
                            aria-controls="collapseOne">
                                  {{ $item->title }}
                                </button>
                    </h5>
                </div>

                <div id="collapseOne_{{$dunamic_id}}" class="collapse {{$in_markup}}" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        {{ $item->content }}
                    </div>
                </div>
            </div>
            @endforeach


            <div class="card">
                <div class="card-header" id="headingThree">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false"
                            aria-controls="collapseThree">
                  Collapsible Group Item #3
                </button>
                    </h5>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute,
                        non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf
                        moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
                        Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                        Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic
                        synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                    </div>
                </div>
            </div>
        </div>

        <br> <br>
        <div class="row">
            <h1>Dynamic Tab</h1>



            <div class="tabpanel">

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">

                    @foreach($contents as $count => $serves)

                    <li class="nav-item" role="presentation" @if($count==0 ) class="active" @endif>
                        <a class="nav-link" href="#tab-{{ $serves->id }}" aria-controls="#tab-{{ $serves->id }}" role="tab" data-toggle="tab">{{ $serves->title }}</a>
                    </li>

                    @endforeach

                </ul>

                <!-- Tab panes -->
                <div class="tab-content">

                    @foreach($contents as $count => $serves)

                    <div role="tabpanel" @if($count==0 ) class="tab-pane active" @else class="tab-pane" @endif id="tab-{{ $serves->id }}">

                        <h2>{{ $serves->title }}</h2>

                        <p>{{ $serves->content }}</p>

                    </div>

                    @endforeach

                </div>

            </div>





        </div>


















    </div>

    <script src="{{asset('js/app.js')}}"></script>

</body>

</html>