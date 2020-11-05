@extends('template.main')

@section('title', 'Pemda | Portal Percepatan Digitalisasi Daerah')

@section('menu')
<header>
        <!-- Header Start -->
        <div class="header-area header-transparrent ">
            <div class="main-header header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-2 col-lg-2 col-md-2">
                            <div class="logo">
                                <a href="{!! url('/') !!}"><img src="{{ URL::asset('img/logo/log.png') }}" alt=""></a>
                            </div>
                        </div>
                        <div class="col-xl-10 col-lg-10 col-md-10">
                            <!-- Main-menu -->
                            <div class="main-menu f-right d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="{!! url('/') !!}">Beranda</a></li>
                                        <li><a href="{!! url('/berita') !!}">Berita</a></li>
                                        <li class="active"><a href="{!! url('/tp2dd') !!}">TP2DD</a></li>
                                        <li><a href="#">Edukasi</a>
                                            <ul class="submenu">
                                                <li><a href="{!! url('/edukasi') !!}">Edukasi Artikel</a></li>
                                                <li><a href="{!! url('/faq') !!}">FAQ</a></li>
                                                <li><a href="{!! url('/daftaristilah') !!}">Daftar Istilah</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="{!! url('/regulasi') !!}">Regulasi</a></li>
                                        <li><a href="#">Kolaborasi</a></li>
                                        <li><a href="{!! url('/kegiatan') !!}">Kegiatan</a></li>
                                        <li><a href="#">Galeri</a>
                                        <ul class="submenu">
                                            <li><a href="{!! url('/galerifoto') !!}">Galeri Foto</a></li>
                                            <li><a href="{!! url('/galerivideo') !!}">Galeri Video</a></li>
                                        </ul>
                                    </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-md-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>
@endsection


@section('content')

    <!-- Slider Area Start-->
    <div class="section-padd4 sky-blue">
        <div class="container nav-bread mt-30">
            <nav>
                <ol class="breadcrumb pl-0 sky-blue">
                    <li class="breadcrumb-item"><a href="Berita.html">TP2DD</a></li>
                    @if($govDetail != null)
                        <li class="breadcrumb-item"><a href="{{url('/detailtp2dd?id=')}}{{$govDetail['unit_profile_id']}}">{{$govDetail['nama']}}</a></li>
                    @endif
                    <li class="breadcrumb-item active"><a href="">Berita Lainnya</a>
                    </li>
                </ol>
            </nav>
        </div>
        <div class="container mt-70">
            <!-- Section-tittle -->
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <div class="section-tittle text-center mb-30">
                        <h2>Berita​</h2>
                        @if($govDetail != null)
                        <h2>{{$govDetail['nama']}}</h2>
                        @endif
                        
                    </div>
                </div>
            </div>
            <!--Section Form input-->
            <div class="form-row justify-content-center">
                <div class="col-lg-8 col-md-4">
                    <form action="" method="">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" autocomplete="off" class="inputan-cari" placeholder="Cari">
                                <div class="input-group-append">
                                    <button class="button1">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Slider Area End-->
    <!--================Berita Terbaru =================-->
    <section class="blog_area pt-10 mb-30">
        <div class="container">
            <!--Berita Terbaru-->
            @if($govNews != null)
            <div class="row">
                @foreach($govNews as $newsItem)
                <div class="col-lg-4 col-md-6">
                    <article class="blog_item">
                        <div class="blog_item_img">
                            <img class="card-img" src="{{$newsItem['gambar_utama']}}" onerror="this.src='{{ URL::asset('img/P2DD.png') }}'" alt="">
                        </div>

                        <div class="blog_details">
                            <div class="row">
                                <div class="col">
                                    <p>{{$newsItem['tanggal_publikasi']}}</p>
                                </div>
                            </div>
                            <a href="{{url('/detailberita?id=')}}{{$newsItem['berita_id']}}" class="deskripsi-galeri1">
                                <h2>{{$newsItem['judul']}}</h2>
                            </a>
                            <div class="row">
                                <div class="col daftar_berita_link">
                                    <a href="{{url('/detailberita?id=')}}{{$newsItem['berita_id']}}">Selengkapnya <i class="fas fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
                @endforeach
               
            </div>
            <div class="row justify-content-center mb-50">
                <nav class="blog-pagination">
                    <ul class="pagination">
                        <li class="page-item">
                            <a href="#" class="page-link" aria-label="Previous">
                                <i class="ti-angle-left"></i>
                            </a>
                        </li>
                        <li class="page-item">
                            <a href="#" class="page-link">1</a>
                        </li>
                        <li class="page-item active">
                            <a href="#" class="page-link">2</a>
                        </li>
                        <li class="page-item">
                            <a href="#" class="page-link" aria-label="Next">
                                <i class="ti-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            @else
                <div class="row justify-content-center mb-50">
                    Belum ada Data
                </div>
            @endif
        </div>
    </section>
    <!--================Blog Area =================-->
@endsection