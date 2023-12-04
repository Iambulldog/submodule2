@php
    $bg="bg-[url('".asset("/storage/images/bg.png")."')]"
@endphp
<x-guest bg="{!!$bg!!}">
    
 

    <div class="grid grid-cols-2 gap-4 lg:flex xs:hidden">
        <div>
            <img src="{{asset('/storage/images/icon_home/casino.png')}}" class="w-full animate-bounce">
        </div>
        <div class=" animate-bounce">
            <img src="{{asset('/storage/images/icon_home/casino2.png')}}" class="w-full">
        </div>
    </div>
    <div class="lg:hidden xs:flex">
        <img src="{{asset('/storage/images/icon_home/casino.png')}}" class="w-full animate-bounce">
    </div>
    <div>
        <b class="text-4xl">24IBOOM <b class="text-4xl text-yellow-700"> CASINO</b></b><p> เว็บพนันที่รวบรวมเกมทุกชนิด มาให้คุณแล้วที่นี่ที่เดียว </p>
    </div>

    

    <div class="pb-20 pt-3">
        <div class="grid lg:grid-cols-6 xs:grid-cols-2 gap-2">

            @foreach($products as $key => $product_item)

            <div class="text-left border border-black rounded-2xl lg:p-4 xs:p-2 bg-bg-icon-2 bg-100%  bg-no-repeat">

                <span class="relative flex h-12 w-12 ml-24 -mt-7 {{ $product_item->hot?'':'hidden' }}">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-12 w-12 bg-red-500 text-sm  items-center"> 
                    <img src="{{asset('/storage/images/icon_home/1041906.png')}}"  class="h-12 w-12"> </span>
                </span>

                    
                <img src="{{ asset('storage/images/img_vender/'.$product_item->code) }}.svg" class="lazy hover:scale-125" alt="สุขสันต์ วันสล็อต! ฝาก 50-299 รับโบนัส 20% ">
                <div class="card-body-promotion  text-center">
                    <h5 class="text-truncate text-yellow-500">{{ $product_item->name }}</h5>
                    <p class="text-truncate">{!! $product_item->detail !!}</p>
                </div>
            </div>
              
 
            @endforeach
        </div>

    </div>
    
         
    

</x-guest>
