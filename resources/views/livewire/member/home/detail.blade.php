@php
$style= [
'detail'=> 'max-w-md w-full rounded-3xl p-5 text-left border-2 border-yellow-400 bg-black text-white'
];
@endphp

<div class="flex justify-center p-4 pt-16">
  <div class="{{$style['detail']}}">
    <div class="grid grid-cols-2 ">
      <div>
        <p class="animate-bounce text-2xl">ยินดีต้อนรับ</p>
        <p class="mb-2">{{ $data['username'] }}</p>
        @if ( $data['account']->isNotEmpty() )
        <p>{{ $data['account'][0]->account }}</p>
        @else
        <a href="{{route('member.pocket.add-account')}}"
          class=" pt-1 pb-1 pl-4 pr-4 rounded-3xl bg-gradient-to-b from-sky-300 from-10% to-sky-600 to-90% hover:bg-gradient-to-br hover:from-sky-600 hover:to-sky-500">เพิ่มบัญชี</a>
        @endif

      </div>
      <div class=" flex justify-center  items-center">

        <div x-data="{ switchOn: {{ $data['promotion_status'] == 'active' ? 'true' : 'false' }} }"
          class="flex items-center space-x-2">
          <input id="thisId" type="checkbox" name="switch" class="hidden" :checked="switchOn">

          <button x-ref="switchButton" type="button" @click="switchOn = ! switchOn"
            x-on:click="$wire.Change_status_pro(switchOn)"
            :class="{ 'bg-green-600': switchOn, 'bg-red-600': !switchOn }"
            class="relative inline-flex h-10 ml-4 focus:outline-none rounded-full w-24 " x-cloak>
            <span :class="{ 'translate-x-[3.5rem]': switchOn, 'translate-x-0.5': !switchOn }"
              class="z-10 w-10 h-10 duration-200 ease-in-out bg-white rounded-full shadow-md"></span>
          </button>
          <span :class="{ 'justify-start  pl-3': switchOn, 'justify-end pr-1': !switchOn }"
            class="absolute font-medium text-sm text-white flex w-24 " x-text="switchOn?'รับโปร':'ไม่รับโปร'"></span>
          <label @click="$refs.switchButton.click(); $refs.switchButton.focus()" :id="$id('switch')"
            :class="{ 'text-green-600': switchOn, 'text-gray-400': !switchOn }" class="text-sm select-none text-white "
            x-cloak>
          </label>

        </div>


      </div>


    </div>
    <hr class="border-t-[1px] border-amber-200 my-3 ">
    <div class="grid grid-rows-2 grid-cols-2 ">
      <div class="mr-8 ">เครดิต</div>
      <div>คะแนน</div>
      <div class="mr-8 grid grid-cols-2 ">
        <span class="text-amber-400 ">{{$credit}} ฿</span>
        <div wire:click="refreshCredit" class="flex justify-center items-center cursor-pointer hover:text-red-500 ">
          <svg wire:loading aria-hidden="true" class="absolute w-6 h-6 mr-2 text-gray-200 animate-spin fill-blue-900"
            viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
              d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
              fill="currentColor" />
            <path
              d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
              fill="currentFill" />
          </svg>

          <svg wire:loading.remove xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class=" w-6 h-6 absolute hover:animate-spin ">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
          </svg>

        </div>
      </div>
      <div>
        <span class="text-amber-400 ">{{ $data['point'] }} </span>
      </div>
    </div>

    </p>
  </div>

  <div class="relative z-50" aria-labelledby="modal-title" role="dialog" aria-modal="true"
    x-data="{ show: @entangle('showAnnouncement') }" x-show="show" x-cloak>

    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
      <div class="flex items-end justify-center p-4 text-center sm:items-center sm:p-0">

        <div class="h-full bg-white px-4 rounded-lg pb-4 pt-5 text-left shadow-xl sm:my-8 sm:p-6">

          <div class="flex items-center justify-between">
            <h3 class="text-lg font-semibold">ประกาศ</h3>
            <button @click="show=false" class="text-xl border rounded-full px-2 border-gray-700">
              x
            </button>
          </div>
          <div>

            <div class="mt-3 text-center sm:mt-5"  @click.away="show = false">
              <div class="mt-2">
                <div class="grid  w-full place-content-center">
                  <div x-data="imageSlider"
                    class="relative mx-auto max-w-2xl overflow-hidden rounded-md bg-gray-100 p-2 sm:p-4">
                    <div
                      class="absolute right-5 top-5 z-10 rounded-full bg-gray-600 px-2 text-center text-sm text-white">
                      <span x-text="currentIndex"></span>/<span x-text="images.length"></span>
                    </div>

                    @if ($announcer->count() > 1)
                    <button @click="previous()"
                      class="absolute left-5 top-1/2 z-10 flex h-11 w-11 -translate-y-1/2 items-center justify-center rounded-full bg-gray-100 shadow-md">
                      <i class="fas fa-chevron-left text-2xl font-bold text-gray-500"></i>
                    </button>

                    <button @click="forward()"
                      class="absolute right-5 top-1/2 z-10 flex h-11 w-11 -translate-y-1/2 items-center justify-center rounded-full bg-gray-100 shadow-md">
                      <i class="fas fa-chevron-right text-2xl font-bold text-gray-500"></i>
                    </button>
                    @endif


                    <template x-for="(image, index) in images">
                      <div x-show="currentIndex == index + 1" x-transition:enter="transition transform duration-300"
                        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                        x-transition:leave="transition transform duration-300" x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0" class=" top-0">
                        <img :src="image" alt="image" class="rounded-sm" />
                      </div>
                    </template>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="flex justify-between mt-5 sm:mt-6">
            <button type="button" @click="show = false" wire:click="closeShowAnnouncement"
              class="inline-flex w-full mr-3 justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
              วันนี้ไม่แสดงอีก</button>
            <button type="button" @click="show = false"
              class="inline-flex w-full justify-center rounded-md bg-amber-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-amber-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
              ปิด</button>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>



<script>
  document.addEventListener("alpine:init", () => {
    Alpine.data("imageSlider", () => ({
      currentIndex: 1,
      images: {!! $announcer !!},
      previous() {
        if (this.currentIndex > 1) {
          this.currentIndex = this.currentIndex - 1;
        }
      },
      forward() {
        if (this.currentIndex < this.images.length) {
          this.currentIndex = this.currentIndex + 1;
        }
      },
    }));
  });
    document.addEventListener('livewire:load', function() {
        
        if('{{ session('status') }}' === 'profile_id_password') {
            Swal.fire({
                title: 'สมัครสมาชิกสำเร็จ',
                html: 'เบอร์โทรศัพท์ : {{ \Illuminate\Support\Facades\Auth::user()->username }}<br> รหัสผ่าน : {{ session('password') }}',
                icon: 'info',
                confirmButtonText: 'ตกลง',
                cancelButtonText: 'คัดลอก',
                showCancelButton: true,
            }).then((result) => {
                if (result.dismiss) {
                    navigator.clipboard.writeText('เบอร์โทรศัพท์ : {{ \Illuminate\Support\Facades\Auth::user()->username }} รหัสผ่าน : {{ session('password') }}');
                }
            });
        }
    });
</script>