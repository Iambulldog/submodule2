@php
    $style = [
        'logo' => 'images/logo.png',
        'link' => [
            'default' => 'inline-flex border-transparent text-gray-500 hover:border-yellow-500 hover:text-gray-500 whitespace-nowrap border-b-[3px] px-1 pb-3 text-md font-medium',
            'active' => 'inline-flex border-yellow-500 text-gray-500 whitespace-nowrap border-b-[3px] px-1 pb-3 text-md font-medium',
        ],
    ];
    $bg = "bg-[url('" . asset('/storage/images/bg.png') . "')]";
    function classNames(...$classes)
    {
        return implode(' ', array_filter($classes));
    }
@endphp




<!--
  This example requires some changes to your config:
  
  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
      require('@tailwindcss/aspect-ratio'),
    ],
  }
  ```
-->

<div class="font-sans text-base font-normal bg-black">
    <!-- wrapper -->
    <div class="overflow-hidden ">



        <div x-data="{ open: false }">
            <nav id="sidebar-menu" x-description="Mobile menu" x-bind:aria-expanded="open"
                :class="{ 'w-64 ml-0 md:w-20 sidebar-small': open, 'w-64 -ml-64 md:ml-0': !(open) }"
                class="fixed transition-all duration-500 ease-in-out h-screen bg-gradient-to-t from-yellow-400 to-black z-40 w-64 -ml-64 md:ml-0"
                aria-expanded="false">
                <div class="sidebar-small-overflow h-full overflow-y-auto scrollbars show">
                    <div class="w-full flex flex-row justify-left py-5">
                        <h2 class="flex flex-row items-center text-xl text-slate-100 font-semibold pl-6">
                            <i class='w-7 h-7 sidebar-small-icon bx bx-grid-alt mr-1'></i>
                            <img class="object-scale-down  w-40 ml-1.5 sidebar-small-text"
                                src="{!! asset('/storage/' . $style['logo']) !!}" />
                        </h2>
                    </div>

                    <!-- Sidebar menu -->
                    <ul id="side-menu" x-data="{ selected: 1 }"
                        class="sidebar-small-menu w-full float-none flex flex-col font-medium px-1 pb-6">
                        <!-- dropdown -->
                        <li class="relative">

                            <div class="pb-2 w-full  pr-5 pl-5  pt-2  ">
                                <div class="bg-black  rounded-lg  ">
                                    <a class="bg-black  " href="#">
                                        <div class="items-center flex justify-start">
                                            <img src="https://admwinr.com/24iboom//public/tem_users/img/icon/season.png"
                                                width="50" class="me-2 ms-4 py-3 " />
                                            <span class="text-amber-400">คืนยอดเสีย</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="pb-2 w-full  pr-5 pl-5 ">
                                <div class="bg-black  rounded-lg ">
                                    <a class="bg-black items-center " href="#">
                                        <div class="items-center flex justify-start">
                                            <img src="https://admwinr.com/24iboom//public/tem_users/img/icon/checkin.png"
                                                width="50" class="me-2 ms-4 py-3 " />
                                            <span class="text-amber-400">เช็คอิน</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="pb-2 w-full  pr-5 pl-5  ">
                                <div class="bg-black  rounded-lg ">
                                    <a class="bg-black items-center " href="#">
                                        <div class="items-center flex justify-start">
                                            <img src="https://admwinr.com/24iboom//public/tem_users/img/icon/point.png"
                                                width="50" class="me-2 ms-4 py-3 " />
                                            <span class="text-amber-400">แนะนำเพื่อน</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="pb-2 w-full  pr-5 pl-5 ">
                                <div class="bg-black  rounded-lg  ">
                                    <a class="bg-black items-center " href="#">
                                        <div class="items-center flex justify-start">
                                            <img src="https://admwinr.com/24iboom//public/tem_users/img/icon/season.png"
                                                width="50" class="me-2 ms-4 py-3 " />
                                            <span class="text-amber-400">เครือข่าย</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
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
                :class="{ 'ml-0 mr-0 md:ml-20 md:mr-0': open, 'ml-0 mr-0 md:ml-64': !(open) }"
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
                                <span class="sr-only">Mobile menu</span> MENU
                                <div class="hidden h-8 w-8" :class="{ 'block': open, 'hidden': !(open) }">
                                    <i class="hidden md:block bx bx-menu text-2xl"></i>
                                    <i class="md:hidden bx bx-arrow-back text-2xl"></i>
                                </div>

                                <div class="hidden h-8 w-8" :class="{ 'hidden': open, 'block': !(open) }">
                                    <i class="hidden md:block bx bx-arrow-back text-2xl"></i>
                                    <i class="md:hidden bx bx-menu text-2xl"></i>
                                </div>
                            </button>


                        </div>

                        <a class="flex flex-row items-center mr-4 md:hidden" href="#">
                            <img class="object-scale-down  w-40" src="{!! asset('/storage/' . $style['logo']) !!}" />

                        </a>

                        <div x-data="{ show: true }">
                            <!-- top menu -->
                            <button id="navmenu" type="button"
                                class="inline-flex md:hidden items-center justify-center text-slate-800 hover:text-slate-600 dark:text-slate-300 dark:hover:text-slate-200 focus:outline-none focus:ring-0"
                                aria-controls="top-menu" @click="show = !show" aria-expanded="false"
                                x-bind:aria-expanded="show.toString()">
                                <span class="sr-only">Menu</span>
                                <div x-description="Icon closed" x-state:on="Menu show" x-state:off="Menu closed"
                                    :class="{ 'hidden': show, 'block': !(show) }">
                                    <i class='text-2xl bx bx-x'></i>
                                </div>

                                <div x-description="Icon closed" x-state:on="Menu show" x-state:off="Menu closed"
                                    :class="{ 'block': show, 'hidden': !(show) }">
                                    <i class='text-2xl bx bx-dots-vertical'></i> โปรไฟล์
                                </div>
                            </button>

                            <!-- menu -->
                            <ul :class="{ 'hidden md:flex': show, 'flex': !(show) }"
                                class="absolute top:12 md:top-0 left-0 right-0 bg-white dark:bg-slate-900 dark:border-slate-700 md:bg-transparent border-t border-b md:border-t-0 md:border-b-0 border-slate-100 w-full justify-center flex md:relative mt-4 md:mt-0">
                                <li class="relative pr-4  ">
                                    <div class=" w-full ">
                                        <div
                                            class="bg-gradient-to-r from-amber-300 to-black border border-amber-300 border-1 rounded-lg  pl-3 pr-3 ">
                                            <a class="bg-black items-center " href="#">
                                                <div class="items-center flex justify-start">
                                                    <img src="https://admwinr.com/24iboom//public/tem_users/img/icon/depo.png"
                                                        width="30" class="me-2 ms-1 py-1 " />
                                                    <span class="text-amber-400">ฝากเงิน</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li class="relative pr-4 ">
                                    <div class=" w-full ">
                                        <div
                                            class="bg-gradient-to-r from-amber-300 to-black border border-amber-300 border-1 rounded-lg   pl-3 pr-3">
                                            <a class="bg-black items-center " href="#">
                                                <div class="items-center flex justify-start">
                                                    <img src="https://admwinr.com/24iboom//public/tem_users/img/icon/with.png"
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

                <main class="pt-16 pb-20 lg:pb-16">
                    <!-- เนื้อหา -->
                    <div class="p-4 -feed-news-inner-wrapper animated fadeInUp bg-gradient-to-r from-amber-300 to-black border border-amber-300 border-1 rounded-lg data-animatable="fadeInUp"
                        data-delat="200">
                        <div class="-track">
                            <div class="-track-item -duration-normal-content text-white">
                                24IBOOM คาสิโนออนไลน์ สล็อตออนไลน์ ที่ให้คุณสนุกได้ทุกรูปแบบ
                            </div>
                        </div>
                    </div>
                </main>



            </div>
        </div>


    </div>
</div>





<!--   ใส่เมนูใหม่  -->
