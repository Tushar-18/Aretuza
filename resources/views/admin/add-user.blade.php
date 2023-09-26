@extends('../layouts/admin-sidebar')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>add games</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite('resources/css/app.css')
</head>

<body>
    @section('content')
        <div class="w-full flex flex-col items-center overflow-y-auto">
            <div class="mt-8 w-9/12">
                <h4 class="text-gray-600">
                    Add User
                </h4>

                <div class="mt-4">
                    <div class="p-6 bg-white rounded-md shadow-md ">
                        <h2 class="text-lg font-semibold text-gray-700 capitalize">
                            Add User
                        </h2>
@if (session('succ'))
                            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                                role="alert">
                                <strong class="font-bold">{{ session('succ') }}</strong>                
                                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                                    <svg class="fill-current h-6 w-6 text-green-500" role="button"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <title>Close</title>
                                        <path
                                            d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                                    </svg>
                                </span>
                            </div>
                        @endif
                        @if (session()->has('err'))
                           <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                                role="alert">
                                <strong class="font-bold">{{ session('err') }}</strong>                
                                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                                    <svg class="fill-current h-6 w-6 text-red-500" role="button"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <title>Close</title>
                                        <path
                                            d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                                    </svg>
                                </span>
                            </div>
                        @endif
                        <form method="post" action="{{ URL::to('/') }}/admin/add-user">
                            @csrf
                            <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                                <div>
                                    <label class="text-gray-700" for="username">User Name</label>
                                    <input v-model="user.username"
                                        class="w-full mt-2 border h-8 border-gray-400 outline-none rounded-md focus:border-indigo-600 focus:ring focus:ring-opacity-40 focus:ring-indigo-500"
                                        type="text" name="fn">
                                    <span style="color:red">
                                        @error('fn')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                                <div>
                                    <label class="text-gray-700" for="emailAddress">Email</label>
                                    <input v-model="user.email"
                                        class="w-full mt-2 border h-8 border-gray-400 outline-none rounded-md focus:border-indigo-600 focus:ring focus:ring-opacity-40 focus:ring-indigo-500"
                                        type="email" name="em">
                                    <span style="color:red">
                                        @error('em')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                                <div>
                                    <label class="text-gray-700" for="emailAddress">Date of Birth</label>
                                    <input v-model="user.email"
                                        class="w-full mt-2 border h-8 border-gray-400 outline-none rounded-md focus:border-indigo-600 focus:ring focus:ring-opacity-40 focus:ring-indigo-500"
                                        type="date" name="age">
                                    <span style="color:red">
                                        @error('age')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>


                                <div>
                                    <label class="text-gray-700" for="passwordConfirmation">Password</label>
                                    <input v-model="user.confirm"
                                        class="w-full mt-2 border h-8 border-gray-400 outline-none rounded-md focus:border-indigo-600 focus:ring focus:ring-opacity-40 focus:ring-indigo-500"
                                        type="password" name="pwd">
                                    <span style="color:red">
                                        @error('pwd')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div>
                                    <label class="text-gray-700" for="passwordConfirmation">Confirm Password</label>
                                    <input v-model="user.confirm"
                                        class="w-full mt-2 border h-8 border-gray-400 outline-none rounded-md focus:border-indigo-600 focus:ring focus:ring-opacity-40 focus:ring-indigo-500"
                                        type="password" name="pwd_confirmation">
                                    <span style="color:red">
                                        @error('pwd_confirmation')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>


                            
                           
                            <div>
                                <button type="submit"
                                    class="my-5 w-full flex justify-center bg-blue-500 text-gray-100 p-4  rounded-full tracking-wide
                                    font-semibold  focus:outline-none focus:shadow-outline hover:bg-blue-600 shadow-lg cursor-pointer transition ease-in duration-300">
                                    Add User
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
