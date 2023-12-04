@php
    $bg="bg-[url('".asset("/storage/images/bg.png")."')]"
@endphp
<x-guest bg="{!!$bg!!}">

    <div class=" mb-8 pb-16">
      <div class="text-center">
        <div class="p-6">
          <b class="text-2xl p-10"> {!!$blog['title']!!}</b>
        </div>
        <div class="items-center flex justify-center pb-7">
          <img src="{{ asset('storage/' . $blog['img']) }}"  class="w-8/12 ">
        </div>

      </div>
     
      <div class=" border-black rounded-2xl lg:p-6 xs:p-4 bg-amber-200">
        {!!$blog['detail']!!}
      </div>
      
    </div>

</x-guest>
