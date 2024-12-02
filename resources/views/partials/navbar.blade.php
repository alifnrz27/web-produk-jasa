@php
    $menus = getDashboardMenu();
    $notifications = \App\Helpers\NotificationManager::getAllNotification();
@endphp
<nav class="drawer fixed top-0 left-0 ">
    <input id="my-drawer-3" type="checkbox" class="drawer-toggle" />
    <div class="drawer-content flex flex-col">
        <!-- Navbar -->
        <div class="navbar ">
            <div class="flex-none lg:hidden">
                <label for="my-drawer-3" aria-label="open sidebar" class="btn btn-square btn-ghost">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        class="inline-block w-6 h-6 stroke-current">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </label>
            </div>
            <div class="max-lg:flex-1  max-lg:justify-between lg:px-2 lg:mx-2 flex items-center gap-4 lg:gap-16">
                <div class="flex items-center gap-4">
                    <button class="btn-sidebar btn btn-outline btn-primary btn-sm max-lg:hidden"><i
                            class="fa-solid fa-bars"></i></button>
                    <a href="{{ url('/dashboard') }}"
                        class="flex gap-2 hover:opacity-70 transition-all items-center overflow-hidden relative h-[10px] lg:h-[50px] w-[50px] lg:w-[100px]"
                        style="">
                        <img src="{{ asset('image/CRM 22.svg') }}" class="object-cover">
                    </a>
                </div>

                <div class="flex font-bold gap-2 items-center bg-primary bg-opacity-10 rounded-full px-4 py-2">
                    <i class="fas fa-clock"></i>
                    <div class="flex gap-4 -mb-1">
                        <span id="clock"></span>
                        <time class="text-primary">{{ localDate(date('Y-m-d', time())) }}</time>
                    </div>
                </div>
            </div>
            <div class="flex-1 justify-end hidden lg:flex items-center gap-8 lg:mr-4">

                <details class="dropdown dropdown-end dropdown-bottom">
                    <summary class="flex items-center gap-4 text-right">
                        <div tabindex="0" role="button" class="flex flex-col">
                            <span>Hi
                                <strong>User</strong></span>
                            <span class="italic text-secondary">Admin</span>
                        </div>
                    </summary>
                    <ul class="menu bg-white shadow-xl dropdown-content rounded-box z-[1] w-52 p-2 ">
                        <li><a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
              app.FORMS.deleteFormAlert('you want to log out?' , function (){
                  document.getElementById('logout-form').submit();
              }, {confirmButtonText : 'Keluar'});">Logout</a>
                        </li>
                    </ul>
                </details>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>

            </div>
        </div>
    </div>
    <div class="drawer-side no-scrollbar">
        <label for="my-drawer-3" aria-label="close sidebar" class="drawer-overlay"></label>
        <div class="!bg-white menu w-full h-screen min-h-full !p-0 relative">
            <div class="flex justify-between items-center p-4 relative">
                <div class="flex flex-col gap-4 justify-center items-center p-4 w-full truncate">
                    <div class="flex flex-col text-center">

                        <h3 class="!text-primary text-lg">Hi
                            <strong>User</strong>
                        </h3>
                        <span class="italic text-secondary">Admin</span>
                    </div>

                    <div class="flex w-full gap-4 justify-center">
                        <label for="modal-notification-mobile" class="btn btn-sm btn-neutral btn-circle "
                            href="{{ route('logout') }}">
                            <div class="indicator">
                                <span class="indicator-item badge badge-secondary !p-0 !w-2 !h-2"
                                    data-lists="#notification-lists-mobile"></span>
                                <i class="fas fa-bell"></i>
                            </div>
                        </label>
                        <a class="btn btn-sm btn-neutral btn-circle " href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            app.FORMS.deleteFormAlert('you want to log out?' , function (){
                                document.getElementById('logout-form-mobile').submit();
                            }, {confirmButtonText : 'Keluar'});">
                            <i class="fas fa-sign-out"></i>
                        </a>


                    </div>


                    <form id="logout-form-mobile" action="{{ route('logout') }}" method="POST" class="hidden">
                        @csrf
                    </form>
                </div>
                {{-- Logout Mobile --}}
                <div class="flex flex-col justify-start items-start gap-2">
                    <label for="my-drawer-3" aria-label="close sidebar"><i
                            class="fas fa-close btn btn-circle btn-primary btn-xs absolute right-4 top-4"></i></label>
                </div>
            </div>
            <aside
                class="border-t-4 relative border-primary flex items-start h-screen flex-1 overflow-y-auto no-scrollbar max-lg:!p-0 bg-primary lg:!p-4">
                <div class="groups pb-2 h-full w-[100px]">
                    {{--  --}}
                </div>
                <div class="lists relative px-4 !bg-white flex-1 h-full overflow-auto no-scrollbar">
                    <img src="{{ asset('image/CRM 22.svg') }}"
                        class="object-contain absolute top-0 left-0 w-full h-full opacity-10">

                </div>
            </aside>

        </div>
    </div>
</nav>
