<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ env('APP_NAME', 'game') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href='https://fonts.googleapis.com/css?family=Kanit:400,300' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet" />
    <!-- Scripts -->
    <wireui:scripts />
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles

</head>
@php
    $style = [
        'logo' => 'images/logo.png',
        'link' => [
            'default' => 'inline-flex border-transparent text-amber-400 hover:border-yellow-500 hover:text-amber-400 whitespace-nowrap border-b-[3px] px-1 pb-3 text-md font-medium',
            'active' => 'inline-flex border-yellow-500 text-amber-400 whitespace-nowrap border-b-[3px] px-1 pb-3 text-md font-medium',
        ],
        'colorIcon' => '#facc15',
        'text' => '',
    ];
    $bg = "bg-[url('" . asset('/storage/images/bg.png') . "')]";
    function classNames(...$classes)
    {
        return implode(' ', array_filter($classes));
    }
@endphp

<body class="xs:bg-bg-web bg-100% bg-fixed bg-no-repeat lg:bg-bg-web ">

    <!-- Page Content -->
    <div class="font-sans text-base font-normal ">
        <!-- wrapper -->
        <div class="">


            <div x-data="{ open: false }">
                <nav id="sidebar-menu" x-description="Mobile menu" x-bind:aria-expanded="open"
                    :class="{ 'w-64 ml-0 md:w-0 sidebar-small': open, 'w-64 -ml-64 md:ml-0': !(open) }"
                    class="fixed transition-all duration-500 ease-in-out h-screen bg-gradient-to-t from-yellow-400 to-black z-40 w-64 -ml-64 md:ml-0"
                    aria-expanded="false">
                    <div class="sidebar-small-overflow h-full overflow-y-auto scrollbars show scrollbar-hide">
                        <div class="w-full flex flex-row justify-left py-5">
                            <h2 class="flex flex-row items-center text-xl text-slate-100 font-semibold pl-6">
                                <i class='w-7 h-7 sidebar-small-icon bx bx-grid-alt mr-1'></i>
                                <img class="object-scale-down  w-40 ml-1.5 sidebar-small-text"
                                    src="{!! asset('/storage/' . $style['logo']) !!}" />
                            </h2>
                        </div>

                        <!-- Sidebar menu -->
                        <ul id="side-menu" x-data="{ selected: 1 }"
                            class="sidebar-small-menu w-full float-none flex flex-col font-medium px-1 pb-6 overflow-y-auto scrollbar-hide">
                            <!-- dropdown -->
                            <li class="relative">

                                <div class="pb-2 w-full  pr-5 pl-5  pt-2 lg:hidden ">
                                    <div class="bg-black  rounded-lg  ">
                                        <a class="bg-black" href="{{ route('member.pocket.home') }}">
                                            <div class="items-center flex justify-start">
                                                <div class="flex justify-center me-2 ms-4 py-3 ">
                                                    <svg class="w-14 hover:-translate-y-1" viewBox="0 0 512 512" fill="{{ $style['colorIcon'] }}">
                                                        <path class="st0"
                                                            d="M304.844,367.969c0-30.625,24.813-55.438,55.438-55.438h91.594v-65.906c0-27.453-21.141-49.938-48.031-52.156
                                                    v-0.203H107.031c-7.875,0-14.234-6.359-14.234-14.234c0-7.844,16.922-17.656,23.203-22.969l48.109-42.25l-38.625-0.625
                                                    c-45.016,0-81.625,35.531-83.578,80.078h-0.203v3.703v60.953v169.297C41.703,474.5,79.219,512,125.484,512h274.031
                                                    c28.922,0,52.359-23.438,52.359-52.375v-36.219h-91.594C329.656,423.406,304.844,398.594,304.844,367.969z M430.766,296.094
                                                    c0,3.875-3.156,7.031-7.047,7.031s-7.047-3.156-7.047-7.031v-10.563c0-3.891,3.156-7.031,7.047-7.031s7.047,3.141,7.047,7.031
                                                    V296.094z M405.734,230.75c1.984-3.359,6.313-4.469,9.656-2.469c7.688,4.578,13.219,12.313,14.875,21.375
                                                    c0.688,3.828-1.859,7.484-5.672,8.188c-3.828,0.688-7.484-1.875-8.188-5.688c-0.875-4.906-3.969-9.25-8.219-11.781
                                                    C404.859,238.406,403.75,234.078,405.734,230.75z M349.906,223.906h20.828c3.891,0,7.047,3.141,7.047,7.031
                                                    c0,3.875-3.156,7.031-7.047,7.031h-20.828c-3.891,0-7.047-3.156-7.047-7.031C342.859,227.047,346.016,223.906,349.906,223.906z
                                                     M102.719,478.406c-1.047,3.75-4.938,5.938-8.672,4.875c-7.547-2.109-14.516-5.594-20.609-10.172
                                                    c-3.109-2.328-3.75-6.75-1.406-9.859c2.313-3.109,6.734-3.75,9.859-1.406c4.734,3.531,10.109,6.25,15.953,7.875
                                                    C101.594,470.781,103.766,474.656,102.719,478.406z M120.781,237.969H99.938c-3.891,0-7.031-3.156-7.031-7.031
                                                    c0-3.891,3.141-7.031,7.031-7.031h20.844c3.875,0,7.031,3.141,7.031,7.031C127.813,234.813,124.656,237.969,120.781,237.969z
                                                     M157.266,485.594h-20.5c-3.891,0-7.047-3.141-7.047-7.031c0-3.906,3.156-7.047,7.047-7.047h20.5c3.891,0,7.047,3.141,7.047,7.047
                                                    C164.313,482.453,161.156,485.594,157.266,485.594z M183.266,237.969h-20.844c-3.875,0-7.031-3.156-7.031-7.031
                                                    c0-3.891,3.156-7.031,7.031-7.031h20.844c3.891,0,7.031,3.141,7.031,7.031C190.297,234.813,187.156,237.969,183.266,237.969z
                                                     M218.797,485.594h-20.516c-3.891,0-7.031-3.141-7.031-7.031c0-3.906,3.141-7.047,7.031-7.047h20.516
                                                    c3.891,0,7.031,3.141,7.031,7.047C225.828,482.453,222.688,485.594,218.797,485.594z M245.75,237.969h-20.828
                                                    c-3.891,0-7.031-3.156-7.031-7.031c0-3.891,3.141-7.031,7.031-7.031h20.828c3.891,0,7.047,3.141,7.047,7.031
                                                    C252.797,234.813,249.641,237.969,245.75,237.969z M280.313,485.594h-20.5c-3.891,0-7.047-3.141-7.047-7.031
                                                    c0-3.906,3.156-7.047,7.047-7.047h20.5c3.891,0,7.047,3.141,7.047,7.047C287.359,482.453,284.203,485.594,280.313,485.594z
                                                     M280.375,230.938c0-3.891,3.156-7.031,7.047-7.031h20.828c3.875,0,7.047,3.141,7.047,7.031c0,3.875-3.172,7.031-7.047,7.031
                                                    h-20.828C283.531,237.969,280.375,234.813,280.375,230.938z M341.828,485.594h-20.5c-3.891,0-7.031-3.141-7.031-7.031
                                                    c0-3.906,3.141-7.047,7.031-7.047h20.5c3.891,0,7.047,3.141,7.047,7.047C348.875,482.453,345.719,485.594,341.828,485.594z
                                                     M416.672,436.906c0-3.906,3.156-7.047,7.047-7.047s7.047,3.141,7.047,7.047v10.563c0,3.875-3.156,7.031-7.047,7.031
                                                    s-7.047-3.156-7.047-7.031V436.906z M382.859,471.516h16.656c0.922,0,1.828-0.078,2.719-0.203c3.828-0.625,7.453,2,8.047,5.828
                                                    c0.625,3.828-1.984,7.453-5.828,8.063c-1.625,0.266-3.266,0.391-4.938,0.391h-16.656c-3.906,0-7.063-3.141-7.063-7.031
                                                    C375.797,474.656,378.953,471.516,382.859,471.516z" />
                                                        <path class="st0"
                                                            d="M462.313,333.641H360.281c-9.516,0.016-18.016,3.828-24.266,10.047c-6.234,6.25-10.047,14.781-10.047,24.281
                                                    s3.813,18.031,10.047,24.266c6.25,6.234,14.75,10.047,24.266,10.047h102.031c4.406,0,7.984-3.563,7.984-7.969v-52.688
                                                    C470.297,337.219,466.719,333.641,462.313,333.641z M360.875,379.406c-6.328,0-11.438-5.125-11.438-11.438
                                                    s5.109-11.438,11.438-11.438c6.313,0,11.438,5.125,11.438,11.438S367.188,379.406,360.875,379.406z" />
                                                        <path class="st0"
                                                            d="M154.141,169.953l46.25-40.063c-3.375,12.469-2.469,26.547,2.609,40.063h73.703
                                                    c1.422-1.625,2.406-3.172,3.031-4.859c0.984-2.672,0.563-5.063-1.328-7.25c-1.344-1.625-2.891-2.391-4.578-2.531
                                                    c-1.766-0.063-3.813,0.688-6.266,2.391l-7.891,5.703c-4.719,3.375-9.078,5.063-13.172,5.063c-4.078,0.078-7.875-1.906-11.406-5.969
                                                    c-1.891-2.25-3.172-4.594-3.797-7.125c-0.563-2.531-0.625-5.063-0.141-7.672c0.563-2.531,1.625-5.063,3.172-7.453
                                                    c0.641-1,1.406-1.969,2.188-2.891l-5.078-5.922l8.172-7.031l4.984,5.766c2.047-1.484,4.172-2.734,6.281-3.734
                                                    c3.516-1.688,8.578-1.969,8.578-1.969c0.563-0.141,1.141,0,1.547,0.344c0.438,0.359,0.641,0.922,0.641,1.5l-0.484,7.25
                                                    c-0.078,0.781-0.563,1.406-1.344,1.609c0,0-3.656,0.359-6.125,1.484c-2.391,1.188-4.641,2.75-6.828,4.641
                                                    c-2.828,2.469-4.5,4.797-4.859,7.047c-0.422,2.25,0.141,4.281,1.625,6.063c1.328,1.531,2.875,2.313,4.578,2.313
                                                    c1.672,0,3.797-0.844,6.25-2.609l6.984-4.984c5.125-3.672,9.781-5.563,14.078-5.563c4.281,0,8.172,2.031,11.609,6.047
                                                    c2.125,2.453,3.453,4.922,4.078,7.609c0.641,2.672,0.563,5.344,0,8.016c-0.344,1.547-0.984,3.172-1.75,4.719h34.359
                                                    c0.063-16.828-6.484-34.859-19.5-49.922c-17.047-19.703-40.766-29.063-61.828-26.609l58.578-50.609
                                                    c9.938,9.344,25,10.844,36.625,3.797L381.75,97.5c-8.656,10.5-9.359,25.625-1.469,36.844l-41.125,35.609h28.453l58-50.203
                                                    L321.984,0L125.625,169.953H154.141z" />
                                                        <path class="st0"
                                                            d="M313.453,101.531c-3.328,2.875-3.688,7.938-0.797,11.281s7.953,3.703,11.297,0.813
                                                    c3.344-2.906,3.703-7.953,0.797-11.281C321.859,98.984,316.813,98.625,313.453,101.531z" />
                                                    </svg>
                                                </div>
                                                <span class="text-amber-400">กระเป๋า</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                                <div class="pb-2 w-full  pr-5 pl-5 lg:hidden">
                                    <div class="bg-black  rounded-lg ">
                                        <a class="bg-black items-center " href="{{url('/game',['product'=>'Casino'])}}">
                                            <div class="items-center flex justify-start">
                                                <img src="{{asset('/storage/images/icon_home/casino_home.png')}}"
                                                    width="50" class="me-2 ms-4 py-3 hover:scale-125 " />
                                                <span class="text-amber-400">คาสิโน</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="pb-2 w-full  pr-5 pl-5 lg:hidden ">
                                    <div class="bg-black  rounded-lg ">
                                        <a class="bg-black items-center " href="{{url('/game',['product'=>'Slot'])}}">
                                            <div class="items-center flex justify-start">
                                                <img src="{{asset('/storage/images/icon_home/game_home.png')}}"
                                                    width="50" class="me-2 ms-4 py-3 hover:scale-125 " />
                                                <span class="text-amber-400">เกมส์</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="pb-2 w-full  pr-5 pl-5 lg:hidden">
                                    <div class="bg-black  rounded-lg ">
                                        <a class="bg-black items-center " href="{{url('/game',['product'=>'Sport'])}}">
                                            <div class="items-center flex justify-start">
                                                <img src="{{asset('/storage/images/icon_home/sport_home.png')}}"
                                                    width="50" class="me-2 ms-4 py-3 hover:scale-125 " />
                                                <span class="text-amber-400">กีฬา</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                                <div class="pb-2 w-full  pr-5 pl-5 lg:hidden">
                                    <div class="bg-black  rounded-lg ">
                                        <a class="bg-black items-center " href="{{url('/game',['product'=>'Lotto'])}}">
                                            <div class="items-center flex justify-start">
                                                <img src="{{asset('/storage/images/icon_home/lotto_home.png')}}"
                                                    width="50" class="me-2 ms-4 py-3 hover:scale-125 " />
                                                <span class="text-amber-400">หวย</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="pb-2 w-full  pr-5 pl-5 lg:hidden">
                                    <div class="bg-black  rounded-lg ">
                                        <a class="bg-black items-center " href="{{url('/game',['product'=>'P2P'])}}">
                                            <div class="items-center flex justify-start">
                                                <img src="{{asset('/storage/images/icon_home/game_home1.png')}}"
                                                    width="50" class="me-2 ms-4 py-3 hover:scale-125 " />
                                                <span class="text-amber-400">การแข่งขัน</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                                

                                <div class="pb-2 w-full  pr-5 pl-5 lg:hidden">
                                    <div class="bg-black  rounded-lg ">
                                        <a class="bg-black items-center " href="{{ route('member.promotion') }}">
                                            <div class="items-center flex justify-start">
                                                <img src="{{asset('/storage/images/icon_home/code.png')}}"
                                                    width="50" class="me-2 ms-4 py-3 hover:scale-125 " />
                                                <span class="text-amber-400">โปรโมชั่น</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="pb-2 w-full  pr-5 pl-5  ">
                                    <div class="bg-black  rounded-lg ">
                                        <a class="bg-black items-center " href="{{ route('member.pocket.myhistory') }}">
                                            <div class="items-center flex justify-start">
                                                <img src="{{asset('/storage/images/icon_home/report_money.png')}}"
                                                    width="50" class="me-2 ms-4 py-3 hover:scale-125 " />
                                                <span class="text-amber-400">ประวัติ</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="pb-2 w-full  pr-5 pl-5 ">
                                    <div class="bg-black  rounded-lg  ">
                                        <a class="bg-black items-center " href="{{ route('member.spin') }}">
                                            <div class="items-center flex justify-start">
                                                <img src="{{asset('/storage/images/icon_home/slot.png')}}"
                                                    width="50" class="me-2 ms-4 py-3 hover:scale-125 " />
                                                <span class="text-amber-400">วงล้อ</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="pb-2 w-full  pr-5 pl-5 ">
                                    <div class="bg-black  rounded-lg  ">
                                        <a class="bg-black items-center " href="{{ route('member.pocket.mycheckin') }}">
                                            <div class="items-center flex justify-start">
                                                <img src="{{asset('/storage/images/icon_home/checkin.png')}}"
                                                    width="50" class="me-2 ms-4 py-3 hover:scale-125 " />
                                                <span class="text-amber-400">เช็คอิน</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="pb-2 w-full  pr-5 pl-5 ">
                                    <div class="bg-black  rounded-lg  ">
                                        <a class="bg-black items-center " href="{{ route('member.exchange') }}">
                                            <div class="items-center flex justify-start">
                                                <img src="{{asset('/storage/images/icon_home/code.png')}}"
                                                    width="50" class="me-2 ms-4 py-3 hover:scale-125 " />
                                                <span class="text-amber-400">แลกเครดิต</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="pb-2 w-full  pr-5 pl-5 ">
                                    <div class="bg-black  rounded-lg  ">
                                        <a class="bg-black items-center " href="{{ route('member.refund') }}">
                                            <div class="items-center flex justify-start">
                                                <img src="{{asset('/storage/images/icon_home/gift.png')}}"
                                                    width="50" class="me-2 ms-4 py-3 hover:scale-125 " />
                                                <span class="text-amber-400">คืนยอดเสีย</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="pb-2 w-full  pr-5 pl-5 ">
                                    <div class="bg-black  rounded-lg  ">
                                        <a class="bg-black items-center " href="{{ route('member.pocket.myaffiliate') }}" data-bs-toggle="modal" data-bs-target="#invite_friend">
                                            <div class="items-center flex justify-start">
                                                <img src="{{asset('/storage/images/icon_home/link.png')}}"
                                                    width="50" class="me-2 ms-4 py-3 hover:scale-125 " />
                                                <span class="text-amber-400">แนะนำเพื่อน</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="pb-2 w-full  pr-5 pl-5 ">
                                    <div class="bg-black  rounded-lg  ">
                                        @php
                                            $line = DB::select('select token from settings where name = ?', ['line']);
                                        @endphp
                                        <a class="bg-black items-center " href="{{$line[0]->token}}" >
                                            <div class="items-center flex justify-start">
                                                <img src="{{asset('/storage/images/icon_home/qrline.png')}}"
                                                    width="50" class="me-2 ms-4 py-3 hover:scale-125 " />
                                                <span class="text-amber-400">ติดต่อ</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="pb-2 w-full  pr-5 pl-5 ">
                                    <div class="bg-black  rounded-lg ">
                                        <a class="bg-black items-center " onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <div class="items-center flex justify-start">
                                                <svg class="w-12 hover:-translate-y-1 me-2 ms-4 py-3 " viewBox="0 0 512 512" fill="#facc15">
                                                    <g>
                                                        <path class="st0" d="M423.262,91.992c-16.877-15.91-43.434-15.098-59.32,1.778c-15.894,16.877-15.098,43.434,1.779,59.32
                                                        c32.082,30.213,49.754,71.238,49.754,115.5c0,87.934-71.541,159.476-159.476,159.476S96.525,356.524,96.525,268.59
                                                        c0-44.262,17.668-85.287,49.754-115.5c16.877-15.885,17.672-42.442,1.779-59.32c-15.885-16.885-42.455-17.688-59.32-1.778
                                                        C40.344,137.557,12.59,201.926,12.59,268.59C12.59,402.803,121.783,512,256,512c134.213,0,243.41-109.197,243.41-243.41
                                                        C499.41,201.926,471.656,137.557,423.262,91.992z"></path>
                                                        <path class="st0" d="M256,268.59c23.178,0,41.967-15.033,41.967-33.574V33.574C297.967,15.033,279.178,0,256,0
                                                        c-23.178,0-41.967,15.033-41.967,33.574v201.443C214.033,253.557,232.822,268.59,256,268.59z"></path>
                                                    </g>
                                                </svg>
                                                <span class="text-amber-400">ออกจากระบบ</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <form id="logout-form" action="{{ route('member.logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>

                               

                        </ul>
                    </div>
                </nav>
                <!-- bg open -->
                <div @click="open = false">
                    <div x-bind:aria-expanded="open" :class="{ 'block': open, 'hidden': !(open) }"
                        class="fixed bg-slate-900 bg-opacity-70 dark:bg-black dark:bg-opacity-70 w-full h-full inset-x-0 top-0 z-30 md:hidden">
                    </div>
                </div>

                <div x-bind:aria-expanded="open"
                    :class="{ 'ml-0 mr-0 md:ml-0 md:mr-0': open, 'ml-0 mr-0 md:ml-64': !(open) }"
                    class="min-h-screen relative mt-0 ml-0 mr-0 md:ml-64 transition-all duration-500 ease-in-out">

                    <!-- Navbar -->
                    <nav :class="{ 'left-0 right-0 md:left-0 md:right-0': open, 'left-0 right-0 md:left-64': !(open) }"
                        class="z-20 fixed mt-0 left-0 md:left-64 right-0  transition-all duration-500 ease-in-out"
                        id="desktop-menu">
                        <div
                            class="py-4 md:py-1 flex flex-row flex-nowrap items-center justify-between bg-gradient-to-t from-black to-black shadow-lg shadow-cyan-100/10 dark:shadow-cyan-700/10 px-6">
                            <div class="flex">
                                <!-- sidenav button-->
                                <button id="navbartoggle" type="button"
                                    class="inline-flex items-center justify-center text-slate-800 hover:text-slate-600 dark:text-slate-300 dark:hover:text-slate-200 focus:outline-none focus:ring-0"
                                    aria-controls="sidebar-menu" @click="open = !open" aria-expanded="false"
                                    x-bind:aria-expanded="open.toString()">

                                    <div class="hidden h-8 w-8" :class="{ 'block': open, 'hidden': !(open) }">
                                        <svg class="" fill="#eeff00" viewBox="0 0 32 32" enable-background="new 0 0 32 32" id="Glyph" version="1.1" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" stroke="#eeff00">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier"><path d="M29,16c0,1.104-0.896,2-2,2H11c-1.104,0-2-0.896-2-2s0.896-2,2-2h16C28.104,14,29,14.896,29,16z" id="XMLID_352_"></path>
                                                <path d="M29,6c0,1.104-0.896,2-2,2H11C9.896,8,9,7.104,9,6s0.896-2,2-2h16C28.104,4,29,4.896,29,6z" id="XMLID_354_"></path><path d="M29,26c0,1.104-0.896,2-2,2H11c-1.104,0-2-0.896-2-2s0.896-2,2-2h16C28.104,24,29,24.896,29,26z" id="XMLID_356_"></path>
                                                <path d="M3,6c0,1.103,0.897,2,2,2s2-0.897,2-2S6.103,4,5,4S3,4.897,3,6z" id="XMLID_358_"></path>
                                                <path d="M3,16c0,1.103,0.897,2,2,2s2-0.897,2-2s-0.897-2-2-2S3,14.897,3,16z" id="XMLID_360_"></path>
                                                <path d="M3,26c0,1.103,0.897,2,2,2s2-0.897,2-2s-0.897-2-2-2S3,24.897,3,26z" id="XMLID_362_"></path>
                                            </g>
                                        </svg>
                                    </div>

                                    <div class="hidden h-8 w-8" :class="{ 'hidden': open, 'block': !(open) }">
                                        <svg class="" fill="#eeff00" viewBox="0 0 32 32" enable-background="new 0 0 32 32" id="Glyph" version="1.1" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" stroke="#eeff00">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier"><path d="M29,16c0,1.104-0.896,2-2,2H11c-1.104,0-2-0.896-2-2s0.896-2,2-2h16C28.104,14,29,14.896,29,16z" id="XMLID_352_"></path>
                                                <path d="M29,6c0,1.104-0.896,2-2,2H11C9.896,8,9,7.104,9,6s0.896-2,2-2h16C28.104,4,29,4.896,29,6z" id="XMLID_354_"></path><path d="M29,26c0,1.104-0.896,2-2,2H11c-1.104,0-2-0.896-2-2s0.896-2,2-2h16C28.104,24,29,24.896,29,26z" id="XMLID_356_"></path>
                                                <path d="M3,6c0,1.103,0.897,2,2,2s2-0.897,2-2S6.103,4,5,4S3,4.897,3,6z" id="XMLID_358_"></path>
                                                <path d="M3,16c0,1.103,0.897,2,2,2s2-0.897,2-2s-0.897-2-2-2S3,14.897,3,16z" id="XMLID_360_"></path>
                                                <path d="M3,26c0,1.103,0.897,2,2,2s2-0.897,2-2s-0.897-2-2-2S3,24.897,3,26z" id="XMLID_362_"></path>
                                            </g>
                                        </svg>

                                    </div>
                                </button>



                <header class="relative">
                    <nav aria-label="Top">


                      <!-- Secondary navigation -->
                      <div class="">
                        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                          <div class="">
                            <div class="flex h-16 items-center justify-between">

                              <div class="hidden h-full lg:flex">
                                <!-- Flyout menus -->
                                <div class="inset-x-0 bottom-0 px-4">
                                  <div class="flex h-full justify-center space-x-8">


                                      <a href="{{ route('member.pocket.home') }}" class="flex items-center text-sm font-medium text-amber-400 hover:text-gray-400 {{(request()->routeIs('member.pocket.*')??false)?$style['link']['active']:$style['link']['default']}}">
                                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4 mr-2 mt-1">
                                              <path fill-rule="evenodd" d="M8.34 1.804A1 1 0 019.32 1h1.36a1 1 0 01.98.804l.295 1.473c.497.144.971.342 1.416.587l1.25-.834a1 1 0 011.262.125l.962.962a1 1 0 01.125 1.262l-.834 1.25c.245.445.443.919.587 1.416l1.473.294a1 1 0 01.804.98v1.361a1 1 0 01-.804.98l-1.473.295a6.95 6.95 0 01-.587 1.416l.834 1.25a1 1 0 01-.125 1.262l-.962.962a1 1 0 01-1.262.125l-1.25-.834a6.953 6.953 0 01-1.416.587l-.294 1.473a1 1 0 01-.98.804H9.32a1 1 0 01-.98-.804l-.295-1.473a6.957 6.957 0 01-1.416-.587l-1.25.834a1 1 0 01-1.262-.125l-.962-.962a1 1 0 01-.125-1.262l.834-1.25a6.957 6.957 0 01-.587-1.416l-1.473-.294A1 1 0 011 10.68V9.32a1 1 0 01.804-.98l1.473-.295c.144-.497.342-.971.587-1.416l-.834-1.25a1 1 0 01.125-1.262l.962-.962A1 1 0 015.38 3.03l1.25.834a6.957 6.957 0 011.416-.587l.294-1.473zM13 10a3 3 0 11-6 0 3 3 0 016 0z" clip-rule="evenodd" />
                                          </svg>กระเป๋า
                                      </a>
                                      <a href="{{ route('member.promotion') }}"
                                      class="flex items-center text-sm font-medium text-amber-400 hover:text-gray-400 {{(request()->routeIs('member.promotion')??false)?$style['link']['active']:$style['link']['default']}}">
                                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4 mr-2 mt-1">
                                              <path fill-rule="evenodd" d="M9.25 3H3.5A1.5 1.5 0 002 4.5v4.75h3.365A2.75 2.75 0 019.25 5.362V3zM2 10.75v4.75A1.5 1.5 0 003.5 17h5.75v-4.876A4.75 4.75 0 015 14.75a.75.75 0 010-1.5 3.251 3.251 0 003.163-2.5H2zM10.75 17h5.75a1.5 1.5 0 001.5-1.5v-4.75h-6.163A3.251 3.251 0 0015 13.25a.75.75 0 010 1.5 4.75 4.75 0 01-4.25-2.626V17zM18 9.25V4.5A1.5 1.5 0 0016.5 3h-5.75v2.362a2.75 2.75 0 013.885 3.888H18zm-4.496-2.755a1.25 1.25 0 00-1.768 0c-.36.359-.526.999-.559 1.697-.01.228-.006.443.004.626.183.01.398.014.626.003.698-.033 1.338-.2 1.697-.559a1.25 1.25 0 000-1.767zm-5.24 0a1.25 1.25 0 00-1.768 1.767c.36.36 1 .526 1.697.56.228.01.443.006.626-.004.01-.183.015-.398.004-.626-.033-.698-.2-1.338-.56-1.697z" clip-rule="evenodd" />
                                          </svg>
                                          โปรโมชั่น
                                      </a>

                                      <a href="{{url('/game',['product'=>'Casino'])}}"
                                          class="flex items-center text-sm font-medium text-amber-400 hover:text-gray-400 {{((request()->segment(2) == 'Casino')??false)?$style['link']['active']:$style['link']['default']}}">
                                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4 mr-2 mt-1">
                                              <path d="M10.75 10.818v2.614A3.13 3.13 0 0011.888 13c.482-.315.612-.648.612-.875 0-.227-.13-.56-.612-.875a3.13 3.13 0 00-1.138-.432zM8.33 8.62c.053.055.115.11.184.164.208.16.46.284.736.363V6.603a2.45 2.45 0 00-.35.13c-.14.065-.27.143-.386.233-.377.292-.514.627-.514.909 0 .184.058.39.202.592.037.051.08.102.128.152z" />
                                              <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-6a.75.75 0 01.75.75v.316a3.78 3.78 0 011.653.713c.426.33.744.74.925 1.2a.75.75 0 01-1.395.55 1.35 1.35 0 00-.447-.563 2.187 2.187 0 00-.736-.363V9.3c.698.093 1.383.32 1.959.696.787.514 1.29 1.27 1.29 2.13 0 .86-.504 1.616-1.29 2.13-.576.377-1.261.603-1.96.696v.299a.75.75 0 11-1.5 0v-.3c-.697-.092-1.382-.318-1.958-.695-.482-.315-.857-.717-1.078-1.188a.75.75 0 111.359-.636c.08.173.245.376.54.569.313.205.706.353 1.138.432v-2.748a3.782 3.782 0 01-1.653-.713C6.9 9.433 6.5 8.681 6.5 7.875c0-.805.4-1.558 1.097-2.096a3.78 3.78 0 011.653-.713V4.75A.75.75 0 0110 4z" clip-rule="evenodd" />
                                          </svg>
                                          คาสิโน
                                      </a>

                                      <a href="{{url('/game',['product'=>'Slot'])}}" class="flex items-center text-sm font-medium text-amber-400 hover:text-gray-400 {{((request()->segment(2) == 'Slot')??false)?$style['link']['active']:$style['link']['default']}}">
                                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4 mr-2 mt-1">
                                              <path fill-rule="evenodd" d="M2 3.5A1.5 1.5 0 013.5 2h9A1.5 1.5 0 0114 3.5v11.75A2.75 2.75 0 0016.75 18h-12A2.75 2.75 0 012 15.25V3.5zm3.75 7a.75.75 0 000 1.5h4.5a.75.75 0 000-1.5h-4.5zm0 3a.75.75 0 000 1.5h4.5a.75.75 0 000-1.5h-4.5zM5 5.75A.75.75 0 015.75 5h4.5a.75.75 0 01.75.75v2.5a.75.75 0 01-.75.75h-4.5A.75.75 0 015 8.25v-2.5z" clip-rule="evenodd" />
                                              <path d="M16.5 6.5h-1v8.75a1.25 1.25 0 102.5 0V8a1.5 1.5 0 00-1.5-1.5z" />
                                          </svg>
                                          เกมส์
                                      </a>

                                      <a href="{{url('/game',['product'=>'Sport'])}}" class="flex items-center text-sm font-medium text-amber-400 hover:text-gray-400 {{((request()->segment(2) == 'Sport')??false)?$style['link']['active']:$style['link']['default']}}">
                                          <svg class="w-4 h-4 mr-2 mt-1"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <circle cx="12" cy="12" r="9" />    <path d="M12 12a8 8 0 0 0 8 4M7.5 13.5a12 12 0 0 0 8.5 6.5" />    <path d="M12 12a8 8 0 0 0 8 4M7.5 13.5a12 12 0 0 0 8.5 6.5" transform="rotate(120 12 12)" />    <path d="M12 12a8 8 0 0 0 8 4M7.5 13.5a12 12 0 0 0 8.5 6.5" transform="rotate(240 12 12)" />  </svg>
                                          กีฬา
                                      </a>
                                      <a href="{{url('/game',['product'=>'Lotto'])}}" class="flex items-center text-sm font-medium text-amber-400 hover:text-gray-400 {{((request()->segment(2) == 'Sport')??false)?$style['link']['active']:$style['link']['default']}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.712 4.33a9.027 9.027 0 011.652 1.306c.51.51.944 1.064 1.306 1.652M16.712 4.33l-3.448 4.138m3.448-4.138a9.014 9.014 0 00-9.424 0M19.67 7.288l-4.138 3.448m4.138-3.448a9.014 9.014 0 010 9.424m-4.138-5.976a3.736 3.736 0 00-.88-1.388 3.737 3.737 0 00-1.388-.88m2.268 2.268a3.765 3.765 0 010 2.528m-2.268-4.796a3.765 3.765 0 00-2.528 0m4.796 4.796c-.181.506-.475.982-.88 1.388a3.736 3.736 0 01-1.388.88m2.268-2.268l4.138 3.448m0 0a9.027 9.027 0 01-1.306 1.652c-.51.51-1.064.944-1.652 1.306m0 0l-3.448-4.138m3.448 4.138a9.014 9.014 0 01-9.424 0m5.976-4.138a3.765 3.765 0 01-2.528 0m0 0a3.736 3.736 0 01-1.388-.88 3.737 3.737 0 01-.88-1.388m2.268 2.268L7.288 19.67m0 0a9.024 9.024 0 01-1.652-1.306 9.027 9.027 0 01-1.306-1.652m0 0l4.138-3.448M4.33 16.712a9.014 9.014 0 010-9.424m4.138 5.976a3.765 3.765 0 010-2.528m0 0c.181-.506.475-.982.88-1.388a3.736 3.736 0 011.388-.88m-2.268 2.268L4.33 7.288m6.406 1.18L7.288 4.33m0 0a9.024 9.024 0 00-1.652 1.306A9.025 9.025 0 004.33 7.288" />
                                        </svg>
                                        หวย
                                    </a>
                                    <a href="{{url('/game',['product'=>'P2P'])}}" class="flex items-center text-sm font-medium text-amber-400 hover:text-gray-400 {{((request()->segment(2) == 'Sport')??false)?$style['link']['active']:$style['link']['default']}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4 mr-2 mt-1 animate-spin-slow ">
                                            <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                                        </svg>
                                        การแข่งขัน
                                    </a>

       

                                       
                                      
                                      <hr class="lg:hidden md:block h-px my-3 bg-gray-300 border-0  ">

                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </nav>
                  </header>


                            </div>

                            <a class="flex flex-row items-center mr-4 md:hidden" href="#">
                                <img class="object-scale-down  w-full -ml-6" src="{!! asset('/storage/' . $style['logo']) !!}" />

                            </a>

                            <div x-data="{ show: true }">
                                <!-- top menu -->
                                <a href="{{ route('member.logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="">

                                <button id="navmenu" type="button"
                                    class="inline-flex md:hidden items-center justify-center text-slate-800 hover:text-slate-600 dark:text-slate-300 dark:hover:text-slate-200 focus:outline-none focus:ring-0"
                                    aria-controls="top-menu"  >
                                    <span class="sr-only">Menu</span>


                                    <div x-description="Icon closed"  >
                                        {{-- <i class='text-2xl bx bx-dots-vertical'></i> โปรไฟล์ --}}
                                        <svg class="w-6  hover:-translate-y-1" viewBox="0 0 512 512" fill="{{ $style['colorIcon'] }}">
                                            <g>
                                                <path class="st0" d="M423.262,91.992c-16.877-15.91-43.434-15.098-59.32,1.778c-15.894,16.877-15.098,43.434,1.779,59.32
                                                    c32.082,30.213,49.754,71.238,49.754,115.5c0,87.934-71.541,159.476-159.476,159.476S96.525,356.524,96.525,268.59
                                                    c0-44.262,17.668-85.287,49.754-115.5c16.877-15.885,17.672-42.442,1.779-59.32c-15.885-16.885-42.455-17.688-59.32-1.778
                                                    C40.344,137.557,12.59,201.926,12.59,268.59C12.59,402.803,121.783,512,256,512c134.213,0,243.41-109.197,243.41-243.41
                                                    C499.41,201.926,471.656,137.557,423.262,91.992z"/>
                                                <path class="st0" d="M256,268.59c23.178,0,41.967-15.033,41.967-33.574V33.574C297.967,15.033,279.178,0,256,0
                                                    c-23.178,0-41.967,15.033-41.967,33.574v201.443C214.033,253.557,232.822,268.59,256,268.59z"/>
                                            </g>
                                        </svg>
                                    </div>
                                </button>
                                </a>
                                <form id="logout-form" action="{{ route('member.logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>

                                <!-- menu -->
                                <ul :class="{ 'hidden md:flex': show, 'flex': !(show) }"
                                    class="absolute top:12 md:top-0 left-0 right-0 bg-black md:bg-transparent border-t border-b md:border-t-0 md:border-b-0 border-slate-100 w-full justify-center flex md:relative mt-4 md:mt-0">
                                    <li class="relative pr-4  ">
                                        <div class=" w-full ">
                                            <div
                                                class="bg-gradient-to-r from-lime-500 to-lime-300 border border-yellow-300 border-1 rounded-lg  pl-3 pr-3 ">
                                                <a class="bg-black items-center " href="{{url('deposit')}}">
                                                    <div class="items-center flex justify-start">
                                                        <img src="{{asset('/storage/images/icon_home/depo.png')}}"
                                                            width="30" class="me-2 ms-1 py-1 " />
                                                        <span class="text-black">ฝากเงิน</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="relative pr-4 ">
                                        <div class=" w-full ">
                                            <div
                                                class="bg-gradient-to-r from-red-800 to-red-500 border border-yellow-300 border-1 rounded-lg   pl-3 pr-3">
                                                <a class="bg-black items-center " href="{{url('withdraw')}}">
                                                    <div class="items-center flex justify-start">
                                                        <img src="{{asset('/storage/images/icon_home/with.png')}}"
                                                            width="30" class="me-2 ms-1 py-1 " />
                                                        <span class="text-white">ถอนเงิน</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                    <!-- End Navbar -->

                    <main class="pt-10 pb-10 lg:pb-16">
                        <!-- เนื้อหา -->
                        {{ $slot }}

                    </main>
                    <footer class=" bg-black  text-white bottom-0  sm:block ">
  
                        <div class="text-center text-md-start">
                          <div class=" mt-3">
                            <div class=" mx-auto mb-4 text-center">
                              <p class="p-6">ช่องทางการชำระเงิน</p>
                              <div class="flex flex-wrap items-center text-center justify-center ">
                                <img class="me-2 rounded-3xl" src=" {{asset('/storage/images/bank/baac.svg')}}" width="40">
                                <img class="me-2 rounded-3xl" src=" {{asset('/storage/images/bank/bay.svg')}}" width="40">
                                <img class="me-2 rounded-3xl" src=" {{asset('/storage/images/bank/bbl.svg')}}" width="38">
                                <img class="me-2 rounded-3xl" src=" {{asset('/storage/images/bank/bnp.svg')}}" width="40">
                                <img class="me-2 rounded-3xl" src=" {{asset('/storage/images/bank/boa.svg')}}" width="41">
                                <img class="me-2 rounded-3xl" src=" {{asset('/storage/images/bank/cacib.svg')}}" width="40">
                                <img class="me-2 rounded-3xl" src=" {{asset('/storage/images/bank/cimb.svg')}}" width="40">
                                <img class="me-2 rounded-3xl" src=" {{asset('/storage/images/bank/citi.svg')}}" width="40">
                                <img class="me-2 rounded-3xl" src=" {{asset('/storage/images/bank/db.svg')}}" width="40">
                                <img class="me-2 rounded-3xl" src=" {{asset('/storage/images/bank/ghb.svg')}}" width="40">
                                <img class="me-2 rounded-3xl" src=" {{asset('/storage/images/bank/gsb.svg')}}" width="40">
                                <img class="me-2 rounded-3xl" src=" {{asset('/storage/images/bank/hsbc.svg')}}" width="40">
                                <img class="me-2 rounded-3xl" src=" {{asset('/storage/images/bank/ibank.svg')}}" width="40">
                                <img class="me-2 rounded-3xl" src=" {{asset('/storage/images/bank/icbc.svg')}}" width="40">
                                <img class="me-2 rounded-3xl" src=" {{asset('/storage/images/bank/kbank.svg')}}" width="40">
                                <img class="me-2 rounded-3xl" src=" {{asset('/storage/images/bank/kk.svg')}}" width="40">
                                <img class="me-2 rounded-3xl" src=" {{asset('/storage/images/bank/ktb.svg')}}" width="40">
                                <img class="me-2 rounded-3xl" src=" {{asset('/storage/images/bank/lhbank.svg')}}" width="40">
                                <img class="me-2 rounded-3xl" src=" {{asset('/storage/images/bank/mb.svg')}}" width="40">
                                <img class="me-2 rounded-3xl" src=" {{asset('/storage/images/bank/mega.svg')}}" width="40">
                                <img class="me-2 rounded-3xl" src=" {{asset('/storage/images/bank/mufg.svg')}}" width="40">
                                <img class="me-2 rounded-3xl" src=" {{asset('/storage/images/bank/promptpay.svg')}}" width="40">
                                <img class="me-2 rounded-3xl" src=" {{asset('/storage/images/bank/rbs.svg')}}" width="40">
                                <img class="me-2 rounded-3xl" src=" {{asset('/storage/images/bank/scb.svg')}}" width="40">
                                <img class="me-2 rounded-3xl" src=" {{asset('/storage/images/bank/scbi.svg')}}" width="40">
                                <img class="me-2 rounded-3xl" src=" {{asset('/storage/images/bank/smbc.svg')}}" width="40">
                                <img class="me-2 rounded-3xl" src=" {{asset('/storage/images/bank/tbank.svg')}}" width="40">
                                <img class="me-2 rounded-3xl" src=" {{asset('/storage/images/bank/tcrb.svg')}}" width="40">
                                <img class="me-2 rounded-3xl" src=" {{asset('/storage/images/bank/tisco.svg')}}" width="40">
                                <img class="me-2 rounded-3xl" src=" {{asset('/storage/images/bank/tmb.svg')}}" width="40">
                                <img class="me-2 rounded-3xl" src=" {{asset('/storage/images/bank/true.svg')}}" width="40">
                                <img class="me-2 rounded-3xl" src=" {{asset('/storage/images/bank/ttb.svg')}}" width="40">
                                <img class="me-2 rounded-3xl" src=" {{asset('/storage/images/bank/uob.svg')}}" width="40">
                              </div>
                            </div>
                          </div>
                    
                        </div>
                    
                      <div class="text-center p-2">
                        2023 -
                        <script>
                          document.write(new Date().getFullYear())
                        </script>©
                        @contact
                      </div>
                    </footer>
                </div>
            </div>
        </div>
    </div>



    <x-MobileMenu/>

    @livewire('livewire-ui-modal')
    @livewireScripts

</body>

</html>
