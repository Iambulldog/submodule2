@php
    $style = [
        'deposit' => 'images/deposit.png',
        'withdraw' => 'images/withdraw.png',
        'colorIcon' => '#facc15',
        'Icon' => 'flex justify-center rounded-full w-24 h-24 shadow-xl bg-gradient-to-b from-gray-500 from-10% to-gray-800 to-60%',
        'text' => 'text-amber-400',
    ];
@endphp
<x-member>
    <livewire:member.home.detail />


  

 
    <div class="flex justify-center">
        <div class="max-w-2xl rounded-lg -mt-8 pr-5 pl-5 text-left">
            <div class="grid grid-cols-2 mt-8 xs:pr-1 xs:pl-1 lg:pr-10 lg:pl-10   ">

               

                <div class="hover:scale-105 text-center bg-bg-icon bg-100%  bg-no-repeat">
                    <a href="deposit" class="">
                        {{-- <img src="{{ asset('/storage/' . $style['deposit']) }}" class="w-52 "> --}}
                        
                        <div class="pt-3 pb-3 w-full">
                            <b class="lg:text-3xl xs:text-xl"> ฝากเงิน</b> <img src="{{ asset('storage/images/depo.png') }}" class="lg:w-10 xs:w-8 lg:-mt-8 xs:-mt-7 lg:ml-10 xs:ml-4 animate-bounce" >
                        </div>
                    </a>
                </div>
                <div class="hover:scale-105 text-center bg-bg-icon bg-100%  bg-no-repeat">
                    <a href="withdraw" >
                        {{-- <img src="{{ asset('/storage/' . $style['withdraw']) }}" class="w-52"> --}}
                        <div class="pt-3 pb-3" >
                            <b class="lg:text-3xl xs:text-xl"> ถอนเงิน</b> <img src="{{ asset('storage/images/with.png') }}" class="lg:w-10 xs:w-8 lg:-mt-8 xs:-mt-7 lg:ml-10 xs:ml-4 animate-bounce" > 
                        </div>
                    </a>
                </div>
            </div>
            <div class="grid grid-cols-4 gap-6 mt-9 mb-10 text-center ">

                <div class="">
                    <div class="bg-bg-icon-3 bg-100%  bg-no-repeat">
                        <a  href="{{ route('member.pocket.myprofile') }}">
                            <img class="xs:p-3 lg:p-6 hover:scale-125" src="{{asset('/storage/images/icon_home/season.png')}}"  />
                        </a>
                    </div>
                    <div class="text-sm pt-2">โปรไฟล์</div>
                </div>

                <div class="">
                    <div class="bg-bg-icon-3 bg-100%  bg-no-repeat">
                        <a class="" href="{{ route('member.pocket.mypromotion') }}">
                            <img class="xs:p-3 lg:p-6 hover:scale-125" src="{{asset('/storage/images/icon_home/code.png')}}"  />
                        </a>
                    </div>
                    <div class="text-sm pt-2">โปรของฉัน</div>
                </div>

                <div class="">
                    <div class="bg-bg-icon-3 bg-100%  bg-no-repeat">
                        <a class="" href="{{ route('member.pocket.myaccount') }}">
                            <img class="xs:p-3 lg:p-6 hover:scale-125" src="{{asset('/storage/images/icon_home/bank.png')}}"  />
                        </a>
                    </div>
                    <div class="text-sm pt-2">บัญชีของฉัน</div>
                </div>

                <div class="">
                    <div class="bg-bg-icon-3 bg-100%  bg-no-repeat">
                        <a class="" href="{{ route('member.pocket.myhistory') }}">
                            <img class="xs:p-3 lg:p-6 hover:scale-125" src="{{asset('/storage/images/icon_home/report_money.png')}}"  />
                        </a>
                    </div>
                    <div class="text-sm pt-2">ประวัติ</div>
                </div>
                {{-- <div class="">
                    <div class="bg-bg-icon-3 bg-100%  bg-no-repeat">
                        <a class="" href="{{ route('member.pocket.myhistory') }}">
                            <img class="xs:p-3 lg:p-6 hover:scale-125" src="{{asset('/storage/images/icon_home/report_money.png')}}"  />
                        </a>
                    </div>
                    <div class="text-sm pt-2">ทดลองเล่น</div>
                </div> --}}
                <div class="">
                    <div class="bg-bg-icon-3 bg-100%  bg-no-repeat">
                        <a class="" href="{{ route('member.spin') }}">
                            <img class="xs:p-3 lg:p-6 hover:scale-125" src="{{asset('/storage/images/icon_home/slot.png')}}"  />
                        </a>
                    </div>
                    <div class="text-sm pt-2">วงล้อ</div>
                </div>
                <div class="">
                    <div class="bg-bg-icon-3 bg-100%  bg-no-repeat">
                        <a class="" href="{{ route('member.pocket.mycheckin') }}">
                            <img class="xs:p-3 lg:p-6 hover:scale-125" src="{{asset('/storage/images/icon_home/checkin.png')}}"  />
                        </a>
                    </div>
                    <div class="text-sm pt-2">เช็คอิน</div>
                </div>
                <div class="">
                    <div class="bg-bg-icon-3 bg-100%  bg-no-repeat">
                        <a class="" href="{{ route('member.exchange') }}">
                            <img class="xs:p-3 lg:p-6 hover:scale-125" src="{{asset('/storage/images/icon_home/soodai.png')}}"  />
                        </a>
                    </div>
                    <div class="text-sm pt-2">แลกเครดิต</div>
                </div>
                {{-- <div class="hover:scale-105 ">
                    <a class="" href="{{ route('member.shopping') }}">
                        <div class="{{ $style['Icon'] }}">
                            <svg class="w-16" viewBox="-0.5 0 25 25" fill="none">
                                <path
                                    d="M12.8702 16.97V18.0701C12.8702 18.2478 12.7995 18.4181 12.6739 18.5437C12.5482 18.6694 12.3778 18.74 12.2001 18.74C12.0224 18.74 11.852 18.6694 11.7264 18.5437C11.6007 18.4181 11.5302 18.2478 11.5302 18.0701V16.9399C11.0867 16.8668 10.6625 16.7051 10.2828 16.4646C9.90316 16.2241 9.57575 15.9097 9.32013 15.54C9.21763 15.428 9.16061 15.2817 9.16016 15.1299C9.16006 15.0433 9.17753 14.9576 9.21155 14.8779C9.24557 14.7983 9.29545 14.7263 9.35809 14.6665C9.42074 14.6067 9.49484 14.5601 9.57599 14.5298C9.65713 14.4994 9.7436 14.4859 9.83014 14.49C9.91602 14.4895 10.0009 14.5081 10.0787 14.5444C10.1566 14.5807 10.2254 14.6338 10.2802 14.7C10.6 15.1178 11.0342 15.4338 11.5302 15.6099V13.0701C10.2002 12.5401 9.53015 11.77 9.53015 10.76C9.55019 10.2193 9.7627 9.70353 10.1294 9.30566C10.4961 8.9078 10.9929 8.65407 11.5302 8.59009V7.47998C11.5302 7.30229 11.6007 7.13175 11.7264 7.0061C11.852 6.88045 12.0224 6.81006 12.2001 6.81006C12.3778 6.81006 12.5482 6.88045 12.6739 7.0061C12.7995 7.13175 12.8702 7.30229 12.8702 7.47998V8.58008C13.2439 8.63767 13.6021 8.76992 13.9234 8.96924C14.2447 9.16856 14.5226 9.43077 14.7402 9.73999C14.8284 9.85568 14.8805 9.99471 14.8901 10.1399C14.8928 10.2256 14.8783 10.3111 14.8473 10.3911C14.8163 10.4711 14.7696 10.5439 14.7099 10.6055C14.6502 10.667 14.5787 10.7161 14.4998 10.7495C14.4208 10.7829 14.3359 10.8001 14.2501 10.8C14.1607 10.7989 14.0725 10.7787 13.9915 10.7407C13.9104 10.7028 13.8384 10.648 13.7802 10.5801C13.5417 10.2822 13.2274 10.054 12.8702 9.91992V12.1699L13.1202 12.27C14.3902 12.76 15.1802 13.4799 15.1802 14.6299C15.163 15.2399 14.9149 15.8208 14.4862 16.2551C14.0575 16.6894 13.4799 16.9449 12.8702 16.97ZM11.5302 11.5901V9.96997C11.3688 10.0285 11.2298 10.1363 11.1329 10.2781C11.0361 10.4198 10.9862 10.5884 10.9902 10.76C10.9984 10.93 11.053 11.0945 11.1483 11.2356C11.2435 11.3767 11.3756 11.4889 11.5302 11.5601V11.5901ZM13.7302 14.6599C13.7302 14.1699 13.3902 13.8799 12.8702 13.6599V15.6599C13.1157 15.6254 13.3396 15.5009 13.4985 15.3105C13.6574 15.1202 13.74 14.8776 13.7302 14.6299V14.6599Z"
                                    fill="{{ $style['colorIcon'] }}" />
                                <path
                                    d="M12.58 3.96997H6C4.93913 3.96997 3.92178 4.39146 3.17163 5.1416C2.42149 5.89175 2 6.9091 2 7.96997V17.97C2 19.0308 2.42149 20.0482 3.17163 20.7983C3.92178 21.5485 4.93913 21.97 6 21.97H18C19.0609 21.97 20.0783 21.5485 20.8284 20.7983C21.5786 20.0482 22 19.0308 22 17.97V11.8999"
                                    stroke="{{ $style['colorIcon'] }}" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M21.9998 2.91992L16.3398 8.57992" stroke="{{ $style['colorIcon'] }}"
                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M20.8698 8.5798H16.3398V4.0498" stroke="{{ $style['colorIcon'] }}"
                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <p class="{{ $style['text'] }}">ช้อปปิ้ง</p>
                    </a>
                </div> --}}
                <div class="">
                    <div class="bg-bg-icon-3 bg-100%  bg-no-repeat">
                        <a class="" href="{{ route('member.refund') }}">
                            <img class="xs:p-3 lg:p-6 hover:scale-125" src="{{asset('/storage/images/icon_home/gift.png')}}"  />
                        </a>
                    </div>
                    <div class="text-sm pt-2">คืนยอดเสีย</div>
                </div>
                <div class="">
                    <div class="bg-bg-icon-3 bg-100%  bg-no-repeat">
                        <a class="cursor-pointer" href="{{ route('member.pocket.myaffiliate') }}" data-bs-toggle="modal" data-bs-target="#invite_friend">
                            <img class="xs:p-3 lg:p-6 hover:scale-125" src="{{asset('/storage/images/icon_home/link.png')}}"  />
                        </a>
                    </div>
                    <div class="text-sm pt-2">แนะนำเพื่อน</div>
                </div>
                <div class="">
                    <div class="bg-bg-icon-3 bg-100%  bg-no-repeat">
                        <a class="cursor-pointer" href="{{ route('member.sood') }}"> 
                            <img class="xs:p-3 lg:p-6 hover:scale-125" src="{{asset('/storage/images/icon_home/soodai.png')}}"  />
                        </a>
                    </div>
                    <div class="text-sm pt-2">สูตร</div>
                </div>
                <div class="">
                    <div class="bg-bg-icon-3 bg-100%  bg-no-repeat">
                        @php
                        $line = DB::select('select token from settings where name = ?', ['line']);
                    @endphp
                        <a class=" pointer" href="{{$line[0]->token}}">
                            <img class="xs:p-3 lg:p-6 hover:scale-125" src="{{asset('/storage/images/icon_home/qrline.png')}}"  />
                        </a>
                    </div>
                    <div class="text-sm pt-2">ติดต่อ</div>
                </div>
            </div>
        </div>

    </div>

</x-member>
