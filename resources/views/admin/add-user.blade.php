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

                        <form method="post" action="{{ URL::to('/') }}/register-action">
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
