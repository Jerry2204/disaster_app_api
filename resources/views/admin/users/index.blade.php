@extends('layouts.app')

@section('title', 'Users')

@section('content')
    <!-- Page-header start -->
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="fa fa-users " style="background-color: #39ADB5"></i>

                    <div class="d-inline">
                        <h4>Petugas</h4>
                        <span>Daftar Petugas</span>
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
                        <li class="breadcrumb-item"><a href="#!">Petugas</a>
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
                            Tambah Petugas
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
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($user as $item)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->role }}</td>
                                            <td>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-sm btn-warning" id="modalEdit-{{ $item->id }}" data-toggle="modal"
                                                    data-target="#modalEdit" data-name="{{ $item->name }}" data-email="{{ $item->email }}" data-role="{{ $item->role }}" data-user_id="{{ $item->id }}">
                                                    Ubah
                                                </button>
                                                <button class="btn btn-sm btn-danger delete" data-id="{{ $item->id }}">
                                                    <form action="{{ route('users.delete', $item->id) }}" method="POST"
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
                                            <th scope="row" colspan="7" class="text-center">Data Petugas
                                                Tidak Ada</th>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="d-flex my-5">
                                {!! $user->links() !!}
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Petugas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('users.add') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group {{ $errors->has('name') ? 'has-danger' : '' }} row">
                            <label class="col-sm-2 col-form-label" for="name">Nama Petugas</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" id="name" class="form-control {{ $errors->has('name') ? 'form-control-danger' : '' }}"
                                    placeholder="Masukkan Nama Petugas">
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('username') ? 'has-danger' : '' }} row">
                            <label class="col-sm-2 col-form-label" for="username">Username</label>
                            <div class="col-sm-10">
                                <input type="username" name="username" id="username"
                                    class="form-control {{ $errors->has('username') ? 'form-control-danger' : '' }}" placeholder="Masukkan Username">
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('email') ? 'has-danger' : '' }} row">
                            <label class="col-sm-2 col-form-label" for="email">Email</label>
                            <div class="col-sm-10">
                                <input type="email" name="email" id="email"
                                    class="form-control {{ $errors->has('email') ? 'form-control-danger' : '' }}" placeholder="Masukkan Email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="role">Role</label>
                            <div class="col-sm-10">
                                <select name="role" id="role" class="form-control">
                                    <option value="">Pilih Role Petugas</option>
                                    <option value="admin">Admin</option>
                                    <option value="pra_bencana">Pra Bencana</option>
                                    <option value="tanggap_darurat">Tanggap Darurat</option>
                                    <option value="pasca_bencana">Pasca Bencana</option>
                                </select>
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

    <!-- Modal Edit -->
    <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Data Petugas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('users.update') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <input type="hidden" name="user_id" id="user_id" value="">
                        <div class="form-group {{ $errors->has('name') ? 'has-danger' : '' }} row">
                            <label class="col-sm-2 col-form-label" for="name">Nama Petugas</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" id="name" class="form-control {{ $errors->has('name') ? 'form-control-danger' : '' }}"
                                    placeholder="Masukkan Nama Petugas">
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('username') ? 'has-danger' : '' }} row">
                            <label class="col-sm-2 col-form-label" for="username">Username</label>
                            <div class="col-sm-10">
                                <input type="username" name="username" id="username"
                                    class="form-control {{ $errors->has('username') ? 'form-control-danger' : '' }}" placeholder="Masukkan Username">
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('email') ? 'has-danger' : '' }} row">
                            <label class="col-sm-2 col-form-label" for="email">Email</label>
                            <div class="col-sm-10">
                                <input type="email" name="email" id="email"
                                    class="form-control {{ $errors->has('email') ? 'form-control-danger' : '' }}" placeholder="Masukkan Email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="role">Role</label>
                            <div class="col-sm-10">
                                <select name="role" id="role" class="form-control">
                                    <option value="">Pilih Role Petugas</option>
                                    <option value="admin">Admin</option>
                                    <option value="pra_bencana">Pra Bencana</option>
                                    <option value="tanggap_darurat">Tanggap Darurat</option>
                                    <option value="pasca_bencana">Pasca Bencana</option>
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
        var name = link.data("name");
        var email = link.data('email');
        var user_id = link.data('user_id');
        var role = link.data('role');

        var modal = $(this)
        modal.find('.modal-body #name').val(name);
        modal.find('.modal-body #email').val(email);
        modal.find('.modal-body #role').val(role);
        modal.find('.modal-body #user_id').val(user_id);
    })

    $(".delete").click(function(e) {
            id = e.target.dataset.id
            Swal.fire({
                title: "Apakah anda yakin ingin menghapus data ini?",
                text: "Anda tidak dapat memulihkan data nanti!",
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
