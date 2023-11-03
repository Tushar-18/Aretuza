@extends('layouts/navbar')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    @vite('resources/css/app.css')

    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    @section('content')
       
        <div class="main-title">
            <p class="title ">Top Games</p>
            <img src="Images/zombie.png" class="zombie ml-48 h-24 w-20 -mt-16" alt="">
            <p class="line"></p>
        </div>
        <div class="box-border first-part w-full">
            @foreach ($game as $d)
          
            <a href="{{ URL::to('/') }}/items_a/{{ $d->game_id }}">
                <div class="box-border games">
                    <div class="games-img m-3">
                        <img src="{{ URL::to('/') }}/images/game_pic/{{ $d->game_pic }}" alt="errer">
                    </div>
                    <div class="games-name">
                        <p class="big">{{ $d->game_name }}</p>
                        {{-- <p class="small text-white">{{$d['description']}}</p> --}}
                        @if ($d->game_price == '0.00')
                            <label class="pt-5 text-lg">Price <label class=" text-green-500">Free</label></label>
                        @else
                            {{-- <p class="text-sm  text-green-400"> offers {{ $d['offers']}}%</p> --}}
                            {{-- <p class="text-sm  text-white"> price: ₹{{ $d['game_price'] }}</p> --}}
                        @endif
                        @if ($d->offers == '0.00')
                        @else
                        <p class="text-sm  text-green-400"> offers {{ $d->offers}}%</p>
                        @endif
                    </div>
                </div>
            </a>
            
                
            @endforeach
        </div>
    @endsection
</body>

</html>
