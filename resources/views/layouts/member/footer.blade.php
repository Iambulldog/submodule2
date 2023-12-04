
<footer class=" bg-black  text-white bottom-0  sm:block ">
  
      <div class="text-center text-md-start">
        <div class=" mt-3">
          <div class=" mx-auto mb-4 text-center">
            <p class="p-6">ช่องทางการชำระเงิน</p>
            <div class="flex flex-wrap items-center text-center justify-center ">
              <img class="me-2 rounded-3xl" src=" {{asset('/storage/images/bank/baac.svg')}}" width="40">
              <img class="me-2 rounded-3xl" src=" {{asset('/storage/images/bank/bay.svg')}}" width="40">
              <img class="me-2 rounded-3xl" src=" {{asset('/storage/images/bank/bbl.svg')}}" width="38">
              <img class="me-2 rounded-3xl" src=" {{asset('/storage/images/bank/bnp.svg')}}" width="40">
              <img class="me-2 rounded-3xl" src=" {{asset('/storage/images/bank/boa.svg')}}" width="41">
              <img class="me-2 rounded-3xl" src=" {{asset('/storage/images/bank/cacib.svg')}}" width="40">
              <img class="me-2 rounded-3xl" src=" {{asset('/storage/images/bank/cimb.svg')}}" width="40">
              <img class="me-2 rounded-3xl" src=" {{asset('/storage/images/bank/citi.svg')}}" width="40">
              <img class="me-2 rounded-3xl" src=" {{asset('/storage/images/bank/db.svg')}}" width="40">
              <img class="me-2 rounded-3xl" src=" {{asset('/storage/images/bank/ghb.svg')}}" width="40">
              <img class="me-2 rounded-3xl" src=" {{asset('/storage/images/bank/gsb.svg')}}" width="40">
              <img class="me-2 rounded-3xl" src=" {{asset('/storage/images/bank/hsbc.svg')}}" width="40">
              <img class="me-2 rounded-3xl" src=" {{asset('/storage/images/bank/ibank.svg')}}" width="40">
              <img class="me-2 rounded-3xl" src=" {{asset('/storage/images/bank/icbc.svg')}}" width="40">
              <img class="me-2 rounded-3xl" src=" {{asset('/storage/images/bank/kbank.svg')}}" width="40">
              <img class="me-2 rounded-3xl" src=" {{asset('/storage/images/bank/kk.svg')}}" width="40">
              <img class="me-2 rounded-3xl" src=" {{asset('/storage/images/bank/ktb.svg')}}" width="40">
              <img class="me-2 rounded-3xl" src=" {{asset('/storage/images/bank/lhbank.svg')}}" width="40">
              <img class="me-2 rounded-3xl" src=" {{asset('/storage/images/bank/mb.svg')}}" width="40">
              <img class="me-2 rounded-3xl" src=" {{asset('/storage/images/bank/mega.svg')}}" width="40">
              <img class="me-2 rounded-3xl" src=" {{asset('/storage/images/bank/mufg.svg')}}" width="40">
              <img class="me-2 rounded-3xl" src=" {{asset('/storage/images/bank/promptpay.svg')}}" width="40">
              <img class="me-2 rounded-3xl" src=" {{asset('/storage/images/bank/rbs.svg')}}" width="40">
              <img class="me-2 rounded-3xl" src=" {{asset('/storage/images/bank/scb.svg')}}" width="40">
              <img class="me-2 rounded-3xl" src=" {{asset('/storage/images/bank/scbi.svg')}}" width="40">
              <img class="me-2 rounded-3xl" src=" {{asset('/storage/images/bank/smbc.svg')}}" width="40">
              <img class="me-2 rounded-3xl" src=" {{asset('/storage/images/bank/tbank.svg')}}" width="40">
              <img class="me-2 rounded-3xl" src=" {{asset('/storage/images/bank/tcrb.svg')}}" width="40">
              <img class="me-2 rounded-3xl" src=" {{asset('/storage/images/bank/tisco.svg')}}" width="40">
              <img class="me-2 rounded-3xl" src=" {{asset('/storage/images/bank/tmb.svg')}}" width="40">
              <img class="me-2 rounded-3xl" src=" {{asset('/storage/images/bank/true.svg')}}" width="40">
              <img class="me-2 rounded-3xl" src=" {{asset('/storage/images/bank/ttb.svg')}}" width="40">
              <img class="me-2 rounded-3xl" src=" {{asset('/storage/images/bank/uob.svg')}}" width="40">
            </div>
            <p class="p-6">ผลิตภัณฑ์</p>
            <div class="flex flex-wrap items-center text-center justify-center ">
             @foreach ($vender as $key=>$item)
              @if ($item['icon'])
                  <img class="me-2" src="{{env('LINK_SPACES_CENTER').$item['icon']}}" width="70">
              @endif
                  
              @endforeach
            </div>
          </div>
        </div>
  
      </div>
  
    <div class="text-center p-2">
      2023 -
      <script>
        document.write(new Date().getFullYear())
      </script>©
      @contact
    </div>
  </footer>