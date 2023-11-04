@extends('layouts/navbar')
<!DOCTYPE html>
<html lang="en">
      <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Document</title>
            <link rel="stylesheet" href="{{URL::to('/')}}/css/items.css">
            <script src="https://cdn.tailwindcss.com"></script>
            @vite('resources/css/app.css')
                        <style>*{
    margin: 0;
    padding: 0;
}
.rate {
    float: left;
    height: 46px;
    padding: 0 10px;
}
.rate:not(:checked) > input {
    position:absolute;
    top:-9999px;
}
.rate:not(:checked) > label {
    float:right;
    width:1em;
    overflow:hidden;
    white-space:nowrap;
    cursor:pointer;
    font-size:30px;
    color:#ccc;
}
.rate:not(:checked) > label:before {
    content: '★ ';
}
.rate > input:checked ~ label {
    color: #ffc700;    
}
.rate:not(:checked) > label:hover,
.rate:not(:checked) > label:hover ~ label {
    color: #deb217;  
}   
.rate > input:checked + label:hover,
.rate > input:checked + label:hover ~ label,
.rate > input:checked ~ label:hover,
.rate > input:checked ~ label:hover ~ label,
.rate > label:hover ~ input:checked ~ label {
    color: #c59b08;
}
</style>

      </head>
      <body >
            @section("content")
            <div class="bg-zinc-900 p-20">
            <div class="bg-zinc-800 w-auto h-auto p-20 flex rounded-lg">
                  <div class="first-part">
                        <img src="{{URL::to('/')}}/images/game_pic/{{$data['game_pic']}}" class=" w-96 h-96 " alt="errer">
                  </div>
                  <div class="second-part pl-14  w-96 text-white">
                        <div class="flex flex-col">
                              <label class="text-5xl">{{$data->game_name}}</label><br>
                              @if ($data['game_price']== '0.00')
                                <label class="pt-5 text-lg">Price <label class=" text-green-500"> Free</label></label>
                              @else
                              {{-- <label class=" text-green-400">{{$data['offers']}}% off</label> --}}
                                <label >Price ₹<del>{{$data['game_price']}}</del></label>
                                {{-- <label >Price ₹{{$data['new_price']}}</label> --}}
                              @endif
                              @if ($data['offers'] == '0.00')
                              @else
                              <label class=" text-green-400">{{$data['offers']}}% off</label>  
                              <label >Price ₹{{$data['new_price']}}</label>
                              @endif
                              <label class="pt-5">{{$data['description']}}</label><br>
                              @php
$cat = json_decode($data['catagories']);
@endphp
                              <li class="text-2xl">
                                Catagories
                              </li>
                              @foreach ($cat as $c)
                              <label class="text-lg mt-2 ml-9 ">
                                {{$c}}
                              </label>
                              @endforeach
                        </div>
                  </div>
                  <div class="w-96 bg-zinc-700 ml-16 h-auto p-6">
                    @if (isset($orders['game_id']))
                        @if ($orders['email'] == session('email'))
                        <a href="{{URL::to('/')}}/library">
                            <div class="bg-blue-700 items-center flex w-80 h-10 mt-20 mb-20  justify-center rounded-lg text-white hover:bg-blue-800 hover:transition delay-75 duration-300 ease-in-out hover:-translate-y-1">In Library</div></a>
                        @else
                        <a href="{{URL::to('/')}}/order/{{$data['game_id']}}">
                            <div class="bg-blue-700 items-center flex w-80 h-10 mt-20   mb-20  justify-center rounded-lg text-white hover:bg-blue-800 hover:transition delay-75 duration-300 ease-in-out hover:-translate-y-1">BUY NOW</div></a>
                        @endif
                    @else
                    <a href="{{URL::to('/')}}/order/{{$data['game_id']}}">
                        <div class="bg-blue-700 items-center flex w-80 h-10 mt-20 mb-20  justify-center rounded-lg text-white hover:bg-blue-800 hover:transition delay-75 duration-300 ease-in-out hover:-translate-y-1">BUY NOW</div></a>
                    @endif
                        
                              
                              <a href="{{URL::to('/')}}/wishlist/{{$data['game_id']}}"><div class="bg-none border items-center flex w-80 h-10 mt-20 mb-20 justify-center rounded-lg text-white hover:bg-zinc-200/10 hover:transition delay-75 duration-300 ease-in-out hover:-translate-y-1">Add to Wish List</div></a> 
            </div>
            
      </div>
      <!-- component --> <br>
