@extends('public.layout.app')

@section('title', 'Detail Berita')

@section('content')
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-7 order-md-1">
                <br>
                <h3>Berita</h3> <br>
                 @foreach ($article as $article_item)
                    <div class="AnnouncementPage-announcement-info">
                        <div>
                            <span>
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                              {{ $article_item->name }}
                            </span>
                            &nbsp; &nbsp;
                            <span>
                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                {{ \Carbon\Carbon::parse($article_item->created_at)->locale('id')->isoFormat('dddd, D MMMM YYYY') }}
                            </span>
                        </div>
                    </div>

                    <h3 style="text-align:justify">{{ $article_item->judul }}</h3>
                    <br>
                    <div class="sharethis-inline-share-buttons text-start"></div> <br>
                       <img src="{{ asset('artikel/' . $article_item->gambar) }}" alt="{{ $article_item->gambar }}"
                            style="max-width: 100%">
                    </center>
                    <br>
                    <p style="text-align:justify; font-family:Roboto">{!! $article_item->deskripsi !!}</p>
                @endforeach
            </div>
            <div class="col-md-5 order-md-2">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Berita Lainnya</h5>
                        @foreach ($selengkapnya as $next)
                            <ul class="list-unstyled">

                                <li>
                                    <div class="card" style="box-shadow: 0 0 5px rgba(0, 0, 0, 0.3); border: 1px solid #ccc;">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <img src="{{ asset('artikel/' . $next->gambar) }}"
                                                        alt="{{ $next->gambar }}" style="max-width: 100%">
                                                </div>
                                                <div class="col-md-8">
                                                    <p>
                                                        {{ substr(strip_tags($next->deskripsi), 0, 100) }}{{ strlen(strip_tags($article_item->deskripsi)) > 100 ? '...' : '' }}
                                                        <a href="{{ route('artikel.detail', $next->id) }}">Baca
                                                            selengkapnya</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <br>
                        @endforeach
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
    <br>
    <div class="fixed-bottom d-flex justify-content-end text-center" style="bottom: 50px; right: 20px;">
        <div class="button-urgent animasi rounded-circle d-flex justify-content-center align-items-center text-white fs-6">
            <a href="{{ route('report.add') }}" style="text-decoration: none; color: white;">
                <div
                    class="button-urgent animasi rounded-circle d-flex justify-content-center align-items-center text-white fs-6">
                    <i class="fa fa-phone" style="font-size: 30px; color: white;"></i>
                </div>
            </a>
        </div>
    </div>
    <script type='text/javascript'
        src='https://platform-api.sharethis.com/js/sharethis.js#property=6459b958522c900019fc12a3&product=inline-share-buttons'
        async='async'></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
@endsection

