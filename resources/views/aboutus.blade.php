@extends('layouts/navbar')
<!DOCTYPE html>
<html lang="en">
      <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Document</title>
            <link rel="stylesheet" href="css/items.css">
            <script src="https://cdn.tailwindcss.com"></script>
            @vite('resources/css/app.css')
      </head>
      <body>
  @section("content")

        <div class="bg-zinc-800 2xl:container 2xl:mx-auto lg:py-16 lg:px-20 md:py-12 md:px-6 py-9 px-4">
            <div class="flex flex-col lg:flex-row justify-between gap-8">
                <div class="w-full lg:w-5/12 flex flex-col justify-center">
                    <h1 class="text-3xl lg:text-4xl font-bold leading-9 text-gray-800 dark:text-white pb-4">About Us</h1>
                    <p class="font-normal text-base leading-6 text-gray-600 dark:text-white">{{$data['description']}}</p>
                </div>
                <div class="w-full lg:w-8/12">
                    <img class="w-full h-full" src="{{URL::to('/')}}/images/aboutus/{{$data['image']}}" alt="A group of People" />
                </div>
            </div>
    
            
        </div>
    

</body>
  @endsection   