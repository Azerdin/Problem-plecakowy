<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="{{ asset('ikon.jpg') }}">
        <title>Problem plecakowy</title>
        
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script>
    
        $(document).ready(function(){
            
            $('button').submit(function(){
                if($('input').val()!="") 
                {
                    $('button').hide();
                    
                }
            });
            $('select').change(function(){
                var str = "";
                $('select option:selected').each(function(){
                    $(".kurier").empty();
                    var info = $('select option:selected').attr("id");
                    var id = $('select option:selected').val();
                    $(".kurier").append("Imie i nazwisko: ");
                    $(".kurier").append('<b>'+$('select option:selected').text()+'</b>');
                    $(".kurier").append(info);



                });
            }).trigger('change');

            $('select').on(
            {
                'blur' : function()
                {
                    $(this).animate(
                    {
                        width: "200px" 
                    },
                    {
                        duration: 100,
                        ease: 'linear'
                    }
                );
                },
                'focus' : function()
                {
                    $(this).animate(
                        {
                        width: "600px" 
                    },
                    {
                        duration: 100,
                        ease: 'linear'
                    }
                );
                }
            });
            $('input[type="text"]').on(
            {
                'blur' : function()
                {
                    $(this).animate(
                    {
                        width: "200px" 
                    },
                    {
                        duration: 100,
                        ease: 'linear'
                    }
                );
                },
                'focus' : function()
                {
                    $(this).animate(
                        {
                        width: "600px" 
                    },
                    {
                        duration: 100,
                        ease: 'linear'
                    }
                );
                }
            });
           

        });

        </script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <style>
            html, body {
                background-image: url({{asset('background.jpg')}});
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;

                margin: 0;
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
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            select
            {
                width: 200px;
                height: 40px;
                font-size: 20px;
                border-radius: 20px;
                padding-left: 10px;
                background-color: rgb(255,255,255,0.8);
            }
            select:hover
            {
                width: 200px;
                height: 40px;
                font-size: 20px;
                border-radius: 20px;
                padding-left: 10px;
                background-color: rgb(255,255,255,0.8);
                box-shadow: 0px 0px 17px 0px rgba(255,255,255,0.75);
            }
            .titleOfSelect
            {
                font-size: 30px;
            }
            img
            {
                width: 150px;
                height: 150px;
            }
            .kurier
            {
                font-size: 25px;
                text-align: left;
            }
            button
            {
                height: 50px;
                width: 50px;
                border-radius: 50px;
                background-color: white;
                border-color: grey;
                color: #fff;
                background-color: rgb(255,255,255,0.8);
                border: none;
            }
            button:hover, button:focus
            {
                height: 50px;
                width: 50px;
                border-radius: 50px;
                background-color: white;
                border-color: grey;
                color: #fff;
                background-color: rgb(255,255,255,0.8);
                border: none;
                box-shadow: 0px 0px 17px 0px rgba(255,255,255,0.75);
            }
            input[type="text"]
            {
                width: 200px;
                height: 40px;
                font-size: 20px;
                border-radius: 20px;
                padding-left: 10px;
                background-color: rgb(255,255,255,0.8);
                border: none;
                
            }
            input[type="text"]:hover, input[type="text"]:focus
            {
                width: 200px;
                height: 40px;
                font-size: 20px;
                border-radius: 20px;
                padding-left: 10px;
                background-color: rgb(255,255,255,0.8);
                border: none;
                box-shadow: 0px 0px 17px 0px rgba(255,255,255,0.75);
            }
            form
            {
                font-size: 20px;
            }
            img[src="{{ asset('szukaj.png')}}"]
            {
                width: 30px;
                height: 30px;
            }
            .title
            {
                color: white;
            }
            div
            {
                color: white;
            }
            .navbar
            {
                background-color: rgb(255,255,255,0.7);
            }
            .nav-item
            {
                font-weight: bold;
            }
            .btn
            {
                width: 100px;
            }
            table, tr, td
            {
                border: 1px solid white;
            }
        </style>
    </head>
    <body>
    <nav class="navbar navbar-expand-lg">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('welcome') }}">Strona główna</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('result') }}">Wyniki</a>
                </li>
            </ul>
        </div>
    </nav>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            <div class="content">
                <div class="title m-b-md">
                    Problem plecakowy
                </div>
                @yield('content')