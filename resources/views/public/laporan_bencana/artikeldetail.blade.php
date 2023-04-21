@extends('public.layout.app')

@section('title', 'Detail Artikel')
<script type="text/javascript"
    src="https://platform-api.sharethis.com/js/sharethis.js#property=643f7be73337a000130c380c&product=sticky-share-buttons&source=platform"
    async="async"></script>
    @section('content')
    <br>
    <div class="container">
        <div class="row">
          <div class="col-md-7 order-md-1">
            <br>
            <h5 class="ml-5">Artikel</h5>
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
            <center>
              <img src="{{ asset('artikel/' . $article_item->gambar) }}" alt="{{ $article_item->gambar }}" style="max-width: 100%">
            </center>
            <br>
            <p style="text-align:justify; font-family:Roboto">{!! $article_item->deskripsi !!}</p>
            {{-- Tombol share --}}
            <div class="sharethis-sticky-share-buttons"></div>
            @endforeach
          </div>
          <div class="col-md-5 order-md-2">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">PENGUMUMAN LAINNYA</h5>
                <ul class="list-unstyled">
                  @foreach ($selengkapnya as $next)
                  <li>
                    <div class="card">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-4">
                              <img src="{{ asset('artikel/' . $next->gambar) }}" alt="{{ $next->gambar }}" style="max-width: 100%">
                            </div>
                            <div class="col-md-8">
                                <p style="margin-right:20px;">
                                    {{ substr(strip_tags($next->deskripsi), 0, 100) }}{{ strlen(strip_tags($article_item->deskripsi)) > 100 ? '...' : '' }}
                                    <a href="{{ route('artikel.detail', $next->id) }}">Baca selengkapnya</a>
                                </p>
                            </div>
                          </div>
                        </div>
                      </div>
                      </div>
                  </li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>

    @endsection
