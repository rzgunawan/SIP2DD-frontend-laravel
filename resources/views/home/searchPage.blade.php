@extends('template.main')

@section('title', 'Pencarian | Portal Percepatan Digitalisasi Daerah')

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
                                        @if($menus != null)
                                            @foreach($menus as $menu)
                                                
                                                @if($menu['link'] == "/".Request::segment(1) || in_array("/".Request::segment(1), $menu['menu_child']))
                                                    <li class="active"><a href="{!! url($menu['link']) !!}">{{$menu['nama']}}</a>
                                                @else
                                                    <li><a href="{!! url($menu['link']) !!}">{{$menu['nama']}}</a>
                                                @endif

                                                @if(count($menu['menu_child']) > 0)
                                                <ul class="submenu">
                                                    @foreach($menu['menu_child'] as $child)
                                                        <li><a href="{!! url($child['link']) !!}">{{$child['menu']}}</a></li>
                                                    @endforeach
                                                </ul>
                                                
                                                @endif
                                                </li>
                    
                                            @endforeach
                                        
                                        @else
                                        <!-- 
                                            <li class="active"><a href="{!! url('/') !!}">Beranda</a></li>
                                            <li><a href="{!! url('/berita') !!}">Berita</a></li>
                                            <li><a href="{!! url('/tp2dd') !!}">TP2DD</a></li>
                                            <li><a href="#">Edukasi</a>
                                                <ul class="submenu">
                                                    <li><a href="{!! url('/edukasi') !!}">Materi</a></li>
                                                    <li><a href="{!! url('/faq') !!}">FAQ</a></li>
                                                    <li><a href="{!! url('/daftaristilah') !!}">Daftar Istilah</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="{!! url('/regulasi') !!}">Regulasi</a></li>
                                            <li><a href="#">Kolaborasi</a></li>
                                            <li><a href="{!! url('/dashboardkegiatan') !!}">Kegiatan</a></li>
                                            <li><a href="#">Galeri</a>
                                                <ul class="submenu">
                                                    <li><a href="{!! url('/galerifoto') !!}">Galeri Foto</a></li>
                                                    <li><a href="{!! url('/galerivideo') !!}">Galeri Video</a></li>
                                                </ul>
                                            </li>

                                        -->
                                        @endif

                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-xs-block d-sm-block d-md-block d-lg-none d-xl-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>
@endsection

