@php
    $bg = "bg-[url('" . asset('/storage/images/bg.png') . "')]";
@endphp
<x-guest bg="{!! $bg !!}">

    <div class="">
        <div class="">
            <div>
                <img src="{{asset('/storage/images/icon_home/slide2.png')}}" class="w-full "></div> 
            </div>

            <div class="grid grid-cols-2 gap-x-4 gap-y-8 sm:grid-cols-3 sm:gap-x-6 lg:grid-cols-4 xl:gap-x-8">
                @foreach ($blog as $item)

                <div class="relative text-left border border-black rounded-2xl lg:p-6 xs:p-4 bg-amber-200" >
                    <a href="{{route('blog.show',['link'=>$item['link']])}}">
                    <div  class="group aspect-h-7 aspect-w-10 block w-full overflow-hidden rounded-lg bg-gray-100 focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 focus-within:ring-offset-gray-100">
                        <img src="{{ asset('storage/' . $item['img']) }}" alt=""  class="hover:scale-125 pointer-events-none object-cover ">
                    </div>
                    <p class="pointer-events-none mt-2 block truncate text-sm font-medium text-gray-900 text-center">
                        {{ $item['title'] }}
                    </p>
                    </a>
                </div>
            @endforeach
            </div>

 

    </div>



</x-guest>
