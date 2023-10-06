@extends('layouts/navbar')
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Document</title>
     <script src="https://cdn.tailwindcss.com"></script>
     {{-- <link rel="stylesheet" href="css/edit.css"> --}}
     @vite('resources/css/app.css')
</head>
<body>
     @section("content")
     <p class="text-7xl pl-20 text-white bg-zinc-900 pt-7">Change Password</p>
     <div class="bg-zinc-900 h-full px-96 py-40 w-full">
      
          <div class="bg-zinc-800 h-full w-full rounded-3xl">
               <div class="flex items-center justify-center">
                    <img src="images/profile_pictures/{{session('pic')}}" alt="network not comeing" class="rounded-full hover:shadow-xl hover:shadow-zinc-600 bg-zinc-600 -mt-20 h-52 w-52">
               </div>
               <div class="p-10 flex align-middle justify-center  ">
                    <form action="change_password" method="POST" class="w-full">
                      @csrf 
                        <div class="md:flex md:items-center mb-6">   
                           <div class="w-full">
                             <input class="bg-zinc-700 appearance-none border-2 border-zinc-600 rounded w-full py-2 px-4 text-zinc-200 leading-tight focus:outline-none focus:bg-zinc-600 focus:border-zinc-500" id="inline-full-name" type="password" name="old_pwd" placeholder="old Password">
                             <span style="color:red">
                              @error('old_pwd')
                                  {{ $message }}
                              @enderror
                          </span>
                           </div>
                         </div>
                         <div class="md:flex md:items-center mb-6">
                           
                           <div class="w-full">
                             <input class="bg-zinc-700 appearance-none border-2 border-zinc-600 rounded w-full py-2 px-4 text-zinc-200 leading-tight focus:outline-none focus:bg-zinc-600 focus:border-zinc-500" id="inline-full-name" type="password" name="pwd" placeholder="New Password">
                             <span style="color:red">
                              @error('pwd')
                                  {{ $message }}
                              @enderror
                          </span>
                           </div>
                         </div>
                         <div class="md:flex md:items-center mb-6">
                           
                              <div class="w-full">
                                <input class="bg-zinc-700 appearance-none border-2 border-zinc-600 rounded w-full py-2 px-4 text-zinc-200 leading-tight focus:outline-none focus:bg-zinc-600 focus:border-zinc-500" id="inline-full-name" type="password" name="pwd_confirmation" placeholder="Confirm Password">
                                <span style="color:red">
                                 @error('pwd_confirmation')
                                     {{ $message }}
                                 @enderror
                             </span>
                              </div>
                            </div>
                         <button class="shadow bg-blue-600 w-full btn-hover hover:bg-blue-700 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                              Update
                         </button>
                       </form>
               </div>
          </div>
     </div>
     @endsection
</body>
</html>