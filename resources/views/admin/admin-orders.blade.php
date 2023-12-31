@extends("../layouts/admin-sidebar")
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
     <div class="w-full flex flex-col items-center overflow-y-auto">
          <div class="mt-8 w-9/12">
            <h4 class="text-gray-600">
              Add Orders
            </h4>
      
            <div class="mt-4">
              <div class="p-6 bg-white rounded-md shadow-md ">
                <h2 class="text-lg font-semibold text-gray-700 capitalize">
                 Add Orders
                </h2>
      
                <form method="post" action="{{URL::to('/')}}/admin/add-games_a">
                  @csrf
                  <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                    <div>
                      <label class="text-gray-700" for="username">Game Name</label>
                      <input
                        v-model="user.username"
                        class="w-full mt-2 border h-8 border-gray-400 outline-none rounded-md focus:border-indigo-600 focus:ring focus:ring-opacity-40 focus:ring-indigo-500"
                        type="text"
                        name="game"
                      >
                      <span style="color:red">
                  @error('game')
                      {{ $message }}
                  @enderror
              </span>
                    </div>
      
                    <div>
                      <label class="text-gray-700" for="emailAddress">Price</label>
                      <input
                        v-model="user.email"
                        class="w-full mt-2 border h-8 border-gray-400 outline-none rounded-md focus:border-indigo-600 focus:ring focus:ring-opacity-40 focus:ring-indigo-500"
                        type="number"
                        name="price"
                      >
                      <span style="color:red">
                  @error('price')
                      {{ $message }}
                  @enderror
              </span>
                    </div>
                    <div>
                      <label class="text-gray-700" for="passwordConfirmation">Email</label>
                      <input
                        v-model="user.confirm"
                        class="w-full mt-2 border h-8 border-gray-400 outline-none rounded-md focus:border-indigo-600 focus:ring focus:ring-opacity-40 focus:ring-indigo-500"
                        type="email"
                      >
                      <span style="color:red">
                  @error('age')
                      {{ $message }}
                  @enderror
              </span>
                    </div>
                  </div>
      
                          <div class="grid grid-cols-1 space-y-2">
                              <label class="text-sm font-bold text-gray-500 tracking-wide">Description</label>
                                  <textarea class="text-base p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500" type="" placeholder="Descrption"></textarea>
                          </div>
                          <span style="color:red">
                  @error('dec')
                      {{ $message }}
                  @enderror
              </span>
                          <div class="grid grid-cols-1 space-y-2">
                                          <label class="text-sm font-bold text-gray-500 tracking-wide">Game Name</label>
                                        <div class="flex align-middle justify-center">
                                             <img src="../images/valorant.png" alt="" class="items-center h-96">
                                        </div>
                          </div>
                          <div>
                              <button type="submit" class="my-5 w-full flex justify-center bg-blue-500 text-gray-100 p-4  rounded-full tracking-wide
                                          font-semibold  focus:outline-none focus:shadow-outline hover:bg-blue-600 shadow-lg cursor-pointer transition ease-in duration-300">
                              Add
                          </button>
                          </div>
                </form>
              </div>
            </div>
          </div>
        </div>
@endsection
</body>
</html>