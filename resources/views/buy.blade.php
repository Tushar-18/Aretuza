@extends('layouts/navbar')
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Document</title>
     @vite('resources/css/app.css')
</head>
<body>
     @section("content")
<div class="bg-zinc-900 p-4">
     <div class="p-10 bg-zinc-800">
<form>
     <div class="w-3/5 align-middle bg-zinc-700 rounded p-5 m-28 ml-72">
          <div class="flex w-auto p-12 bg-center">
               <div class="align-middle justify-center flex">
                    <img src="images/profile.png" class="h-52 w-52 ml-60 rounded-full hover:shadow-xl hover:shadow-zinc-600  ">
               </div>
          </div>
     <div class="relative z-0 mb-6 group">
         <input type="email" name="floating_email" id="floating_email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-200 dark:focus:border-white focus:outline-none focus:ring-0 focus:border-red-700 peer" placeholder=" " required />
         <label for="floating_email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-200 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-white peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Name on Card</label>
     </div>
     <div class="relative z-0 w-full mb-6 group">
         <input type="text" name="floating_password" id="floating_password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-200 dark:focus:border-white focus:outline-none focus:ring-0 focus:border-black peer" placeholder=" " required />
         <label for="floating_password" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-200 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-black peer-focus:dark:text-white peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Card Number</label>
     </div>
     <div class="relative z-0 w-full mb-6 group">
         <input type="password" name="repeat_password" id="floating_repeat_password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-200 dark:focus:border-white focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
         <label for="floating_repeat_password" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-200 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-white peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Confirm password</label>
     </div>

     <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-52 hover:shadow-md hover:shadow-zinc-600 px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 btn-hover">BUY NOW</button>
   </form>
</div>
</div>
</div>
@endsection
</body>
</html>