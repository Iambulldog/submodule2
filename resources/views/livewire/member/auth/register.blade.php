<div>
@php
    $styleLogin = [
        'logo'=>'images/logo.png',
        'Form'=>[
            'username'=>[
                'label'=> 'flex text-lg font-medium leading-6 text-black ml-3.5',
                'input'=>'block w-full rounded-3xl border-0 py-2.5 pl-8 text-black shadow-sm ring-1 ring-amber-300 placeholder:text-lg placeholder:text-gray-500 focus:ring-1 focus:ring-inset focus:ring-amber-500 ',
                'error'=>'ring-red-500 text-red-500 text-sm'
            ],
            'password'=>[
                'label'=> 'flex text-lg font-medium leading-6 text-black ml-3.5',
                'input'=>'block w-full rounded-3xl border-0 py-2.5 pl-8 text-black shadow-sm ring-1 ring-amber-300 placeholder:text-lg placeholder:text-gray-500 focus:ring-1 focus:ring-inset focus:ring-amber-500 ',
                'error'=>'ring-red-500 text-red-500 text-sm'
            ],
            'confirm_password'=>[
                'label'=> 'flex text-lg font-medium leading-6 text-black ml-3.5',
                'input'=>'block w-full rounded-3xl border-0 py-2.5 pl-8 text-black shadow-sm ring-1 ring-amber-300 placeholder:text-lg placeholder:text-gray-500 focus:ring-1 focus:ring-inset focus:ring-amber-500 ',
                'error'=>'ring-red-500 text-red-500 text-sm'
            ]
        ],
        'ButtonLogin'=>'text-amber-400
                        bg-gradient-to-b from-zinc-700 from-30% to-zinc-950 to-70%
                        hover:bg-gradient-to-br hover:from-zinc-100 hover:from-10% hover:to-zinc-900 hover:to-70%
                        flex w-full justify-center rounded-3xl px-3 py-2.5 text-md font-medium leading-6 shadow-sm',
        'ButtonRegister'=>'text-amber-300
                        bg-gradient-to-b from-zinc-600 from-10% to-zinc-700 to-90%
                        hover:bg-gradient-to-br hover:from-zinc-600 hover:to-zinc-500
                        flex w-full justify-center rounded-3xl px-3 py-2.5 text-md font-medium leading-6 shadow-sm',
        'ButtonContext'=>'text-amber-200
                        bg-gradient-to-b from-zinc-500 from-10% to-zinc-600 to-90%
                        hover:bg-gradient-to-br hover:from-zinc-500 hover:to-zinc-400
                        flex w-full justify-center rounded-3xl px-3 py-2.5 text-md font-medium leading-6 shadow-sm',
    ];
    function classNames(...$classes) {
    return implode(' ', array_filter($classes));
    }
