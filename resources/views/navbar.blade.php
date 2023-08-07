<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/nav.css">


    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- @vite('resources/css/app.css') --}}
</head>

    <body>
        <div class="container-main">
            <header class="header">
                <div class="logo"><img src="Images/logo.png" alt="error"></div>
                <nav class="nav">
                    <ul>
                        <li ><a class="nav-hover" href="welcome">Home</a></li>
                        <li ><a class="nav-hover" href="store">store</a></li>
                        <li ><a class="nav-hover" href="Engine">Engine</a></li>
                    </ul>
                </nav>
                <div class="profile">
                    <div class="pro-in">
                        <img src="Images/default.jpg" alt="error" id="signin">
                        <div class="log"><a href="">Login</a></div>
                    </div>
                    <label for="signin" style="margin-right: 10px;color:#fff;">Name</label>
                    <div class="menutoggle">
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                </div>
            </header>
        </div>
        <script src="js/nav.js"></script>
    </body>

</html>
