@extends('template.main')

@section('title', 'Galeri Foto | Portal Percepatan Digitalisasi Daerah')

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
                                                <li><a href="{!! url('/edukasi') !!}">Edukasi Artikel</a></li>
                                                <li><a href="{!! url('/faq') !!}">FAQ</a></li>
                                                <li><a href="{!! url('/daftaristilah') !!}">Daftar Istilah</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="{!! url('/regulasi') !!}">Regulasi</a></li>
                                        <li><a href="#">Kolaborasi</a></li>
                                        <li><a href="{!! url('/kegiatan') !!}">Kegiatan</a></li>
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
   <!-- navgation link Start-->
   <div class="section-padd4 sky-blue">
      <div class="container nav-bread mt-30">
         <nav>
            <ol class="breadcrumb pl-0 pr-0 sky-blue">
               <li class="breadcrumb-item"><a href="{!! url('/galerifoto') !!}">Galeri Foto</a></li>
               <li class="breadcrumb-item active"><a href="">
                  @if($detailGalleryPhoto != null)
                     {{$detailGalleryPhoto['judul']}} 
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
   <section class="blog_area single-post-area background_2"> 
      <div class="container">
         <div class="row">
            <div class="col-lg-8 mb-30">
               <div class="single-post">
                  <div class="blogs">
                     <div class="blogs_details">
                     @if($detailGalleryPhoto != null)
                        {{$detailGalleryPhoto['judul']}} 
                     @else 
                        404 : Tidak ditemukan 
                     @endif</a>
                     </div>
                     <div class="row blogs-item">
                        <div class="item_gallery col-lg-4">
                           <a href="#gambar1">
                                 @if($detailGalleryPhoto['link'] != null)
                                <img class="card-img" src="{{$detailGalleryPhoto['link']}}" onerror="this.src='{{ URL::asset('img/P2DD.png') }}'" alt="">
                                @else
                                <img class="card-img" src="{{$detailGalleryPhoto['file']}}" onerror="this.src='{{ URL::asset('img/P2DD.png') }}'" alt="">
                                @endif
                              <div class="overly">
                                 <div class="text"><i class="fas fa-search-plus"></i></div>
                              </div>
                           </a>
                           <div class="overlay" id="gambar1">
                              <a href="#" class="tutup">X Tutup</a>
                              <div class="kotak">
                                 @if($detailGalleryPhoto['link'] != null)
                                <img class="card-img" src="{{$detailGalleryPhoto['link']}}" onerror="this.src='{{ URL::asset('img/P2DD.png') }}'" alt="">
                                @else
                                <img class="card-img" src="{{$detailGalleryPhoto['file']}}" onerror="this.src='{{ URL::asset('img/P2DD.png') }}'" alt="">
                                @endif
                                @if($detailGalleryPhoto != null)
                                <p>{{$detailGalleryPhoto['judul']}} </p>
                                 @endif
                                 
                              </div>
                              <div class="nav-overlay">
                                 <a href="#gambar4" class="sebelumnya">
                                    <p class="fas fa-chevron-left"></p>
                                 </a>
                                 <a href="#gambar2" class="lanjut">
                                    <p class="fas fa-chevron-right"></p>
                                 </a>
                              </div>
                           </div>
                        </div>
                        <div class="item_gallery col-lg-4">
                           <a href="#gambar2">
                           @if($detailGalleryPhoto['link'] != null)
                                <img class="card-img" src="{{$detailGalleryPhoto['link']}}" onerror="this.src='{{ URL::asset('img/P2DD.png') }}'" alt="">
                                @else
                                <img class="card-img" src="{{$detailGalleryPhoto['file']}}" onerror="this.src='{{ URL::asset('img/P2DD.png') }}'" alt="">
                                @endif
                              <div class="overly">
                                 <div class="text"><i class="fas fa-search-plus"></i></div>
                              </div>
                           </a>
                           <div class="overlay" id="gambar2">
                              <a href="#" class="tutup">X Tutup</a>
                              <div class="kotak">
                                 @if($detailGalleryPhoto['link'] != null)
                                <img class="card-img" src="{{$detailGalleryPhoto['link']}}" onerror="this.src='{{ URL::asset('img/P2DD.png') }}'" alt="">
                                @else
                                <img class="card-img" src="{{$detailGalleryPhoto['file']}}" onerror="this.src='{{ URL::asset('img/P2DD.png') }}'" alt="">
                                @endif
                                @if($detailGalleryPhoto != null)
                                <p>{{$detailGalleryPhoto['judul']}} </p>
                                 @endif
                              </div>
                              <div class="nav-overlay">
                                 <a href="#gambar1" class="sebelumnya">
                                    <p class="fas fa-chevron-left"></p>
                                 </a>
                                 <a href="#gambar3" class="lanjut">
                                    <p class="fas fa-chevron-right"></p>
                                 </a>
                              </div>
                           </div>
                        </div>
                        <div class="item_gallery col-lg-4">
                           <a href="#gambar3">
                              <img class="gallery-foto" src="{{ URL::asset('img/P2DD.png') }}" alt="Foto_1">
                              <div class="overly">
                                 <div class="text"><i class="fas fa-search-plus"></i></div>
                              </div>
                           </a>
                           <div class="overlay" id="gambar3">
                              <a href="#" class="tutup">X Tutup</a>
                              <div class="kotak">
                                 <img src="{{ URL::asset('img/P2DD.png') }}" alt="Foto_1">
                                 <p>Seminar Elektronifikasi Transaksi Pemerintah Daerah Pertama Kali diselenggarakan di
                                    kota terdekat</p>
                              </div>
                              <div class="nav-overlay">
                                 <a href="#gambar2" class="sebelumnya">
                                    <p class="fas fa-chevron-left"></p>
                                 </a>
                                 <a href="#gambar4" class="lanjut">
                                    <p class="fas fa-chevron-right"></p>
                                 </a>
                              </div>
                           </div>
                        </div>
                        <div class="item_gallery col-lg-4">
                           <a href="#gambar4">
                              <img class="gallery-foto" src="{{ URL::asset('img/P2DD.png') }}" alt="Foto_1">
                              <div class="overly">
                                 <div class="text"><i class="fas fa-search-plus"></i></div>
                              </div>
                           </a>
                           <div class="overlay" id="gambar4">
                              <a href="#" class="tutup">X Tutup</a>
                              <div class="kotak">
                                 <img src="{{ URL::asset('img/P2DD.png') }}" alt="Foto_1">
                                 <p>Seminar Elektronifikasi Transaksi Pemerintah Daerah Pertama Kali diselenggarakan di
                                    kota terdekat</p>
                              </div>
                              <div class="nav-overlay">
                                 <a href="#gambar3" class="sebelumnya">
                                    <p class="fas fa-chevron-left"></p>
                                 </a>
                                 <a href="#gambar1" class="lanjut">
                                    <p class="fas fa-chevron-right"></p>
                                 </a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="divider1"></div>
                  <div class="navigationss-top ">
                     <div class="d-sm-flex justify-content-between text-center">
                        <ul class="blog-info-link">
                           @if($detailGalleryPhoto != null)
                              <li><i class="fa fa-user"></i> {{$detailGalleryPhoto['dibuat_oleh']}}</li>
                              <li><i class="fa fa-clock"></i>{{$detailGalleryPhoto['tgl_dibuat']}}</li>
                           @endif
                        </ul>
                        <div class="col-sm-4 text-center my-2 my-sm-0">
                           <!-- <p class="comment-count"><span class="align-middle"><i class="fa fa-comment"></i></span> 06 Comments</p> -->
                        </div>
                        <ul class="social-icons">
                           @if($detailGalleryPhoto != null)
                           <ul class="social-icons">
                              <li><a href="{!! $socmed['facebook'] !!}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                              <li><a href="{!! $socmed['whatsapp'] !!}" target="_blank"><i class="fab fa-whatsapp"></i></a></li>
                              <li><a href="{!! $socmed['twitter'] !!}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                           </ul>
                           @endif
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-lg-4">
               <div class="blog_right_sidebar">
                  <div class="row pt-0">
                     <div class="col">
                        <div class="section-judul-berita">
                           <h4>Foto Terbaru</h4>
                        </div>
                     </div>
                     <div class="col">
                        <div class="section-judul-berita">
                           <h6><a href="{!! url('/galerifoto') !!}">Lihat Semua</a></h6>
                        </div>
                     </div>
                  </div>
                  <aside class="single_sidebar_widget popular_post_widget">
                     
                        @if($galleryPhotos != null)    
                            @foreach($galleryPhotos as $photoItem)
                            <div class="media post_item">
                                <div class="col-lg-4 col-4 pl-0 pr-0">
                                    <img class="image" src="{{$photoItem['link']}}" onerror="this.src='{{ URL::asset('img/P2DD.png') }}'" alt="post">
                                </div>
                                <div class="col-lg-8 col-8">
                                    <div class="media-body">
                                        <a href="{!! url('/detailgalerifoto?id=')!!}{{$photoItem['galeri_id']}}">
                                            <h3>{{$photoItem['judul']}}</h3>
                                        </a>
                                        <p>{{$photoItem['tgl_dibuat']}}</p>
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