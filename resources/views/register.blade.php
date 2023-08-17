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
    <style>
        #country{
            background:transparent;
        }
        #country > *{
            background: rgba(0, 0, 0, 0.922);
            background: blur(4px);
        }
        #country > *::selection{
            background-color: rgb(0, 255, 136);
        }
    </style>
</head>

<body>
    {{-- @include("navbar") --}}
    <div class="container-main">
        <form action="" method="post" class="form-box">
            <div class="logo"><img src="Images/logo.png" alt="error"></div><br>
            <div class="comp"><br>
                <p for="" class="l-login">Sign in with an Aretuza Games account</p><br>
                <div class="input-box">
                    <input class="inputs" type="text" placeholder="Fullname"><br>
                    <input class="inputs" type="email" placeholder="Email">
                    <input class="inputs" type="date" placeholder="Date of birth">
                    <input class="inputs" id="pin" type="password" placeholder="Password"><br>
                    <input class="inputs" id="cpin" type="password" placeholder="Confirm Password"><br>
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
