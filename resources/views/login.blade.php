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
                <p style="color: #e6dfdf;"> Don't have an account? <a href="register" style="color: #fff;">sign up</a>
                </p><br>
            </div>
        </form>
    </div>
    <script src="js/script.js"></script>
</body>

</html>
