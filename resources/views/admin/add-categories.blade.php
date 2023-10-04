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
        Add Categories
      </h4>

      <div class="mt-4">
        <div class="p-6  bg-white rounded-md shadow-md ">
          <h2 class="text-lg font-semibold text-gray-700 capitalize">
            Add Categories
          </h2>

          <form method="post" action="{{URL::to('/')}}/admin/add-categories_a">
            @csrf
            <div class="gap-6 mt-4 sm:grid-cols-2">
              <div class="flex justify-between items-center">
                <div class="w-full">
                    <label class="text-gray-700" for="username">Category Name</label>
                <input
                  v-model="user.username"
                  class="w-2/4 mt-2 pl-2 border h-8 border-gray-400 outline-none rounded-md focus:border-indigo-600 focus:ring focus:ring-opacity-40 focus:ring-indigo-500"
                  type="text"
                  name="description"
                >
                </div>
                <input type="submit"
                class="px-5 py-2 text-center border-blue-500 border text-blue-500 rounded transition duration-300 hover:bg-blue-700 hover:text-white focus:outline-none" value="Add">
              </div>
              <span style="color:red">
          @error('description')
              {{ $message }}
          @enderror
      </span> 
            </div>
       
             
          </form>
        </div>
      </div>

      <div class="p-6 mt-10 bg-white rounded-md shadow-md ">
                <ul >
                   @foreach ($data as $d)
                     <li>{{$d['catagories']}}</li>
                   @endforeach
                </ul>
             </div>
    </div>
  </div>
  @endsection
</body>
</html>