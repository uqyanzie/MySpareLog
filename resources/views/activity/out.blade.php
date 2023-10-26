@extends('layout.main')

@section('title', 'Activity')

@section('content')
<div class="pt-5 my-5">
    <div class="checkout">
        <h2 class="text-center">
            Activity
        </h2>
    </div>

    <div class="container my-5">
        <div class="border rounded-top-4 text-center py-2">
            <h3>Pesanan Keluar</h3>
        </div>  
        <div class="d-flex flex-column flex-lg-row p-5 justify-content-around border mb-5 gap-5">
            <div class="d-flex flex-column gap-4"> 
                <a href="#">
                    <div class="card shadow">
                        <div class="row g-0">
                            <div class="col-lg-6 col-md-12">
                                <img src="{{asset('storage/inventories/Tangki bbm 10.jpg')}}" class="w-100 h-100 rounded-start" alt="...">
                            </div>
                            <div class="col-lg-6 col-md-12">
                            <div class="card-body">
                                <h5 class="card-title">Tangki Timbun BBM</h5>
                                <p class="card-text mb-0">Tanjung Priok, Jakarta</p>
                                <p class="card-text mb-0">Terminal Nilam</p>
                                <div class="d-flex justify-content-between">
                                    <div class="card-text">
                                        <p class="mb-0">Order at : </p>
                                        <p class="mb-0">18 Juli 2023  15.00</p>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="d-flex flex-column align-items-center gap-3">
                <div class="card shadow">
                    <div class="card-body d-flex flex-column p-5 gap-3 my-3">
                        <div class="d-flex w-100 px-3">
                            <i class="fa-solid fa-bag-shopping fs-1"></i>
                            <div class="d-flex flex-column w-100 ms-3">
                                <h5 class="mb-0">
                                Status Pemesanan
                                </h5>
                                <p class="mb-0">On Delivery</p>
                            </div>
                        </div>
                        
                        <div class="form-check px-5">
                            <input class="form-check-input me-4 rounded-5" type="checkbox" name="flexRadioDefault" id="flexRadioDefault1" checked disabled>
                            <label class="form-check-label" for="flexRadioDefault1">
                                <h5 class="mb-0">
                                Pengajuan Diterima
                                </h5>
                                <p class="mb-0">15.00, 18 Juli 2023</p>
                            </label>
                        </div>
                        <div class="form-check px-5">
                            <input class="form-check-input me-4 rounded-5" type="checkbox" name="flexRadioDefault" id="flexRadioDefault1" checked disabled>
                            <label class="form-check-label" for="flexRadioDefault1">
                                <h5 class="mb-0">
                                Pengajuan Disetujui
                                </h5>
                                <p class="mb-0">15.30, 18 Juli 2023</p>
                            </label>
                        </div>
                        <div class="form-check px-5">
                            <input class="form-check-input me-4 rounded-5" type="checkbox" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                <h5 class="mb-0">Barang Dikirim</h5>
                                <p class="mb-0"></p>
                            </label>
                        </div>
                        <div class="form-check px-5">
                            <input class="form-check-input me-4 rounded-5" type="checkbox" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                <h5 class="mb-0">Barang Diterima</h5>
                                <p class="mb-0"></p>
                            </label>
                        </div>
                    </div>
                </div>
                <button class="btn btn-outline-primary my-1 w-100">
                    Cancel Pesanan
                </button>
            </div>
        </div>
    </div>     
</div>
@endsection

@section('js')
  <script>
    function toggleContent(contentNumber) {
      const contentClass = document.getElementsByClassName('content');
      
      const contentElement = document.getElementById(`content-${contentNumber}`);

      for (let i = 0; i < contentClass.length; i++) {
        if (contentClass[i].classList.contains('active') && i+1 !== contentNumber){
          contentClass[i].classList.remove('active');
        }
      }

      if (contentElement) {
        contentElement.classList.toggle('active');
      }
    }
  </script>

<!-- Link ke Bootstrap JS, Popper.js, dan jQuery -->
@endsection