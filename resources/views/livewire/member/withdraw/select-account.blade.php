@php
$st =   json_decode($setting); 
@endphp
<div class="p-4 pt-14">
    <div class="flex justify-center p-4">
        <span class="bg-black text-white text-2xl   pl-6 pr-6 pt-3 pb-3   rounded-xl "> ถอนเครดิต</span>
    </div>
    
    @if ($user->Usersbanks->isNotEmpty())
        <form wire:submit.prevent="saveWithdraw">
            <div class="bg-gray-800  text-white p-5 rounded-lg text-xl">
                <div class="grid grid-cols-2 gap-2 text-center ">
                    <div class=""><span> {{ $user->username }} </span></div>
                    <div class="flex justify-between   ">
                        <span>เครดิต {{ number_format($credit, 2) }} ฿</span>
                        <div wire:click="refreshCredit" class="flex justify-center cursor-pointer hover:text-red-500 ">

                            <svg wire:loading aria-hidden="true"
                                class="absolute w-6 h-6 mr-2 text-gray-200 animate-spin fill-blue-900"
                                viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                    fill="currentColor" />
                                <path
                                    d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                    fill="currentFill" />
                            </svg>

                            <svg wire:loading.remove xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                class="w-6 h-6 absolute hover:animate-spin ">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                            </svg>

                        </div>
                    </div>
                </div>
                <div class="flex  grid-cols-2 gap-4 items-center ">
                    <div>
                        <label for="location" class="  leading-6 "> ระบบจะถอนเข้าบัญชี </label>
                    </div>
                    <div>
                        <select id="location" name="location" wire:model="userbank"
                            class="mt-2  w-full rounded-md  py-1.5 pl-3 pr-10 bg-gray-800  ring-1 ring-inset  sm:text-sm sm:leading-6 border-0 border-gray-800 ">
                            @foreach ($user->Usersbanks as $key => $item)
                                <option value="{{ $item['id'] }}">
                                    {{ $item['userbankToBanks']['name_th'] . ' ' . $item['account'] }}
                                </option>
                            @endforeach

                        </select>

                    </div>

                </div>
            </div>
            <div class="mt-3 text-center">

                <input type="number" {{$st->status=='inactive'?'disabled':'' }}
                    class="text-center block w-full {{$st->status=='inactive'?'bg-gray-300  ':''}} rounded-md border-0 py-2 text-gray-900 shadow-sm ring-1 ring-inset  sm:text-sm sm:leading-6"
                    wire:model="amount" />
                @error('bankid')
                    <span class="error text-gray-900">{{ $message }}</span>
                @enderror
                @error('amount')
                    <span class="error text-gray-900">{{ $message }}</span>
                @enderror
                <div class=" flex justify-center mt-3">
                    <button id="withdraw" type="submit" {{$st->status=='inactive'?'disabled':'' }}
                        class="flex w-1/2 justify-center {{$st->status=='inactive'?'cursor-not-allowed':''}} rounded-md bg-red-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-red-700 ">
                        ยืนยันการถอน</button>

                </div>

            </div>
        </form>
    @else
        <a href="{{ route('member.pocket.add-account') }}"
            class=" pt-1 pb-1 pl-4 pr-4 rounded-3xl bg-gradient-to-b from-sky-300 from-10% to-sky-600 to-90% hover:bg-gradient-to-br hover:from-sky-600 hover:to-sky-500">เพิ่มบัญชี</a>
    @endif
        {{-- เงื่อนไขถอน --}}
        <div class="flex flex-col text-center mt-4 ">

            <span>**จำนวนถอนขั้นต่ำ {{$st->minwd}} ฿ | (ทรูวอเล็ต) {{$st->minture}} ฿</span>
            <span>**จำนวนถอนสูงสุดต่อครั้ง {{$st->maxwd}} ฿</span>
            <span >**จำนวนสูงสุดต่อวัน {{$st->maxday}} ฿</span>
  
        </div>


</div>

<script>
    document.addEventListener('livewire:load', function() {
        Livewire.on('showswl', function() {
            Swal.fire('สำเร็จ', 'ส่งรายการถอนเรียบร้อย', 'success')
        });
        Livewire.on('showMsgError', function(msg) {
            Swal.fire('ผิดพลาด', msg, 'error')
        });

    });
</script>
