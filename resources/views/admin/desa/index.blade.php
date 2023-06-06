@extends('layouts.app')

@section('title', 'Desa')

@section('content')
    <!-- Page-header start -->
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ti-location-pin bg-c-pink"></i>

                    <div class="d-inline">
                        <h4>Desa</h4>
                        <span>Daftar Desa Kabupaten Toba</span>
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
                        <li class="breadcrumb-item"><a href="#!">Desa</a>
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
                            Tambah Desa
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
                                        <th>Nama Desa</th>
                                        <th>Nama Kecamatan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($desa as $item)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $item->nama_desa }}</td>
                                            <td>{{ $item->kecamatan->nama_kecamatan }}</td> <!-- Memanggil properti nama_kecamatan dari relasi kecamatan -->

                                            <td>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-sm btn-warning" id="modalEdit-{{ $item->id }}" data-toggle="modal"
                                                    data-target="#modalEdit" data-nama_desa="{{ $item->nama_desa }}" data-koordinat_lattitude="{{ $item->koordinat_lattitude }}" data-koordinat_longitude="{{ $item->koordinat_longitude }}" data-jenis_rawan_bencana="{{ $item->jenis_rawan_bencana }}" data-level_rawan_bencana="{{ $item->level_rawan_bencana }}" data-rawan_id="{{ $item->id }}">
                                                    Ubah
                                                </button>
                                                <button class="btn btn-sm btn-danger delete" data-id="{{ $item->id }}">
                                                    <form action="{{ route('desa.delete', $item->id) }}" method="POST"
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
                                            <th scope="row" colspan="7" class="text-center">Data Desa Tidak Ada</th>
                                        </tr>
                                    @endforelse
                                </tbody>

                            </table>
                            <div class="d-flex my-5">
                                {!! $desa->links() !!}
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Desa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('desa.add') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group {{ $errors->has('nama_desa') ? 'has-danger' : '' }} row">
                            <label class="col-sm-2 col-form-label" for="nama_desa">Desa</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama_desa" id="nama_desa" class="form-control {{ $errors->has('nama_desa') ? 'form-control-danger' : '' }}"
                                    placeholder="Masukkan nama desa">
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('kecamatan_id') ? 'has-danger' : '' }} row">
                            <label class="col-sm-2 col-form-label" for="kecamatan_id">Kecamatan</label>
                            <div class="col-sm-10">
                                <select name="kecamatan_id" id="kecamatan_id" class="form-control {{ $errors->has('kecamatan_id') ? 'form-control-danger' : '' }}">
                                    <option value="">Pilih Kecamatan</option>
                                    @foreach ($kecamatan as $kc)
                                        <option value="{{ $kc->id }}">{{ $kc->nama_kecamatan }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Edit -->
    <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Desa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('desa.update') }}">
                    @csrf
                    <input name="_method" type="hidden" value="PUT">
                    <div class="modal-body">
                        <input type="hidden" name="rawan_id" id="rawan_id" value="">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="nama_desa">Desa</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama_desa" id="nama_desa" class="form-control"
                                    placeholder="Masukkan nama desa">
                            </div>
                        </div>
                         <div class="form-group {{ $errors->has('kecamatan_id') ? 'has-danger' : '' }} row">
                            <label class="col-sm-2 col-form-label" for="kecamatan_id">Kecamatan</label>
                            <div class="col-sm-10">
                                <select name="kecamatan_id" id="kecamatan_id" class="form-control {{ $errors->has('kecamatan_id') ? 'form-control-danger' : '' }}">
                                    <option value="">Pilih Kecamatan</option>
                                    @foreach ($kecamatan as $kc)
                                        <option value="{{ $kc->id }}">{{ $kc->nama_kecamatan }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script>
    $('#modalEdit').on('show.bs.modal', function(e) {
        var link = $(e.relatedTarget)
        var nama_desa = link.data("nama_desa");

        var rawan_id = link.data('rawan_id');

        console.log(rawan_id);

        var modal = $(this)
        modal.find('.modal-body #nama_desa').val(nama_desa);
       modal.find('.modal-body #rawan_id').val(rawan_id);
    })

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
</script>
@endsection
