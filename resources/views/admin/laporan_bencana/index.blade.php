@extends('layouts.app')

@section('title', 'Laporan Bencana')

@section('content')
    <!-- Page-header start -->
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="fa fa-line-chart bg-c-pink"></i>

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
                        @if (auth()->user()->role == 'tanggap_darurat' || auth()->user()->role == 'admin' || auth()->user()->role == 'pasca_bencana')
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                Tambah Laporan Bencana
                            </button>
                        @endif

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
                    <br>
                    <div class="row">
                        <div class="col-lg-4 col-md-2 col-sm-12">
                            <select class="form-control" id="filter-jenis-bencana" name="jenis_bencana">
                                <option value="Semua Jenis Bencana" id="all">Semua Jenis Bencana</option>
                                @foreach ($laporanBencana->pluck('jenis_bencana')->unique() as $jenisBencana)
                                    <option value="{{ $jenisBencana }}">{{ $jenisBencana }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-4 col-md-2 col-sm-12">
                            <select class="form-control" id="filter-kecamatan" name="kecamatan_id">
                                <option value="Semua Kecamatan" id="all">Semua Kecamatan</option>
                                @foreach ($laporanBencana->pluck('nama_kecamatan')->unique() as $kecamatan)
                                    <option value="{{ $kecamatan }}">{{ $kecamatan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <span></span>
                        {{-- excel --}}
                        <div class="modal fade" id="dateRangeModalExcel" tabindex="-1" role="dialog"
                            aria-labelledby="dateRangeModalLabelExcel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="dateRangeModalLabelExcel">Pilih Rentang Tanggal</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('export-excel') }}" method="GET">
                                            <div class="form-group">
                                                <label for="start_date_excel">Mulai Tanggal:</label>
                                                <input type="date" id="start_date_excel" name="start_date"
                                                    class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="end_date_excel">Sampai Tanggal:</label>
                                                <input type="date" id="end_date_excel" name="end_date"
                                                    class="form-control">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Download Excel</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 col-sm-12">
                            <button type="button" class="btn btn-primary" style="background-color: #1D6F42"
                                data-toggle="modal" data-target="#dateRangeModalExcel">Download Excel</button>
                        </div>

                        <!--PDF-->
                        <div class="modal fade" id="dateRangeModalPDF" tabindex="-1" role="dialog"
                            aria-labelledby="dateRangeModalLabelPDF" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="dateRangeModalLabelPDF">Pilih Rentang Waktu</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="dateRangeFormPDF" action="{{ route('laporan-bencana.export-pdf') }}"
                                            method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="start_date_pdf">Mulai Tanggal:</label>
                                                <input type="date" id="start_date_pdf" name="start_date"
                                                    class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="end_date_pdf">Sampai Tanggal:</label>
                                                <input type="date" id="end_date_pdf" name="end_date"
                                                    class="form-control">
                                            </div>
                                            <button type="submit" class="btn btn-primary" name="export_pdf">Download
                                                PDF</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 col-sm-12">
                            <a href="#" class="btn btn-primary" data-toggle="modal"
                                data-target="#dateRangeModalPDF">Download PDF</a>
                        </div>
                    </div>
                    <div class="card-block table-border-style">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal Kejadian</th>
                                        <th>Nama Bencana</th>
                                        {{-- <th>Nomor Telepon</th> --}}
                                        <th>Kecamatan</th>
                                        <th>Desa</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($laporanBencana as $item)
                                    <tr class="task-list-row" data-jenis-bencana="{{ $item->jenis_bencana . ', ' . $item->nama_kecamatan }}">


                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ \Carbon\Carbon::parse($item->created_at)->locale('id-ID')->format('d F Y') }}
                                            </td>
                                            {{-- <td>{{ $item->jenis_bencana }}</td> --}}
                                            <td>{{ $item->nama_bencana }}</td>
                                            {{-- <td>
                                                  <a href="tel:{{ $item->nomor_telepon }}">
                                                    {{ $item->nomor_telepon }}
                                                </a>
                                              </td> --}}
                                            <td>{{ $item->nama_kecamatan }}</td>
                                            <td>{{ $item->nama_desa }}</td>
                                            <td>
                                                @if ($item->status == 'Menunggu')
                                                    <span class="badge badge-secondary">{{ $item->status }}</span>
                                                @elseif ($item->status == 'Diterima')
                                                    <span class="badge badge-info">{{ $item->status }}</span>
                                                @elseif ($item->status == 'Proses')
                                                    <span class="badge badge-warning">{{ $item->status }}</span>
                                                @elseif ($item->status == 'Selesai')
                                                    <span class="badge badge-success">{{ $item->status }}</span>
                                                    @elseif ($item->status == 'Ditolak')
                                                    <span class="badge badge-danger">{{ $item->status }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('laporan_bencana.detail', $item->id) }}"
                                                    class="btn btn-sm btn-info">Lihat</a>
                                                @if (auth()->user()->role == 'tanggap_darurat' || auth()->user()->role == 'admin')
                                                    <button type="button" class="btn btn-sm btn-warning"
                                                        id="modalEdit-{{ $item->id }}" data-toggle="modal"
                                                        data-target="#modalEdit"
                                                        data-jenis_bencana="{{ $item->jenis_bencana }}"
                                                        data-keterangan="{{ $item->keterangan }}"
                                                        data-status_bencana="{{ $item->status_bencana }}"
                                                        data-nama_bencana="{{ $item->nama_bencana }}"
                                                        data-laporan_id="{{ $item->id }}">
                                                        Ubah
                                                    </button>
                                                    @if ($item->confirmed == true)
                                                        <!-- Button trigger modal -->
                                                        {{-- <button class="btn btn-sm btn-danger delete"
                                                            data-id="{{ $item->id }}">
                                                            <form
                                                                action="{{ route('laporan_bencana.reject', $item->id) }}"
                                                                id="reject{{ $item->id }}">
                                                            </form>
                                                            Tolak
                                                        </button> --}}
                                                    {{-- @else
                                                        <a href="{{ route('laporan_bencana.confirm', $item->id) }}"
                                                            class="btn btn-sm btn-success">Konfirmasi</a> --}}
                                                    @endif
                                                @elseif (auth()->user()->role == 'pasca_bencana')
                                                    <a href="{{ route('dampak_bencana.edit', $item->id) }}"
                                                        class="btn btn-sm btn-primary">
                                                        Tambah Dampak Bencana
                                                    </a>
                                                @endif
                                                {{-- <button class="btn btn-sm btn-danger delete" data-id="{{ $item->id }}">
                                                    <form action="{{ route('laporan_bencana.delete', $item->id) }}"
                                                        method="POST" id="delete{{ $item->id }}">
                                                        @csrf
                                                        @method('delete')
                                                    </form>
                                                    Tolak
                                                </button> --}}
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
                                    <option value=""disabled selected>Pilih Jenis Bencana</option>
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
                            <label for="kecamatanSelect" class="col-sm-2 col-form-label">Kecamatan</label>
                            <div class="col-sm-10">
                                <select name="kecamatan_id" class="form-control" id="kecamatanSelect"
                                    aria-label="Floating label select example">
                                    <option value="">-- Pilih Kecamatan --</option>
                                    @foreach ($kecamatans as $kecamatan)
                                        <option value="{{ $kecamatan->id }}">{{ $kecamatan->nama_kecamatan }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="desaSelect">Desa</label>
                            <div class="col-sm-10">
                                <select name="desa_id" class="form-control" id="desaSelect"
                                    aria-label="Floating label select example">
                                    <option value="">-- Pilih Desa --</option>
                                </select>
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
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Laporan Bencana</h5>
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
                            <label class="col-sm-2 col-form-label" for="kecamatanSelect">Kecamatan</label>
                            <div class="col-sm-10">
                                <select name="kecamatan_id" class="form-control" id="kecamatanSelect"
                                    aria-label="Floating label select example">
                                    <option value="">-- Pilih Kecamatan --</option>
                                    @foreach ($kecamatans as $kecamatan)
                                        <option value="{{ $kecamatan->id }}">{{ $kecamatan->nama_kecamatan }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="desaSelect">Desa</label>
                            <div class="col-sm-10">
                                <select name="desa_id" class="form-control" id="desaSelect"
                                aria-label="Floating label select example">
                                <option value="">-- Pilih Desa --</option>
                            </select>
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
            console.log(id);
            Swal.fire({
                title: "Tolak Laporan?",
                // text: "You can't restore the data later!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya,Tolak!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $(`#reject${id}`).submit();
                }
            })
        })
    </script>
   <script>
    $('#filter-kecamatan').on('change', function() {
        var kecamatan = this.value;

        if (kecamatan === 'Semua Kecamatan') {
            $('.task-list-row').show();
        } else {
            $('.task-list-row').hide().filter(function() {
                return $(this).data('jenis-bencana').includes(kecamatan);
            }).show();
        }
    });

    $('#filter-jenis-bencana').on('change', function() {
        var jenisBencana = this.value;

        if (jenisBencana === 'Semua Jenis Bencana') {
            $('.task-list-row').show();
        } else {
            $('.task-list-row').hide().filter(function() {
                return $(this).data('jenis-bencana').includes(jenisBencana);
            }).show();
        }
    });
</script>


    <script>
        function getDesaByKecamatanadmin(kecamatanId) {
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
            getDesaByKecamatanadmin(kecamatanId);
        });
    </script>
    {{-- ubah --}}
    <script>
        function getDesaByKecamatanedit(kecamatanId) {
            $.ajax({
                url: '/get-desa-by-kecamatans',
                method: 'GET',
                data: {
                    kecamatans_id: kecamatanId
                },
                success: function(response) {

                    $('#desaSelects').empty();


                    response.forEach(function(desa) {
                        $('#desaSelects').append($('<option>', {
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


        $('#kecamatanSelects').change(function() {
            var kecamatanId = $(this).val();
            getDesaByKecamatanedit(kecamatanId);
        });
    </script>


@endsection
