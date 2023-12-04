<div class="min-h-screen p-4 pt-16">
    <div class="flex flex-col space-y-6 justify-center items-center lg:mt-0 md:mt-0 mt-12">
        <p class="text-3xl">เพิ่มบัญชี</p>
        <div class="block max-w-xl w-full p-4 bg-neutral-600 rounded-3xl shadow-2xl space-y-4 text-center">
            <div>
                <label for="banks" class="block text-sm font-medium leading-6 text-gray-900">ธนาคาร</label>
                <select id="banks" name="banks" wire:model="users_banks.banks_id"
                    class="text-center mt-2 block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300  sm:text-sm sm:leading-6">
                    <option value="">กรุณาเลือกธนาคาร</option>

                    @foreach ($banks as $item)
                        <option value="{{ $item->id }}">
                            {{ $item->name_th }} - [ {{ $item->bank_short }} ]
                        </option>
                    @endforeach
                </select>

                @error('users_banks.banks_id')
                    <span class="text-red-500  "> {{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="account" class="block text-sm font-medium leading-6 text-gray-900">เลขบัญชี</label>
                <input wire:model="users_banks.account" name="account" autocomplete="off"
                    class="text-center mt-2 block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300  sm:text-sm sm:leading-6" />
                @error('users_banks.account')
                    <span class="text-red-500  "> {{ $message }}</span>
                @enderror
            </div>

            <button type="button" wire:click="addAccount"
                class=" pt-1 pb-1 pl-4 pr-4 rounded-3xl bg-gradient-to-b from-sky-300 from-10% to-sky-600 to-90% hover:bg-gradient-to-br hover:from-sky-600 hover:to-sky-500">
                เพิ่มบัญชี
            </button>

        </div>


        <div class="text-center rounded-lg ">
            <p class="text-md bg-gradient-to-r from-[#acabab02]   via-gray-600/50 via-50% to-[#acabab02] ">
                รายการบัญชี</p>
            <table class="min-w-full divide-y divide-gray-700 bg-gray-800 rounded-t-3xl  text-sm mt-2 ">
                <tbody class="">
                    <tr class=" text-white p-2">
                        <th scope="col" class="p-3">#</th>
                        <th scope="col" class="p-3">ธนาคาร</th>
                        <th scope="col" class="p-3">บัญชี</th>
                        <th scope="col" class="p-3">สถานะ</th>
                        <th scope="col" class="p-3">แก้ไข</th>
                    </tr>
                </tbody>
                <tbody class=" ">
                    @if (!empty($MyUsersBanks))
                        @foreach ($MyUsersBanks as $key => $item)
                            <tr class="text-white  odd:bg-gray-600" x-data="{ input: false }">
                                <td class="p-3">{{ $key + 1 }}</td>
                                <td class="p-3">
                                    <img class="w-5 h-5  "
                                        src="/storage/images/bank/{{ strtolower($item['userbankToBanks']['bank_short']) }}.svg" />
                                </td>
                                <td class="p-3">
                                    <input type="hidden" name="id" value="{{ $item['id'] }}" />
                                    <input x-show="input"
                                        wire:input="$set('editbank.{{ $item['id'] }}.account',$event.target.value)"
                                        name="account" type="text" value="{{ $item['account'] }}"
                                        class="text-center  block w-full rounded-md border-0
                                    py-1 pl-1 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300
                                    sm:text-sm sm:leading-6" />
                                    <span x-show="!input">{{ $item['account'] }}</span>

                                </td>
                                <td
                                    class="p-3 {{ $item['approve'] == 'disapproval' || $item['approve'] == 'cancel' ? 'text-red-400' : 'text-green-400' }}">
                                    {{ ($item['approve'] == 'disapproval') ? 'รอตรวจสอบบัญชี' : (($item['approve'] == 'cancel') ? 'ไม่อนุมัติ' : 'อนุมัติ') }}
                                </td>
                                <td class="p-3">
                                    @if ($item['approve'] == 'disapproval')
                                        <svg x-show="!input" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                            stroke="currentColor"
                                            wire:click="$set('editbank.{{ $item['id'] }}.account','{{ $item['account'] }}')"
                                            class="w-6 h-6 cursor-pointer hover:text-amber-400"
                                            @click="input = ! input">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                        </svg>
                                        <svg wire:click="editAccount({{ $item['id'] }})" @click="input = ! input"
                                            x-show="input" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                            stroke="currentColor" class="w-6 h-6 cursor-pointer  hover:text-green-400">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9 13.5l3 3m0 0l3-3m-3 3v-6m1.06-4.19l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                                        </svg>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr class="text-white">
                            <td colspan="5" class="p-3">ไม่มีรายการ</td>
                        </tr>
                    @endif


                </tbody>
            </table>

        </div>



    </div>
</div>

<script>
    document.addEventListener('livewire:load', function() {
        Livewire.on('addBankError', function () {
            Swal.fire('ไม่สำเร็จ !', 'เพิ่มบัญชีไม่สำเร็จ', 'error')
        });
        Livewire.on('editError', function (res) {
            Swal.fire(res['title'], res['msg'], res['type'])

            Livewire.on('addBankSuccess', function () {
                Swal.fire({
                    title: 'เพิ่มบัญชีสำเร็จ',
                    icon: 'success',
                    confirmButtonText: 'ตกลง',
                    allowOutsideClick: false,
                    timer: 2000,
                    timerProgressBar: true,
                }).then(() => {
                    window.location = "{{ route('member.pocket.home') }}";
                });
            });
        });
    });
</script>
