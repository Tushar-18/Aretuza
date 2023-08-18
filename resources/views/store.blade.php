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


      <div class="box-border games">
         <div class="games-img m-3">
            <img src="images/god_of_war.jpg" alt="errer">
         </div>
         <div class="games-name">
            <p class="big">God Of War</p>
            <p class="small text-white"> price: ₹400</p>
         </div>
      </div>


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
          <div class="games-name">
              <p class="big">Watch Dogs 2</p>
              <p class="small text-white"> price: <del style="margin-right: 10px">₹3599</del>₹524.85</p>
          </div>
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

      <div class="box-border games">

         <div class="games-img">
            <img src="images/pngwing.com.png" alt="errer">

         </div>
         <div class="games-name">
            <p class="big">Sea of Thieves</p>
            <p class="small text-white"> price: ₹400</p>
         </div>
      </div>

      <div class="box-border games">
         <div class="games-img m-3">
            <img src="images/valorant.avif" alt="errer">
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
         <div class="games-img">
            <img src="images/ark2.avif" alt="errer">
         </div>
         <div class="games-name">
            <p class="big">ARK</p>
            <p class="small text-white"> price: free</p>
         </div>
      </div>
    </div>

@endsection
</body>
</html>