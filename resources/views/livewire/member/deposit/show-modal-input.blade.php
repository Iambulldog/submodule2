<div>
    <div class="relative z-50 w-auto h-auto">
        <div class="fixed top-0 left-0 z-[99] flex items-center justify-center w-screen h-screen">
            <div wire:click="$emit('setmodal',false)" class="absolute inset-0 w-full h-full bg-black bg-opacity-40">
            </div>
            <div class="relative w-full py-6 bg-white px-7 sm:max-w-lg sm:rounded-lg">
                <div class="flex items-center justify-between pb-2">
                    <button wire:click="$emit('setmodal',false)"
                        class="absolute top-0 right-0 flex items-center justify-center w-8 h-8 mt-5 mr-5 text-gray-600 rounded-full hover:text-gray-800 hover:bg-gray-50">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                @php
                    $showB = collect($user['usersbanks'])->firstWhere('id', $selectbankid);
                @endphp

                <div class="relative w-auto mt-4">
                    <div>
                        <label
                            class="flex items-center  mr-3 p-5 space-x-3 bg-white border rounded-md shadow-sm  border-red-600 ">
                            <img class="w-10 h-10  "
                                src="/storage/images/bank/{{ strtolower($showB['userbankto_banks']['bank_short']) }}.svg" />
                            <span class="relative flex flex-col text-left space-y-1.5 leading-none">
                                <span class="font-semibold">{{ $showB['userbankto_banks']['name_th'] }}</span>
                                <span class="text-sm opacity-50">{{ $showB['account'] }}</span>
                            </span>
                        </label>
                        <div class="flex justify-center m-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 5.25l-7.5 7.5-7.5-7.5m15 6l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </div>

                    </div>

                    <div>

                        <p class="flex justify-center m-4 ">
                            <input type="number" wire:model="amount" min="1"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                            <button type="button" wire:click="submitamount()"
                                {{($selectbankwebid && $amount)?'':'disabled'}}
                                class="inline-flex  items-center justify-center h-10 px-4 py-2 text-sm font-medium transition-colors bg-lime-600  border rounded-md hover:bg-lime-500  active:bg-white focus:bg-white focus:outline-none focus:ring-2 focus:ring-neutral-200/60 focus:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none">
                                ตกลง
                            </button>
                        </p>
                        <span class="flex justify-center mb-1">เลือกบัญชีที่โอนเข้า</span>
                        @foreach ($showBankweb as $item)
                            <label
                                class="mb-1 cursor-copy  flex justify-between text-center mr-3 items-start p-5 space-x-3 bg-white border rounded-md shadow-sm hover:bg-gray-100 border-neutral-200/70">

                                <div class="flex items-center">
                                    <input type="radio" name="radio-group" class="text-gray-900 translate-y-px focus:ring-gray-700 w-6 h-6 mr-4"
                                        value="{{ $item->id }}" wire:model="selectbankwebid"/>
                                    <img class="w-10 h-10  mr-4"
                                        src="/storage/images/bank/{{ strtolower($item->bank->bank_short) }}.svg" />
                                    <span class="relative flex flex-col text-left space-y-1.5 leading-none">
                                        <span class="opacity-50">{{ $item->bank->name_th }}</span>
                                        <span class="font-semibold text-sm  text-center">{{ $item->account }}</span>
                                    </span>
                                </div>
                                <div class="grid grid-rows-2 hover:text-blue-800"
                                onclick="copyToClipboard('{{ $item->account }}')">
                                <span class="flex items-center">
                                    <svg  fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6 ">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 01-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 011.5.124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 00-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 01-1.125-1.125v-9.25m12 6.625v-1.875a3.375 3.375 0 00-3.375-3.375h-1.5a1.125 1.125 0 01-1.125-1.125v-1.5a3.375 3.375 0 00-3.375-3.375H9.75" />
                                    </svg>
                                </span>
                                <span class="text-sm">คัดลอก</span>
                            </div>

                            </label>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
