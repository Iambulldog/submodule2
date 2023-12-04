<div class="min-h-screen p-4 pt-16">
    <div class="flex flex-col space-y-6 justify-center items-center lg:mt-0 md:mt-0 mt-12">
        <p class="text-3xl">บัญชีของฉัน</p>
        <div class="block max-w-xl w-full p-4 bg-neutral-600 rounded-3xl shadow-2xl space-y-4">
            <div class="grid grid-rows-3 text-left">
            <h5 class="mb-2 text-lg font-normal tracking-tight text-white grid grid-cols-2">
                <span class="text-gray-400 text-right mr-4 ">Username :</span>  <span>{{ $user_profile->username }}</span>
            </h5>
            <h5 class="mb-2 text-lg font-normal tracking-tight text-white grid grid-cols-2">
                <span class="text-gray-400 text-right mr-4 ">ชื่อสกุล :</span>  <span>{{ $user_profile->Profile->name??'' }}</span>
            </h5>
            <h5 class="mb-2 text-lg font-normal tracking-tight text-white grid grid-cols-2">
               <span class="text-gray-400 text-right mr-4 ">เบอร์โทรศัพท์ :</span>   <span>{{ $user_profile->Profile->phone??'' }}</span>
            </h5>
        </div>
            <hr class="border-[1px] border-neutral-500/40 my-3">

            <div class="flex items-center text-center justify-center w-full">
                <a href="{{route('member.pocket.add-account')}}" class=" pt-1 pb-1 pl-4 pr-4 rounded-3xl bg-gradient-to-b from-zinc-700 from-30% to-zinc-950 to-70% hover:bg-gradient-to-br hover:from-yellow-400 hover:to-yellow-500 hover:text-black px-7 py-2.5 text-md font-medium leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    เพิ่มบัญชี
                </a>
            </div>

            <div class="mx-auto grid grid-cols-3 justify-items-center place-items-center gap-4">

                @foreach($user_bank as $bank)
                    <div>
                        <img class="w-8 h-8" src="/storage/images/bank/{{ strtolower($bank->UserbanktoBanks->bank_short) }}.svg" />

                    </div>
                    <div>
                        <p class="text-lg text-white">{{ strtolower($bank->UserbanktoBanks->name_th) }}</p>
                    </div>
                    <div>
                        <p class="text-lg text-white">{{ strtolower($bank->account) }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        {{--เรียกใช้ modal-เปลี่ยนรหัสผ่าน--}}
        <button onclick="Livewire.emit('openModal', 'member.component.modal-change-password')"
                class="flex justify-center rounded-3xl bg-gradient-to-b from-zinc-700 from-30% to-zinc-950 to-70% hover:bg-gradient-to-br hover:from-yellow-400 hover:to-yellow-500 hover:text-black px-7 py-2.5 text-md font-medium leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            เปลี่ยนรหัสผ่าน
        </button>
    </div>
</div>

<script>
    document.addEventListener('livewire:load', function() {
        Livewire.on('changePasswordFailed', function () {
            Swal.fire('ผิดพลาด', 'รหัสผ่านปัจจุบันไม่ถูกต้อง', 'error')
        });
        Livewire.on('changePasswordSuccess', function (){
            Swal.fire('สำเร็จ','เปลี่ยนรหัสผ่านสำเร็จ','success')
        })
    });
</script>
