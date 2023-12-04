@php
    $bg="bg-[url('".asset("/storage/images/bg.png")."')]"
@endphp
<x-guest bg="{!!$bg!!}">
 

    <div class="grid grid-cols-2 gap-4 lg:flex xs:hidden">
        <div>
            <img src="{{asset('/storage/images/icon_home/promotion1.png')}}" class="w-full animate-bounce">
        </div> 
        <div class="animate-pulse">
            <img src="{{asset('/storage/images/icon_home/promotion2.png')}}" class="w-full">
        </div>
    </div>
    <div class="lg:hidden xs:flex">
        <img src="{{asset('/storage/images/icon_home/promotion2.png')}}" class="w-full animate-bounce">
    </div>
    <div>
        <b class="text-4xl text-yellow-700"> PROMOTIONS</b><p> เว็บพนันที่รวบรวมเกมทุกชนิด มาให้คุณแล้วที่นี่ที่เดียว </p>
    </div>


    <div class="pb-20 pt-3">
        <div class="grid lg:grid-cols-3 xs:grid-cols-1 gap-1">

            @foreach($products as $key => $product_item)
            <div class="space-y-4 my-4 px-12 rounded-3xl p-3 border-2 border-yellow-400 drop-shadow-2xl bg-yellow-100 ">
                {{-- <img src="{{ asset('storage/'.$product_item->image) }}" class="hover:animate-bounce drop-shadow-2xl rounded-xl object-fill object-center w-full    md:h-auto md:w-full  " alt="สุขสันต์ วันสล็อต! ฝาก 50-299 รับโบนัส 20% "> --}}
                <img src="{{ env('AWS_LINK').$product_item->image }}" class="hover:animate-bounce drop-shadow-2xl rounded-xl object-fill object-center w-full md:h-auto md:w-full  " alt="{{ $product_item->name }}">
                <div class="card-body-promotion  text-center">
                    <h5 class="text-truncate">{{ $product_item->name }}</h5> 
                </div>
                <div class="card-body-promotion "> 
                    <p class="text-truncate">{!! $product_item->detail !!}</p>
                </div>
            </div>

 
            @endforeach
        </div>

    </div>
    
         
    

</x-guest>
