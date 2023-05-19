@extends('layouts.app')

@section('title', 'Struktur Organisasi')

@section('content')
    <!-- Page-header start -->
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="fa fa-sitemap bg-c-green"></i>


                    <div class="d-inline">
                        <h4>Struktur Organisasi</h4>
                        <span>Struktur Organisasi BPBD </span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index.html">
                                <i class="icofont icofont-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Pages</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Struktur Organisasi</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Page-header end -->

    <!-- Page body start -->
    <div class="page-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="card p-3">
                    <div class="card-header">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Tambah Struktur Organisasi
                        </button>
                        <div class="card-header-right">
                            <ul class="list-unstyled card-option">
                                <li><i class="icofont icofont-simple-left "></i></li>
                                <li><i class="icofont icofont-maximize full-card"></i></li>
                                <li><i class="icofont icofont-minus minimize-card"></i></li>
                                <li><i class="icofont icofont-refresh reload-card"></i></li>
                                <li><i class="icofont icofont-error close-card"></i></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-block table-border-style">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Jabatan</th>
                                        <th>Nomor</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($petugas as $item)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->jabatan }}</td>
                                            <td>{{ $item->nomor }}</td>

                                            <td>
                                                <!-- Button trigger modal -->
                                                <a href="{{ route('pengurus.edit', $item->id) }}"
                                                    class="btn btn-sm btn-warning">
                                                    Ubah
                                                </a>
                                                <button class="btn btn-sm btn-danger delete" data-id="{{ $item->id }}">
                                                    <form action="{{ route('petugas.delete', $item->id) }}" method="POST"
                                                        id="delete{{ $item->id }}">
                                                        @csrf
                                                        @method('delete')
                                                    </form>
                                                    Hapus
                                                </button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <th scope="row" colspan="7" class="text-center">
                                                Tidak Ada Data Struktur Organisasi</th>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="d-flex my-5">
                                {!! $petugas->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body end -->

    <!-- Modal Add -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Pengurus</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('petugas.add') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group {{ $errors->has('nama_add') ? 'has-danger' : '' }} row">
                            <label class="col-sm-2 col-form-label" for="nama_add">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama_add" id="title_add"
                                    class="form-control {{ $errors->has('nama_add') ? 'form-control-danger' : '' }}"
                                    placeholder="Masukkan Nama">
                            </div>
                        </div>


                        <div class="form-group {{ $errors->has('jabatan_add') ? 'has-danger' : '' }} row">
                            <label class="col-sm-2 col-form-label" for="jabatan_add">Jabatan</label>
                            <div class="col-sm-10">
                                <select name="jabatan_add" id="jabatan_add"
                                    class="form-control {{ $errors->has('jabatan_add') ? 'form-control-danger' : '' }}">
                                    <option value="">Pilih Jabatan</option>
                                    <option value="KEPALA UNSUR PELAKSANA">KEPALA UNSUR PELAKSANA</option>
                                    <option value="SEKRETARIS">SEKRETARIS</option>
                                    <option value="KASUBBAG PERENCANAAN">KASUBBAG PERENCANAAN</option>
                                    <option value="KASUBBAG UMUM DAN KEPEGAWAIAN">KASUBBAG UMUM DAN KEPEGAWAIAN</option>
                                    <option value="KABID PENCEGAHAN & KESIAPSIAGAAN">KABID PENCEGAHAN & KESIAPSIAGAAN
                                    </option>
                                    <option value="KABID KEDARURATAN & LOGISTIK">KABID KEDARURATAN & LOGISTIK</option>
                                    <option value="KABID REHABILITASI REKONSTRUKSI">KABID REHABILITASI REKONSTRUKSI</option>
                                    <option value="KASI KESIAPSIAGAAN ">KASI KESIAPSIAGAAN</option>
                                    <option value="KASI KEDARURATAN">KASI KEDARURATAN</option>
                                    <option value="KASI REHABILITASI">KASI REHABILITASI</option>

                                </select>
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('Nomor_add') ? 'has-danger' : '' }} row">
                            <label class="col-sm-2 col-form-label" for="Nomor_add">Nomor</label>
                            <div class="col-sm-10">
                                <input type="text" name="Nomor_add" id="Nomor_add"
                                    class="form-control {{ $errors->has('Nomor_add') ? 'form-control-danger' : '' }}"
                                    placeholder="Masukkan Nomor">
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('gambar') ? 'has-danger' : '' }} row">
                            <label class="col-sm-2 col-form-label" for="gambar">Gambar</label>
                            <div class="col-sm-10">
                                <input type="file" name="gambar" id="gambar" accept="image/*"
                                    class="form-control {{ $errors->has('gambar') ? 'form-control-danger' : '' }}"
                                    placeholder="Masukkan gambar">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Ubah -->

@endsection

@section('js')

    <script>
        ClassicEditor
            .create(document.querySelector('#editor2'))
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        $(".delete").click(function(e) {
            id = e.target.dataset.id
            Swal.fire({
                title: "Apakah anda yakin ingin menghapus data ini?",
                text: "Anda tidak dapat memulihkan data nanti",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Batal',
                confirmButtonText: 'Ya, hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $(`#delete${id}`).submit();
                }
            })
        })

        // editor.setData( '<p>Some text.</p>' );
    </script>
@endsection
