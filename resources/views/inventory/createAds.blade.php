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
                <label>
                    <h5>Judul Iklan*</h5>
                    <input row="3" type="text" name="nama" class="form-control mb-3">
                </label>
                <label>
                    <h5>On Hand Stock*</h5>
                    <input type="number" name="stok" value="0" class="form-control mb-3">
                </label>
                <label>
                    <h5>Deskripsi</h5>
                    <textarea rows="4" type="text" name="deskripsi" class="form-control mb-3"></textarea>
                </label>
                <label style="padding-top: 0px">
                    <h5>Lokasi*</h5>
                    <textarea rows="4" type="text" name="lokasi" class="form-control mb-3"></textarea>
                </label>
            </div>
            <div class="row" style="border:1px solid rgba(159, 159, 159, 1);padding:20px">
                <h5>Unggah Foto Barang</h5>
                <div class="row col-12 g-3" id="imagesPreview">
                </div>
                <div class="row col-3 g-3">
                    <label class="label col-12 m-0" for="images">
                        <input type="file" name="imageFile[]" class="custom-file-input" id="images" multiple/>
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
                        <input type="text" class="form-control" value="{{$pic_data->name}}" disabled>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div style="font-weight:400;font-size:24px;color:rgba(153, 153, 153, 1);padding-bottom:10px">No. Telp</div>
                        <input type="text" class="form-control" value="{{$pic_data->phone}}" disabled>
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
        padding: 5px 15px;
        margin: 5px;
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
</style>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script >
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(function() {
    // Multiple images preview with JavaScript
    const previewImages = (input, imgPreviewPlaceholder) => {
 
        if (input.files) {
            var filesAmount = input.files.length;

            if (filesAmount > 4){
                console.log('Maksimal 4 gambar');
                $(this).val('');
                return;
            }

            let images = input.files;

            localStorage.setItem('images', JSON.stringify(images));
 
            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();
                
                reader.onload = function(event) {
                    if(filesAmount < 1){
                        $($.parseHTML('<div>')).attr('class', 'col-auto').appendTo(imgPreviewPlaceholder);
                    }
                    $($.parseHTML('<div>')).attr('class', 'col-3').appendTo(imgPreviewPlaceholder);
                    $($.parseHTML('<img>')).attr('src', event.target.result).attr('class', 'img-fluid').appendTo(imgPreviewPlaceholder + ' div:last-child');
                    $($.parseHTML('<button>')).html("Hapus").attr('class', 'btn btn-danger').appendTo(imgPreviewPlaceholder + ' div:last-child');
                }
 
                reader.readAsDataURL(input.files[i]);
            }
        }
 
    };
 
    $('#images').on('change', function() {
        if ($('div#imagesPreview').children().length < 4) {
            previewImages(this, 'div#imagesPreview');
        } else {
            console.log('Maksimal 4 gambar');
            $(this).val('');
        }
    });

    $('#imagesPreview').on('click', 'button', function() {
        $(this).parent().remove();        
    });
  });
</script>