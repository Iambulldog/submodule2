<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {!! SEOMeta::generate() !!}
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href='https://fonts.googleapis.com/css?family=Kanit:400,300' rel='stylesheet' type='text/css'>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://accounts.google.com/gsi/client"></script>

    <!-- Styles -->
    @livewireStyles

</head>
@php
    $bg = "bg-[url('" . asset('/storage/images/bg.png') . "')]";

@endphp

<body class="font-sans antialiased xs:bg-bg-moblie lg:bg-bg-web bg-100% bg-fixed bg-no-repeat ">
    <div class="flex min-h-screen flex-1 flex-col px-6 py-2 lg:px-8">

        <!-- Page Content -->

        <header>
            <div class="w-full text-gray-700 ">
                <div x-data="{ open: false }"
                    class="flex flex-col max-w-screen-xl px-4 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8"
                    @keydown.escape="open = false">
                    <div class="flex flex-row items-center justify-between p-4">
                        <a href="{{ route('member.login') }}"><img src="{{ asset('/storage/images/logo.png') }}"
                                class="w-60 hover:scale-125" alt=""></a>
                        <button class="rounded-lg md:hidden focus:outline-none focus:shadow-outline"
                            @click="open = !open">
                            <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                                <path x-show="!open" fill-rule="evenodd"
                                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
                                    clip-rule="evenodd"></path>
                                <path x-show="open" fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                    <nav :class="{ 'flex': open, 'hidden': !open }"
                        class="flex-col flex-grow hidden pb-4 md:pb-0 md:flex md:justify-end md:flex-row">
                        <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 md:ml-4 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                            href="{{ route('member.login') }}">หน้าเเรก</a>
                        <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 md:ml-4 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                            href="{{ route('promotions') }}">โปรโมชั่น</a>
                        <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 md:ml-4 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                            href="{{ route('casino') }}">คาสิโน</a>
                        <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 md:ml-4 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                            href="{{ route('slot') }}">เกมส์</a>
                        <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 md:ml-4 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                            href="{{ route('sport') }}">กีฬา</a>
                        <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 md:ml-4 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                            href="{{ route('blog.list') }}">บทความ</a>

                        <div
                            class="bg-gradient-to-r from-red-800 to-red-500 border border-yellow-300 border-1 rounded-lg   pl-3 pr-3">
                            <a class="bg-black items-center " href="{{ route('member.register') }}">
                                <div class="items-center flex justify-start p-2 ">
                                    <img src="{{ asset('/storage/images/icon_home/register.svg') }}" width="30"
                                        class="me-2 ms-1 py-1 hover:scale-125 " />
                                    <span class="text-white">สมัครสมาชิก</span>
                                </div>
                            </a>
                        </div>

                    </nav>
                </div>
            </div>
        </header>


        <main class=" ">

            {{ $slot }}
        </main>


    </div>
    <x-Footer />
    <x-MobileMenu />
    @livewireScripts
</body>

</html>
