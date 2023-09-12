@extends('layouts/navbar')
<!DOCTYPE html>
<html lang="en">
      <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Document</title>
            <link rel="stylesheet" href="css/items.css">
            <script src="https://cdn.tailwindcss.com"></script>
            @vite('resources/css/app.css')

      </head>
      <body >
            @section("content")
            <div class="bg-zinc-900 p-20">
            <div class="bg-zinc-800 w-auto h-auto p-20 flex rounded-lg">
                  <div class="first-part">
                        <img src="images/Remnant.jpg" class=" w-96 h-96 " alt="errer">
                  </div>
                  <div class="second-part pl-14  w-96 text-white">
                        <div class="flex flex-col">
                              <label class="text-5xl">Remnant</label>
                              <label class="pt-5">Price ₹2900</label>
                              <label class=" text-yellow-600">50% off</label>
                              <label class="pt-5">The world has been thrown into chaos by an ancient evil from another dimension. As one of the last remnants of humanity, you must set out alone or alongside up to two other survivors to face down hordes of deadly enemies to retake what was lost.</label>
                              <label class="text-lg mt-4 ml-4 ">🦖 Great Boss Battles</label>
                              <label class="text-lg m-4">😍 Extremely Fun</label>
                        </div>
                  </div>
                  <div class="w-96 bg-zinc-700 ml-16 h-auto p-6">
                        <a href="buy">
                              <div class="bg-blue-700 items-center flex w-80 h-10 mt-20 mb-20  justify-center rounded-lg text-white hover:bg-blue-800 hover:transition delay-75 duration-300 ease-in-out hover:-translate-y-1">BUY NOW</div></a>
                              
                        <a href="Wishlist"><div class="bg-none border items-center flex w-80 h-10 mt-20 mb-20 justify-center rounded-lg text-white hover:bg-zinc-200/10 hover:transition delay-75 duration-300 ease-in-out hover:-translate-y-1">Add to Wish List</div></a> 
            </div>
            
      </div>
      <!-- component --> <br>
<section>
	<div class="bg-zinc-800 text-white py-1 rounded-lg">
		<div class="container mx-auto flex flex-col md:flex-row my-6 md:my-24">
			<div class="flex flex-col w-full lg:w-1/3 p-8">
				<p class="ml-6 text-yellow-600 text-lg mb-2 uppercase tracking-loose">REVIEW</p>
                        <img src="images/profile.png" class="rounded-full w-40 h-40 hover:shadow-lg hover:shadow-zinc-600" alt="erorr">
				<p class="text-3xl md:text-5xl my-1 leading-relaxed text-yellow-600 md:leading-snug">Leave us a feedback!</p>
				<p class="text-sm md:text-base leading-snug text-gray-50 text-opacity-100">
					Please provide your valuable feedback and something something ...
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
									<form id="feedbackForm" action="" method="">
										<div class="relative w-full mb-3">
											<label class="block uppercase text-gray-700 text-xs font-bold mb-2"
                        for="email">Email</label><input type="email" name="email" id="email" class="border-0 px-3 py-3 rounded text-sm shadow w-full
                    bg-gray-300 placeholder-black text-gray-800 outline-none focus:bg-gray-400" placeholder="Email"
                        style="transition: all 0.15s ease 0s;" required />
                    </div>
											<div class="relative w-full mb-3">
												<label class="block uppercase text-gray-700 text-xs font-bold mb-2"
                        for="message">Message</label><textarea maxlength="300" name="feedback" id="feedback" rows="4"
                        cols="80"
                        class="border-0 px-3 py-3 bg-gray-300 placeholder-black text-gray-800 rounded text-sm shadow focus:outline-none w-full"
                        placeholder="Comment.." required></textarea>
											</div>
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
<article class="p-6 mb-7 text-base rounded-lg dark:bg-zinc-800 hover:border-b-2 hover:border-t-2 hover:bg-">
        <footer class="flex justify-between items-center mb-2">
            <div class="flex items-center">
                <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white"><img
                        class="mr-2 w-6 h-6 rounded-full"
                        src="https://flowbite.com/docs/images/people/profile-picture-2.jpg"
                        alt="Michael Gough">Michael Gough</p>
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
        <p class="text-gray-500 dark:text-gray-400">Very straight-to-point article. Really worth time reading. Thank you! But tools are just the
            instruments for the UX designers. The knowledge of the design tools are as important as the
            creation of the design strategy.</p>
        <div class="flex items-center mt-4 space-x-4">
            <button type="button"
                class="flex items-center text-sm text-gray-500 hover:underline dark:text-gray-400">
                <svg class="mr-1 w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
</svg>

                Like
            </button>
            
        </div>
    </article>
</div>
        @endsection
</body>

</html>