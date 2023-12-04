<div class="min-h-screen pt-10 mb-48">
    <div class="flex flex-col space-y-6 justify-center items-center lg:mt-0 md:mt-0 mt-12 ml-8 mr-8">
        <p class="text-3xl pt-5">โปรโมชั่นของฉัน</p>

        @if($user_promotion)
        <div class="space-y-4 my-9 px-12">
            <div
                class="grid lg:grid-cols-4 md:grid-cols-1 bg-gray-800 rounded-lg shadow md:flex-row md:max-w-full cursor-auto">
                <div class="lg:col-span-2 md:col-span-1  ">
                    <img class="object-fill object-center w-full rounded-t-lg h-96 md:h-auto md:w-96 md:rounded-none md:rounded-l-lg"
                        src="{{ asset('storage/'.$user_promotion->UserpromotiontoPromotion->image) }}" alt="">
                </div>
                <div class="lg:col-span-2 md:col-span-1 bg-white px-2 m-2 rounded-md ">
                    <div class="flex flex-col p-5 leading-normal">
                        <h5 class="mb-2 text-3xl font-semibold tracking-tight text-gray-900 ">{{
                            $user_promotion->UserpromotiontoPromotion->name }}</h5>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{!!
                            $user_promotion->UserpromotiontoPromotion->detail !!}</p>
                    </div>
                </div>
                <div class="col-span-4 grid grid-cols-2 bg-white px-2 m-2 rounded-md">
                    <div class="m-3">
                        <p> ยอดฝาก : {{$user_promotion->deposit}}</p>
                        <p> โบนัส : {{$user_promotion->bonus}}</p>
                    </div>
                    <div class="flex justify-end mr-4 m-3">
                        <button wire:click="checkTurn"
                        class="inline-flex items-center rounded-md bg-green-600  p-3
                        text-sm font-semibold text-white shadow-sm hover:bg-green-500 ">เช็คเทิร์น</button>
                    </div>
                </div>
                <div class="col-span-4  bg-white px-2 m-2 rounded-md">
                    <table class="min-w-full ">
                        <thead class=" text-center  ">
                            <tr>
                                <th class="py-3.5 pl-4 pr-3 text-center text-sm font-semibold sm:pl-0"> ผลิตภัณฑ์ </th>
                                <th class="py-3.5 pl-4 pr-3 text-center text-sm font-semibold sm:pl-0"> เทิร์นที่ต้องทำ
                                </th>
                                <th class="py-3.5 pl-4 pr-3 text-center text-sm font-semibold sm:pl-0"> เทิร์นที่ทำได้
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td
                                    class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0 text-center">
                                    กีฬา </td>
                                <td
                                    class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0 text-center">
                                    {{$user_promotion->sport != 0 ? $user_promotion->sport : 'งดเล่น'}}
                                </td>
                                <td
                                    class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0 text-center">
                                    @if($user_promotion->sport != 0)
                                    {{$user_promotion->sport_total}}
                                    {{$user_promotion->sport_total > $user_promotion->sport ? '[ครบแล้ว]' :
                                    '[รอดำเนินการ]'}}
                                    @else
                                    {{$user_promotion->sport_total > 0 ? 'กรุณาติดต่อพนักงาน' : '0'}}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td
                                    class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0 text-center">
                                    คาสิโน </td>
                                <td
                                    class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0 text-center">
                                    {{$user_promotion->casino != 0 ? $user_promotion->casino : 'งดเล่น'}}
                                </td>
                                <td
                                    class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0 text-center">
                                    @if($user_promotion->casino != 0)
                                    {{$user_promotion->casino_total}}
                                    {{$user_promotion->casino_total > $user_promotion->casino ? '[ครบแล้ว]' :
                                    '[รอดำเนินการ]'}}
                                    @else
                                    {{$user_promotion->casino_total > 0 ? 'กรุณาติดต่อพนักงาน' : '0'}}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td
                                    class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0 text-center">
                                    สล็อต </td>
                                <td
                                    class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0 text-center">
                                    {{$user_promotion->slot != 0 ? $user_promotion->slot : 'งดเล่น'}}
                                </td>
                                <td
                                    class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0 text-center">
                                    @if($user_promotion->slot != 0)
                                    {{$user_promotion->slot_total}}
                                    {{$user_promotion->slot_total > $user_promotion->slot ? '[ครบแล้ว]' :
                                    '[รอดำเนินการ]'}}
                                    @else
                                    {{$user_promotion->slot_total > 0 ? 'กรุณาติดต่อพนักงาน' : '0'}}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td
                                    class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0 text-center">
                                    หวย </td>
                                <td
                                    class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0 text-center">
                                    {{$user_promotion->lotto != 0 ? $user_promotion->lotto : 'งดเล่น'}}
                                </td>
                                <td
                                    class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0 text-center">
                                    @if($user_promotion->lotto != 0)
                                    {{$user_promotion->lotto_total}}
                                    {{$user_promotion->lotto_total > $user_promotion->lotto ? '[ครบแล้ว]' :
                                    '[รอดำเนินการ]'}}
                                    @else
                                    {{$user_promotion->lotto_total > 0 ? 'กรุณาติดต่อพนักงาน' : '0'}}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td
                                    class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0 text-center">
                                    แข่งขัน </td>
                                <td
                                    class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0 text-center">
                                    {{$user_promotion->p2p != 0 ? $user_promotion->p2p : 'งดเล่น'}}
                                </td>
                                <td
                                    class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0 text-center">
                                    @if($user_promotion->p2p != 0)
                                    {{$user_promotion->p2p_total}}
                                    {{$user_promotion->p2p_total > $user_promotion->p2p ? '[ครบแล้ว]' :
                                    '[รอดำเนินการ]'}}
                                    @else
                                    {{$user_promotion->p2p_total > 0 ? 'กรุณาติดต่อพนักงาน' : '0'}}
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @else
        <div class="block max-w-xl w-full p-4 bg-neutral-600 border-[3px] border-white rounded-3xl shadow-2xl ">
            <h5 class="mb-2 text-lg font-bold tracking-tight text-white text-center">ไม่พบรายการ Promotion</h5>
        </div>
        @endif
    </div>
</div>
<script>
    document.addEventListener('livewire:load', function() {
        Livewire.on('checkturn', function (){
            Swal.fire('สำเร็จ','ดึงรายการเล่นเรียบร้อย','success')
        })
    });
</script>