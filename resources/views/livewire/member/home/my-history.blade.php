<div class="min-h-screen p-4 pt-16">
    <div class="flex flex-col space-y-6 justify-center items-center lg:mt-0 md:mt-0 mt-12">
        <p class="text-3xl">ประวัติฝาก - ถอน</p>
        <div class="grid grid-cols-3 gap-4 w-full">
            <div x-data="{ state: true }">
                <button type="button"
                        wire:click="reports('all','all')"
                        x-on:click="state = !state"
                        :class="state ? 'flex grow-0 w-full justify-center rounded-3xl bg-gradient-to-t from-yellow-400 to-yellow-600 hover:bg-gradient-to-t hover:from-yellow-400 hover:to-yellow-600/90 px-5 py-2.5 text-md font-medium leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600'
                        : 'flex grow-0 w-full justify-center rounded-3xl bg-gradient-to-b from-zinc-700 from-30% to-zinc-950 to-70% hover:bg-gradient-to-br hover:from-zinc-950 hover:to-zinc-700 px-5 py-2.5 text-md font-medium leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600'"
                        @click.away="state = false">
                    ทั้งหมด
                </button>
            </div>
            @foreach($types as $type)
                <div x-data="{ state: false }">
                    <button type="button"
                            x-on:click="state = !state"
                            :class="state ? 'flex grow-0 w-full justify-center rounded-3xl bg-gradient-to-t from-yellow-400 to-yellow-600 hover:bg-gradient-to-t hover:from-yellow-400 hover:to-yellow-600/90 px-5 py-2.5 text-md font-medium leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600'
                        : 'flex grow-0 w-full justify-center rounded-3xl bg-gradient-to-b from-zinc-700 from-30% to-zinc-950 to-70% hover:bg-gradient-to-br hover:from-zinc-950 hover:to-zinc-700 px-5 py-2.5 text-md font-medium leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600'"
                            @click.away="state = false"
                            wire:click="reports('{{ $type }}')">
                        {{ $type }}
                    </button>
                </div>
            @endforeach
        </div>

        @if($reports->isEmpty())
            <div class=" my-12 px-12 min-h-screen max-w-full">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 text-center">ไม่พบรายการ</h5>
            </div>
        @else
            <div class="bg-white border-[1px] border-gray-200 rounded-lg w-full">
                <div class="overflow-hidden rounded-md border-t border-gray-100">
                    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                        <div class="mx-auto max-w-2xl lg:mx-0 lg:max-w-none">
                            <table class="w-full text-left table-auto">
                                <tbody>
                                @foreach($reports->sortByDesc('datetime') as $report)
                                    <tr>
                                        <td class="relative py-5 pr-6">
                                            <div class="flex gap-x-6">
                                                {!!  $report['id'] == 'deposit'
                                                ? '<svg class="hidden h-6 w-5 flex-none text-green-400 sm:block" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm-.75-4.75a.75.75 0 001.5 0V8.66l1.95 2.1a.75.75 0 101.1-1.02l-3.25-3.5a.75.75 0 00-1.1 0L6.2 9.74a.75.75 0 101.1 1.02l1.95-2.1v4.59z" clip-rule="evenodd" />
                                                </svg>'
                                                : '<svg class="hidden h-6 w-5 flex-none text-red-400 sm:block" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.75-11.25a.75.75 0 00-1.5 0v4.59L7.3 9.24a.75.75 0 00-1.1 1.02l3.25 3.5a.75.75 0 001.1 0l3.25-3.5a.75.75 0 10-1.1-1.02l-1.95 2.1V6.75z" clip-rule="evenodd" />
                                                  </svg>'
                                                !!}
                                                <div class="flex-auto">
                                                    <div class="flex items-start gap-x-3">
                                                        {!!  $report['id'] == 'deposit'
                                                        ? '<div class="text-sm font-medium leading-6 text-gray-900">฿'. number_format($report['item']->deposit,2) .' บาท</div>
                                                        <div class="rounded-md py-1 px-2 text-xs font-medium ring-1 ring-inset text-green-700 bg-green-50 ring-green-600/20">ฝาก</div>'
                                                        : '<div class="text-sm font-medium leading-6 text-gray-900">฿'. number_format($report['item']->withdraw,2) .' บาท</div>
                                                        <div class="rounded-md py-1 px-2 text-xs font-medium ring-1 ring-inset text-red-400 bg-red-50 ring-red-500/10">ถอน</div>'
                                                        !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="absolute bottom-0 right-full h-px w-screen bg-gray-100"></div>
                                            <div class="absolute bottom-0 left-0 h-px w-screen bg-gray-100"></div>
                                        </td>
                                        <td class="hidden py-5 pr-6 sm:table-cell">
                                            <div class="flex gap-x-6">
                                                <img class="w-8 h-8" src="
                                                    {{
                                                        $report['id'] == 'deposit'
                                                        ?   '/storage/images/bank/'.strtolower($report['item']->StatementtoUserbank->UserbanktoBanks->bank_short)
                                                        :   '/storage/images/bank/'.strtolower($report['item']->StatementtoUserbank->UserbanktoBanks->bank_short)
                                                    }}.svg"
                                                />

                                                <div class="flex-auto">
                                                    <div class="flex items-start gap-x-3">
                                                        <div
                                                            class="text-sm font-medium leading-6 text-gray-900">
                                                            {{
                                                                $report['id'] == 'deposit'
                                                                ? $report['item']->StatementtoUserbank->UserbanktoBanks->name_th
                                                                : $report['item']->StatementtoUserbank->UserbanktoBanks->name_th
                                                            }}
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="mt-1 text-xs leading-5 text-gray-500">
                                                        {{
                                                            $report['id'] == 'deposit'
                                                            ? 'XXX-XXX-'.substr($report['item']->StatementtoUserbank->account,-4)
                                                            : 'XXX-XXX-'.substr($report['item']->StatementtoUserbank->account,-4)
                                                        }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="py-5 ">
                                            <div class="flex">
                                                @if($report['item']->status == 'success')
                                                    <div
                                                        class="rounded-md py-1 px-2 text-xs font-medium ring-1 ring-inset text-green-700 bg-green-50 ring-green-600/20">
                                                        ทำรายการสำเร็จ
                                                    </div>
                                                @elseif($report['item']->status == 'process')
                                                    <div
                                                        class="rounded-md py-1 px-2 text-xs font-medium ring-1 ring-inset text-yellow-700 bg-yellow-50 ring-yellow-600/20">
                                                        กำลังดำเนินการ
                                                    </div>
                                                @elseif($report['item']->status == 'waiting')
                                                    <div
                                                        class="rounded-md py-1 px-2 text-xs font-medium ring-1 ring-inset text-purple-700 bg-purple-50 ring-purple-600/20">
                                                        รอดำเนินการ
                                                    </div>
                                                @elseif($report['item']->status == 'error')
                                                    <div
                                                        class="rounded-md py-1 px-2 text-xs font-medium ring-1 ring-inset text-orange-700 bg-orange-50 ring-orange-700/20">
                                                        รายการผิดพลาด
                                                    </div>
                                                @elseif($report['item']->status == 'other')
                                                    <div
                                                        class="rounded-md py-1 px-2 text-xs font-medium ring-1 ring-inset text-gray-800 bg-gray-50 ring-gray-600/20">
                                                        อื่นๆ
                                                    </div>
                                                @else
                                                    <div
                                                        class="rounded-md py-1 px-2 text-xs font-medium ring-1 ring-inset text-red-700 bg-red-50 ring-red-600/20">
                                                        ยกเลิกรายการ
                                                    </div>
                                                @endif
                                            </div>
                                        </td>
                                        <td class="py-5 text-center">
                                            <div class="flex justify-center">
                                                <p
                                                   class="text-sm font-medium leading-6 text-indigo-600 hover:text-indigo-500"><span
                                                        class="hidden sm:inline"> {{ \Carbon\Carbon::parse($report['datetime'])->thaidate('วันที่ j F y เวลา H:i') }}</span></p>
                                            </div>
                                        </td>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endif

    </div>
</div>
