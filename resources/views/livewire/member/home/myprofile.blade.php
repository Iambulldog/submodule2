<div>
<div class="min-h-screen p-4 pt-16">
    <div class="flex flex-col space-y-6 justify-center items-center lg:mt-0 md:mt-0 mt-12">
        <p class="text-3xl">โปรไฟล์</p>
        <div class="block max-w-xl w-full p-4 bg-neutral-600 rounded-3xl shadow-2xl space-y-4">
            <ul role="list " class="flex flex-col divide-y divide-gray-200 rounded-lg bg-white shadow p-4">
                <li class=" grid grid-cols-6">
                    <div class="col-span-2 py-2 text-right"> รหัส : </div>
                    <div x-data="{ showPromotionStatus: true }" class="col-span-4 py-2 px-2">
                        {{$user['username_api']}}
                    </div>
                    <div class="col-span-2 py-2 text-right"> ยูเซอร์(login)  : </div>
                    <div x-data="{ showPromotionStatus: true }" class="col-span-4 py-2 px-2">
                        {{$user['username']}}
                    </div>

                    <div class="col-span-2 py-2 text-right"> พาส(login)  : </div>
                    <div x-data="{ showPromotionStatus: true }" class="col-span-4 py-2 px-2">
                        <button onclick="$openModal('simpleModal')"
                                class=" text-sm px-2 rounded-3xl bg-gradient-to-b
                            from-zinc-700 from-30% to-zinc-950 to-70% hover:bg-gradient-to-br hover:from-yellow-400 hover:to-yellow-500 hover:text-black
                              text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2
                             focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            เปลี่ยนรหัสผ่าน
                        </button>
                    </div>
                    <x-modal.card title="เปลี่ยนรหัสผ่าน" wire:model.defer="simpleModal" align="center" blur max-width="lg">
                        <div class="space-y-6 max-w-md mx-auto">
                            <div>
                                <x-inputs.password type="password" wire:model="current_password" icon="key" label="รหัสผ่านปัจจุบัน" placeholder="กรุณากรอกรหัสผ่านปัจจุบัน" class="border-0 ring-1 ring-inset ring-yellow-400 focus:ring-yellow-400 rounded-xl py-2.5" />
                            </div>

                            <div>
                                <x-inputs.password type="password" wire:model="new_password" icon="key" label="รหัสผ่านใหม่" placeholder="กรุณากรอกรหัสผ่านใหม่" class="border-0 ring-1 ring-inset ring-yellow-400 focus:ring-yellow-400 rounded-xl py-2.5" />
                            </div>

                            <div>
                                <x-inputs.password type="password" wire:model="confirm_password" icon="key" label="ยืนยันรหัสผ่าน" placeholder="กรุณายืนยืนรหัสผ่านใหม่อีกครั้ง" class="border-0 ring-1 ring-inset ring-yellow-400 focus:ring-yellow-400 rounded-xl py-2.5" />
                            </div>
                        </div>
                        <div class="flex justify-center gap-x-4 mt-12">
                            <x-button class="inline-flex w-full items-center justify-center h-10 rounded-3xl hover:text-black hover:bg-yellow-400 px-12 py-2.5 text-sm font-medium text-white transition-colors border border-transparent bg-neutral-950" label="เปลี่ยนรหัสผ่าน" wire:click="change_password()"/>
                            <x-button flat label="ยกเลิก" x-on:click="close"  />
                        </div>

                    </x-modal.card>

                    <div class="col-span-2 py-2 text-right"> โปรไมโชั่น : </div>
                    <div x-data="{ showPromotionStatus: true }" class="col-span-4 py-2 px-2">
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox"  class="sr-only peer"
                                value="{{$user['promotion_status']}}"
                                @if($user['promotion_status'] == 'active') checked @endif
                                    >
                            <div @click="showPromotionStatus=!showPromotionStatus"
                                class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 peer-checked:after:translate-x-full
                    peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white
                    after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
                            </div>
                        </label>

                        <i @click="showPromotionStatus=!showPromotionStatus" wire:click="EditUserStatus()"
                        x-show="!showPromotionStatus" class="align-top fa fa-save cursor-pointer text-green-700 pl-3"></i>

                    </div>
                    {{-- profile.address --}}
                    <div class="col-span-2 py-2 text-right"> ที่อยู่ : </div>
                    <div x-data="{ showAddress: true }" class="col-span-4 py-2 px-2">
                        <span x-show="showAddress">
                            {{ $user['profile'] ? $user['profile']['address'] : '' }}
                        </span>
                        <input x-show="!showAddress" x-ref="inputAddress" type="text" value=""
                            wire:model.defer="user.profile.address" wire:keydown.enter="EditProfile('address')" @keydown.enter="showAddress=!showAddress"
                        class="w-full rounded-md border border-gray-300 py-2 px-3 text-gray-900 placeholder-gray-400  focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 sm:text-sm">

                        <i @click="showAddress=!showAddress;$nextTick(() => { $refs.inputAddress.focus(); });"
                            x-show="showAddress"
                            class="fa fa-pencil cursor-pointer x-show text-yellow-700"></i>
                        <i @click="showAddress=!showAddress" wire:click="EditProfile('address')"
                            x-show="!showAddress" class="fa fa-save cursor-pointer text-green-700"></i>
                        <i @click="showAddress=!showAddress"
                            x-show="!showAddress" class="fa fa-remove cursor-pointer x-show text-red-700"></i>

                    </div>
                    {{-- profile.phone --}}
                    <div class="col-span-2 py-2 text-right"> เบอร์โทร : </div>
                    <div x-data="{ showPhone: true }" class="col-span-4 py-2 px-2">
                        <span x-show="showPhone">
                            {{ $user['profile'] ? $user['profile']['phone'] : ''}}
                        </span>
                        <input x-show="!showPhone" x-ref="inputPhone" type="text" value=""
                            wire:model.defer="user.profile.phone" wire:keydown.enter="EditProfile('phone')" @keydown.enter="showPhone=!showPhone"
                        class="w-full rounded-md border border-gray-300 py-2 px-3 text-gray-900 placeholder-gray-400  focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 sm:text-sm">

                        <i @click="showPhone=!showPhone;$nextTick(() => { $refs.inputPhone.focus(); });" x-show="showPhone"
                            class="fa fa-pencil cursor-pointer x-show text-yellow-700"></i>
                        <i @click="showPhone=!showPhone" wire:click="EditProfile('phone')"
                            x-show="!showPhone" class="fa fa-save cursor-pointer text-green-700"></i>
                        <i @click="showPhone=!showPhone"
                            x-show="!showPhone" class="fa fa-remove cursor-pointer x-show text-red-700"></i>

                    </div>
                    <div class="col-span-2 py-2 text-right"> อีเมล : </div>
                        <div x-data="{ showEmail: true }" class="col-span-4 py-2 px-2">
                            <span x-show="showEmail">
                                {{$user['profile']['email']?? '' }}
                            </span>
                            <input x-show="!showEmail" x-ref="inputEmail" type="text" value=""
                                wire:model.defer="user.profile.email" wire:keydown.enter="EditProfile('email')" @keydown.enter="showEmail=!showEmail"
                            class="w-full rounded-md border border-gray-300 py-2 px-3 text-gray-900 placeholder-gray-400  focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 sm:text-sm">

                            <i @click="showEmail=!showEmail;$nextTick(() => { $refs.inputEmail.focus(); });" x-show="showEmail"
                                class="fa fa-pencil cursor-pointer x-show text-yellow-700"></i>
                            <i @click="showEmail=!showEmail" wire:click="EditProfile('email')"
                                x-show="!showEmail" class="fa fa-save cursor-pointer text-green-700"></i>
                            <i @click="showEmail=!showEmail"
                                x-show="!showEmail" class="fa fa-remove cursor-pointer x-show text-red-700"></i>

                        </div>
                    {{-- profile.line --}}
                    <div class="col-span-2 py-2 text-right"> ไลน์ : </div>
                    <div x-data="{ showLine: true }" class="col-span-4 py-2 px-2">
                        <span x-show="showLine">
                            {{ $user['profile'] ? $user['profile']['line'] : ''}}
                        </span>
                        <input x-show="!showLine" x-ref="inputLine" type="text" value=""
                            wire:model.defer="user.profile.line" wire:keydown.enter="EditProfile('line')" @keydown.enter="showLine=!showLine"
                        class="w-full rounded-md border border-gray-300 py-2 px-3 text-gray-900 placeholder-gray-400  focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 sm:text-sm">

                        <i @click="showLine=!showLine;$nextTick(() => { $refs.inputLine.focus(); });"
                            x-show="showLine"
                            class="fa fa-pencil cursor-pointer x-show text-yellow-700"></i>
                        <i @click="showLine=!showLine" wire:click="EditProfile('line')"
                            x-show="!showLine" class="fa fa-save cursor-pointer text-green-700"></i>
                        <i @click="showLine=!showLine"
                            x-show="!showLine" class="fa fa-remove cursor-pointer x-show text-red-700"></i>

                    </div>
                </li>
            </ul>

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
        Livewire.on('updateUser', function($updateUser) {
        Swal.fire($updateUser['title'], $updateUser['msg'], $updateUser['type']).then(function(isConfirm) {

            })
        });
    });
</script>
</div>
