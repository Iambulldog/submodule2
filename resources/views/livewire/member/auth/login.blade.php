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



        <div class="flex min-h-full flex-col justify-center py-2 sm:px-6 lg:px-8 xs:pb-24">
            
            <div class="border border-black rounded-2xl p-5 bg-amber-200">
                    <form wire:submit.prevent="login">
                        <div class="grid  lg:grid-cols-2 md:grid-cols-1 gap-2 text-center">
                            <div>
                                <div class="grid  lg:grid-cols-2 md:grid-cols-1 gap-2 text-center">
                                    <div>
                                        <label for="email" class="{{$styleLogin['Form']['username']['label']}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-6 h-6 mr-1.5">
                                                <path d="M10 8a3 3 0 100-6 3 3 0 000 6zM3.465 14.493a1.23 1.23 0 00.41 1.412A9.957 9.957 0 0010 18c2.31 0 4.438-.784 6.131-2.1.43-.333.604-.903.408-1.41a7.002 7.002 0 00-13.074.003z" />
                                            </svg>
                                            เบอร์โทรศัพท์ / Phone Number
                                        </label>
                                        <div class="mt-3">
                                            <input wire:model="username" id="username" name="username" type="text"
                                                placeholder="กรอกผู้ใช้งาน"
                                                class="{{$styleLogin['Form']['username']['input']}}
                                                @error('username') {{$styleLogin['Form']['username']['error']}} @enderror ">
                                            @error('username') <span
                                                class=" {{$styleLogin['Form']['username']['error']}}">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div>
                                        <label for="password" class="{{$styleLogin['Form']['password']['label']}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                                class="w-6 h-6 mr-1.5">
                                                <path fill-rule="evenodd"
                                                    d="M10 1a4.5 4.5 0 00-4.5 4.5V9H5a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2h-.5V5.5A4.5 4.5 0 0010 1zm3 8V5.5a3 3 0 10-6 0V9h6z"
                                                    clip-rule="evenodd"/>
                                            </svg>
                                            รหัสผ่าน / Password
                                        </label>
        
                                        <div x-data="{ showpass: true }">
                                            <div class="mt-3">
                                                <input wire:model="password" id="password" name="password"
                                                    :type="showpass ? 'password' : 'text'" placeholder="กรอกรหัสผ่าน"
                                                    autocomplete="current-password"
                                                    class="{{$styleLogin['Form']['password']['input']}}
                                                    @error('password') ring-red-500 @enderror ">
                                                @error('password') <span
                                                    class=" {{$styleLogin['Form']['password']['error']}}">{{ $message }}</span> @enderror
                                            </div>
        
                                            <div class="flex items-center ml-8 mt-3">
                                                <div class="flex items-center">
                                                    <input id="remember-me" name="remember-me" type="checkbox"
                                                        @click="showpass=!showpass"
                                                        class="h-4 w-4 rounded border-gray-300 text-black focus:ring-black">
                                                    <label for="remember-me" class="ml-3 block text-lg leading-6 text-black">แสดงรหัสผ่าน</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div> 
                            </div>

                            <div>
                                <div class="grid  lg:grid-cols-3 md:grid-cols-1 gap-2 text-center">
                                    <div>
                                        <label for="email" class="">
                                            &nbsp;
                                        </label>
                                        <div class="mt-3">
                                            <button type="submit" class="{{$styleLogin['ButtonLogin']}}">
                                            <p wire:loading wire:target="login" >
                                            <svg class="inline-flex animate-spin -ml-1 mr-1 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                            </svg>
                                                กำลังโหลด...
                                            </p>
                                            <p wire:loading.remove wire:target="login">
                                                เข้าสู่ระบบ
                                            </p>
                                            </button>
                                        </div>
                                    </div>
                                    <div>
                                        <label for="email" class="">
                                            &nbsp;
                                        </label>
                                        <div class="mt-3">
                                            <a href="{{ route('member.register') }}" class="{{$styleLogin['ButtonLogin']}}">
            
                                                <p wire:loading.remove wire:target="login">
                                                    สมัครสมาชิก
                                                </p>
                                            </a>
                                        </div>
                                    </div>
                                    <div>
                                        <label for="email" class="">
                                            &nbsp;
                                        </label>
                                        <div class="mt-3">
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
                                            data-text="signin_with"
                                            data-size="large"
                                            data-locale="th"
                                            data-logo_alignment="left"
                                            data-width="200">
                                            </div>
                                        </div>
                                        
                                

                                    </div>

                                </div>
                               
                            </div>
                      
 
                        </div> 
                    </form>
                


            </div>

            <div class="xs:hidden lg:flex" >
                <img class="mySlides" src="{{ ('storage/images/icon_home/slide1.png') }}" style="width:100%">
                <img class="mySlides" src="{{ ('storage/images/icon_home/slide2.png') }}" style="width:100%">
            </div>

              <script>
                var myIndex = 0;
                carousel();

                function carousel() {
                  var i;
                  var x = document.getElementsByClassName("mySlides");
                  for (i = 0; i < x.length; i++) {
                    x[i].style.display = "none";
                  }
                  myIndex++;
                  if (myIndex > x.length) {myIndex = 1}
                  x[myIndex-1].style.display = "block";
                  setTimeout(carousel, 2000); // Change image every 2 seconds
                }
                </script>

            <div class="grid  lg:grid-cols-1 md:grid-cols-1 gap-2 text-center">
                 
                <div class="xs:flex lg:hidden" >
                    <img class="" src="{{ ('storage/images/icon_home/slide1.png') }}" style="width:100%">
                </div>
                <div class="text-left border border-black rounded-2xl lg:p-10 xs:p-4 bg-amber-200">
                    <p>
                        สมัครสมาชิกง่าย ๆ ด้วยตัวท่านเอง ผ่านช่องทาง Line : <a href="https://line.me/ti/p/~@24iboom" target="_blank" rel="noopener"><strong>@24iboom</strong></a> และหน้าเว็บไซต์ หลังจากนั้น
                        <strong>ฝาก – ถอน</strong> เพียงไม่กี่ขั้นตอน ก็สามารถเข้าเดิมพันได้ทันที นอกจากนี้ยังมีโปรโมชั่นดี ๆ จากทางเว็บไซต์อีกมากมาย
                    </p>
                    <ul class="pl-6">
                        <li>- กรอกเบอร์โทรศัพท์</li>
                        <li>- รอรับ SMS OTP</li>
                        <li>- สร้างรหัสผ่าน ยืนยันรหัสผ่าน</li>
                        <li>- เลือกธนาคารที่ต้องการใช้ ฝาก – ถอน</li>
                        <li>- กรอกหมายเลขบัญชี</li>
                        <li>- ชื่อ – นามสกุล (ชื่อต้องตรงกับชื่อบัญชี)</li>
                        <li>- กรอกไอดีไลน์ (ถ้ามี)</li>
                        <li>- กดเลือก (ข้าพเจ้าเห็นด้วย เงื่อนไขและข้อตกลง)</li>
                        <li>- ฝากเงินอัตโนมัติ เริ่มการเดิมพันได้ทันที</li>
                    </ul>
                </div>
              </div>
              <div class="pb-2 pt-4">
                <img src="{{asset('/storage/images/icon_home/register1.png')}}" class="hover:scale-105 w-full" >
              </div>
              <div class="grid lg:grid-cols-6 xs:grid-cols-2 gap-2 text-center pt-10 pb-6">
                <div>
                    <img src="{{asset('/storage/images/icon_home/menu_games1.png')}}" class="w-full hover:scale-125" >
                </div>
                <div>
                    <img src="{{asset('/storage/images/icon_home/menu_games2.png')}}" class="w-full hover:scale-125" >
                </div>
                <div>
                    <img src="{{asset('/storage/images/icon_home/menu_games3.png')}}" class="w-full hover:scale-125" >
                </div>
                <div>
                    <img src="{{asset('/storage/images/icon_home/menu_games4.png')}}" class="w-full hover:scale-125" >
                </div>
                <div>
                    <img src="{{asset('/storage/images/icon_home/menu_games5.png')}}" class="w-full hover:scale-125" >
                </div>
                <div>
                    <img src="{{asset('/storage/images/icon_home/menu_games6.png')}}" class="w-full hover:scale-125" >
                </div>
              </div>

              <div class="text-left border border-black rounded-2xl lg:p-10 xs:p-4 bg-amber-200">

                <div class="grid lg:grid-cols-2 xs:grid-cols-1 gap-4">
                    <div>
                        <div class="grid grid-cols-4 gap-4">
                            <div class="border-yellow-500 order-black rounded-2xl  bg-black">
                                <div class="elementor-widget-container">
                                    <img decoding="async" width="151" height="151" src="{{asset('/storage/images/icon_home/aesexy.png')}}" class="hover:scale-125" alt="24iboom ae dg-1">
                                </div>
                            </div>
                            <div class="border-yellow-500 order-black rounded-2xl  bg-black">
                                <div class="elementor-widget-container">
                                    <img decoding="async" width="151" height="151" src="{{asset('/storage/images/icon_home/betsoft-1.png')}}" class="hover:scale-125" alt="24iboom ae dg-1">
                                </div>
                            </div>
                            <div class="border-yellow-500 order-black rounded-2xl  bg-black">
                                <div class="elementor-widget-container">
                                    <img decoding="async" width="151" height="151" src="{{asset('/storage/images/icon_home/pp-1.png')}}" class="hover:scale-125" alt="24iboom ae dg-1">
                                </div>
                            </div>
                            <div class="border-yellow-500 order-black rounded-2xl  bg-black">
                                <div class="elementor-widget-container">
                                    <img decoding="async" width="151" height="151" src="{{asset('/storage/images/icon_home/dg-1.png')}}" class="hover:scale-125" alt="24iboom ae dg-1">
                                </div>
                            </div>
                            <div class="border-yellow-500 order-black rounded-2xl  bg-black">
                                <div class="elementor-widget-container">
                                    <img decoding="async" width="151" height="151" src="{{asset('/storage/images/icon_home/bg-1.png')}}" class="hover:scale-125" alt="24iboom ae dg-1">
                                </div>
                            </div>
                            <div class="border-yellow-500 order-black rounded-2xl  bg-black">
                                <div class="elementor-widget-container">
                                    <img decoding="async" width="151" height="151" src="{{asset('/storage/images/icon_home/joker-1.png')}}" class="hover:scale-125" alt="24iboom ae dg-1">
                                </div>
                            </div>
                            <div class="border-yellow-500 order-black rounded-2xl  bg-black">
                                <div class="elementor-widget-container">
                                    <img decoding="async" width="151" height="151" src="{{asset('/storage/images/icon_home/NetEnt-1.png')}}" class="hover:scale-125" alt="24iboom ae dg-1">
                                </div>
                            </div>
                            <div class="border-yellow-500 order-black rounded-2xl  bg-black">
                                <div class="elementor-widget-container">
                                    <img decoding="async" width="151" height="151" src="{{asset('/storage/images/icon_home/asiagaming-1.png')}}" class="hover:scale-125" alt="24iboom ae dg-1">
                                </div>
                            </div>
                          </div>




                    </div>
                    <!-- ... -->
                    <div >
                        <div class="text-center pb-4">
                            <b class="text-4xl"> 24IBOOM</b>
                        </div>
                        <ul class="elementor-icon-list-items pl-5">
                            <li class="elementor-icon-list-item">
                                <span class="elementor-icon-list-icon"> ✪ </span>
                                <span class="elementor-icon-list-text">มีเกมส์ให้เลือกเล่นจนตาลาย มากกว่า 1,000 เกมส์ </span>
                            </li>
                            <li class="elementor-icon-list-item">
                                <span class="elementor-icon-list-icon"> ✪ </span>
                                <span class="elementor-icon-list-text">รวบรวมเกมส์ยอดนิยมจากทุกค่ายดัง มาให้คุณในที่เดียว</span>
                            </li>
                            <li class="elementor-icon-list-item">
                                <span class="elementor-icon-list-icon"> ✪ </span>
                                <span class="elementor-icon-list-text">ให้บริการโดยตรงจากเบทฟลิก ไม่ผ่านเอเจนท์ ไม่ผ่านตัวแทน</span>
                            </li>
                            <li class="elementor-icon-list-item">
                                <span class="elementor-icon-list-icon"> ✪ </span>
                                <span class="elementor-icon-list-text">ภาพและเสียงคมชัดแบบ HD ไม่มีกระตุก</span>
                            </li>
                            <li class="elementor-icon-list-item">
                                <span class="elementor-icon-list-icon"> ✪ </span>
                                <span class="elementor-icon-list-text">ความมั่นคงทางการเงินสูง เชื่อถือได้ 100%</span>
                            </li>
                            <li class="elementor-icon-list-item">
                                <span class="elementor-icon-list-icon"> ✪ </span>
                                <span class="elementor-icon-list-text">มีโปรโมชั่นใหม่ ๆ มอบให้ลูกค้าอยู่สม่ำเสมอ</span>
                            </li>
                            <li class="elementor-icon-list-item">
                                <span class="elementor-icon-list-icon"> ✪ </span>
                                <span class="elementor-icon-list-text">ใช้ระบบ ฝาก - ถอน เงินแบบอัตโนมัติ </span>
                            </li>
                            <li class="elementor-icon-list-item">
                                <span class="elementor-icon-list-icon"> ✪ </span>
                                <span class="elementor-icon-list-text">รูปแบบเว็บไซต์สวยงาม ทันสมัย ใช้ง่าย มาพร้อมเมนูภาษาไทย</span>
                            </li>
                            <li class="elementor-icon-list-item">
                                <span class="elementor-icon-list-icon"> ✪ </span>
                                <span class="elementor-icon-list-text">รองรับทุกระบบ และ โทรศัพท์มือถือทุกรุ่น ทั้ง iOS, Android หรือ PC</span>
                            </li>
                            <li class="elementor-icon-list-item">
                                <span class="elementor-icon-list-icon"> ✪ </span>
                                <span class="elementor-icon-list-text">มีทีมงาน และ Admin พร้อมให้บริการและช่วยเหลือทุกวัน ตลอด 24 ชั่วโมง</span>
                            </li>
                        </ul>
                    </div>
                  </div>

            </div>



        </div>

    </div>

    <script>
        document.addEventListener('livewire:load', function() {

            Livewire.on('MemberLoginFailed', function () {
                Swal.fire('ผิดพลาด', 'ชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง, กรุณาลองใหม่อีกครั้ง', 'error')
            });
            Livewire.on('LoginStatusInactive', function () {
                Swal.fire('ผิดพลาด', 'ชื่อผู้ใช้งานของท่านโดนระงับการใช้งาน, กรุณาติดต่อเจ้าหน้าที่', 'error')
            });

            if('{{ session()->get('alert') }}' === 'create_user_fail'){
                Swal.fire({
                    title: 'ผิดพลาด',
                    text: 'ไม่สามารถสมัครได้, กรุณาลองใหม่อีกครั้งหรือติดต่อเจ้าหน้าที่',
                    icon: 'error',
                    confirmButtonText: 'ตกลง',
                    allowOutsideClick: false,
                    timer: 8000,
                    timerProgressBar: true,
                }).then(() => {
                    window.location = "{{ url('/') }}";
                });
            }else if('{{ session()->get('alert') }}' === 'code_name_is_not_available'){
                Swal.fire('ไม่มีรหัสแนะนำเพื่อนนี้อยู่', 'คุณยังสามารถสมัครได้ตามปกติ', 'warning')
            }
        });
    </script>
    </div>
