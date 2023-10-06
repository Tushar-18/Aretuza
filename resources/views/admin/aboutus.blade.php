@extends('../layouts/admin-sidebar')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>About Us</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite('resources/css/app.css')
</head>
<body>
    @section('content')
  <div class="w-full flex flex-col items-center overflow-y-auto">
    <div class="mt-8 w-9/12">
      <h4 class="text-gray-600">
        About Us Page
      </h4>

      <div class="mt-4">
        <div class="p-6 bg-white rounded-md shadow-md ">
          <h2 class="text-lg font-semibold text-gray-700 capitalize">
           About Us Page
          </h2>

          <form method="post" action="{{URL::to('/')}}/admin/aboutus" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="id" value="1">

                    <div class="grid grid-cols-1 space-y-2">
                        <label class="text-sm font-bold text-gray-500 tracking-wide">Description</label>
                            <textarea class="text-base p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500" type="" placeholder="Descrption" name="dec" value="{{ old('dec') }}"></textarea>
                    </div>
                    <span style="color:red">
            @error('dec')
                {{ $message }}
            @enderror
        </span>
                    <div class="grid grid-cols-1 space-y-2">
                                    <label class="text-sm font-bold text-gray-500 tracking-wide">Attach Document</label>
                        <div class="flex items-center justify-center w-full">
                            <label class="flex flex-col rounded-lg border-4 border-dashed w-full h-60 p-10 group text-center">
                                <div class="h-full w-full text-center flex flex-col items-center justify-center  ">
                                    <!---<svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-blue-400 group-hover:text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                    </svg>-->
                                    <div class="flex flex-auto max-h-48 w-2/5 mx-auto -mt-10">
                                    <img class="has-mask h-36 object-center" src="https://img.freepik.com/free-vector/image-upload-concept-landing-page_52683-27130.jpg?size=338&ext=jpg" alt="freepik image">
                                    </div>
                                    <p class="pointer-none text-gray-500 "><span class="text-sm">Drag and drop</span> files here <br /> or <a href="" id="" class="text-blue-600 hover:underline">select a file</a> from your computer</p>
                                </div>
                                <input type="file" class="hidden" name="pic">
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
                        <button type="submit" class="my-5 w-full flex justify-center bg-blue-500 text-gray-100 p-4  rounded-full tracking-wide
                                    font-semibold  focus:outline-none focus:shadow-outline hover:bg-blue-600 shadow-lg cursor-pointer transition ease-in duration-300">
                        Update
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