@endphp
<div>
    <div class="flex min-h-full flex-col justify-center py-9 sm:px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            {{-- <img class="mx-auto h-[88px] w-auto" src="{{ asset('/storage/'.$styleLogin['logo']) }} "
                 alt="Your Company"> --}}
            <h2 class="mt-6 text-center sm:text-2xl lg:text-3xl xs:text-xl font-medium leading-9 tracking-tight text-black">
                สมัครสมาชิก</h2>
            <hr class="mt-3 border-1 border-gray-300">
        </div>

        <div class="mt-2 sm:mx-auto sm:w-full sm:max-w-sm md:max-w-md lg:max-w-sm xs:max-w-xs xs:mx-auto xs:w-full">
            <div class="pt-3 sm:rounded-lg">
                <div class="space-y-5">
                    <div>
                        <label for="email" class="{{$styleLogin['Form']['username']['label']}}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 1.5H8.25A2.25 2.25 0 006 3.75v16.5a2.25 2.25 0 002.25 2.25h7.5A2.25 2.25 0 0018 20.25V3.75a2.25 2.25 0 00-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" />
                            </svg>
                            เบอร์โทรศัพท์ / Phone Number
                        </label>
                        <div class="mt-3">
                            <input wire:model="username" id="username" name="username" type="number" placeholder="กรอกเบอร์โทรศัพท์"
                                   class="{{$styleLogin['Form']['username']['input']}}">
                            @error('username') <span
                                class="{{$styleLogin['Form']['username']['error']}}">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div>
                        <label for="password" class="{{$styleLogin['Form']['password']['label']}}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-6 h-6 mr-1.5">
                                <path fill-rule="evenodd" d="M10 1a4.5 4.5 0 00-4.5 4.5V9H5a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2h-.5V5.5A4.5 4.5 0 0010 1zm3 8V5.5a3 3 0 10-6 0V9h6z" clip-rule="evenodd" />
                            </svg>
                            รหัสผ่าน / Password
                        </label>
                        <div class="flex mt-3 mb-2">
                            <div class="relative flex-1 col-span-4" x-data="{ show: true }">
                                <input class="{{$styleLogin['Form']['password']['input']}}"
                                       id="password"
                                       wire:model="password"
                                       :type="show ? 'password' : 'text'"
                                       name="password"
                                       placeholder="กรอกรหัสผ่าน"
                                       required autocomplete="new-password" />

                                <button type="button" class="flex absolute inset-y-0 right-0 items-center pr-3" @click="show = !show" :class="{'hidden': !show, 'block': show }">
                                    <!-- Heroicon name: eye -->
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </button>
                                <button type="button" class="flex absolute inset-y-0 right-0 items-center pr-3" @click="show = !show" :class="{'block': !show, 'hidden': show }">
                                    <!-- Heroicon name: eye-slash -->
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        @error('password') <span
                            class="{{$styleLogin['Form']['password']['error']}}">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label for="confirm_password" class="{{$styleLogin['Form']['confirm_password']['label']}}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-6 h-6 mr-1.5">
                                <path fill-rule="evenodd" d="M10 1a4.5 4.5 0 00-4.5 4.5V9H5a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2h-.5V5.5A4.5 4.5 0 0010 1zm3 8V5.5a3 3 0 10-6 0V9h6z" clip-rule="evenodd" />
                            </svg>
                            ยืนยันรหัสผ่าน / Confirm Password
                        </label>
                        <div class="flex mt-3 mb-2">
                            <div class="relative flex-1 col-span-4" x-data="{ show: true }">
                                <input class="{{$styleLogin['Form']['confirm_password']['input']}}"
                                       id="confirm_password"
                                       wire:model="confirm_password"
                                       :type="show ? 'password' : 'text'"
                                       name="confirm_password"
                                       placeholder="ยืนยันรหัสผ่าน"
                                       required />

                                <button type="button" class="flex absolute inset-y-0 right-0 items-center pr-3" @click="show = !show" :class="{'hidden': !show, 'block': show }">
                                    <!-- Heroicon name: eye -->
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </button>
                                <button type="button" class="flex absolute inset-y-0 right-0 items-center pr-3" @click="show = !show" :class="{'block': !show, 'hidden': show }">
                                    <!-- Heroicon name: eye-slash -->
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        @error('confirm_password') <span
                            class="{{$styleLogin['Form']['confirm_password']['error']}}">{{ $message }}</span> @enderror
                    </div>

                </div>

                <div class="flex items-center justify-center lg:space-y-4 sm:space-y-3.5 xs:space-y-3 mt-4 lg:px-9 sm:px-1">
                    <button wire:click="register()" type="button"
                            class="{{$styleLogin['ButtonRegister']}}">
                        <p wire:loading wire:target="register" >
                            <svg class="inline-flex animate-spin ml-3 mr-1 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            กำลังโหลด...
                        </p>
                        <p wire:loading.remove wire:target="register">
                            สมัครสมาชิก
                        </p>

                    </button>
                </div>


                <div class="flex items-center justify-center lg:space-y-4 sm:space-y-3.5 xs:space-y-3 mt-4 lg:px-9 sm:px-1">
                    <div id="g_id_onload"
                         data-client_id="{{env('GOOGLE_CLIENT_ID')}}"
                         data-context="signin"
                         data-ux_mode="popup"
                         data-_token="{{csrf_token()}}"
                         data-method="post"
                         data-login_uri="{{env('APP_URL')}}/auth/google/callback"
                         data-auto_prompt="false">
                    </div>

                    <div class="g_id_signin"
                         data-type="standard"
                         data-shape="pill"
                         data-theme="filled_black"
                         data-text="signup_with"
                         data-size="large"
                         data-locale="th"
                         data-logo_alignment="left"
                         data-width="310">
                    </div>
                </div>
                <div class="mt-5 flex items-center justify-center">
                    <div class="flex items-center">
                        <a href="{{ route('member.login') }}"
                           class="font-medium text-lg text-black text-center"><u>กลับไปหน้า Login</u></a>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>

<script>
    document.addEventListener('livewire:load', function() {
        Livewire.on('create_user_fail', function () {
            Swal.fire('ผิดพลาด', 'ไม่สามารถสมัครได้, กรุณาลองใหม่อีกครั้งหรือติดต่อเจ้าหน้าที่', 'error')
        });

        Livewire.on('code_name_is_not_available', function () {
            Swal.fire('ไม่มีรหัสแนะนำเพื่อนนี้อยู่', 'คุณยังสามารถสมัครได้ตามปกติ', 'warning')
        });
        Livewire.on('create_user_true', function (data) {
            if(window.navigator.userAgent.indexOf("Mac") != -1){
                alert('สำเร็จ');
            }else{
                navigator.clipboard.writeText(data['msg']);
                Swal.fire({
                    title: '!!! สำเร็จ !!!',
                    html: data['msg'],
                    showConfirmButton: true ,
                    confirmButtonText: 'คัดลอก',
                }).then((result) => {
                    location.reload();
                    })
            }

        });
        Livewire.on('create_user_false', function (data) {
            alert('ไม่สำเร็จ');
        });

    });
</script>
</div>
