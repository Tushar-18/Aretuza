<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
        @vite('resources/css/app.css')
</head>
<body>
   <div class="bg-white border rounded-lg shadow-lg px-6 py-8 max-w-md mx-auto mt-8">
    <h1 style="background: rgb(0, 0, 0); color: white; padding: 10px">SPIRIT GAMES</h1>
    <hr class="mb-2">
    <div class="flex justify-between mb-6">
        <h1 class="text-lg font-bold" style="margin-left: 320px">Invoice</h1>
        <div class="text-gray-700" style="margin-left: 560px">
            <div>Date: {{ date('Y-m-d') }}</div>
            <div>Invoice No: {{rand(100,100000)}}</div>
        </div>
    </div>
<div  style="margin-top: -60px">
    <div class="mb-8">
        <h2 class="text-lg font-bold mb-4">Bill To:</h2>
        <div class="text-gray-700 mb-2">{{$data['fullname']}}</div>
        
        <div class="text-gray-700">{{$data['email']}}</div>
    </div>
    <table class="w-full mb-8">
        <thead>
            <tr>
                <th class="text-left font-bold text-gray-700">Game</th>
                <th style="margin-left: 200px">Amount</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-left text-gray-700">{{$data['game_name']}}</td>
                <td class="text-right text-gray-700">{{$data['game_price']}}</td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td class="text-left font-bold text-gray-700">Total</td>
                <td style="margin-left: 200px">{{$data['game_price']}}</td>
            </tr>
        </tfoot>
    </table>
    <div class="text-gray-700 mb-2">Thank you for your Purchase !</div>
</div>
</div>
</body>
</html>