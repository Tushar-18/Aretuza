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
   @include("navbar")
   <div class="images">
      <div class="box-border bg-gradient-to-r from-black p1">
         <div class="text-large box-border text-white">
            Aretuza
         </div>
         <div class="text-small box-border text-white">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates, itaque non modi assumenda in maxime repellendus minima reprehenderit distinctio dolore, dolorum ut adipisci architecto aliquam velit iure quo! Doloribus, doloremque?
       </div>
      </div>
    </div>
    <div class="main-title">
    <p class="title">Top Games</p>
      <p class="line"></p>
   </div>
    <div class="box-border first-part">
      
      <div class="box-border games">
         <div class="games-img">
            <img src="images/Remnant.jpg" alt="errer">
         </div>
         <div class="games-name">
            <p>Remnant</p>
         </div>
      </div>


      <div class="box-border games">
         <div class="games-img">
            <img src="images/god_of_war.jpg" alt="errer">
         </div>
         <div class="games-name">
            <p>God of War</p>
         </div>
      </div>


      <div class="box-border games">
         <div class="games-img">
            <img src="images/red_dead_redemption.jpg" alt="errer">
         </div>
         <div class="games-name">
            <p>Red Dead Redemption 2</p>
         </div>
      </div>


      <div class="box-border games">
         <div class="games-img">
            <img src="images/the_hunter.png" alt="errer">
         </div>
         <div class="games-name">
            <p>The Hunter</p>
         </div>
      </div>
    </div>
    
</body>
</html>