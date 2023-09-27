<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/scroll.css">
    {{-- @vite('resources/css/app.css') --}}
</head>

<body>
    {{-- @include("navbar") --}}
    <div class="container-main">
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
        <form action="login_action" method="post" class="form-box">
            @csrf
            <div class="logo"><img src="Images/white-logo.png" alt="error"></div><br>
            <div class="comp"><br>
                <p for="" class="l-login">Sign in with an SPIRIT Games account</p><br>
                <div class="input-box">
                    <input class="inputs" name="em" type="email" placeholder="Email"><br>
                    <span style="color:red">
            @error('em')
                {{ $message }}
            @enderror
        </span>
                    <input class="inputs" name="pwd" type="password" placeholder="Password" id="pin"><br>
                    <span style="color:red">
            @error('pwd')
                {{ $message }}
            @enderror
        </span>
                </div>
                <div class="pwd">
                    <div class="show"><input type="checkbox" onclick="showp()">Show password</div>
                    <a href="">forgot password</a>
                </div>
                <input type="submit" value="LOG IN NOW" class="submint-btn"><br>
                <p style="color: #e6dfdf;"> Don't have an account? <a href="register" style="color: rgb(136, 176, 255);">sign up</a>
                </p><br>
            </div>
        </form>
    </div>
    <script src="js/script.js"></script>
</body>

</html>
