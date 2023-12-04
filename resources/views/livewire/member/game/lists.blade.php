<div class="mt-16 mb-48">
    <div class="flex justify-center mb-4">
        <span class="bg-black text-white text-2xl  pl-6 pr-6 pt-3 pb-3   rounded-3xl ">{{$vender->name??''}}</span>

    </div>
    <div class="container mx-auto sm:px-6 lg:px-8">

        <ul role="list" class="grid grid-cols-2 gap-6  sm:grid-cols-3  lg:grid-cols-6 ">
            @foreach ($GameList as $item)

                <li class="col-span-1 flex flex-col rounded-lg  text-center shadow">
                    <div
                            wire:click="opengame('{{$item['code']}}')"
                        class="text-center relative hover:bg-[#fff8f8c9] group">
                        {{-- รูป/ข้อความ Hover --}}
                        <span class="absolute text-4xl  top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2  hidden group-hover:block   ">
                            {{ $item['name'] }}
                        </span>

                        @if ( strpos($item['img'],"http")!='' )
                            <img src="{{$item['img']}}" alt=""
                            class="mx-auto hover: flex-shrink-0 hover:opacity-30 rounded-2xl w-full">
                        @else
                        <img src="{{env('LINK_SPACES_CENTER').'images/icon_vender/'.$item['img'].'.svg' }}" alt=""
                        class="mx-auto hover: flex-shrink-0 hover:opacity-30 rounded-2xl">
                        @endif


                    </div>

                </li>
            @endforeach

        </ul>

    </div>

</div>
<script>
    document.addEventListener('livewire:load', function () {
    Livewire.on('openUrlgamelist', function (URL) {
        // if(window.navigator.userAgent.indexOf("Mac") != -1){
            window.open(URL, "_self");
        // }else{
        //      window.open(URL, "_blank");
        // }
    });
    Livewire.on('failOpenUrlgameList', function (URL) {
        Swal.fire('ผิดพลาด','เกมส์กำลังปรับปรุง','error')
    });

    });
</script>
