@extends('layouts/navbar')
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Document</title>
     <script src="https://cdn.tailwindcss.com"></script>
     @vite('resources/css/app.css')
</head>
<body>
     @section("content")
     <div class="bg-zinc-900 h-full p-44 w-full">
          <div class="bg-zinc-800 h-full w-full rounded-3xl">
               <div class="flex items-center justify-center">
                    <img src="images/profile.png" alt="network not comeing" class="rounded-full bg-white h-52 w-52 -mt-24">
               </div>
               <div class="p-10 flex align-middle justify-center  ">
                    <form class="w-full">
                         <div class="md:flex md:items-center mb-6">
                           
                           <div class="w-full">
                             <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-full-name" type="text" placeholder="Name">
                           </div>
                         </div>
                         <div class="md:flex md:items-center mb-6">
                           
                           <div class="w-full">
                             <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-password" type="date" placeholder="DOB">
                           </div>
                         </div>

                         <div class="md:flex md:items-center mb-6">
                           
                              <div class="w-full">
                                <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-password" type="file">
                              </div>
                            </div>
                       
                         <button class="shadow bg-purple-500 w-full btn-hover hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="button">
                              Sign Up
                         </button>
                       </form>
               </div>
          </div>
     </div>
     @endsection
</body>
</html>