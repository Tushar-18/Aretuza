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
   @section("content")
   <div class="images">
      <div class="box-border bg-gradient-to-r from-black p1">
         {{-- <img src="Images/spider-man.png" class="w-32 h-40 -mt-9 spider" alt=""> --}}
         <div class="text-large box-border text-white">
            <img src="Images/white-logo.png" alt="error">
         </div>
         <div class="text-small box-border text-white">
            Your Ultimate Horizon Adventure awaits! Explore the vibrant open world landscapes of Mexico with limitless, fun driving action in the world's greatest cars.
       </div>
      </div>
    </div>
    <div class="main-title">
    <p class="title ">Top Games</p>
    <img src="Images/zombie.png" class="zombie ml-48 h-24 w-20 -mt-16"  alt="">
      <p class="line"></p>
   </div>
    <div class="box-border first-part w-full">
      @foreach ($game as $d)
         
         <a href="{{URL::to('/')}}/items_a/{{$d['game_id']}}">
         <div class="box-border games">
            <div class="games-img m-3">
               <img src="{{URL::to("/")}}/images/game_pic/{{$d['game_pic']}}" alt="errer">
            </div>
            <div class="games-name">
               <p class="big">{{$d['game_name']}}</p>
               {{-- <p class="small text-white">{{$d['description']}}</p> --}}
               <p class="text-sm  text-white"> price: ₹{{$d['game_price']}}</p>
            </div>
         </div></a>
      @endforeach
    </div>
@endsection
</body>
</html>