<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/login.css">
    {{-- @vite('resources/css/app.css') --}}
</head>

<body>
    {{-- @include("navbar") --}}
    <div class="container-main">
        <form action="" method="post" class="form-box">
            <div class="logo"><img src="Images/logo.png" alt="error"></div><br>
            <div class="comp"><br>
                <p for="" class="l-login">Sign in with an Aretuza Games account</p><br>
                <div class="input-box">
                    <input class="inputs" type="email" placeholder="Email"><br>
                    <input class="inputs" type="password" placeholder="Password" id="myInput"><br>
                </div>
                <div class="pwd">
                    <div class="show"><input type="checkbox" onclick="show()">Show password</div>
                    <a href="">forgot password</a>
                </div>
                <input type="submit" value="LOG IN NOW" class="submint-btn"><br>
                <p style="color: #e6dfdf;"> Don't have an account? <a href="" style="color: #fff;">sign up</a>
                </p><br>
            </div>
        </form>
    </div>
    <script src="js/script.js"></script>
</body>

</html>
