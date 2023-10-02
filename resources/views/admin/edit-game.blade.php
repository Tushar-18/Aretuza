@extends('../layouts/admin-sidebar')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit games</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite('resources/css/app.css')
</head>

<body>
    @section('content')
        <div class="w-full flex flex-col items-center bg-gray-100">
            <div class="mt-8 w-9/12">
                <h4 class="text-gray-600">
                    Edit Games
                </h4>

                <div class="mt-4">
                    <div class="p-6 bg-white rounded-md shadow-md ">
                        <h2 class="text-lg font-semibold text-gray-700 capitalize">
                            Edit Game
                        </h2>

                        <form action="{{ URL::to('/') }}/admin/edit-game_a" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                                <div>
                                    <input type="text" value="{{ $data['game_id'] }}" style="display: none;" name="id">
                                    <label class="text-gray-700" for="username">Game Name</label>
                                    <input v-model="user.username"
                                        class="w-full mt-2 border h-8 border-gray-400 outline-none rounded-md focus:border-indigo-600 focus:ring focus:ring-opacity-40 focus:ring-indigo-500"
                                        type="text" value="{{ $data['game_name'] }}" name="game">
                                    <span style="color:red">
                                        @error('game')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                                <div>
                                    <label class="text-gray-700" for="emailAddress">Price</label>
                                    <input v-model="user.email"
                                        class="w-full mt-2 border h-8 border-gray-400 outline-none rounded-md focus:border-indigo-600 focus:ring focus:ring-opacity-40 focus:ring-indigo-500"
                                        type="number" value="{{ $data['game_price'] }}" name="price">
                                    <span style="color:red">
                                        @error('price')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                                

                                <div>
                                    <label class="text-gray-700" for="passwordConfirmation">Age requirment</label>
                                    <input 
                                        class="w-full mt-2 border h-8 border-gray-400 outline-none rounded-md focus:border-indigo-600 focus:ring focus:ring-opacity-40 focus:ring-indigo-500"
                                        type="number" name="age_req" value="{{ $data['age_req'] }}">
                                    <span style="color:red">
                                        @error('age_req')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div>
                                    <label class="text-gray-700" for="passwordConfirmation">Give Discount in Percentage
                                    </label>
                                    <input 
                                        class="w-full mt-2 border h-8 border-gray-400 outline-none rounded-md focus:border-indigo-600 focus:ring focus:ring-opacity-40 focus:ring-indigo-500"
                                        type="text" name="offers" value="20">
                                        <span class="text-xs text-green-700">*with discount {{ $data['offers'] }}</span>
                                    <span style="color:red">
                                        @error('offers')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 space-y-2">
                                <label class="text-sm font-bold text-gray-500 tracking-wide">Description</label>
                                <textarea class="text-base p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500" name="dec"
                                    type="" placeholder="Descrption">
                {{ $data['description'] }}
                            </textarea>
                                <span style="color:red">
                                    @error('dec')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="grid grid-cols-1 space-y-2">
                                <label class="text-sm font-bold text-gray-500 tracking-wide">Attach Document</label>
                                <div class="flex items-center justify-center w-full">
                                    <label
                                        class="flex flex-col rounded-lg border-4 border-dashed w-full h-60 p-10 group text-center">
                                        <div class="h-full w-full text-center flex flex-col items-center justify-center  ">

                                            <div class="flex flex-auto max-h-48 w-2/5 mx-auto -mt-10">
                                                <img class="has-mask h-40 object-center"
                                                    src="{{ URL::to('/') }}/../Images/game_pic/{{ $data['game_pic'] }}"
                                                    alt="freepik image">
                                            </div>
                                            <a href="" id="" class="text-blue-600 hover:underline">select a
                                                file</a> </p>
                                        </div>
                                        <input type="file" class="hidden" value="{{ $data['game_pic'] }}" name="pic">
                                        <span style="color:red">
                                            @error('pic')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <p class="text-sm text-gray-300">
                                <span>File type: doc,pdf,types of images</span>
                            </p>
                            <div>
                                <button type="submit"
                                    class="my-5 w-full flex justify-center bg-blue-500 text-gray-100 p-4  rounded-full tracking-wide
                                    font-semibold  focus:outline-none focus:shadow-outline hover:bg-blue-600 shadow-lg cursor-pointer transition ease-in duration-300">
                                    Edit
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
