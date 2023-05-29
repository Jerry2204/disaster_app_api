@extends('layouts.app')

@section('title', 'Rawan Bencana')

@section('content')
    <!-- Page-header start -->
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ti-location-pin bg-c-pink"></i>

                    <div class="d-inline">
                        <h4>Rawan Bencana</h4>
                        <span>Daftar Daerah Rawan Bencana</span>
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
                        <li class="breadcrumb-item"><a href="#!">Rawan Bencana</a>
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
                            Tambah Daerah Rawan Bencana
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
                                        <th>Nama Wilayah</th>
                                        <th>Koordinat Lattitude</th>
                                        <th>Koordinat Longitude</th>
                                        <th>Jenis Rawan Bencana</th>
                                        <th>Level Rawan Bencana</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($rawanBencana as $item)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $item->nama_wilayah }}</td>
                                            <td>{{ $item->koordinat_lattitude }}</td>
                                            <td>{{ $item->koordinat_longitude }}</td>
                                            <td>{{ $item->jenis_rawan_bencana }}</td>
                                            <td>{{ $item->level_rawan_bencana }}</td>
                                            <td>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-sm btn-warning" id="modalEdit-{{ $item->id }}" data-toggle="modal"
                                                    data-target="#modalEdit" data-nama_wilayah="{{ $item->nama_wilayah }}" data-koordinat_lattitude="{{ $item->koordinat_lattitude }}" data-koordinat_longitude="{{ $item->koordinat_longitude }}" data-jenis_rawan_bencana="{{ $item->jenis_rawan_bencana }}" data-level_rawan_bencana="{{ $item->level_rawan_bencana }}" data-rawan_id="{{ $item->id }}">
                                                    Ubah
                                                </button>
                                                <button class="btn btn-sm btn-danger delete" data-id="{{ $item->id }}">
                                                    <form action="{{ route('rawan_bencana.delete', $item->id) }}" method="POST"
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
                                            <th scope="row" colspan="7" class="text-center">Data Daerah Rawan Bencana
                                                Tidak Ada</th>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="d-flex my-5">
                                {!! $rawanBencana->links() !!}
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Daerah Rawan Bencana</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('rawan_bencana.add') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group {{ $errors->has('nama_wilayah') ? 'has-danger' : '' }} row">
                            <label class="col-sm-2 col-form-label" for="nama_wilayah">Nama Wilayah</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama_wilayah" id="nama_wilayah" class="form-control {{ $errors->has('nama_wilayah') ? 'form-control-danger' : '' }}"
                                    placeholder="Masukkan nama wilayah">
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('koordinat_lattitude') ? 'has-danger' : '' }} row">
                            <label class="col-sm-2 col-form-label" for="koordinat_lattitude">Koordinat Lattitude</label>
                            <div class="col-sm-10">
                                <input type="text" name="koordinat_lattitude" id="koordinat_lattitude"
                                    class="form-control {{ $errors->has('koordinat_lattitude') ? 'form-control-danger' : '' }}" placeholder="Masukkan koordinat lattitude">
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('koordinat_longitude') ? 'has-danger' : '' }} row">
                            <label class="col-sm-2 col-form-label" for="koordinat_longitude">Koordinat Longitude</label>
                            <div class="col-sm-10">
                                <input type="text" name="koordinat_longitude" id="koordinat_longitude"
                                    class="form-control {{ $errors->has('koordinat_longitude') ? 'form-control-danger' : '' }}" placeholder="Masukkan koordinat longitude">
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('jenis_rawan_bencana') ? 'has-danger' : '' }} row">
                            <label class="col-sm-2 col-form-label" for="jenis_rawan_bencana">Jenis Rawan Bencana</label>
                            <div class="col-sm-10">
                                <input type="text" name="jenis_rawan_bencana" id="jenis_rawan_bencana"
                                    class="form-control {{ $errors->has('jenis_rawan_bencana') ? 'form-control-danger' : '' }}" placeholder="Masukkan jenis rawan bencana">
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('level_rawan_bencana') ? 'has-danger' : '' }} row">
                            <label class="col-sm-2 col-form-label" for="level_rawan_bencana">Level Rawan Bencana</label>
                            <div class="col-sm-10">
                                <select name="level_rawan_bencana" id="level_rawan_bencana" class="form-control {{ $errors->has('level_rawan_bencana') ? 'form-control-danger' : '' }}">
                                    <option value="">Pilih Level Rawan Bencana</option>
                                    <option value="Rendah">Rendah</option>
                                    <option value="Sedang">Sedang</option>
                                    <option value="Tinggi">Tinggi</option>
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
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Daerah Rawan Bencana</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('rawan_bencana.update') }}">
                    @csrf
                    <input name="_method" type="hidden" value="PUT">
                    <div class="modal-body">
                        <input type="hidden" name="rawan_id" id="rawan_id" value="">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="nama_wilayah">Nama Wilayah</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama_wilayah" id="nama_wilayah" class="form-control"
                                    placeholder="Masukkan nama wilayah">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="koordinat_lattitude">Koordinat Lattitude</label>
                            <div class="col-sm-10">
                                <input type="text" name="koordinat_lattitude" id="koordinat_lattitude"
                                    class="form-control" placeholder="Masukkan koordinat lattitude">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="koordinat_longitude">Koordinat Longitude</label>
                            <div class="col-sm-10">
                                <input type="text" name="koordinat_longitude" id="koordinat_longitude"
                                    class="form-control" placeholder="Masukkan koordinat longitude">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="jenis_rawan_bencana">Jenis Rawan Bencana</label>
                            <div class="col-sm-10">
                                <input type="text" name="jenis_rawan_bencana" id="jenis_rawan_bencana"
                                    class="form-control" placeholder="Masukkan jenis rawan bencana">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="level_rawan_bencana">Level Rawan Bencana</label>
                            <div class="col-sm-10">
                                <select name="level_rawan_bencana" id="level_rawan_bencana" class="form-control">
                                    <option value="">Pilih Level Rawan Bencana</option>
                                    <option value="Rendah">Rendah</option>
                                    <option value="Sedang">Sedang</option>
                                    <option value="Tinggi">Tinggi</option>
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
        var nama_wilayah = link.data("nama_wilayah");
        var koordinat_lattitude = link.data('koordinat_lattitude');
        var koordinat_longitude = link.data('koordinat_longitude');
        var jenis_rawan_bencana = link.data('jenis_rawan_bencana');
        var level_rawan_bencana = link.data('level_rawan_bencana');
        var rawan_id = link.data('rawan_id');

        console.log(rawan_id);

        var modal = $(this)
        modal.find('.modal-body #nama_wilayah').val(nama_wilayah);
        modal.find('.modal-body #koordinat_lattitude').val(koordinat_lattitude);
        modal.find('.modal-body #koordinat_longitude').val(koordinat_longitude);
        modal.find('.modal-body #jenis_rawan_bencana').val(jenis_rawan_bencana);
        modal.find('.modal-body #level_rawan_bencana').val(level_rawan_bencana);
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