@section('content')
    <main class="background-utama">
        <!-- Area untuk Pencarian TP2DD -->
        <section class="service-area section-padding">
            <div class="container">
                <!-- Section Judul -->
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6">
                        <div class="section-tittle pt-25 text-center mb-30">
                            <h2>Pencarian</h2>
                        </div>
                    </div>
                </div>
                <!--Section Form input-->
                <div class="form-row justify-content-center mb-50">
                    <div class="col-lg-8 col-md-4">
                        <form action="{!! url('/pencarian')!!}" method="GET">
                            <div class="form-group">
                                <div class="input-group">
                                    <input name="keyword" type="text" autocomplete="off" class="inputan-cari" placeholder="Cari">
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
                @if($keyword != "")
                <div class="row">
                    <div class="col-lg-12 col-md-6 ket-jumlah-cari">
                    <p>Hasil pencarian <strong>"{{$keyword}}"</strong>, {{$count}} hasil ditemukan</p>
                    <!-- <p>Hasil pencarian <strong>"Elektronifikasi"</strong>, 30 hasil ditemukan</p> -->
                    </div>
                </div>
                @endif
                <!--Hasil Pencarian -->
                
                <div class="row">
                @if($searchNews != null)
                    @foreach($searchNews as $index => $newsItem)
                        <div class="card w-100 card-besar">
                            <div class="row no-gutters berita_card">
                                <div class="col-lg-4 berita_img">
                                    <img class="" src="{{$newsItem['gambar_utama']}}" onerror="this.src='{{ URL::asset('img/P2DD.png') }}'">
                                </div>
                                <div class="col-lg-8 card_desk">
                                    <div class="card-body">
                                        <h5>{{tanggal_indonesia($newsItem['tanggal_publikasi'])}}</h5>
                                        <h4><a href="{!! url('detailberita?id=')!!}{{$newsItem['berita_id']}}">{{$newsItem['judul']}}</a></h4>
                                        <!--Edit penambahan nama instansi-->
                                        <h6><img src="{{ URL::asset('img/logo_list/gov4_blue.svg') }}" onerror="this.src='{{ URL::asset('img/P2DD.png') }}'" alt="logo"> {{$newsItem['dibuat_oleh']}}
                                        </h6>
                                        <p>{{ Str::limit(strip_tags($newsItem['body']), 250) }}
                                        </p>
                                        <p id="selengkapnya"><a href="{!! url('detailberita?id=')!!}{{$newsItem['berita_id']}}">Selengkapnya <i
                                                    class="fas fa-chevron-right"></i></a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif

                @if($searchServices != null)
                    @foreach($searchServices as $index => $item)
                     <!--Edit jikalau yang di cari adalaah layanan tampilannya ini mas-->
                        <div class="card w-100 card-besar">
                            <div class="row no-gutters berita_card">
                                <div class="col-lg-4 layanan_img">
                                    <img class="" src="{{$item['gambar_utama']}}" onerror="this.src='{{ URL::asset('img/P2DD.png') }}'">
                                </div>
                                <div class="col-lg-8 card_desk">
                                    <div class="card-body">
                                        <h4 class="mb-3"><a href="{!! url('/detaillayanan?id=')!!}{{$item['layanan_id']}}">{{$item['judul']}}</a></h4>
                                        <h6><img src="{{ URL::asset('img/logo_list/gov4_blue.svg') }}" onerror="this.src='{{ URL::asset('img/P2DD.png') }}'" alt="logo"> {{$item['dibuat_oleh']}}</h6>
                                        <p>{{ Str::limit(strip_tags($item['deskripsi']), 250) }}
                                        </p>
                                        <p id="selengkapnya"><a href="{!! url('/detaillayanan?id=')!!}{{$item['layanan_id']}}">Link Layanan <i
                                                    class="fas fa-chevron-right"></i></a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
                </div>
                <!--Bagian Pagination-->
                @if($searchNews != null || $searchServices != null)
                <div class="row justify-content-center mb-30">
                    <nav class="blog-pagination">
                        <ul class="pagination">
                            @if($page > 1)
                            <li class="page-item">
                                <a href="{!! url('/pencarian?keyword='.$keyword.'&page='.($page-1)) !!}" class="page-link" aria-label="Previous">
                                    <i class="ti-angle-left"></i>
                                </a>
                            </li>
                            @else
                            <li class="page-item">
                                <a href="#" class="page-link" aria-label="Previous">
                                    <i class="ti-angle-left"></i>
                                </a>
                            </li>
                            @endif
                            @for($i =1; $i<=$pagination; $i++)
                                    @if($page == $i)
                                    <li class="page-item active">
                                        <a href="{!! url('/pencarian?keyword='.$keyword.'&page='.$i) !!}" class="page-link">{{$i}}</a>
                                    </li>
                                    @else
                                    <li class="page-item">
                                        <a href="{!! url('/pencarian?keyword='.$keyword.'&page='.$i) !!}" class="page-link">{{$i}}</a>
                                    </li>
                                    @endif
                            @endfor
                            @if($page == $pagination)
                            <li class="page-item">
                                <a href="#" class="page-link" aria-label="Next">
                                    <i class="ti-angle-right"></i>
                                </a>
                            </li>
                            @else
                            <li class="page-item">
                                <a href="{!! url('/pencarian?keyword='.$keyword.'&page='.($page+1)) !!}" class="page-link" aria-label="Next">
                                    <i class="ti-angle-right"></i>
                                </a>
                            </li>
                            @endif
                        </ul>
                    </nav>
                </div>
                @else
                <div class="container">
                    <div class="row mt-5 mb-5">
                        <a style="margin:auto; text-align: center; display: block;">Silahkan ketik di kolom pencarian</a>
                    </div>
                </div>
                @endif
            </div>
        </section>
        <!-- Akhir pagination-->

    </main>
@endsection

@section('p2dd_info')

    @if($p2dd_info != null)
        <div class="footer-pera footer-pera2">                                
            <!-- <p>{{$p2dd_info['title']}}</p> -->
            <p>{!!$p2dd_info['deskripsi']!!}</p>
            <p>{{$p2dd_info['no_telpon']}}</p>
            <p>{{$p2dd_info['email']}}</p>
            <p>{!!$p2dd_info['alamat']!!}</p>
        </div>
    @else
        <div class="footer-pera footer-pera2">                                
            <p>SIP2DD adalah Sistem Informasi Percepatan dan Perluasan Digitalisasi Daerah</p>
            <p>0218224049</p>
            <p>info@p2dd.go.id</p>
            <p>Jalan Merdeka Barat No. 10 Jakarta Pusat</p>
        </div>
    @endif
@endsection
