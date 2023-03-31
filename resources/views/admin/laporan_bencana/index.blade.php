@extends('layouts.app')

@section('title', 'Rawan Bencana')

@section('content')
    <!-- Page-header start -->
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="icofont icofont icofont icofont-file-document bg-c-pink"></i>
                    <div class="d-inline">
                        <h4>Laporan Bencana</h4>
                        <span>Daftar Laporan Bencana</span>
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
                        <li class="breadcrumb-item"><a href="#!">Laporan Bencana</a>
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
                            Tambah Laporan Bencana
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
                                        <th>Jenis Bencana</th>
                                        <th>lokasi</th>
                                        <th>Keterangan</th>
                                        <th>Status Bencana</th>
                                        <th>Status Penanggulangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($laporanBencana as $item)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $item->jenis_bencana }}</td>
                                            <td>{{ $item->lokasi }}</td>
                                            <td>{{ $item->keterangan }}</td>
                                            <td>{{ $item->status_bencana }}</td>
                                            <td>{{ $item->status_penanggulangan->status }}</td>
                                            <td>
                                                @if ($item->confirmed == true)
                                                    <!-- Button trigger modal -->
                                                    <a href="{{ route('laporan_bencana.detail', $item->id) }}" class="btn btn-sm btn-info">Lihat</a>
                                                @endif
                                                <button type="button" class="btn btn-sm btn-warning"
                                                    id="modalEdit-{{ $item->id }}" data-toggle="modal"
                                                    data-target="#modalEdit" data-jenis_bencana="{{ $item->jenis_bencana }}"
                                                    data-lokasi="{{ $item->lokasi }}"
                                                    data-keterangan="{{ $item->keterangan }}"
                                                    data-status_bencana="{{ $item->status_bencana }}"
                                                    data-nama_bencana="{{ $item->nama_bencana }}"
                                                    data-laporan_id="{{ $item->id }}">
                                                    Ubah
                                                </button>
                                                <button class="btn btn-sm btn-danger delete" data-id="{{ $item->id }}">
                                                    <form action="{{ route('laporan_bencana.delete', $item->id) }}"
                                                        method="POST" id="delete{{ $item->id }}">
                                                        @csrf
                                                        @method('delete')
                                                    </form>
                                                    Hapus
                                                </button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <th scope="row" colspan="7" class="text-center">Data Laporan Bencana
                                                Tidak Ada</th>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="d-flex my-5">
                                {!! $laporanBencana->links() !!}
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Laporan Bencana</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('laporan_bencana.add') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="jenis_bencana">Jenis Bencana</label>
                            <div class="col-sm-10">
                                <select name="jenis_bencana" id="jenis_bencana" class="form-control">
                                    <option value="">Pilih Jenis Bencana</option>
                                    <option value="bencana alam">Bencana Alam</option>
                                    <option value="bencana non alam">Bencana Non Alam</option>
                                    <option value="bencana sosial">Bencana Sosial</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="nama_bencana">Nama Bencana</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama_bencana" id="nama_bencana" class="form-control"
                                    placeholder="Masukkan nama bencana">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="lokasi">Lokasi</label>
                            <div class="col-sm-10">
                                <input type="text" name="lokasi" id="lokasi" class="form-control"
                                    placeholder="Masukkan lokasi bencana">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="keterangan">Keterangan</label>
                            <div class="col-sm-10">
                                <textarea id="keterangan" rows="5" cols="5" class="form-control" name="keterangan"
                                    placeholder="Masukkan keterangan"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="status_bencana">Status Bencana</label>
                            <div class="col-sm-10">
                                <select name="status_bencana" id="status_bencana" class="form-control">
                                    <option value="">Pilih Status Bencana</option>
                                    <option value="ringan">Ringan</option>
                                    <option value="sedang">Sedang</option>
                                    <option value="darurat">Darurat</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="file">Gambar</label>
                            <div class="col-sm-10">
                                <input type="file" name="file" id="file" class="form-control">
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
                <form method="POST" action="{{ route('laporan_bencana.update') }}" enctype="multipart/form-data">
                    @csrf
                    <input name="_method" type="hidden" value="PUT">
                    <div class="modal-body">
                        <input type="hidden" name="laporan_id" id="laporan_id" value="">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="jenis_bencana">Jenis Bencana</label>
                            <div class="col-sm-10">
                                <select name="jenis_bencana" id="jenis_bencana" class="form-control">
                                    <option value="">Pilih Jenis Bencana</option>
                                    <option value="bencana alam">Bencana Alam</option>
                                    <option value="bencana non alam">Bencana Non Alam</option>
                                    <option value="bencana sosial">Bencana Sosial</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="nama_bencana">Nama Bencana</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama_bencana" id="nama_bencana" class="form-control"
                                    placeholder="Masukkan nama bencana">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="lokasi">Lokasi</label>
                            <div class="col-sm-10">
                                <input type="text" name="lokasi" id="lokasi" class="form-control"
                                    placeholder="Masukkan lokasi bencana">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="keterangan">Keterangan</label>
                            <div class="col-sm-10">
                                <textarea id="keterangan" rows="5" cols="5" class="form-control" name="keterangan"
                                    placeholder="Masukkan keterangan"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="status_bencana">Status Bencana</label>
                            <div class="col-sm-10">
                                <select name="status_bencana" id="status_bencana" class="form-control">
                                    <option value="">Pilih Status Bencana</option>
                                    <option value="ringan">Ringan</option>
                                    <option value="sedang">Sedang</option>
                                    <option value="darurat">Darurat</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="file">Gambar</label>
                            <div class="col-sm-10">
                                <input type="file" name="file" id="file" class="form-control">
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
@endsection

@section('js')
    <script>
        $('#modalEdit').on('show.bs.modal', function(e) {
            var link = $(e.relatedTarget)
            var jenis_bencana = link.data("jenis_bencana");
            var nama_bencana = link.data("nama_bencana");
            var lokasi = link.data('lokasi');
            var keterangan = link.data('keterangan');
            var status_bencana = link.data('status_bencana');
            var laporan_id = link.data('laporan_id');

            var modal = $(this)
            modal.find('.modal-body #jenis_bencana').val(jenis_bencana);
            modal.find('.modal-body #lokasi').val(lokasi);
            modal.find('.modal-body #nama_bencana').val(nama_bencana);
            modal.find('.modal-body #keterangan').val(keterangan);
            modal.find('.modal-body #status_bencana').val(status_bencana);
            modal.find('.modal-body #laporan_id').val(laporan_id);
        });

        $(".delete").click(function(e) {
            id = e.target.dataset.id
            Swal.fire({
                title: "Are you sure you want to delete this data?",
                text: "You can't restore the data later!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $(`#delete${id}`).submit();
                }
            })
        })
    </script>
@endsection
