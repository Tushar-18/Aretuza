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
     <div class="bg-zinc-900 h-full p-32 w-full ">
          <div class="bg-zinc-800 h-full w-full rounded-3xl">
               <div class="flex items-center justify-center">
                    <img src="images/profile.png" alt="network not comeing" class="rounded-full bg-white h-52 w-52 -mt-24">
               </div>
               <div class="block p-10">
                    <form class="w-full max-w-sm">
                         <div class="md:flex md:items-center mb-6">
                           <div class="md:w-1/3">
                             <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                               Full Name
                             </label>
                           </div>
                           <div class="md:w-2/3">
                             <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-full-name" type="text" value="Jane Doe">
                           </div>
                         </div>
                         <div class="md:flex md:items-center mb-6">
                           <div class="md:w-1/3">
                             <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-password">
                               Password
                             </label>
                           </div>
                           <div class="md:w-2/3">
                             <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-password" type="password" placeholder="******************">
                           </div>
                         </div>
                         <div class="md:flex md:items-center mb-6">
                           <div class="md:w-1/3"></div>
                           <label class="md:w-2/3 block text-gray-500 font-bold">
                             <input class="mr-2 leading-tight btn-hover" type="checkbox">
                             <span class="text-sm btn-hover">
                               Send me your newsletter!
                             </span>
                           </label>
                         </div>
                         <div class="md:flex md:items-center">
                           <div class="md:w-1/3"></div>
                           <div class="md:w-2/3">
                             <button class="shadow btn-hover bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="button">
                               Sign Up
                             </button>
                           </div>
                         </div>
                       </form>
               </div>
          </div>
     </div>
</body>
</html>