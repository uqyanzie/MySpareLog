@extends('layout.main')

@section('title', 'Activity')

@section('content')
<div class="pt-5 my-5">
    <div class="checkout">
        <h2 class="text-center">
            {{$title ?? ''}}
        </h2>
    </div>

    <div class="container my-5">
        <div class="border rounded-top-4 text-center py-2">
            <h3>Pesanan Keluar</h3>
        </div>  
        <div class="d-flex flex-column-reverse flex-lg-row p-5 justify-content-around align-items-center align-items-lg-baseline border mb-5 gap-5">
            <div class="d-flex flex-column gap-4"> 
                @foreach($requests as $request)
                <a href="/my-requests/{{$request->id}}" class="text-decoration-none">
                    <div class="card shadow @if($selected_request && $request->id == $selected_request->id) bg-info @endif" style="max-width: 450px">
                        <div class="row g-0">
                            <div class="col-lg-6 col-md-12">
                                <img src="{{asset('storage/inventories/'.$request->foto_barang)}}" class="w-100 h-100 rounded-start" alt="...">
                            </div>
                            <div class="col-lg-6 col-md-12">
                            <div class="card-body">
                                <h5 class="card-title">{{$request->nama_barang}}</h5>
                                <p class="card-text mb-0">{{$request->lokasi}}</p>
                                <p class="card-text mb-0">Jumlah pengajuan : {{$request->stok}}</p>
                                <div class="d-flex justify-content-between">
                                    <div class="card-text">
                                        <p class="mb-0">Order at : </p>
                                        <p class="mb-0">{{$request->tanggal_pengajuan}}</p>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
            <div class="d-flex flex-column">
                @if($selected_request)
                    <div class="card shadow">
                        <div class="card-body d-flex flex-column p-5 gap-3">
                            <div class="d-flex w-100 px-3">
                                <i class="fa-solid fa-bag-shopping fs-1"></i>
                                <div class="d-flex flex-column w-100 ms-3">
                                    <h5 class="mb-0">
                                    Status Pemesanan
                                    </h5>
                                    <p class="mb-0 text-capitalize">{{$selected_request->status}}</p>
                                </div>
                            </div>
                            @if($selected_request->tanggal_pengajuan)
                            <div class="form-check px-5">
                                <input class="form-check-input me-4 rounded-5" type="checkbox" name="tanggal_pengajuan" id="tanggal_pengajuan" checked disabled>
                                <label class="form-check-label" for="tanggal_pengajuan">
                                    <h5 class="mb-0">
                                    Pengajuan Diterima
                                    </h5>
                                    <p class="mb-0">{{$selected_request->tanggal_pengajuan}}</p>
                                </label>
                            </div>
                            @else
                            <div class="form-check px-5">
                                <input class="form-check-input me-4 rounded-5" type="checkbox" name="tanggal_pengajuan" id="tanggal_pengajuan" readonly>
                                <label class="form-check-label" for="tanggal_pengajuan">
                                    <h5 class="mb-0">
                                    Pengajuan Diterima
                                    </h5>
                                    
                                </label>
                            </div>
                            @endif

                            @if(!$selected_request->tanggal_penolakkan && $selected_request->tanggal_persetujuan)
                            <div class="form-check px-5">
                                <input class="form-check-input me-4 rounded-5" type="checkbox" name="tanggal_persetujuan" id="tanggal_persetujuan" checked disabled>
                                <label class="form-check-label" for="tanggal_persetujuan">
                                    <h5 class="mb-0">
                                    Pengajuan Disetujui
                                    </h5>
                                    <p class="mb-0">{{$selected_request->tanggal_persetujuan}}</p>
                                </label>
                            </div>
                            @else
                            <div class="form-check px-5">
                                <input class="form-check-input me-4 rounded-5" type="checkbox" name="tanggal_persetujuan" id="tanggal_persetujuan" disabled>
                                <label class="form-check-label" for="tanggal_persetujuan">
                                    <h5 class="mb-0">
                                    Pengajuan Disetujui
                                    </h5>
                                </label>
                            </div>
                            @endif
                            @if(!$selected_request->tanggal_penolakkan && $selected_request->tanggal_pengiriman)
                            <div class="form-check px-5">
                                <input class="form-check-input me-4 rounded-5" type="checkbox" name="tanggal_pengiriman" id="tanggal_pengiriman" disabled checked>
                                <label class="form-check-label" for="tanggal_pengiriman">
                                    <h5 class="mb-0">Barang Dikirim</h5>
                                    <p class="mb-0">{{$selected_request->tanggal_pengiriman}}</p>
                                </label>
                            </div>
                            @else
                            <div class="form-check px-5">
                                <input class="form-check-input me-4 rounded-5" type="checkbox" name="tanggal_pengiriman" id="tanggal_pengiriman" disabled>
                                <label class="form-check-label" for="tanggal_pengiriman">
                                    <h5 class="mb-0">Barang Dikirim</h5>
                                    <p class="mb-0"></p>
                                </label>
                            </div>
                            @endif
                            @if(!$selected_request->tanggal_penolakkan && $selected_request->tanggal_penerimaan)
                            <div class="form-check px-5">
                                <input class="form-check-input me-4 rounded-5" type="checkbox" name="tanggal_penerimaan" id="tanggal_penerimaan" disabled checked>
                                <label class="form-check-label" for="tanggal_penerimaan">
                                    <h5 class="mb-0">Barang Diterima</h5>
                                    <p class="mb-0">{{$selected_request->tanggal_penerimaan}}</p>
                                </label>
                            </div>
                            @else
                            <div class="form-check px-5">
                                <input class="form-check-input me-4 rounded-5" type="checkbox" name="tanggal_penerimaan" id="tanggal_penerimaan" disabled>
                                <label class="form-check-label" for="tanggal_penerimaan">
                                    <h5 class="mb-0">Barang Diterima</h5>
                                    <p class="mb-0"></p>
                                </label>
                            </div>
                            @endif
                        </div>
                    </div>
                    <button class="btn btn-outline-primary my-1 w-100">
                        Cancel Pesanan
                    </button>
                @endif
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