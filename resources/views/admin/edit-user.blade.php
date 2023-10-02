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
                    Edit User Data
                </h4>

                <div class="mt-4">
                    <div class="p-6 bg-white rounded-md shadow-md ">
                        <h2 class="text-lg font-semibold text-gray-700 capitalize">
                            Edit User Data
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
                        <form method="post" action="{{ URL::to('/') }}/admin/update-user">
                            @csrf
                            <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                                <div>
                                    <label class="text-gray-700" for="username">User Name</label>
                                    <input v-model="user.username"
                                        class="w-full mt-2 border h-8 border-gray-400 outline-none rounded-md focus:border-indigo-600 focus:ring focus:ring-opacity-40 focus:ring-indigo-500"
                                        type="text" name="fn" value="{{ $data['fullname'] }}">
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
                                        type="email" name="em" value="{{ $data['email'] }}" readonly>
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
                                        type="date" name="dob" value="{{ $data['birth_date'] }}">
                                    <span style="color:red">
                                        @error('dob')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>


                                {{-- <div>
                                    <label class="text-gray-700" for="passwordConfirmation">Password</label>
                                    <input v-model="user.confirm"
                                        class="w-full mt-2 border h-8 border-gray-400 outline-none rounded-md focus:border-indigo-600 focus:ring focus:ring-opacity-40 focus:ring-indigo-500"
                                        type="password" name="pwd" value="{{ $data['password'] }}" readonly>
                                    <span style="color:red">
                                        @error('pwd')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div> --}}

                            </div>


                            <div class="grid grid-cols-1 space-y-2">
                                <label class="text-sm font-bold text-gray-500 tracking-wide">Attach Document</label>
                                <div class="flex items-center justify-center w-full">
                                    <label
                                        class="flex flex-col rounded-lg border-4 border-dashed w-full h-60 p-10 group text-center">
                                        <div class="h-full w-full text-center flex flex-col items-center justify-center  ">
                                            <!---<svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-blue-400 group-hover:text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                            </svg>-->
                                            <div class="flex flex-auto max-h-48 w-2/5 mx-auto -mt-10">
                                                <img class="has-mask h-36 object-center"
                                                    src="https://img.freepik.com/free-vector/image-upload-concept-landing-page_52683-27130.jpg?size=338&ext=jpg"
                                                    alt="freepik image">
                                            </div>
                                            <p class="pointer-none text-gray-500 "><span class="text-sm">Drag and
                                                    drop</span> files here <br /> or <a href="" id=""
                                                    class="text-blue-600 hover:underline">select a file</a> from your
                                                computer</p>
                                        </div>
                                        <input type="file" class="hidden">
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