<section>
	<div class="bg-zinc-800 text-white py-1 rounded-lg">
		<div class="container mx-auto flex flex-col md:flex-row my-6 md:my-24">
			<div class="flex flex-col w-full lg:w-1/3 p-8">
				<p class="ml-6 text-yellow-600 text-lg mb-2 uppercase tracking-loose">REVIEW</p>
                        <img src="{{URL::to('/')}}/images/profile_pictures/{{session('pic')}}" class="rounded-full w-40 h-40 hover:shadow-lg hover:shadow-zinc-600" alt="erorr">
				<p class="text-3xl md:text-5xl my-1 leading-relaxed text-yellow-600 md:leading-snug">Leave us a Review!</p>
				<p class="text-sm md:text-base leading-snug text-gray-50 text-opacity-100">
					Please provide your valuable Review and something something ...
				</p>
			</div>
			<div class="flex flex-col w-full lg:w-2/3 justify-center">
				<div class="container w-full px-4">
					<div class="flex flex-wrap justify-center">
						<div class="w-full lg:w-6/12 px-4">
							<div
								class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-zinc-700">
								<div class="flex-auto p-5 lg:p-10">
									<h4 class="text-2xl mb-4 text-white font-semibold">Have a suggestion?</h4>
									<form action="{{URL::to('/')}}/add-review" method="post">
                                        @csrf
                                        <input type="hidden" value="{{$data['game_id']}}" name="id">
                                        <input type="hidden" value="{{$data['game_pic']}}" name="pic">
                                        <input type="hidden" value="{{$data['game_name']}}" name="game_name">
										<div class="relative w-full mb-3">
                                            <div class="relative w-full mb-3">
                                              
                                                <div class="rate">
                                <input type="radio" id="star5" name="rating" value="5" />
                                <label for="star5" title="text">5 stars</label>
                                <input type="radio" id="star4" name="rating" value="4" />
                                <label for="star4" title="text">4 stars</label>
                                <input type="radio" id="star3" name="rating" value="3" />
                                <label for="star3" title="text">3 stars</label>
                                <input type="radio" id="star2" name="rating" value="2" />
                                <label for="star2" title="text">2 stars</label>
                                <input type="radio" id="star1" name="rating" value="1" />
                                <label for="star1" title="text">1 star</label>
                              </div>
										<label class="block uppercase text-gray-700 text-xs font-bold mb-2"
                        for="email">Email</label> <br><span style="color:red">
            @error('rating')
                {{ $message }}
            @enderror
        </span>	<input type="email" name="email" id="email" class="border-0 px-3 py-3 rounded text-sm shadow w-full
                    bg-gray-300 placeholder-black text-gray-800 outline-none focus:bg-gray-400" placeholder="Email"
                        style="transition: all 0.15s ease 0s;" value="{{session('email')}}" />
                        
                    </div>
			{{-- <label class="block uppercase text-xs font-bold mb-10" for="message">4.5</label> --}}
                        <textarea maxlength="300" name="review" id="feedback" rows="4"
                        cols="80"
                        class="border-0 px-3 py-3 bg-gray-300 placeholder-black text-gray-800 rounded text-sm shadow focus:outline-none w-full"
                        placeholder="Comment.."></textarea>
											</div>
                                             <span style="color:red">
            @error('review')
                {{ $message }}
            @enderror
        </span>
											<div class="text-center mt-6">
												<button id="feedbackBtn"
                        class="bg-none btn-hover text-white text-center border hover:bg-zinc-200/10 mx-auto active:bg-blue-800 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1"
                        type="submit" style="transition: all 0.15s ease 0s;">Submit
                      </button>
											</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div><br>
</section>
@foreach ($rat as $r)
    
<article class="p-6 mb-7 text-base rounded-lg dark:bg-zinc-800 hover:border-b-2 hover:border-t-2 hover:bg-">
        <footer class="flex justify-between items-center mb-2">
            <div class="flex items-center">
                <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white"><img
                        class="mr-2 w-6 h-6 rounded-full"
                        src="{{URL::to('/')}}/images/profile_pictures/{{$r['pic']}}"
                        alt="Michael Gough">{{$r['fullname']}}</p>
                <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate datetime="2022-02-08"
                        title="February 8th, 2022">Feb. 8, 2022</time></p>
            </div>
            {{-- <button id="dropdownComment1Button" data-dropdown-toggle="dropdownComment1"
                class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-400 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:bg-zinc-700 dark:hover:bg-zinc-600 dark:focus:ring-gray-600"
                type="button">
                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z">
                    </path>
                </svg>
                <span class="sr-only">Comment settings</span>
            </button> --}}
            <!-- Dropdown menu -->
            
        </footer>
        <p class="text-gray-500 dark:text-gray-400">Rating : {{$r['rating']}}</p>
        <p class="text-gray-500 dark:text-gray-400">{{$r['review']}}</p>
        {{-- <div class="flex items-center mt-4 space-x-4">
            <button type="button"
                class="flex items-center text-sm text-gray-500 hover:underline dark:text-gray-400">
                <svg class="mr-1 w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
</svg>

                Like
            </button>
            
        </div> --}}
    </article>
@endforeach

</div>
        @endsection
</body>

</html>