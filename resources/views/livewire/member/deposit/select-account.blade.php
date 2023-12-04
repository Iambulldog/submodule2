<div class="p-4 pt-16">
    <div class="mb-4">
        <div class="flex justify-center mb-4">
            <span
                class="bg-black text-white text-2xl   pl-6 pr-6 pt-3 pb-3   rounded-xl ">เลือกบัญชีที่จะทำรายการ</span>
        </div>

        {{-- class="text-left border border-black rounded-2xl lg:p-10 xs:p-4 bg-amber-200 shadow-sm hover:bg-yellow-400"
        --}}
        <div>

            @if ($user['usersbanks'])
            <ul role="list" class="grid grid-cols-1 gap-x-6 gap-y-8 lg:grid-cols-3 xl:gap-x-8">
                @foreach ($user['usersbanks'] as $item)

                <li class="overflow-hidden rounded-xl border border-gray-200" >
                    <div class="flex items-center gap-x-4 border-b border-gray-900/5 bg-gray-50 p-6">
                        <input wire:click="setmodal(true)" type="radio" name="radio-group" value="{{ $item['id'] }}" wire:model="selectbankid"
                        class="text-gray-900 translate-y-px focus:ring-gray-700 w-6 h-6" />
                        <img class="h-10 w-10 flex-none rounded-lg bg-white object-cover ring-1 ring-gray-900/10"
                            src="/storage/images/bank/{{ strtolower($item['userbankto_banks']['bank_short']) }}.svg" />
                        <div class="text-sm font-medium leading-6 text-gray-900">
                            <span class="relative flex flex-col text-left space-y-1.5 leading-none">
                                <span class="font-semibold">{{ $item['userbankto_banks']['name_th'] }}</span>
                                <span class="text-sm opacity-50">{{ $item['account'] }}</span>
                            </span>
                        </div>

                    </div>
                    <dl class="-my-3 divide-y divide-gray-100 px-6 py-4 text-sm leading-6">
                        @foreach ($item['bankweb'] as $bankweb)
                        <div class="flex justify-between gap-x-4 py-3">
                            <dt class="text-gray-500">
                                <img class="h-8 w-8 flex-none rounded-lg bg-white object-cover ring-1 ring-gray-900/10"
                                    src="/storage/images/bank/{{ strtolower($bankweb['bank']['bank_short']) }}.svg" />
                            </dt>
                            <span class="relative flex flex-col text-left space-y-1.5 leading-none">
                                <span class="text-xs">{{ $bankweb['bank']['name_th'] }}</span>
                                <span class="text-sm">{{ $bankweb['name'] }}</span>
                                <span class="font-semibold ">{{ $bankweb['account'] }}</span>
                            </span>
                            <div class="grid grid-rows-2 hover:text-blue-800 cursor-copy "
                                onclick="copyToClipboard('{{ $bankweb['account'] }}')">
                                <span class="flex items-center">
                                    <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                        class="w-6 h-6 ">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 01-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 011.5.124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 00-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 01-1.125-1.125v-9.25m12 6.625v-1.875a3.375 3.375 0 00-3.375-3.375h-1.5a1.125 1.125 0 01-1.125-1.125v-1.5a3.375 3.375 0 00-3.375-3.375H9.75" />
                                    </svg>
                                </span>
                                <span class="text-sm">คัดลอก</span>
                            </div>
                        </div>
                        @endforeach


                    </dl>
                </li>
                @endforeach
            </ul>
            @else
            <a href="{{route('member.pocket.add-account')}}"
                class=" pt-1 pb-1 pl-4 pr-4 rounded-3xl bg-gradient-to-b from-sky-300 from-10% to-sky-600 to-90% hover:bg-gradient-to-br hover:from-sky-600 hover:to-sky-500">เพิ่มบัญชี</a>
            @endif

        </div>



    </div>
    @if ($openmodal)
    <livewire:member.deposit.show-modal-input :user="$user" :showBankweb="$showBankweb" :selectbankid="$selectbankid"
        :selectbankwebid="$selectbankwebid" />
    @endif
</div>
<script type="text/javascript">
    function copyToClipboard(account) {
        navigator.clipboard.writeText(account);
        alert("คัดลอก " + account);
    }
</script>
