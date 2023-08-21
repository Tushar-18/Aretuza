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
<body>
   @section("content")
   <div class="bg-zinc-900 p-5">
<div>
     <p class="text-5xl text-white  p-5">Wishlist</p>
</div>
<div class="box-border first-part bg-zinc-800 rounded-md">
     
   <div class="box-border games">
      <div class="games-img m-3">
         <img src="images/Remnant.jpg" alt="errer">
      </div>
      <div class="games-name">
         <p class="big">Remnant</p>
         <p class="small text-white"> price: ₹400</p>
         <a href="" class="bg-red-700 items-center my-2 flex w-full h-10 justify-center rounded-lg text-white hover:bg-red-800 hover:transition delay-75 duration-300 ease-in-out hover:-translate-y-1">Remove</a>
      </div>
      
   </div>


   <div class="box-border games">
      <div class="games-img m-3">
        <img src="images/Destiny_2.jpg" alt="errer">
      </div>
      <div class="games-name">
         <p class="big">Destiny 2</p>
         <p class="text-white"> price: ₹400</p>
         <a class="bg-red-700 items-center my-2 flex w-full h-10 justify-center rounded-lg text-white hover:bg-red-800 hover:transition delay-75 duration-300 ease-in-out hover:-translate-y-1" href="">Remove</a>
      </div>
  
   </div>

 </div>
</div>
 @endsection
</body>
</html>