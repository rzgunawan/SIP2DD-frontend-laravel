@extends('template.main')

@section('title', 'Galeri Video | Portal Percepatan Digitalisasi Daerah')

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
                                        <li class="active"><a href="#">Galeri</a>
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
   <!-- navgation link Start-->
   <div class="section-padd4 sky-blue">
      <div class="container nav-bread mt-30">
         <nav>
            <ol class="breadcrumb pl-0 pr-0 sky-blue">
               <li class="breadcrumb-item"><a href="{!! url('/berita') !!}">Berita</a></li>
               <li class="breadcrumb-item"><a href="{!! url('/galerivideo') !!}">Galeri</a></li>
               <li class="breadcrumb-item active"><a href="">
                  @if($detailGalleryVideo != null)
                     {{$detailGalleryVideo['judul']}}
                  @else
                     404 : Tidak ditemukan
                  @endif</a>
               </li>
            </ol>
         </nav>
      </div>
   </div>
   <!-- navigation link End-->
   <!--================Blog Area =================-->
   <section class="detail_page single-post-area background_3 mb-30">
      <div class="container">
         <div class="row">
            <div class="col-lg-8 mb-30">
               <div class="single-post">
                  <div class="blogs">
                     @if($detailGalleryVideo != null)
                        @if($detailGalleryVideo['tipe'] == "Youtube")
                           <x-embed url="{{$detailGalleryVideo['link']}}"/>
                        @else
                           <?php
                              preg_match('/<iframe.*src=\"(.*)\".*><\/iframe>/isU', $detailGalleryVideo['link'], $match);
                           ?>
                           @if(array_key_exists(1, $match))
                           <div class="col-lg-12 pr-0 pl-0 video_iframe">
                                   {!! $detailGalleryVideo['link'] !!}
                               </div>
                           @else
                              <video controls>
                                 <source src="http://103.18.117.44/sicantik-ws/webroot/files/upload/{{ $detailGalleryVideo['file'] }}">
                                 Your browser does not support the video tag.
                              </video>
                           @endif

                        @endif
                     @else
                           <div class="carousel-item active">
                              <div class="col-lg-12">
                                 <img class="card-img" src="{{ URL::asset('img/P2DD.png') }}" alt="slide3">
                              </div>
                           </div>
                     @endif
                     <div class="blogs_details">
                        <h2>
                        @if($detailGalleryVideo != null)
                           <h3><img class="logo_gov" src="{{ URL::asset('img/logo_list/gov4_blue.svg') }}" alt="logo">{{$detailGalleryVideo['dibuat_oleh']}}</h3>
                           <h2>{{$detailGalleryVideo['judul']}}</h2>
                        @else
                           Oops! Mohon Maaf, halaman tidak tersedia atau URL yang Anda inputkan salah.
                        @endif
                        </h2>
                     </div>
                  </div>
                  <div class="divider1"></div>
                  <div class="navigationss-top ">
                     <div class="d-sm-flex justify-content-between text-center">
                        <ul class="blog-info-link">
                           @if($detailGalleryVideo != null)
                              <li><i class="fa fa-user"></i> {{$detailGalleryVideo['dibuat_oleh']}}</li>
                              <li><i class="fa fa-clock"></i>{{tanggal_indonesia($detailGalleryVideo['tgl_dibuat'],false)}}</li>
                           @endif

                        </ul>
                        <div class="col-sm-4 text-center my-2 my-sm-0">
                           <!-- <p class="comment-count"><span class="align-middle"><i class="fa fa-comment"></i></span> 06 Comments</p> -->
                        </div>
                        @if($detailGalleryVideo != null)
                        <ul class="social-icons">
                           <li><a href="{!! $socmed['facebook'] !!}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                           <li><a href="{!! $socmed['whatsapp'] !!}" target="_blank"><i class="fab fa-whatsapp"></i></a></li>
                           <li><a href="{!! $socmed['twitter'] !!}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                        </ul>
                        @endif
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-lg-4">
               <div class="blog_right_sidebar">
                  <div class="row pt-0">
                     <div class="col">
                        <div class="section-judul-berita">
                           <h4>Video Terbaru</h4>
                        </div>
                     </div>
                     <div class="col">
                        <div class="section-judul-berita">
                           <h6><a href="{!! url('/galerivideo') !!}">Lihat Semua</a></h6>
                        </div>
                     </div>
                  </div>
                  <aside class="single_sidebar_widget popular_post_widget">
                        @if($galleryVideos != null)
                            @foreach($galleryVideos as $videoItem)
                            <div class="media post_item">
                                <div class="col-lg-4 col-4 pl-0 pr-0">
                                    @if($videoItem['tipe'] == "Youtube")
                                       <img class="image" src="https://img.youtube.com/vi/{{ getYouTubeVideoId($videoItem['link']) }}/mqdefault.jpg"
                                                                           alt="" onerror="this.src='{{ URL::asset('img/P2DD.png') }}'">
                                    @else
                                       <img class="image" src="" alt="" onerror="this.src='{{ URL::asset('img/P2DD.png') }}'">
                                    @endif
                                 </div>
                                <div class="col-lg-8 col-8 pr-0">
                                    <div class="media-body">
                                        <a href="{!! url('/detailgalerivideo?id=')!!}{{$videoItem['galeri_id']}}">
                                            <h3>{{ Str::limit($videoItem['judul'], 60) }}</h3>
                                        </a>
                                        <p style="color: #606060; font-weight: 300; font-size: 12px;"> <img
                                             src="{{ URL::asset('img/logo_list/gov4_grey.svg') }}" alt="logo"
                                             style="height: 14px; vertical-align: -1px; margin-right: .2rem;">
                                             {{$videoItem['dibuat_oleh']}}
                                       </p>
                                        <p>{{tanggal_indonesia($videoItem['tgl_dibuat'], false)}}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @else
                            <div class="media post_item">Belum ada Data</div>
                        @endif
                  </aside>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!--================ Blog Area end =================-->
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