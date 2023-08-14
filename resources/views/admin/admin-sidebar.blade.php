<!-- component -->
<script src="https://cdn.tailwindcss.com"></script>

<link rel="stylesheet" href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" />

<div class="h-screen flex flex-row bg-gray-100">
  <div class="flex flex-col w-56 bg-white rounded-r-3xl overflow-hidden">
    <div class="flex items-center justify-center h-20 shadow-md">
      <h1 class="text-3xl uppercase text-indigo-500"><img src="../Images/logo.png" alt="error"></h1>
    </div>
    <ul class="flex flex-col py-4">
      <li>
        <a href="{{URL::to('/')}}/admin/user-list" class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800">
          <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-gray-400"><i class="bx bx-home"></i></span>
          <span class="text-sm font-medium">Users</span>
        </a>
      </li>
      <li>
        <a href="{{URL::to('/')}}/admin/game-list" class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800">
          <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-gray-400"><i class="bx bx-joystick"></i></span>
          <span class="text-sm font-medium">Games</span>
        </a>
      </li>
      <li>
        <a href="{{URL::to('/')}}/admin/add-games" class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800">
          <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-gray-400"><i class="bx bx-add-to-queue"></i></span>
          <span class="text-sm font-medium">add games</span>
        </a>
      </li>
      {{-- <li>
        <a href="#" class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800">
          <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-gray-400"><i class="bx bx-shopping-bag"></i></span>
          <span class="text-sm font-medium">Shopping</span>
        </a>
      </li>
      <li>
        <a href="#" class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800">
          <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-gray-400"><i class="bx bx-chat"></i></span>
          <span class="text-sm font-medium">Chat</span>
        </a>
      </li>
      <li>
        <a href="#" class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800">
          <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-gray-400"><i class="bx bx-user"></i></span>
          <span class="text-sm font-medium">Profile</span>
        </a>
      </li>
      <li>
        <a href="#" class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800">
          <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-gray-400"><i class="bx bx-bell"></i></span>
          <span class="text-sm font-medium">Notifications</span>
          <span class="ml-auto mr-6 text-sm bg-red-100 rounded-full px-3 py-px text-red-500">5</span>
        </a>
      </li>
      <li> --}}
        <a href="#" class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800">
          <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-gray-400"><i class="bx bx-log-out"></i></span>
          <span class="text-sm font-medium">Logout</span>
        </a>
      </li>
    </ul>
  </div>
  @yield('content')
</div>