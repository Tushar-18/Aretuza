@extends('../layouts/admin-sidebar')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>add games</title>
    @vite('resources/css/app.css')
</head>
<body>
    @section('content')
  <div class="w-full flex flex-col items-center overflow-y-auto">
    <div class="mt-8 w-9/12">
      <h4 class="text-gray-600">
        Allocate Categories
      </h4>

      <div class="mt-4">
        <div class="p-6  bg-white rounded-md shadow-md ">
          <h2 class="text-lg font-semibold text-gray-700 capitalize">
            Allocate Categories
          </h2>

          <form method="post" action="{{URL::to('/')}}/admin/game-list">
            @csrf
            <div class="flex">
                            <div class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                <div class="flex items-center">
                                    <div class="h-10 w-10">
                                        <img src="../Images/Destiny_2.jpg" alt="error">
                                    </div>
                                </div>
                            </div>
                            <div class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                <div class="text-sm leading-5 text-blue-900">Destiny 2</div>
                            </div>
                            <div
                                class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">
                                <del>₹799</del> ₹449</div>
                            <div
                                class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">
                                <textarea name="" id="" cols="20" rows="1">hfdufh</textarea></div>
                            
                            <div
                                class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-blue-900 text-sm leading-5">
                                September 12</div>
                            
            </div>     
                        
       
             
          </form>
        </div>
      </div>

      <div class="p-6 mt-10 bg-white rounded-md shadow-md ">
                <ul >
                    <li><input type="checkbox" name="" id=""> Action</li>
                    <li><input type="checkbox" name="" id=""> Horror</li>
                    <li><input type="checkbox" name="" id=""> Puzzle</li>
                </ul>
                 <div class="mt-6">
                    <a href="{{URL::to('/')}}/admin/game-list"
                              class="px-5 py-2  border-blue-500 border text-blue-500 rounded transition duration-300 hover:bg-blue-700 hover:text-white focus:outline-none">Alloacte</a>
                 </div>
             </div>
             
    </div>
  </div>
  @endsection
</body>
</html>