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
     <p class="text-7xl pl-20 text-white bg-zinc-900 pt-7">Profile</p>
     <div class="bg-zinc-900 h-full px-96 py-40 w-full">
      
          <div class="bg-zinc-800 h-full w-full rounded-3xl">
               <div class="flex items-center justify-center">
                    <img src="{{URL::to('/')}}/images/profile_pictures/{{$data['pic']}}" alt="network not comeing" class="rounded-full hover:shadow-xl hover:shadow-zinc-700 bg-zinc-600 -mt-20 h-52 w-52">
               </div>
               <div class="p-10 flex align-middle justify-center  ">
                    <form action="{{URL::to('/')}}/edit-profile" enctype="multipart/form-data" method="POST" class="w-full">
                      @csrf
                         <div class="md:flex md:items-center mb-6">
                           
                           <div class="w-full">
                             <input class="bg-zinc-700 focus:bg-zinc-700 appearance-none border-2 border-zinc-600 rounded w-full py-2 px-4 text-gray-200 leading-tight focus:outline-none focus:border-zinc-500" id="inline-full-name" type="text" name="name" placeholder="Name" value="{{$data['fullname']}}">
                             <span style="color:red">
                              @error('name')
                                  {{ $message }}
                              @enderror
                          </span>
                           </div>
                         </div>
                         <div class="w-full">
                              <input class="bg-zinc-700 focus:bg-zinc-700 appearance-none border-2 border-zinc-600 rounded w-full py-2 px-4 text-gray-200 leading-tight focus:outline-none focus:border-zinc-500" id="inline-full-name" type="email" name="em" placeholder="Email" value="{{$data['email']}}" readonly>
                              <span style="color:red">
                               @error('name')
                                   {{ $message }}
                               @enderror
                           </span>
                            </div><br>
                         <div class="md:flex md:items-center mb-6">
                           
                           <div class="w-full">
                             <input class="bg-zinc-700 appearance-none border-2 border-zinc-600 rounded w-full py-2 px-4 text-zinc-200 leading-tight focus:outline-none focus:bg-zinc-600 focus:border-zinc-500" id="inline-password" type="date" name="dob" placeholder="DOB" value="{{$data['birth_date']}}">
                             <span style="color:red">
                              @error('dob')
                                  {{ $message }}
                              @enderror
                          </span>
                           </div>
                         </div>  
                         <div class="md:flex md:items-center mb-6">
                           
                              <div class="w-full">
                                <input class="bg-zinc-700 appearance-none border-2 border-zinc-600 rounded w-full py-2 px-4 text-zinc-400 leading-tight focus:outline-none focus:bg-zinc-600 focus:border-zinc-500 " id="inline-password" name="profile" type="file">

                                <span style="color:red">
                                  @error('profile')
                                      {{ $message }}
                                  @enderror
                              </span>
                              </div>
                            </div>
                       
                         <button class="shadow bg-blue-600 w-full btn-hover hover:bg-blue-700 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit" name="btn_update">
                              Update
                         </button>
                       </form>
               </div>
          </div>
     </div>
     @endsection
</body>
</html>