@extends('layouts/navbar')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    @vite('resources/css/app.css')
</head>

<body class=" ">
    @section('content')
        <div class="bg-zinc-900 p-5">
            <div>
                <p class="text-5xl text-white p-5">Library</p>
            </div>
            <div class="box-border first-part bg-zinc-800 rounded-md">

                @foreach ($data as $d)
                    @if (session('email') == $d['email'])
                        <a href="{{ URL::to('/') }}/items_a/{{ $d['game_id'] }}">
                            <div class="box-border games">
                                <div class="games-img m-3">
                                    <img src="{{ URL::to('/') }}/images/game_pic/{{ $d['game_pic'] }}" alt="errer">
                                </div>
                                <div class="games-name">
                                    <p class="big">{{ $d['game_name'] }}</p>
                                        <a href="{{URL::to('/')}}/download_pdf/{{$d['game_id']}}"
                                            class="bg-red-700 items-center my-2 flex w-full h-10 justify-center rounded-lg text-white hover:bg-red-800 hover:transition delay-75 duration-300 ease-in-out hover:-translate-y-1">Invoice</a>
                                </div>
                            </div>
                        </a>
                    @endif
                @endforeach
            </div>
        </div>
    @endsection
</body>

</html>
