@extends('layout.plain')


@section('content')

<div class="container my-5">
    <div class="row border border-1 border-secondary-subtle p-3">
        <h5>Kategori</h5>
        <p class="mb-0">{{$type->nama_jenis}}</p>
    </div>
    <form action="{{ route('inventories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row" style="border:1px solid rgba(159, 159, 159, 1);padding:20px">
            <h5>Detail Iklan</h5>
            <p class="mb-1">Kondisi</p>
            <div class="row">
                <div class="d-flex gap-2 mb-3">
                    <input type="hidden" name="type_id" value="{{$type->id}}">
                    <label>
                        <input type="radio" name="kondisi" value="baru" checked>
                        <div class="btn border rounded-0 border-black">
                            <span>Baru</span>
                        </div>
                    </label>
                    <label>
                        <input type="radio" name="kondisi" value="bekas">
                        <div class="btn border rounded-0 border-black">
                            <span>Bekas</span>
                        </div>
                    </label>
                </div>
            </div>
            <label class="my-2">
                <h5>Judul Iklan*</h5>
                <input type="text" name="nama" class="form-control" required>
            </label>
            <label for="stok" class="w-25 my-2">
                <h5>On Hand Stock*</h5>
                <div class="input-group input-group-lg border rounded-3">
                    <button class="btn btn-outline-dark-subtle" type="button" id="button-addon1" onclick="stepDown()">-</button>
                    <input name="stok" id="stok" type="number" value="0" min="0" class="form-control text-center" required>
                    <button class="btn btn-outline-dark-subtle" type="button" id="button-addon2" onclick="stepUp()">+</button>
                </div>
            </label>
            <label class="my-2">
                <h5>Deskripsi</h5>
                <textarea rows="4" type="text" name="deskripsi" class="form-control mb-3"></textarea>
            </label>
            <label class="my-2">
                <h5>Lokasi*</h5>
                <input type="text" name="lokasi" class="form-control mb-3" value="{{$pic_data->cabang}}" readonly>

            </label>
        </div>
        <div class="row" style="border:1px solid rgba(159, 159, 159, 1);padding:20px">
            <h5>Unggah Foto Barang</h5>
            <div class="row justify-content-between">
                <img class="col-3 d-none" id="imgPreview1" style="max-height: 150px; object-fit: cover; border-radius: 10px;" src="" alt="your image" />
                <label class="label col-3" id="image1">
                    <input type="file" name="image1" class="custom-file-input" accept=".jpg, .jpeg, .png"/>
                    <span class="d-block text-center">
                        <i class="fa-solid fa-camera fa-5x"></i>
                        <h5 class="fw-bold">
                            Tambahkan foto
                        </h5>
                    </span>
                </label>
                <img class="col-3 d-none" id="imgPreview2" style="max-height: 150px; object-fit: cover; border-radius: 10px;" src="" alt="your image" />
                <label class="label col-3" id="image2">
                    <input type="file" name="image2" class="custom-file-input" accept=".jpg, .jpeg, .png"/>
                    <span class="d-block text-center">
                        <i class="fa-solid fa-camera fa-5x"></i>
                        <h5 class="fw-bold">
                            Tambahkan foto
                        </h5>
                    </span>
                </label>
                <img class="col-3 d-none" id="imgPreview3" style="max-height: 150px; object-fit: cover; border-radius: 10px;" src="" alt="your image" />
                <label class="label col-3" id="image3">
                    <input type="file" name="image3" class="custom-file-input" accept=".jpg, .jpeg, .png"/>
                    <span class="d-block text-center">
                        <i class="fa-solid fa-camera fa-5x"></i>
                        <h5 class="fw-bold">
                            Tambahkan foto
                        </h5>
                    </span>
                </label>
                <img class="col-3 d-none" id="imgPreview4" style="max-height: 150px; object-fit: cover; border-radius: 10px;" src="" alt="your image" />
                <label class="label col-3" id="image4">
                    <input type="file" name="image4" class="custom-file-input" accept=".jpg, .jpeg, .png"/>
                    <span class="d-block text-center">
                        <i class="fa-solid fa-camera fa-5x"></i>
                        <h5 class="fw-bold">
                            Tambahkan foto
                        </h5>
                    </span>
                </label>
            </div>
        </div>
        <div class="row" style="border:1px solid rgba(159, 159, 159, 1);padding:20px">
            <h5 style="padding-bottom: 10px">Data PIC</h5>    
            <div class="col-lg-10 col-sm-8">
                <div class="row">
                    <div class="col-lg-6 col-sm-12">
                        <div style="font-weight:400;font-size:24px;color:rgba(153, 153, 153, 1);padding-bottom:10px">Nama</div>
                        <input type="text" name="nama_pic" class="form-control" value="{{$pic_data->name}}">
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div style="font-weight:400;font-size:24px;color:rgba(153, 153, 153, 1);padding-bottom:10px">No. Telp</div>
                        <input type="text" name="telp_pic" class="form-control" value="{{$pic_data->phone}}">
                    </div>
                </div>   
            </div>
        </div>
        <div class="row" style="border:1px solid rgba(159, 159, 159, 1);padding:20px;display:flex;justify-content:center">
            <button type="submit" class="btn btn-primary btn-lg" style="width: 278px;">Pasang Iklan</button>
        </div>
    </form>
