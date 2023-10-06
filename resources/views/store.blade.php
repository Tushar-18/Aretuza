@extends('layouts/navbar')
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Document</title>
   <script src="https://cdn.tailwindcss.com"></script>
   <link rel="stylesheet" href="css/style.css">
</head>
<body>
   @section("content")
   
    <div class="main-title">
    <p class="title ">Popular Games</p>
    {{-- <img src="Images/zombie.png" class="zombie ml-48 h-24 w-20 -mt-16"  alt=""> --}}
      <p class="line"></p>

      {{-- <div class="pt-20">
         <p class="p-3 w-20 text-lg text-white bg-none border rounded-full">Library</p>
      </div> --}}
   </div>
    <div class="box-border first-part w-full">
      @foreach ($popular as $p)
         
      <a href="items">
      <div class="box-border games">
         <div class="games-img m-3">
            <img src="images/Remnant.jpg" alt="errer">
         </div>
         <div class="games-name">
            <p class="big">Remnant</p>
            <p class="small text-white"> price: ₹400</p>
         </div>
      </div></a>
      @endforeach


      {{-- <div class="box-border games">
         <div class="games-img m-3">
            <img src="images/god_of_war.jpg" alt="errer">
         </div>
         <div class="games-name">
            <p class="big">God Of War</p>
            <p class="small text-white"> price: ₹400</p>
         </div>
      </div> --}}


      <div class="box-border games">
         <div class="games-img m-3">
            <img src="images/red_dead_redemption.jpg" alt="errer">
         </div>
         <div class="games-name">
            <p class="big">Red Dead Redemption</p>
            <p class="small text-white"> price: ₹400</p>
         </div>
      </div>
      <div class="box-border games">
          <div class="games-img m-3">
              <img src="images/watch_dogs_2.jpg" alt="errer">
          </div>
          {{-- <div class="games-name">
              <p class="big">Watch Dogs 2</p>
              <p class="small text-white"> price: <del style="margin-right: 10px">₹3599</del>₹524.85</p>
          </div> --}}
      </div>

    </div>

    
    <div class="main-title">
        <p class="title ">New release </p>
       
          <p class="line"></p>
    
          {{-- <div class="pt-20">
             <p class="p-3 w-20 text-lg text-white bg-none border rounded-full">Library</p>
          </div> --}}
       </div>
    <div class="box-border first-part w-full">
      @foreach ($id as $i)
         
      @if ($i['status'] == 'Active')
      <a href="{{ URL::to('/') }}/items_a/{{ $i['game_id'] }}">
          <div class="box-border games">
              <div class="games-img m-3">
                  <img src="{{ URL::to('/') }}/images/game_pic/{{ $i['game_pic'] }}" alt="errer">
              </div>
              <div class="games-name">
                  <p class="big">{{ $i['game_name'] }}</p>
                  {{-- <p class="small text-white">{{$d['description']}}</p> --}}
                  @if ($i['game_price'] == '0.00')
                      <label class="pt-5 text-lg">Price <label class=" text-green-500">Free</label></label>
                  @else
                      {{-- <p class="text-sm  text-green-400"> offers {{ $d['offers']}}%</p> --}}
                      {{-- <p class="text-sm  text-white"> price: ₹{{ $d['game_price'] }}</p> --}}
                  @endif
                  @if ($i['offers'] == '0.00')
                  @else
                  <p class="text-sm  text-green-400"> offers {{ $i['offers']}}%</p>
                  @endif
              </div>
          </div>
      </a>
      @endif
      @endforeach

      {{-- <div class="box-border games">
         <div class="games-img m-3">
            <img src="images/valorant1.avif" alt="errer">
         </div>
         <div class="games-name">
            <p class="big">Valorant</p>
            <p class="small text-white"> price: free</p>
         </div>
      </div>

      <div class="box-border games">
         <div class="games-img m-3">
            <img src="images/Destiny_2.jpg" alt="errer">
         </div>
         <div class="games-name">
            <p class="big">Destiny 2</p>
            <p class="small text-white"> price: free</p>
         </div>
      </div>

      <div class="box-border games">
         <div class="games-img m-3">
            <img src="images/ark2.avif" alt="errer">
         </div>
         <div class="games-name">
            <p class="big">ARK</p>
            <p class="small text-white"> price: free</p>
         </div>
      </div> --}}
    </div>

@endsection
</body>
</html>