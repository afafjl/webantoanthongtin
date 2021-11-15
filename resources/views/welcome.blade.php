
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Home</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <style>
            
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .left {
                text-align: left;
            }
            .right {
                text-align: right;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            
        </style>
    </head>
            
    <body>

    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">

                   <strong> Web An Ninh</strong>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <form action="/search" method="POST" role="search">
                        {{ csrf_field() }}
                        <div class="input-group">
                            <input type="text" class="form-control" name="q"
                                placeholder="Search"> <span class="input-group-btn">
                                <button type="submit" class="btn btn-default">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
                            </span>
                        </div>
                    </form>
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        <div class="">
                        @if (Route::has('login'))
                            <div class="top-right links">
                                @auth
                                    <a href="/profile/{{auth()->user()->id}}">Profile</a>
                                @else
                                    <a href="{{ route('login') }}">Login</a>

                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}">Register</a>
                                    @endif
                                @endauth
                            </div>
                        @endif

                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        
         
            <div class="ml-5">
                <div class="p-3 pt-4"><h5>Posts</h5></div>

                    @foreach($posts as $p)
                        <div class=" row p-7">
                                <div class="col-1 right ">
                                       <a href="/profile/{{ $p->user_id }} "> <img src="{{$p->user->profile->profileImage() }} " class="rounded-circle w-100" style="max-width: 28px;">
                                       </a>
                                </div>
                                <div class="col-2 left">
                                        <div class="font-weight-bold">
                                            <a href="/profile/{{ $p->user_id }}">
                                                <span class="text-dark">{{ $p->user->username }}</span>
                                            </a>     
                                        </div>
                                        <a class="p-1" href="/p/{{ $p->id }}">   
                                            <div class="text-dark"><strong>{{ $p->title }}</strong></div>
                                            <div class="text-dark">{{ $p->description }}</div>
                                        </a>   
                                </div>


                        </div>
                    @endforeach    
                        
                
              </div>
            </div>
      
    </body>
</html>