</div>
@endsection

<style>
    input[type="radio"] {
        display: none;
    }
    input[type="radio"]:checked + .btn {
        background-color: #5EA7C3;
        color: #fff;
    }

    .label input[type="file"] {
        position: absolute;
        top: -1000px;
        }
    .label {
        cursor: pointer;
        border: 2px solid #000; 
        padding: 5px;
        background: #dddddd;
        display: inline-block;
    }
    .label:hover {
        background: #fff;
    }
    .label:active {
        background: #9fa1a0;
    }
    .label:invalid + span {
        color: #000000;
    }
    .label:valid + span {
        color: #ffffff;
    }
    
      input[type="number"] {
        -webkit-appearance: textfield;
        -moz-appearance: textfield;
        appearance: textfield;
    }
    input[type=number]::-webkit-inner-spin-button, 
    input[type=number]::-webkit-outer-spin-button { 
        -webkit-appearance: none;
    }
</style>

<script>
    function stepUp(){
        var input = document.getElementById("stok");
        input.stepUp();
    }

    function stepDown(){
        var input = document.getElementById("stok");
        input.stepDown();
    }
</script>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(function() {
        $('#image1').change(function(e) {
            addImage1(e); 
        });
        function addImage1(e){
            var file = e.target.files[0],
            imageType = /image.*/;
        
            if (!file.type.match(imageType))
            return;
        
            var reader = new FileReader();
            reader.onload = fileOnload;
            reader.readAsDataURL(file);
        }
        
        function fileOnload(e) {
            var result=e.target.result;
            $('#imgPreview1').attr("src",result);
            $('#imgPreview1').removeClass('d-none');
            $('#image1').addClass('d-none');
        }  
    });

    $(function() {
        $('#image2').change(function(e) {
            addImage2(e); 
        });
        function addImage2(e){
            var file = e.target.files[0],
            imageType = /image.*/;
        
            if (!file.type.match(imageType))
            return;
        
            var reader = new FileReader();
            reader.onload = fileOnload;
            reader.readAsDataURL(file);
        }
        
        function fileOnload(e) {
            var result=e.target.result;
            $('#imgPreview2').attr("src",result);
            $('#imgPreview2').removeClass('d-none');
            $('#image2').addClass('d-none');
        }    
    });

    $(function() {
        $('#image3').change(function(e) {
            addImage3(e); 
        });
        function addImage3(e){
            var file = e.target.files[0],
            imageType = /image.*/;
        
            if (!file.type.match(imageType))
            return;
        
            var reader = new FileReader();
            reader.onload = fileOnload;
            reader.readAsDataURL(file);
        }
        
        function fileOnload(e) {
            var result=e.target.result;
            $('#imgPreview3').attr("src",result);
            $('#imgPreview3').removeClass('d-none');
            $('#image3').addClass('d-none');
        }    
    });

    $(function() {
        $('#image4').change(function(e) {
            addImage4(e); 
        });
        function addImage4(e){
            var file = e.target.files[0],
            imageType = /image.*/;
        
            if (!file.type.match(imageType))
            return;
        
            var reader = new FileReader();
            reader.onload = fileOnload;
            reader.readAsDataURL(file);
        }
        
        function fileOnload(e) {
            var result=e.target.result;
            $('#imgPreview4').attr("src",result);
            $('#imgPreview4').removeClass('d-none');
            $('#image4').addClass('d-none');
        }    
    });
</script>