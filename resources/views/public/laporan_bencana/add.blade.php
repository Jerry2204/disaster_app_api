@extends('public.layout.app')

@section('title', 'Laporan Bencana')

@section('css')
    <style>
        #loading-spinner {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 9999;
        }
        .required-field {
    color: red;
}

        #loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 9998;
        }


    </style>
@endsection

@section('content')
    <div id="loading-overlay" class="d-none"></div>
    <div class="d-flex justify-content-center align-items-center d-none" id="loading-spinner">
        <button class="btn btn-success" type="button" disabled>
            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            Loading...
        </button>
    </div>
    <div class="hero position-relative d-flex justify-content-center align-items-center" style="height:250px; object-fit:contain;">
        <img src="data:image/png;base64,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"
            class="overflow-hidden hero-image" alt="">
        <div class="container position-relative hero-container ">
            <div class="row">
                <div class="col-md-12 text-sta d-flex flex-column justify-content-center align-items-center">
                    <div class="position-absolute w-100 text-center" style="">
                        <h1 class="fw-bold">LAPOR</h1>
                        <p>Siap Membantu Masyarakat Dalam Situasi Gawat Darurat</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- <div class="d-flex justify-content-center align-items-center mt-3">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">

                <button class="nav-link active border btn " id="pills-home-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                    aria-selected="true">Kontak Darurat
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link border" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile"
                    type="button" role="tab" aria-controls="pills-profile" aria-selected="false" tabindex="-1">Lapor
                </button>
            </li>
        </ul>
    </div> --}}

    <div class="d-flex justify-content-center align-items-center mt-3">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active border btn " id="pills-home-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                    aria-selected="true">Lapor Dengan Form
                </button>
            </li>

            <li class="nav-item" role="presentation">
                <button class="nav-link border" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile"
                    type="button" role="tab" aria-controls="pills-profile" aria-selected="false" tabindex="-1">Kontak Darurat
                </button>
            </li>

        </ul>
    </div>


    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <div id="">
                <div class="container">
                    <div class="row">
                        @foreach ($kontakDarurat as $item)
                            <div class="col-md-4 py-4">
                                <div class="cards container card p-3" style="width: 20rem; "><br>
                                    <div class="card-title h5">
                                        <p>{{ $item->name }}</p>
                                    </div>
                                    <img class="card-img-top damkar" src="{{ asset('kontak/' . $item->gambar) }}">
                                    <a href="tel:{{ $item->nomor }}" class="btn btn-danger mt-2"
                                        style="background-color: #FA0000"> <i
                                            class="fa fa-phone me-2"></i>{{ $item->nomor }}</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>


        <div class="tab-pane fade show active mt-3" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <div class="container col-md-8 offset-md-2">
                <div class="row mb-5 border rounded p-3"style="box-shadow: 0px 0px 10px 0px black">
                    <div class="col-md-8 offset-md-2">
                        <h4 class="text-center mt-2 mb-2">Form Pelaporan Bencana</h4>
                        <h3 class="text-center" style="font-size: 20px">
                            Segera Laporkan Jika Ditemukan Bencana Disekitar Anda Silakan Melaporkannya Melalui Form Dibawah
                            Ini
                        </h3>
                       <hr>
                    </div>
                    <div class="col-md-8 offset-md-2">

                        <form action="{{ route('report.store') }}" id="form-lapor" method="post"
                            enctype="multipart/form-data">

                            @csrf
                            <div class="form-floating mb-3 ">
                                <select name="jenis_bencana" class="form-select" id="jenis_bencana"
                                    aria-label="Floating label select example">
                                    <option value="">-- Pilih Jenis Bencana --</option>
                                    <option value="bencana alam">Bencana Alam</option>
                                    <option value="bencana non alam">Bencana Non Alam</option>
                                    <option value="bencana sosial">Bencana Sosial</option>
                                </select>
                                <label for="jenis_bencana">Jenis Bencana <span class="required-field">*</span></label>
                                <label for="jenis_bencana">Jenis Bencana</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="nama_bencana" name="nama_bencana"
                                    placeholder="Masukkan nama bencana">
                                <label for="nama_bencana">Nama Bencana<span class="required-field">*</span></label>
                            </div>
                            <div class="form-floating mb-3">
                                <select name="kecamatan_id" class="form-select" id="kecamatan_id"
                                    aria-label="Floating label select example">
                                    <option value=""disabled selected>-- Pilih Kecamatan --</option>
                                    @foreach ($kecamatans as $kecamatan)
                                        <option value="{{ $kecamatan->id }}">{{ $kecamatan->nama_kecamatan }}</option>
                                    @endforeach
                                </select>
                                <label for="kecamatan_id">Kecamatan<span class="required-field">*</span></label>
                            </div>
                            <div class="form-floating mb-3">
                                <select name="desa_id" class="form-select" id="desaSelect"
                                    aria-label="Floating label select example">
                                    <option value="">-- Pilih Desa --</option>
                                </select>
                                <label for="desaSelect">Desa<span class="required-field">*</span></label>
                            </div>

                    <div class="form-floating mb-3">
                        <textarea class="form-control" name="keterangan" style="height: 150px" id="keterangan"
                            placeholder="Masukkan keterangan"></textarea>
                        <label for="keterangan">Keterangan<span class="required-field">*</span></label>
                    </div>

                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar<span class="required-field">*</span></label>
                        <input name="gambar" class="form-control form-control-sm" id="gambar" type="file"
                            accept="image/*">
                    </div>
                    <button type="button" class="btn btn-primary"
                        onclick="laporkan()"style="width: 100%">Laporkan</button>
                    </div>
                    </form>
                    <script>
                        function getDesaByKecamatan(kecamatanId) {
                            $.ajax({
                                url: '/get-desa-by-kecamatan',
                                method: 'GET',
                                data: {
                                    kecamatan_id: kecamatanId
                                },
                                success: function(response) {

                                    $('#desaSelect').empty();


                                    response.forEach(function(desa) {
                                        $('#desaSelect').append($('<option>', {
                                            value: desa.id,
                                            text: desa.nama_desa
                                        }));
                                    });
                                },
                                error: function(xhr) {
                                    console.log(xhr.responseText);
                                }
                            });
                        }


                        $('#kecamatanSelect').change(function() {
                            var kecamatanId = $(this).val();
                            getDesaByKecamatan(kecamatanId);
                        });
                    </script>
                    <script>
                        function laporkan() {
                            var jenisBencana = document.getElementById("jenis_bencana").value;
                            var namaBencana = document.getElementById("nama_bencana").value;
                            var keterangan = document.getElementById("keterangan").value;
                            var kecamatan = document.getElementById("kecamatan_id").value;
                            var desa = document.getElementById("desaSelect").value;


                            if (!jenisBencana || !namaBencana || !keterangan || !kecamatan || !desa || !keterangan) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Maaf, data tidak bisa kosong!',
                                    text: 'Silahkan lengkapi semua kolom form laporan.',
                                    confirmButtonText: 'OK',
                                    confirmButtonColor: '#dc3545',
                                    timer: null
                                });
                            } else {
                                document.getElementById('loading-overlay').classList.remove('d-none');
                                document.getElementById('loading-spinner').classList.remove('d-none');
                                let form = document.getElementById('form-lapor');

                                form.submit();
                            }
                        }
                    </script>
                    <script>
                        $('#kecamatan_id').change(function() {
                            var kecamatanId = $(this).val();
                            getDesaByKecamatan(kecamatanId);
                        });
                    </script>

                </div>
            </div>
        </div>


    </div>
    </div>

@endsection
