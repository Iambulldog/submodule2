<div>
    @if ($isOpen)
        <div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
            <div class="fixed inset-0 z-10 overflow-y-auto">
                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                    <div
                        class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">

                        <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                            <div class="sm:flex sm:items-start">
                                <div
                                    class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-yellow-100 sm:mx-0 sm:h-10 sm:w-10">
                                    <svg class="h-6 w-6 text-yellow-600" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                                    </svg>
                                </div>
                                <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                    <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">
                                        คุณต้องการทำรายการช้อปปิ้งใช่หรือไม่ ?</h3>
                                    <div class="mt-2">
                                        <div
                                            class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-100 group-hover:opacity-75 text-center">
                                            <img src="{{ $img }}"
                                                alt="White fabric pouch with white zipper, black zipper pull, and black elastic loop."
                                                class="h-full w-full object-cover object-center">
                                        </div>
                                        <p class="mt-1 text-sm text-indigo-500">ชื่อสินค้า : {{ $name }}</p>
                                        <p class="mt-1 text-sm text-indigo-500">สี : {{ $color }}</p>
                                        <p class="mt-1 text-sm text-indigo-500">ราคา : {{ $price }}</p>
                                    </div>
                                </div>

                            </div>
                        </div>

                        @if ($showConfirm)
                            <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                <button wire:click="openAddressForm" type="button"
                                    class="inline-flex w-full justify-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 sm:ml-3 sm:w-auto">ยืนยัน</button>
                                <button wire:click="closeModalConfrimShopping" type="button"
                                    class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">ยกเลิก</button>
                            </div>
                        @endif

                        <!-- Address form section (conditionally displayed) -->
                        @if ($showAddressForm)
                            <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                                <h3 class="text-base font-semibold leading-6 text-gray-900">กรอกที่อยู่</h3>

                                <div class="mt-2">
                                    <form class="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl md:col-span-2">
                                        <div class="px-4 py-6 sm:p-8">
                                          <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                            <div class="sm:col-span-3">
                                              <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">ชื่อผู้รับสินค้า</label>
                                              <div class="mt-2">
                                                <input type="text" wire:model="recept_name" name="first-name" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                              </div>
                                            </div>
                                  
                                            <div class="sm:col-span-3">
                                              <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">เบอร์โทรติดต่อ</label>
                                              <div class="mt-2">
                                                <input type="text" wire:model="tel" name="last-name"  autocomplete="family-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                              </div>
                                            </div>

                                            <div class="col-span-full">
                                              <label for="street-address" class="block text-sm font-medium leading-6 text-gray-900">ที่อยู่รับสินค้า</label>
                                              <div class="mt-2">
                                                <textarea rows="4" wire:model="address" name="address"  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                                              </div>
                                            </div>

                                          </div>
                                        </div>
                                        <div class="flex items-center justify-end gap-x-6 border-t border-gray-900/10 px-4 py-4 sm:px-8">
                                          <button wire:click="closeModalConfrimShopping" type="button" class="text-sm font-semibold leading-6 text-gray-900">ยกเลิก</button>
                                          <button wire:click="saveToDatabase" type="button" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">บันทึก</button>
                                        </div>
                                      </form>
                                </div>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
