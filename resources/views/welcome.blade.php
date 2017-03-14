<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Ellipsonic</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
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

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .alert-success {
            	/*color: #004c00;*/
            	font-weight: bold;
            }

        </style>
    </head>
    <body>

        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/logout') }}">Logout</a>  
                    @else
                       <!-- <a href="{{ url('/login') }}">Login</a> -->
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

            <div class="content">

            <div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))

      <p class="alert alert-{{ $msg }}" style="text-align: center;">{{ Session::get('alert-' . $msg) }} </p>
      @endif
    @endforeach
  </div>

                <div class="title m-b-md company-logo">
                  <img src="{{URL::asset('/img/logo.png')}}" alt="profile Pic" height="300" width="300">
                </div>

                <div class="links">
                  @if (!Auth::check())
                    <a href="{{ url('/login') }}">Login</a>
                  @endif
                    <a href="{{ url('/apply-leave') }}">Apply Leave</a>
                    <a href="#">Leave status</a>
                    <a href="#">Available leave</a>
                </div>
            </div>
        </div>
    </body>
</html>
<script>
    $( "#close" ).click(function(){
    	$this.parent().remove();
    });
</script>