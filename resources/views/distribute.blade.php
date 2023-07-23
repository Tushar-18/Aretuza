<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content=
        "width=device-width, initial-scale=1.0" />
          
    <title>
        How to animate a straight
        line in linear motion?
    </title>
  
    <style>
        body {
            margin: 0;
            padding: 0;
            background: rgb(104, 117, 104);
        }
  
        .geeks {
            width: 400px;
            height: 2px;
            background: #ff0000;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
  
        .geeks::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgb(255, 255, 255);
            animation: animate 5s linear ;
        }
  
        @keyframes animate {
            0% {
                width:  0%;
            }
  
            50% {
                width:  50%;
            }
        }
    </style>
</head>
  
<body>
    <div class="geeks"></div>
    <div class="geeks"></div>
</body>
  
</html>