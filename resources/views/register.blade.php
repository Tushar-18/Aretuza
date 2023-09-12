<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/scroll.css">
   
</head>

<body>
    {{-- @include("navbar") --}}
    <div class="container-main">
        <form action="register-action" method="post" class="form-box" enctype="multipart/form-data">
            @csrf
            <div class="logo"><img src="Images/logo.png" alt="error"></div><br>
            <div class="comp"><br>
                <p for="" class="l-login">Sign in with an Aretuza Games account</p><br>
                <div class="input-box">
                    <input class="inputs" name="fn" type="text" placeholder="Fullname"><br>
                     <span style="color:red">
            @error('fn')
                {{ $message }}
            @enderror
        </span>
                    <input class="inputs" name="em" type="email" placeholder="Email">
                     <span style="color:red">
            @error('em')
                {{ $message }}
            @enderror
        </span>
                    <input class="inputs" name="age" type="date" placeholder="Date of birth">
                     <span style="color:red">
            @error('age')
                {{ $message }}
            @enderror
        </span>
                    <input class="inputs" name="pwd" id="pin" type="password" placeholder="Password"><br>
                     <span style="color:red">
            @error('pwd')
                {{ $message }}
            @enderror
        </span>
                    <input class="inputs" name="pwd_confirmation" id="cpin" type="password" placeholder="Confirm Password"><br>
                     <span style="color:red">
            @error('pwd_confirmation')
                {{ $message }}
            @enderror
        </span>
                </div>
                <div class="pwd">
                    <div class="show"><input type="checkbox" onclick="show()" > Show password</div>
                </div>
                <input type="submit" value="Create" class="submint-btn"><br>
                <p style="color: #e6dfdf;"> Don't have an account? <a href="login" style="color: #fff;">sign up</a>
                </p><br>
            </div>
        </form>
    </div>
    <script src="js/script.js"></script>
</body>

</html>
