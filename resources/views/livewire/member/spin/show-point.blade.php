<div class="flex justify-center   ">
    <ul role="list" class="grid gap-10 grid-cols-2 text-white ">
        <li class=" ">
            <div class="hover:scale-105 text-center bg-bg-icon bg-100%  bg-no-repeat">
                <div class="p-3 pb-3">
                    <b class="text-xl text-black animate-pulse">สิทธิ์คงเหลือ : {{$user['spin']}}</b>
                </div>
            </div>
        </li>
        
        <li class="">      
            <div class="hover:scale-105 text-center bg-bg-icon bg-100%  bg-no-repeat">
                <div class="p-3 pb-3">
                    <b class="text-xl text-black animate-pulse">แต้มของฉัน : {{$user['point']}}</b>
                </div>
            </div>      
        </li>
      </ul>
</div>
