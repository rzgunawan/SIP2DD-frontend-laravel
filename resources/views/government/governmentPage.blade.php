@extends('template.main')

@section('title', 'TP2DD | Portal Percepatan Digitalisasi Daerah')

@section('menu')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

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
                                                @if(isset($menu['link']))
                                                    @if($menu['link'] == "/".Request::segment(1))
                                                        <li class="active"><a href="{!! url($menu['link']) !!}">{{$menu['nama']}}</a>
                                                    @else
                                                        <li><a href="{!! url($menu['link']) !!}">{{$menu['nama']}}</a>
                                                    @endif
                                                @endif

                                                @if(isset($menu['menu_child']))

                                                    @if(count($menu['menu_child']) > 0)
                                                    <ul class="submenu">
                                                        @foreach($menu['menu_child'] as $child)
                                                            <li><a href="{!! url($child['link']) !!}">{{$child['menu']}}</a></li>
                                                        @endforeach
                                                    </ul>
                                                    
                                                    @endif
                                                @endif
                                                </li>
                    
                                            @endforeach
                                        
                                        @else
                                        <!-- <li><a href="{!! url('/') !!}">Beranda</a></li>
                                        <li><a href="{!! url('/berita') !!}">Berita</a></li>
                                        <li class="active"><a href="{!! url('/tp2dd') !!}">TP2DD</a></li>
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
                                        </li> -->
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
    <main class="background_1">
        <!-- Area untuk Pencarian TP2DD -->
        <section class="service-area section-padding">
            <div class="container">
                <!-- Section Judul -->
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6">
                        <div class="section-tittle pt-25 text-center mb-30">
                            <h2>TP2DD</h2>
                            <p>Tim Percepatan dan Perluasan Digitalisasi Daerah</p>
                        </div>
                    </div>
                </div>
                <!--Section Form input-->
                <div class="form-row justify-content-center mb-50">
                    <!--Edit untuk penambahan class col dan ada beberapa edit di css-->
                    <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                        <!-- <form action="" method="">
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
                        </form> -->
                    </div>
                </div>
                <div class="row">
                    <!--Edit menggunakan plugin select 2 .js-->
                    <div class="col-lg-6 col-md-6">
                        <div class="dropdown">
                            <div class="btn-group" role="group">
                                <select class="select_prov_tok" style="width: 200px;" onchange="if (this.value) window.location.href=this.value">
                                    <option class="l1"></option>
                                    @if($list_gov != null)
                                    @foreach($list_gov as $gov)
                                        @if(strlen($gov['kode_daerah']) < 3)
                                            <option class="l1" value="{{ url('/tp2dd') }}?kode_daerah={{$gov['kode_daerah']}}">{{$gov['nama_daerah']}}</option>
                                        @else
                                            <option class="l2" value="{{ url('/tp2dd') }}?kode_daerah={{$gov['kode_daerah']}}">{{$gov['nama_daerah']}}</option>
                                        @endif
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="btn-group" role="group">
                                <button class="button2 btn-light dropdown-toggle" type="button" id="dropdownMenuButton1"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Urutkan
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <a class="dropdown-item" href="{{ url('/tp2dd') }}?sort=ASC">Dari Huruf Awal <i class="fa fa-sort-alpha-down"
                                            style="margin-left: 1.5em;"></i></a>
                                    <a class="dropdown-item" href="{{ url('/tp2dd') }}?sort=DESC">Dari Huruf Terakhir<img
                                            src="{{ URL::asset('fonts/sort-alpha-down-alt-solid.svg') }}"
                                            style="width: 13px; margin-left: .3em;"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 ket-jumlah">
                        <!-- <p>menunjukkan hasil 1-30 Kabupaten/Kota</p> -->
                    </div>
                </div>
                <!-- Section caption -->
                @if($governments != null)
                <div class="row">
                    @foreach($governments as $government)
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <div class="services-caption text-center mb-30">
                                <div class="service-icon">
                                    <span><img src="{{$government['logo']}}" onerror="this.src='{{ URL::asset('img/logo/log.png') }}'" style="width: 90px;"></span>
                                </div>
                                <div class="service-cap">
                                    <h4><a href="{!! url('/detailtp2dd?kode_daerah=')!!}{{$government['instansi_id']}}">{{$government['nama']}}</a></h4>
                                    <p>{{ Str::limit(strip_tags($government['deskripsi']), 120) }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row justify-content-center mb-30">
                    <nav class="blog-pagination">
                        <ul class="pagination">
                        @if($page > 1)
                            <li class="page-item">
                                @if($sort == null)
                                
                                <a href="{!! url('/tp2dd?page='.($page-1)) !!}" class="page-link" aria-label="Previous">
                                    <i class="ti-angle-left"></i>
                                </a>
                                @else
                                <a href="{!! url('/tp2dd?sort='.$sort.'&page='.($page-1)) !!}" class="page-link" aria-label="Previous">
                                    <i class="ti-angle-left"></i>
                                </a>
                                
                                @endif
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
                                        @if($sort == null)
                                        
                                        <a href="{!! url('/tp2dd?page='.$i) !!}" class="page-link">{{$i}}</a>
                                        @else
                                        <a href="{!! url('/tp2dd?sort='.$sort.'&page='.$i) !!}" class="page-link">{{$i}}</a>
                                        
                                        @endif
                                        
                                    </li>
                                    @else
                                    <li class="page-item">
                                        @if($sort == null)
                                        
                                        <a href="{!! url('/tp2dd?page='.$i) !!}" class="page-link">{{$i}}</a>
                                        @else
                                        <a href="{!! url('/tp2dd?sort='.$sort.'&page='.$i) !!}" class="page-link">{{$i}}
                                        </a>
                                        @endif
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
                                @if($sort == null)
                                
                                <a href="{!! url('/tp2dd?page='.($page+1)) !!}" class="page-link" aria-label="Previous">
                                    <i class="ti-angle-right"></i>
                                </a>
                                @else
                                <a href="{!! url('/tp2dd?sort='.$sort.'&page='.($page+1)) !!}" class="page-link" aria-label="Previous">
                                    <i class="ti-angle-right"></i>
                                </a>
                                
                                @endif
                            </li>
                            @endif
                        </ul>
                    </nav>
                </div>
                @else
                <div class="row justify-content-center mb-30">
                    Belum Ada Data
                </div>
                @endif
            </div>
        </section>
        <!-- Akhir area TP2DD -->

    </main>


    <!--Edit Penambahan tombol scroll up-->
    <!--Tambah Tombol scroll up dan js nya-->
    <button id="scrollUp" onclick="topFunction()" style="position: fixed; z-index: 2147483647; display: block;"><i
        class="ti-arrow-up"></i></button>
<script>
    var mybutton = document.getElementById("scrollUp");

    window.onscroll = function () {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
    }

    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
</script>


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

@section('p2dd_medsos')

    @if($p2dd_info != null)
        <ul>
            <li>
                <a href="//{!!$p2dd_info['facebook']!!}" class="fab fa-facebook-f"></a>
            </li>
            <li>
                <a href="//{!!$p2dd_info['youtube']!!}" class="fab fa-youtube ml-4"></a>
            </li>
            <li>
                <a href="//{!!$p2dd_info['twitter']!!}" class="fab fa-twitter ml-4"></a>
            </li>
            <li>
                <a href="//{!!$p2dd_info['instagram']!!}" class="fab fa-instagram  ml-4"></a>
            </li>
        </ul>
    @else
        <ul>
            <li>
                <a href="#" class="fab fa-facebook-f"></a>
            </li>
            <li>
                <a href="#" class="fab fa-youtube ml-4"></a>
            </li>
            <li>
                <a href="#" class="fab fa-twitter ml-4"></a>
            </li>
            <li>
                <a href="#" class="fab fab fa-instagram-v ml-4"></a>
            </li>
            
        </ul>
    @endif
@endsection
