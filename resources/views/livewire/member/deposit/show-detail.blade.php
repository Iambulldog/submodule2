<div class="">
    @if ($openmodaldetail)
    @php
    $detail = json_decode($details);
    @endphp
    <div class=" z-50 w-auto h-auto flex items-center justify-center ">

        <div class=" fixed left-0 z-[99]  w-screen flex items-center justify-center  ">
            <div wire:click="$set('openmodaldetail', false)"
                class="absolute inset-0 w-full h-full bg-black bg-opacity-40">
            </div>
            <div
                class="mb-3 fixed flex items-center justify-center top-0  bg-white sm:max-w-lg sm:rounded-lg h-full w-full   overflow-y-auto overflow-x-hidden">
                <div class="flex items-center justify-between pb-2 ">
                    <button wire:click="$set('openmodaldetail', false)"
                        class="absolute top-0 right-0 flex items-center justify-center w-8 h-8 mt-5 mr-5 text-gray-600 rounded-full hover:text-gray-800 hover:bg-gray-50">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="relative w-auto mt-4 py-6">
                    <div>
                        <label
                            class="flex items-center  mr-3 p-2 space-x-3 bg-white border rounded-md shadow-sm  border-red-600 ">
                            <img class="w-8 h-8  "
                                src="/storage/images/bank/{{ strtolower($detail->userbank->userbankto_banks->bank_short) }}.svg" />
                            <span class="relative flex flex-col text-left space-y-1.5 leading-none">
                                <span class="text-sm opacity-50">{{ $detail->userbank->userbankto_banks->name_th
                                    }}</span>
                                <span class="font-semibold text-sm  text-center">{{ $detail->userbank->account }}</span>
                            </span>
                        </label>

                        @if ($detail->bankweb->promptpay)
                        <div class="text-center flex justify-center mt-4">
                            @php
                            $qrcode = base64_encode(
                            \SimpleSoftwareIO\QrCode\Facades\QrCode::format('png')
                            ->merge(asset('/storage/images/logoQr.png'), 1, true)
                            ->size(200)
                            ->generate($this->generate()),
                            );
                            @endphp
                            <img class="text-center" src="data:image/png;base64, {!! $qrcode !!} ">

                        </div>
                        <div class="text-center mt-4">
                            <a href="data:image/png;base64, {!! $qrcode !!} " download
                                class="pt-1 pb-1 pr-2 pl-2 bg-sky-400 rounded-3xl ">
                                <i class="fa fa-cloud-download" aria-hidden="true"></i> บันทึกรูป
                            </a>
                        </div>
                        <p class="text-center mt-2 "> แสกน QR code ด้วยแอปธนาคาร </p>
                        @endif

                        <p class="text-center mt-2 mb-1"> ยอดโอน {{ $detail->amount }} ฿ </p>
                    </div>

                    <div>
                        <label
                            class="mb-1 cursor-copy  flex justify-between text-center mr-3 items-start p-2 space-x-3 border-green-700    bg-white border rounded-md shadow-sm hover:bg-gray-100 border-neutral-200/70">
                            <div class="flex items-center">
                                <img class="w-8 h-8  mr-4"
                                    src="/storage/images/bank/{{ strtolower($detail->bankweb->bank->bank_short) }}.svg" />
                                <span class="relative flex flex-col text-left space-y-1.5 leading-none">
                                    <span class="opacity-50">{{ $detail->bankweb->bank->name_th }} [
                                        {{ $detail->bankweb->name }} ]</span>
                                    <span class="font-semibold text-sm  text-center">
                                        {{ $detail->bankweb->account }}</span>
                                </span>
                            </div>
                            <div class="grid grid-rows-2 hover:text-blue-800"
                                onclick="copyToClipboard('{{ $detail->bankweb->account }}')">
                                <span class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6 ">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 01-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 011.5.124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 00-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 01-1.125-1.125v-9.25m12 6.625v-1.875a3.375 3.375 0 00-3.375-3.375h-1.5a1.125 1.125 0 01-1.125-1.125v-1.5a3.375 3.375 0 00-3.375-3.375H9.75" />
                                    </svg>
                                </span>
                                <span class="text-sm">คัดลอก</span>
                            </div>
                        </label>


                    </div>
                    {{-- แสดงเวลาคงเหลือ --}}
                    <div>
                        <div wire:poll.100ms="countdown" class="text-center ">
                            {{ $diff < 0 ? 'หมดเวลาโอน' : 'กรุณาโอนภายใน' }} <span
                                class="text-lg  {{ $diff < 0 ? 'text-red-600' : 'text-blue-700' }} ">{{ $timecountdown
                                }}</span>

                                @if ( $diff > 0)
                                หรือ
                                <button wire:click="canceldeposit"
                                    class="inline-flex items-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">
                                    ยกเลิก
                                </button>
                                @endif


                        </div>
                    </div>
                    {{-- แนบสลิป / ยกเลิก --}}
                    <div class="mt-1 ">

                        <div class="col-span-full">
                            <label for="cover-photo"
                                class="block text-sm font-medium leading-6 text-gray-900 text-center ">สลิป</label>
                            <div
                                class="flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-3  ">

                                <div class="text-center   ">
                                    @if ($detail->slip && !$slip)
                                    <img src="{{ env('AWS_LINK').$detail->slip }}" class="w-full max-h-48   max-w-fit mb-4 ">
                                    @else
                                    @if ($slip)
                                    <img src="{{ $slip->temporaryUrl() }}" class="w-full max-h-48 max-w-fit mb-4 ">
                                    @else
                                    <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor"
                                        aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    @endif
                                    @endif

                                    @if ($diff > 0 && $detail->status != 'success')
                                    <div class="mt-4 flex text-sm leading-6 text-gray-600">
                                        <label for="file-upload"
                                            class="relative cursor-pointer inline-flex items-center rounded-md bg-blue-600 px-2 py-1 text-xs font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
                                            <span>เลือกรูป </span>
                                            <input id="file-upload" wire:model="slip" name="file-upload" type="file"
                                                class="sr-only">
                                        </label>
                                        <p class="pl-8">
                                            <button wire:click="$set('slip',null)"
                                                class="inline-flex items-center rounded-md bg-gray-600 px-2 py-1 text-xs font-semibold text-white shadow-sm hover:bg-gray-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600">
                                                ล้างค่า
                                            </button>
                                        </p>
                                        @if ($slip)
                                        <p class="pl-8">
                                            <button wire:click="uploadeSlip"
                                                class="inline-flex items-center rounded-md bg-green-600 px-2 py-1 text-xs font-semibold text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">
                                                อัปโหลด
                                            </button>
                                        </p>
                                        @endif
                                    </div>
                                    @endif


                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @endif


</div>
<script>
    document.addEventListener('livewire:load', function() {
        Livewire.on('showswlUploadeslip', function() {
            Swal.fire('สำเร็จ', 'อัปโหลดสลิบสำเร็จ', 'success')
        });
    });
</script>