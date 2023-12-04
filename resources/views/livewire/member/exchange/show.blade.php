<div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 p-4 pt-16">
    <div class="mx-auto max-w-3xl">
        <div class="flex flex-col space-y-6 justify-center items-center lg:mt-0 md:mt-0 mt-12 mb-5">
            <p class="text-3xl">แลกเครดิต</p>
            <div class="block max-w-xs w-full p-4 bg-gray-800 rounded-3xl shadow-2xl space-y-4">
                <h5 class=" text-lg font-normal tracking-tight text-white text-center">
                    คะแนนของฉัน : <span class="text-amber-400 ">{{$point}}</span>
                </h5>
            </div>
        </div>

        <ul role="list" class="grid grid-cols-2 gap-6 sm:grid-cols-2 lg:grid-cols-3">

            @foreach ($reward as $key => $value)

                <li class="col-span-1 divide-y divide-gray-200 rounded-lg bg-bg-exchange bg-100%  bg-no-repeat ">
                    <div
                        class="group aspect-h-7 aspect-w-full block w-full overflow-hidden rounded-lg   focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 focus-within:ring-offset-gray-100">
                        <img src="{{ env('AWS_LINK'). $value['image'] }}" alt=""
                            class="pointer-events-none object-cover group-hover:opacity-75"
                            style="transform: scale(0.7);">
                    </div>
                    <div>
                        <div class="mt-3 divide-x divide-gray-200 text-center mb-3">

                            <p class="text-center text-sm leading-6 text-white">
                                {{ $value['point'] }} คะแนน
                            </p>

                            <p class="text-center text-sm leading-6 text-white">
                                {{ $value['credit'] }} เครดิต
                            </p>

                            <button
                                wire:click="$emit('openModalConfrimExchange' , [{{$value['point']}}, {{$value['credit']}}])"
                                type="button"
                                class="rounded-md bg-yellow-500 px-3 py-2 text-lg font-semibold text-black shadow-sm hover:bg-yellow-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                แลกเครดิต</button>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>

<livewire:member.exchange.modal-confrim-exchange :pointUser="$point" />
<script>
    document.addEventListener('livewire:load', function() {
        Livewire.on('ExchangeCreditSuccess', function() {
            Swal.fire('สำเร็จ', 'ทำรายการแลกเครดิตสำเร็จ', 'success')
        });
        Livewire.on('cantExchangeCredit', function() {
            Swal.fire('ไม่สำเร็จ', 'ไม่สามารถทำรายการแลกเครดิตได้', 'error')
        });
    });
</script>
