<div class="p-4 pt-16 md:mt-0 sm:mt-28 xs:mt-6">
    <div class="grid grid-cols-6 gap-4">
        <div class="hidden lg:block">
            <div x-data="{ state: true }">
                <button type="button"
                        wire:click="category('all','all')"
                        x-on:click="state = !state"
                        :class="state ? 'flex grow-0 w-full justify-center rounded-3xl bg-gradient-to-t from-yellow-600 to-yellow-400 hover:bg-gradient-to-t hover:from-yellow-600 hover:to-yellow-400/90 px-5 py-2.5 text-md font-medium leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600'
                            : 'flex grow-0 w-full justify-center rounded-3xl bg-gradient-to-b from-zinc-700 from-30% to-zinc-950 to-70% hover:bg-gradient-to-br hover:from-zinc-950 hover:to-zinc-700 px-5 py-2.5 text-md font-medium leading-6 text-yellow-400 shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600'"
                        @click.away="state = false">
                    ทั้งหมด
                </button>
            </div>
        </div>
        <div class="block lg:hidden">
            <div x-data="{ state: true }">
                <button type="button"
                        wire:click="category('all','all')"
                        x-on:click="state = !state"
                        :class="state ? 'flex grow-0 w-full justify-center rounded-full bg-gradient-to-t from-yellow-600 to-yellow-400  px-5 py-3.5 text-md font-medium leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600'
                        : 'flex grow-0 w-full justify-center rounded-full bg-gradient-to-b from-zinc-700 from-30% to-zinc-950 to-70% hover:bg-gradient-to-br hover:from-zinc-950 hover:to-zinc-700 px-5 py-3.5 text-md font-medium leading-6 text-yellow-400 shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600'"
                        @click.away="state = false">
                    <i class="fa-solid fa-list-ul"></i>
                </button>
            </div>
        </div>
        @foreach($products as $key => $product)
            <div class="hidden lg:block">
                <div x-data="{ state: false }">
                    <button type="button"
                            x-on:click="state = !state"
                            :class="state ? 'flex grow-0 w-full justify-center rounded-3xl bg-gradient-to-t from-yellow-600 to-yellow-400 hover:bg-gradient-to-t hover:from-yellow-600 hover:to-yellow-400/90 px-5 py-2.5 text-md font-medium leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600'
                            : 'flex grow-0 w-full justify-center rounded-3xl bg-gradient-to-b from-zinc-700 from-30% to-zinc-950 to-70% hover:bg-gradient-to-br hover:from-zinc-950 hover:to-zinc-700 px-5 py-2.5 text-md font-medium leading-6 text-yellow-400 shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600'"
                            @click.away="state = false"
                            wire:click="category('{{ $key }}')" >
                        {{ $product['name'] }}
                    </button>
                </div>
            </div>
            <div class="block lg:hidden">
                <div x-data="{ state: false }">
                    <button type="button"
                            x-on:click="state = !state"
                            :class="state ? 'flex grow-0 w-full justify-center rounded-3xl bg-gradient-to-t from-yellow-600 to-yellow-400 hover:bg-gradient-to-t hover:from-yellow-600 hover:to-yellow-400/90 px-5 py-3.5 text-md font-medium leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600'
                            : 'flex grow-0 w-full justify-center rounded-3xl bg-gradient-to-b from-zinc-700 from-30% to-zinc-950 to-70% hover:bg-gradient-to-br hover:from-zinc-950 hover:to-zinc-700 px-5 py-3.5 text-md font-medium leading-6 text-yellow-400 shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600'"
                            @click.away="state = false"
                            wire:click="category('{{ $key }}')" >
                        {!! $product['icon']  !!}
                    </button>
                </div>
            </div>
        @endforeach
    </div>

    @if($product_selected->isEmpty())
        <div class=" my-12 px-12 min-h-screen ">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 text-center">ไม่พบรายการโปรโมชั่น</h5>
        </div>
    @else
        <div class="grid lg:grid-cols-3 md:grid-cols-1 gap-3">
        @foreach($product_selected as $product_item)


            <div class="space-y-4 my-4 px-12 rounded-3xl p-3 border-2 border-yellow-400 drop-shadow-2xl bg-yellow-100">
                <div class="item-start">
                    <img class="hover:animate-bounce drop-shadow-2xl rounded-xl object-fill object-center w-full    md:h-auto md:w-full  "
                    src="{{ env('AWS_LINK').$product_item->image }}" alt="{{ $product_item->name }}">
                </div>
                <div class="text-center">
                    <h5 class="mb-2 text-3xl font-semibold tracking-tight text-gray-900 dark:text-white">{{ $product_item->name }}</h5>
                </div>
                <div>
                    <p class="hyphens-auto mb-3 font-normal text-yellow-700 dark:text-gray-400 break-all" lang="de">{!! $product_item->detail !!}</p>
                </div>
                <div class="grid grid-cols-2 gap-1">
                    @if($product_item->Products_Promotions->type_turnover == 1)
                        @php
                            if($product_item->Products_Promotions->turnover_sport):
                                echo '<p class="bg-yellow-400 text-white text-base font-medium mr-2 my-1 px-2.5 py-0.5 rounded-full ">กีฬา '.$product_item->Products_Promotions->turnover_sport.' เท่า </p>';
                            endif;
                            if($product_item->Products_Promotions->turnover_casiono):
                                echo '<p class="bg-green-400 text-white text-base font-medium mr-2 my-1 px-2.5 py-0.5 rounded-full ">คาสิโน '.$product_item->Products_Promotions->turnover_casiono.' เท่า </p>';
                            endif;
                            if($product_item->Products_Promotions->turnover_lotto):
                                echo '<p class="bg-purple-400 text-white text-base font-medium mr-2 my-1 px-2.5 py-0.5 rounded-full ">หวย '.$product_item->Products_Promotions->turnover_lotto.' เท่า </p>';
                            endif;
                            if($product_item->Products_Promotions->turnover_slot):
                                echo '<p class="bg-red-400 text-white text-base font-medium mr-2 my-1 px-2.5 py-0.5 rounded-full ">สล็อต '.$product_item->Products_Promotions->turnover_slot.' เท่า </p>';
                            endif;
                            if($product_item->Products_Promotions->turnover_ptp):
                                echo '<p class="bg-blue-400 text-white text-base font-medium mr-2 my-1 px-2.5 py-0.5 rounded-full ">แข่งขัน '.$product_item->Products_Promotions->turnover_ptp.' เท่า </p>';
                            endif;
                        @endphp
                          
                        @else
                        @php
                        if($product_item->Products_Promotions->turnover_sport):
                            echo '<p class="bg-yellow-400 text-white text-base font-medium mr-2 my-1 px-2.5 py-0.5 rounded-full ">กีฬา '.$product_item->Products_Promotions->turnover_sport.' จำนวน </p>';
                        endif;
                        if($product_item->Products_Promotions->turnover_casiono):
                            echo '<p class="bg-green-400 text-white text-base font-medium mr-2 my-1 px-2.5 py-0.5 rounded-full ">คาสิโน '.$product_item->Products_Promotions->turnover_casiono.' จำนวน </p>';
                        endif;
                        if($product_item->Products_Promotions->turnover_lotto):
                            echo '<p class="bg-purple-400 text-white text-base font-medium mr-2 my-1 px-2.5 py-0.5 rounded-full ">หวย '.$product_item->Products_Promotions->turnover_lotto.' จำนวน </p>';
                        endif;
                        if($product_item->Products_Promotions->turnover_slot):
                            echo '<p class="bg-red-400 text-white text-base font-medium mr-2 my-1 px-2.5 py-0.5 rounded-full ">สล็อต '.$product_item->Products_Promotions->turnover_slot.' จำนวน </p>';
                        endif;
                        if($product_item->Products_Promotions->turnover_ptp):
                            echo '<p class="bg-blue-400 text-white text-base font-medium mr-2 my-1 px-2.5 py-0.5 rounded-full ">แข่งขัน '.$product_item->Products_Promotions->turnover_ptp.' จำนวน </p>';
                        endif;
                    @endphp
                        @endif
                      </div>


            </div>



        @endforeach
        </div>
    @endif
</div>
